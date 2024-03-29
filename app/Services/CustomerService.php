<?php

namespace App\Services;

use App\Repositories\Api\GetZipCodeRepository;
use Illuminate\Database\Eloquent\Collection;
use Illuminate\Pagination\LengthAwarePaginator;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Fluent;

class CustomerService
{
    public function __construct()
    {

    }

    public function getZipCode(string $zipCode): ?Fluent
    {
        $zipCode = preg_replace('/[^0-9]/', '', $zipCode);
        $response = app()->make(GetZipCodeRepository::class)->getZipCode($zipCode);
        if ($response['status'] == 'success') {
            return new Fluent($response['data']);
        }

        return null;
    }

    public function createCustomer(array $dataUser, array $dataAddess)
    {
        try {
            DB::beginTransaction();
            $user = app()->make(UserService::class)->create($dataUser);
            $dataAddess['user_id'] = $user->id;
            app()->make(UserAddressService::class)->create($dataAddess);
            DB::commit();

            return [
                'status' => 'success',
                'data' => $user,
                'msg' => 'Cliente cadastrado com sucesso!',
            ];
        } catch (\Exception $e) {
            DB::rollBack();

            return [
                'status' => 'error',
                'data' => null,
                'msg' => 'Houve um erro inesperado! Tente novamente.',
            ];
        }

    }

    public function getCustomersToTable(?string $searchTerms, ?array $filters, ?string $orderBy, ?string $orderDirection, int $limit = 15): LengthAwarePaginator
    {
        return app()->make(UserService::class)->getCustomersToTable($searchTerms, $filters, $orderBy, $orderDirection, $limit);
    }

    public function destroyCustomer(int $id)
    {

        dd('aqui');
    }

    public function getAllCustomers(): Collection
    {
        return app()->make(UserService::class)->getAllCustomers();
    }
}
