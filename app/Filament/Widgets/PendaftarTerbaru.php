<?php

namespace App\Filament\Widgets;

use App\Models\AsalSekolah;
use Filament\Tables;
use Filament\Tables\Columns\IconColumn;
use Filament\Tables\Columns\TextColumn;
use Filament\Tables\Table;
use Filament\Widgets\TableWidget as BaseWidget;

class PendaftarTerbaru extends BaseWidget
{
    protected static ?int $sort = 2;
    public function table(Table $table): Table
    {
        date_default_timezone_set(env('APP_TIMEZONE', 'UTC'));
        return

            $table->query(
                \App\Models\Calon::query()->limit(5)
            )
            ->columns([
                TextColumn::make('nama'),
                TextColumn::make('asal_sekolah.nama'),
                TextColumn::make('created_at')
                    ->label('Tanggal Daftar')
                    ->dateTime('d/m/Y H:i', 'Asia/Aden')
                    ->since('Asia/Aden')
                    ->timezone('Asia/Aden'),
                IconColumn::make('status')
                    ->icon(
                        fn (string $state): string => match ($state) {
                            'diproses' => 'heroicon-o-clock',
                            'diterima' => 'heroicon-o-check-circle',
                            'ditolak' => 'heroicon-o-x-circle',
                        }
                    )->color(
                        fn (string $state): string => match ($state) {
                            'diproses' => 'info',
                            'diterima' => 'success',
                            'ditolak' => 'danger',
                        }
                    )
            ])->defaultSort('created_at', 'desc')->paginated(false);
    }
}
