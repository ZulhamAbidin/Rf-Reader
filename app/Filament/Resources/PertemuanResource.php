<?php

namespace App\Filament\Resources;

use Carbon\Carbon;
use Filament\Forms;
use Filament\Tables;
use Filament\Forms\Form;
use App\Models\Pertemuan;
use Filament\Tables\Table;
use Filament\Resources\Resource;
use Filament\Tables\Columns\Column;
use Filament\Forms\Components\Textarea;
use Filament\Tables\Columns\TextColumn;
use Filament\Forms\Components\TextInput;
use Filament\Forms\Components\DatePicker;
use Illuminate\Database\Eloquent\Builder;
use Filament\Forms\Components\DateTimePicker;
use App\Filament\Resources\PertemuanResource\Pages;
use Illuminate\Database\Eloquent\SoftDeletingScope;
use App\Filament\Resources\PertemuanResource\RelationManagers;

class PertemuanResource extends Resource
{
    protected static ?string $model = Pertemuan::class;

    protected static ?string $navigationIcon = 'heroicon-o-rectangle-stack';

    public static function form(Form $form): Form
    {
        return $form->schema([
            
        Textarea::make('deskripsi')
            ->label('Deskripsi')
            ->autosize()
            ->required()
            ->columnSpan([
                'sm' => 2,
                'xl' => 3,
                '2xl' => 4,
            ]),

        TextInput::make('pertemuanke')
            ->label('Pertemuan Ke')
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
                TextColumn::make('deskripsi')
                ->copyable()
                ->copyMessage('Berhasil Menyalin')
                ->sortable()
                ->searchable(),

                TextColumn::make('tanggal')
                ->formatStateUsing(function ($state) {
                    return '<div class="text-center">' . Carbon::parse($state)->translatedFormat('l, d F Y') . '</div>';
                })
                ->html(),            
                
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
