<?php

namespace App\Livewire\Admin\Customers\Components;

use App\Services\CustomerService;
use Livewire\Component;
use Livewire\WithPagination;

class Table extends Component
{
    use WithPagination;

    public $searchTerms;

    public $filters = [];

    public $filtersFormatted = [];

    public $orderBy = 'id';

    public $orderDirection = 'ASC';

    public $limit = 15;

    public function render()
    {
        return view(
            'livewire.admin.customers.components.table',
            ['customers' => app()->make(CustomerService::class)->getCustomersToTable($this->searchTerms, $this->filtersFormatted, $this->orderBy, $this->orderDirection, $this->limit)]
        );
    }

    public function destroyCustomer($customerId)
    {
        if (app()->make(CustomerService::class)->destroyCustomer($customerId)) {

        }
    }

    public function getFilters()
    {
        $filterArray = [];
        foreach ($this->filters as $key => $filter) {
            if ($filter['term'] == '') {
                continue;
            }
            if ($filter['filter'] == 'LIKE') {
                $filter['term'] = '%'.$filter['term'].'%';
            }
            $filterArray[] = [$key, $filter['filter'], $filter['term']];
        }
        $this->filtersFormatted = $filterArray;

    }

    public function clearFilters()
    {
        $this->filtersFormatted = [];
        $this->filters = [];
    }

    public function toggleOrder($orderBy)
    {
        if ($this->orderBy == $orderBy) {
            if ($this->orderDirection = 'ASC') {
                $this->orderDirection = 'DESC';
            }
            if ($this->orderDirection = 'DESC') {
                $this->orderDirection = 'ASC';
            }

        } else {
            $this->orderDirection = 'ASC';
            $this->orderBy = $orderBy;
        }
    }
}
