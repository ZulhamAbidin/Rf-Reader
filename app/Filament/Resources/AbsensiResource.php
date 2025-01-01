<?php

namespace App\Filament\Resources;

use Filament\Forms;
use Filament\Tables;
use App\Models\Siswa;
use App\Models\Absensi;
use Filament\Forms\Form;
use Filament\Tables\Table;
use Filament\Resources\Resource;
use Filament\Forms\Components\Button;
use Filament\Forms\Components\Hidden;
use Filament\Tables\Columns\TextColumn;
use Filament\Forms\Components\TextInput;
use Filament\Notifications\Notification;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Support\Facades\Validator;
use App\Filament\Resources\AbsensiResource\Pages;
use Illuminate\Database\Eloquent\SoftDeletingScope;
use App\Filament\Resources\AbsensiResource\RelationManagers;

class AbsensiResource extends Resource
{
    protected static ?string $model = Absensi::class;

    protected static ?string $navigationIcon = 'heroicon-o-rectangle-stack';

    public static function form(Form $form): Form
    {
        return $form->schema([
            TextInput::make('rfid_id')
                ->label('RFID ID')
                ->required()
                ->reactive()
                ->afterStateUpdated(function ($state, $set) {
                    $siswa = Siswa::where('rfid_id', $state)->first();
                    
                    if ($siswa) {
                        $set('siswa_id', $siswa->id);
                        $set('nama', $siswa->nama);

                        static::autoSave(
                            [
                                'siswa_id' => $siswa->id,
                            ],
                            $set,
                        );
                    } else {
                        $set('siswa_id', null);
                        $set('nama', null);
                    }
                }),
            Hidden::make('siswa_id')->label('Siswa ID'),
            TextInput::make('nama')->label('Nama Siswa')->readonly()->required(),
        ]);
    }

    public static function autoSave(array $data, $set): void
    {
        $validator = Validator::make($data, [
            'siswa_id' => 'required|exists:siswas,id',
        ]);

        if ($validator->fails()) {
            return;
        }

        Absensi::create($data);

        Notification::make()
            ->title('Absensi Berhasil!')
            ->body('Absensi untuk siswa telah berhasil disimpan.')
            ->success()
            ->send();

        $set('rfid_id', null);
        $set('siswa_id', null);
        $set('namaa', null);
    }

    public static function table(Table $table): Table
    {
        return $table
            ->columns([
                TextColumn::make('siswa.nama')
                    ->label('Nama Siswa')
                    ->copyable()
                    ->copyMessage('Berhasil Menyalin Nama Siswa')
                    ->sortable()
                    ->searchable(),
                    
                TextColumn::make('created_at')
                    ->label('Waktu Absensi')
                    ->sortable(),
                    ])

            ->filters([
                
            ])

            ->actions([
                Tables\Actions\EditAction::make(),
                Tables\Actions\DeleteAction::make(),
            ])
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
            'index' => Pages\ListAbsensis::route('/'),
            'create' => Pages\CreateAbsensi::route('/create'),
            'edit' => Pages\EditAbsensi::route('/{record}/edit'),
        ];
    }
}
