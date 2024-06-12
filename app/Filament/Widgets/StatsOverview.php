<?php

namespace App\Filament\Widgets;

use Filament\Widgets\StatsOverviewWidget as BaseWidget;
use Filament\Widgets\StatsOverviewWidget\Stat;
use Illuminate\Support\Facades\DB;



class StatsOverview extends BaseWidget
{
    protected function getStats(): array
    {
        $result = DB::select('call total_status_calon()');


        $stats = [];
        foreach ($result as $key => $value) {
            $stats[] = Stat::make(ucfirst($value->status), $value->total_calon);
        }

        return $stats;
    }
}
