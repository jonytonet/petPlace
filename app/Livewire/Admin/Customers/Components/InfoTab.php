<?php

namespace App\Livewire\Admin\Customers\Components;

use App\Services\CustomerService;
use App\Services\UserAddressService;
use App\Services\UserService;
use Illuminate\Support\Facades\DB;
use Livewire\Component;

class InfoTab extends Component
{
    public $customer;

    public $customerInfo = [];

    public $addressInfo = [];

    public $customerEdit = false;

    public function render()
    {
        return view('livewire.admin.customers.components.info-tab');
    }

    public function mount()
    {
        $this->customerInfo = $this->customer->toArray();
        $this->addressInfo = $this->customer->address->toArray();

    }

    public function toggleEdit()
    {
        $this->customerEdit = ! $this->customerEdit;
        if (! $this->customerEdit) {
            return redirect(request()->header('Referer'));
        }
    }

    public function save()
    {
        try {
            DB::beginTransaction();

            if (! app()->make(UserService::class)->update($this->customerInfo, $this->customerInfo['id'])) {
                DB::rollBack();
                $this->dispatch('sweetAlert', ['msg' => 'Houve um erro! Tente novamente.', 'icon' => 'error']);

                return;
            }

            if (! app()->make(UserAddressService::class)->update($this->addressInfo, $this->addressInfo['id'])) {
                DB::rollBack();
                $this->dispatch('sweetAlert', ['msg' => 'Houve um erro! Tente novamente.', 'icon' => 'error']);

                return;
            }

            DB::commit();
            $this->dispatch('sweetAlert', ['msg' => 'Cliente editado com sucesso!', 'icon' => 'success']);
        } catch (\Exception $exception) {
            DB::rollBack();
            $this->dispatch('sweetAlert', ['msg' => 'Houve um erro! Tente novamente.', 'icon' => 'error']);

            return;
        }
    }

    public function getZipCode(string $zipCode)
    {
        $result = app()->make(CustomerService::class)->getZipCode($zipCode);

        if ($result) {
            if ($result['erro']) {
                $this->dispatch('sweetAlert', ['msg' => 'Cep não localizado ou inválido!', 'icon' => 'error']);

                return;
            }
            $this->dispatch('getAddress', [
                'address' => $result->logradouro,
                'city' => $result->localidade,
                'district' => $result->bairro,
                'state' => $result->uf,
            ]);
            $this->addressInfo['address'] = $result->logradouro;
            $this->addressInfo['district'] = $result->bairro;
            $this->addressInfo['city'] = $result->localidade;
            $this->addressInfo['state'] = $result->uf;
            $this->addressInfo['complement'] = null;

        }

    }
}
