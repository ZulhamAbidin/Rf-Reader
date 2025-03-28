<?php

namespace App\Filament\Resources;

use Filament\Tables;
use Filament\Forms\Form;
use Filament\Tables\Table;
use App\Models\MataPelajaran;
use Filament\Resources\Resource;
use Filament\Tables\Columns\TextColumn;
use Illuminate\Database\Eloquent\Model;
use Filament\Forms\Components\TextInput;
use Filament\GlobalSearch\Actions\Action;
use Filament\Tables\Filters\SelectFilter;
use App\Filament\Resources\MataPelajaranResource\Pages;

class MataPelajaranResource extends Resource
{
    protected static ?string $model = MataPelajaran::class;

    protected static ?string $navigationIcon = 'heroicon-o-rectangle-stack';
    protected static ?string $navigationGroup = 'Data Sekolah';
    protected static ?string $label = 'Mata Pelajaran';
    protected static ?string $recordTitleAttribute = 'nama_mata_pelajaran';

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
        return $form
            ->schema([
                TextInput::make('nama_mata_pelajaran')
                ->required(),
            ]);
    }

    public static function table(Table $table): Table
    {
        return $table
        ->columns([
            TextColumn::make('nama_mata_pelajaran')
                ->label('Nama Pelajaran')
                ->copyable()
                ->copyMessage('Berhasil Menyalin Nama Pelajaran')
                ->sortable()
                ->searchable()
                ->toggleable(isToggledHiddenByDefault:false),
            ])
            ->filters([
                SelectFilter::make('nama_mata_pelajaran')
                    ->label('Nama Mata Pelajaran')
                    ->searchable(),
            ])
            ->actions([
                Tables\Actions\EditAction::make(),
                Tables\Actions\DeleteAction::make(),
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
            'index' => Pages\ListMataPelajarans::route('/'),
            'create' => Pages\CreateMataPelajaran::route('/create'),
            'edit' => Pages\EditMataPelajaran::route('/{record}/edit'),
        ];
    }
}