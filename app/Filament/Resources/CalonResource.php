<?php

namespace App\Filament\Resources;

use App\Filament\Resources\CalonResource\Pages;
use App\Filament\Resources\CalonResource\RelationManagers;
use App\Models\Calon;
use Filament\Forms;
use Filament\Forms\Form;
use Filament\Resources\Resource;
use Filament\Tables;
use Filament\Tables\Table;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\SoftDeletingScope;
use stdClass;


class CalonResource extends Resource
{
    protected static ?string $model = Calon::class;

    protected static ?int $navigationSort = 1;
    protected static ?string $navigationLabel = "Calon Siswa";
    protected static ?string $navigationIcon = 'heroicon-o-user';

    public static function form(Form $form): Form
    {
        $startYear = date('Y');
        $endYear = 1990;

        $years = range($startYear, $endYear, -1);

        $tahunLulus = array_combine($years, $years);
        return $form
            ->schema([
                Forms\Components\TextInput::make('nisn')
                    ->maxLength(10)->numeric()->required()->label('NISN'),
                Forms\Components\TextInput::make('nik')
                    ->maxLength(16)->numeric()->required()->label('NIK'),
                Forms\Components\TextInput::make('nama')
                    ->maxLength(255)->required(),
                Forms\Components\Radio::make('jenis_kelamin')
                    ->options([
                        'l' => 'Laki-laki',
                        'p' => 'Perempuan',
                    ])->required(),
                Forms\Components\TextInput::make('tempat_kelahiran')
                    ->maxLength(255)->required(),
                Forms\Components\DatePicker::make('tanggal_lahir')->required(),
                Forms\Components\Select::make('id_agama')
                    ->relationship('agama', 'nama')
                    ->searchable()
                    ->preload()
                    ->createOptionForm(
                        [
                            Forms\Components\TextInput::make('nama')
                                ->maxLength(255),
                        ]
                    )->required(),
                Forms\Components\Radio::make('status_dalam_keluarga')
                    ->options([
                        'kandung' => 'Anak Kandung',
                        'angkat' => 'Anak Angkat',
                    ])->required(),
                Forms\Components\TextInput::make('alamat')
                    ->maxLength(255)->required(),
                Forms\Components\TextInput::make('no_hp')
                    ->tel()->telRegex('/^[+]*[(]{0,1}[0-9]{1,4}[)]{0,1}[-\s\.\/0-9]*$/')
                    ->required(),
                Forms\Components\Select::make('id_asal_sekolah')
                    ->relationship('asal_sekolah', 'nama')
                    ->searchable()
                    ->preload()
                    ->createOptionForm([
                        Forms\Components\TextInput::make('nama')
                            ->maxLength(255)->required(),
                        Forms\Components\Radio::make('status')->options([
                            'negeri' => 'Negeri',
                            'swasta' => 'Swasta',
                        ])->required(),
                        Forms\Components\Textarea::make('alamat')
                            ->required(),
                    ])->required(),

                Forms\Components\Select::make('tahun_lulus')->searchable()
                    ->options($tahunLulus)->createOptionForm([
                        Forms\Components\TextInput::make('tahun_lulus')
                            ->numeric()->required(),
                    ])->required(),
                Forms\Components\Select::make('status')->options([
                    'diproses' => 'Diproses',
                    'ditolak' => 'Ditolak',
                    'diterima' => 'Diterima',
                ])->default('diproses')->disabledOn('create')->required()->native(false),
            ]);
    }

    public static function table(Table $table): Table
    {
        return $table
            ->columns([
                Tables\Columns\TextColumn::make('nisn')
                    ->label('NISN')
                    ->searchable(),
                Tables\Columns\TextColumn::make('nik')
                    ->label('NIK')
                    ->searchable(),
                Tables\Columns\TextColumn::make('nama')
                    ->searchable(),
                Tables\Columns\TextColumn::make('jenis_kelamin')
                    // alias
                    ->formatStateUsing(function (string $state) {
                        return $state == 'l' ? 'Laki-laki' : 'Perempuan';
                    })
                    ->sortable(),
                Tables\Columns\TextColumn::make('tempat_kelahiran')
                    ->searchable(),
                Tables\Columns\TextColumn::make('tanggal_lahir')
                    ->date()
                    ->sortable(),
                Tables\Columns\TextColumn::make('agama.nama')
                    ->sortable(),
                Tables\Columns\TextColumn::make('status_dalam_keluarga'),
                Tables\Columns\TextColumn::make('alamat')
                    ->searchable(),
                Tables\Columns\TextColumn::make('no_hp')
                    ->searchable(),
                Tables\Columns\TextColumn::make('asal_sekolah.nama')
                    ->sortable(),
                Tables\Columns\TextColumn::make('tahun_lulus')
                    ->sortable(),
                Tables\Columns\TextColumn::make('created_at')
                    ->dateTime()
                    ->sortable(),
                Tables\Columns\IconColumn::make('status')
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
            ])
            ->filters([
                //
            ])
            ->actions([
                Tables\Actions\EditAction::make(),
            ])
            ->bulkActions([
                Tables\Actions\BulkActionGroup::make([
                    Tables\Actions\DeleteBulkAction::make(),
                ]),
            ]);
    }

    public static function getRelations(): array
    {
        return [
            //
        ];
    }

    public static function getPages(): array
    {
        return [
            'index' => Pages\ListCalons::route('/'),
            'create' => Pages\CreateCalon::route('/create'),
            'edit' => Pages\EditCalon::route('/{record}/edit'),
        ];
    }

    public static function getNavigationBadge(): ?string
    {
        return static::getModel()::count();
    }
}
