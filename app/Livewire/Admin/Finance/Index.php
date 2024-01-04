<?php

namespace App\Livewire\Admin\Finance;

use App\Services\PaymentMethodService;
use App\Services\ServiceFinancialService;
use App\Services\ServiceTypeService;
use Illuminate\Support\Carbon;
use Illuminate\Support\Str;
use Livewire\Component;

class Index extends Component
{
    public $searchTerms;

    public $filters = [];

    public $customerFilters = [];

    public $filtersFormatted = [];

    public $orderBy = 'id';

    public $orderDirection = 'ASC';

    public $limit = 50;

    public $targetDate;

    public function render()
    {
        return view(
            'livewire.admin.finance.index',
            [
                'services' => app()->make(ServiceTypeService::class)->all(),
                'methodPay' => app()->make(PaymentMethodService::class)->all(),
                'finances' => app()->make(ServiceFinancialService::class)->getServiceFinancialsToTable($this->searchTerms, $this->filtersFormatted, $this->orderBy, $this->orderDirection, $this->limit, $this->customerFilters),
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

    public function getFilters()
    {
        // dd($this->filters);
        $this->filtersFormatted = [];
        foreach ($this->filters as $key => $filter) {

            if (! isset($filter['filter'])) {
                $filter['filter'] = '=';
            }
            if ($filter['filter'] == 'LIKE') {
                $filter['term'] = '%'.$filter['term'].'%';
            }
            if ($key == 'customer') {
                $this->customerFilters = [['name', $filter['filter'], $filter['term']]];

                continue;
            }

            if ($key == 'start') {
                $this->targetDate = Carbon::parse($filter['term'])->format('d/m/Y');
                $this->filtersFormatted[] = ['created_at', $filter['filter'], $filter['term']];

                continue;
            }
            if ($key == 'end') {
                $this->targetDate .= ' - '.Carbon::parse($filter['term'])->format('d/m/Y');
                $this->filtersFormatted[] = ['created_at', $filter['filter'], $filter['term']];

                continue;
            }
            if ($key == 'service_value' || $key == 'discount' || $key == 'additional_expenses' || $key == 'net_total') {
                $filter['term'] = $this->convertToDecimal($filter['term']);
            }

            $this->filtersFormatted[] = [$key, $filter['filter'], $filter['term']];

        }

    }

    public function clearFilters()
    {
        $this->customerFilters = [];
        $this->filtersFormatted = [];
        $this->targetDate = '';
        $this->filters = [];
    }

    private function convertToDecimal(string $value): float
    {
        $cleanedValue = preg_replace('/[^0-9,.]/', '', $value);
        if (strpos($cleanedValue, ',') !== false && strpos($cleanedValue, '.') !== false) {
            $formattedValue = str_replace(['.'], '.', $cleanedValue);
            $formattedValue = str_replace(',', '.', $formattedValue);
        } else {
            $formattedValue = str_replace(['.', ','], ['.', '.'], $cleanedValue);
        }
        if (Str::contains($formattedValue, '.')) {
            $arrayValue = explode('.', $formattedValue);
            $endElement = end($arrayValue);
            array_pop($arrayValue);
            $formattedValue = implode('', $arrayValue).'.'.$endElement;
        }

        return floatval($formattedValue);
    }
}
