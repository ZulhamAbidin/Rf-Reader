<?php

namespace App\Filament\Resources;

use Filament\Tables;
use App\Models\Siswa;
use Filament\Forms\Form;
use Filament\Tables\Table;
use Filament\Resources\Resource;
use Filament\Forms\Components\Select;
use Filament\Tables\Columns\TextColumn;
use Illuminate\Database\Eloquent\Model;
use Filament\Forms\Components\TextInput;
use Filament\GlobalSearch\Actions\Action;
use Filament\Tables\Filters\SelectFilter;
use App\Filament\Resources\SiswaResource\Pages;

class SiswaResource extends Resource
{
    protected static ?string $model = Siswa::class;
    protected static ?string $navigationIcon = 'heroicon-o-rectangle-stack';
    protected static ?string $navigationGroup = 'Data Sekolah';
    protected static ?string $label = 'Siswa';

    protected static ?string $recordTitleAttribute = 'nama';
    public static function getGlobalSearchResultActions(Model $record): array
    {
        return [
            Action::make('index')
                ->label('Lihat Detail')
                ->url(static::getUrl('index', ['record' => $record]), shouldOpenInNewTab: true)
        ];
    }

    public static function getNavigationBadge(): ?string
    {
        return static::getModel()::count();
    }

    public static function form(Form $form): Form
    {
        return $form->schema([
            TextInput::make('nama'),
            Select::make('kelas_id')->relationship('kelas', 'nama_Kelas'),

            TextInput::make('rfid_id')
                ->unique('siswa', 'rfid_id', fn($record) => $record)
                ->validationMessages([
                    'unique' => 'The :attribute has already been registered.',
                ]),
        ]);
    }

    public static function table(Table $table): Table
    {
        return $table
            ->columns([
                TextColumn::make('nama')
                    ->copyable()
                    ->copyMessage('Berhasil Menyalin')
                    ->sortable()
                    ->toggleable(isToggledHiddenByDefault: false)
                    ->searchable(),

                TextColumn::make('kelas.nama_kelas')
                    ->Copyable()
                    ->copyMessage('Berhasil Menyalin')
                    ->sortable()
                    ->toggleable(isToggledHiddenByDefault: false)
                    ->searchable(),

                TextColumn::make('rfid_id')
                    ->Copyable()
                    ->copyMessage('Berhasil Menyalin')
                    ->sortable()
                    ->toggleable(isToggledHiddenByDefault: true)
                    ->searchable(),

            ])

            ->filters([
                SelectFilter::make('kelas')
                    ->label('Nama Kelas')
                    ->relationship('kelas', 'nama_kelas')
                    ->searchable(),
            ])

            ->actions([Tables\Actions\EditAction::make(), Tables\Actions\DeleteAction::make(), Tables\Actions\ViewAction::make()])
            ->bulkActions([Tables\Actions\BulkActionGroup::make([Tables\Actions\DeleteBulkAction::make()])]);
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
            'index' => Pages\ListSiswa::route('/'),
            'create' => Pages\CreateSiswa::route('/create'),
            'edit' => Pages\EditSiswa::route('/{record}/edit'),
            'view' => Pages\ViewSiswa::route('/{record}'),
        ];
    }
}
