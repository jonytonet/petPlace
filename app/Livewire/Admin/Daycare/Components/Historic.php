<?php

namespace App\Livewire\Admin\Daycare\Components;

use App\Services\DaycareBookingService;
use Illuminate\Support\Carbon;
use Livewire\Component;

class Historic extends Component
{
    public $searchTerms;

    public $filters = [];

    public $filtersFormatted = [];

    public $orderBy = 'id';

    public $orderDirection = 'DESC';

    public $limit = 25;

    public $notes;

    public $entryTime;

    public $exitTime;

    public $lunchTime;

    public $period;

    public $historicId;

    public $singleDaily;

    public function render()
    {
        return view('livewire.admin.daycare.components.historic', ['historics' => app()->make(DaycareBookingService::class)->getDaycareBookingsToTable($this->searchTerms, $this->filtersFormatted, $this->orderBy, $this->orderDirection, $this->limit)]);
    }

    public function goToIndex()
    {
        return redirect()->route('daycare.index');
    }

    public function editHistoric($id)
    {
        $this->dispatch('edit-historic-clear');
        $historic = app()->make(DaycareBookingService::class)->find($id);
        $this->historicId = $id;
        $this->notes = $historic->notes;
        $this->entryTime = $historic->entry_time;
        $this->exitTime = $historic->exit_time;
        $this->lunchTime = $historic->lunch_time;
        $this->period = $historic->period;
        $this->singleDaily = $historic->is_single_daily;
        $this->dispatch(
            'edit-historic',
            [
                'notes' => $historic->notes,
                'entryTime' => $historic->entry_time,
                'exitTime' => $historic->exit_time,
                'lunchTime' => $historic->lunch_time,
                'period' => $historic->period,
                'singleDaily' => $historic->is_single_daily,
            ]
        );
    }

    public function updateHistoric()
    {
        if ($this->entryTime == null || $this->entryTime == '') {
            $this->dispatch('sweetAlert', ['msg' => 'Entrada é obrigatório!', 'icon' => 'error']);

            return;
        }

        if ($this->exitTime == null || $this->exitTime == '') {
            if (
                app()->make(DaycareBookingService::class)->update(
                    [
                        'notes' => $this->notes,
                        'entry_time' => $this->entryTime,
                        'exit_time' => null,
                        'extra_time' => null,
                        'lunch_time' => $this->lunchTime != '' ? $this->lunchTime : null,
                        'period' => $this->period,

                    ],
                    $this->historicId
                )
            ) {
                $this->dispatch('sweetAlert', ['msg' => 'Registro atualizado com sucesso!', 'icon' => 'success']);

                return;
            }

            $this->dispatch('sweetAlert', ['msg' => 'Houve um erro inesperado! Tente novamente.', 'icon' => 'error']);

            return;
        }

        $entryTime = Carbon::parse($this->entryTime);
        $exitTime = Carbon::parse($this->exitTime);
        $periodStay = $this->period;
        $minutesDiff = $entryTime->diffInMinutes($exitTime);
        $periodStayMinutes = $periodStay * 60;
        $extraMinutes = null;

        if ($minutesDiff > $periodStayMinutes) {
            $extraMinutes = $minutesDiff - $periodStayMinutes;
        }

        if (
            app()->make(DaycareBookingService::class)->update(
                [
                    'notes' => $this->notes,
                    'entry_time' => $this->entryTime,
                    'exit_time' => $this->exitTime,
                    'extra_time' => $extraMinutes,
                    'lunch_time' => $this->lunchTime != '' ? $this->lunchTime : null,
                    'period' => $this->period,
                ],
                $this->historicId
            )
        ) {
            $this->dispatch('sweetAlert', ['msg' => 'Registro atualizado com sucesso!', 'icon' => 'success']);

            return;
        }

        $this->dispatch('sweetAlert', ['msg' => 'Houve um erro inesperado! Tente novamente.', 'icon' => 'error']);

    }
}
