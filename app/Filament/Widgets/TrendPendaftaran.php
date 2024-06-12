<?php

namespace App\Filament\Widgets;

use App\Models\Calon;
use Filament\Widgets\ChartWidget;
use Illuminate\Support\Facades\DB;



class TrendPendaftaran extends ChartWidget
{
    protected static ?int $sort = 3;
    protected static ?string $heading = 'Trend Pendaftaran';
    protected static ?string $maxHeight = '407px';
    protected function getData(): array
    {
        $data = DB::select('call trend_pendaftaran;');
        $data = array_map(function ($item) {
            return [
                $item->date => $item->count,
            ];
        }, $data);

        $newData = [];

        foreach ($data as $item) {
            foreach ($item as $key => $value) {
                $newData[$key] = $value;
            }
        }

        return [
            'datasets' => [
                [
                    'label' => 'Pendaftar',
                    'data' => array_values($newData),
                ],
            ],
            'labels' => array_keys($newData),
        ];
    }

    protected function getType(): string
    {
        return 'line';
    }
}
