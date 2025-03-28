<?php

namespace App\Filament\Resources;

use Carbon\Carbon;
use Filament\Tables;
use Filament\Forms\Form;
use App\Models\Pertemuan;
use Filament\Tables\Table;
use Filament\Resources\Resource;
use Filament\Forms\Components\Textarea;
use Filament\Tables\Columns\TextColumn;
use Filament\Forms\Components\TextInput;
use Filament\Forms\Components\DatePicker;
use App\Filament\Resources\PertemuanResource\Pages;

class PertemuanResource extends Resource
{
    protected static ?string $model = Pertemuan::class;

    protected static ?string $navigationIcon = 'heroicon-o-rectangle-stack';
    protected static ?string $navigationGroup = 'Data Sekolah';
    protected static ?string $label = 'Pertemuan';

    public static function getNavigationBadge(): ?string
    {
        return static::getModel()::count();
    }

    public static function form(Form $form): Form
    {
        return $form->schema([

        TextInput::make('pertemuanke')
            ->label('Pertemuan Ke')
            ->placeholder('Contoh = Pertemuan 1, Pengenalan Dasar Dasar HTML')
            ->required(),

        DatePicker::make('tanggal')
            ->label('Tanggal Pertemuan')
            ->required(),
    ]);

    }

    public static function table(Table $table): Table
    {
        return $table
            ->columns([
                TextColumn::make('pertemuanke')
                ->label('Pertemuan Ke')
                ->copyable()
                ->copyMessage('Berhasil Menyalin')
                ->sortable()
                ->searchable()
                ->toggleable(isToggledHiddenByDefault:false),

                TextColumn::make('tanggal')
                ->formatStateUsing(function ($state) {
                    return '<div class="text-center">' . Carbon::parse($state)->translatedFormat('l, d F Y') . '</div>';
                })
                ->html()
                ->toggleable(isToggledHiddenByDefault:false),       
                
            ])
            ->filters([
                //
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
            'index' => Pages\ListPertemuans::route('/'),
            'create' => Pages\CreatePertemuan::route('/create'),
            'edit' => Pages\EditPertemuan::route('/{record}/edit'),
        ];
    }
}
