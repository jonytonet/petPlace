<?php

namespace App\Livewire\Admin\Customers\Components;

use App\Services\ServiceFinancialService;
use Livewire\Component;

class FinanceTab extends Component
{
    public $customer;

    public $reference;

    public $orderBy = 'id';

    public $orderDirection = 'desc';

    public function render()
    {

        return view(
            'livewire.admin.customers.components.finance-tab',
            [
                'finances' => app()->make(ServiceFinancialService::class)->getServiceFinancialsByUser($this->customer->id, $this->reference, $this->orderBy, $this->orderDirection),
            ]
        );
    }

    public function toggleOrderBy($order)
    {
        if ($this->orderBy == $order) {
            if ($this->orderDirection == 'asc') {
                $this->orderDirection = 'desc';
            } else {
                $this->orderDirection = 'asc';
            }
        } else {
            $this->orderBy = $order;
            $this->orderDirection = 'asc';
        }
    }
}
