<?php

namespace App\Filament\Resources;

use Filament\Forms;
use Filament\Tables;
use Filament\Forms\Form;
use Filament\Tables\Table;
use App\Models\GerbangAbsensi;
use Filament\Resources\Resource;
use Filament\Forms\Components\Select;
use Filament\Tables\Columns\TextColumn;
use Illuminate\Database\Eloquent\Builder;
use Filament\Forms\Components\DateTimePicker;
use Illuminate\Database\Eloquent\SoftDeletingScope;
use App\Filament\Resources\GerbangAbsensiResource\Pages;
use App\Filament\Resources\GerbangAbsensiResource\RelationManagers;

class GerbangAbsensiResource extends Resource
{
    protected static ?string $model = GerbangAbsensi::class;
    protected static ?string $navigationIcon = 'heroicon-o-rectangle-stack';
    public static function form(Form $form): Form
    {
        return $form
            ->schema([
                DateTimePicker::make('waktu_mulai')
                ->label('Dimulai Pada')
                ->required(),

                DateTimePicker::make('waktu_selesai')
                ->label('Dimulai Pada')
                ->required(),

                Select::make('kelas_id')
                ->required()
                ->label('Nama Kelas')
                ->relationship('kelas', 'nama_Kelas'),

                Select::make('mata_pelajaran_id')
                ->required()
                ->label('Nama Mata Pelajaran')
                ->relationship('matapelajaran', 'nama_mata_pelajaran'),
            ]);
    }

    public static function table(Table $table): Table
    {
        return $table
            ->columns([
                TextColumn::make('waktu_mulai'),
                TextColumn::make('waktu_selesai'),

                TextColumn::make('kelas.nama_kelas')
                ->label('Nama Kelas')
                    ->copyable()
                    ->copyMessage('Berhasil Menyalin Nama Kelas')
                    ->sortable()
                    ->searchable(),

                TextColumn::make('matapelajaran.nama_mata_pelajaran')
                ->label('Nama Mata Pelajaran')
                    ->copyable()
                    ->copyMessage('Berhasil Menyalin Nama Mata Pelajaran')
                    ->sortable()
                    ->searchable(),
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
            'index' => Pages\ListGerbangAbsensis::route('/'),
            'create' => Pages\CreateGerbangAbsensi::route('/create'),
            'edit' => Pages\EditGerbangAbsensi::route('/{record}/edit'),
        ];
    }
}
