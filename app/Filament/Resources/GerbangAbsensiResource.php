<?php

namespace App\Filament\Resources;

use Carbon\Carbon;
use Filament\Tables;
use Filament\Forms\Form;
use Filament\Tables\Table;
use App\Models\GerbangAbsensi;
use Filament\Resources\Resource;
use Illuminate\Support\HtmlString;
use Filament\Tables\Actions\Action;
use Filament\Forms\Components\Select;
use Filament\Forms\Components\Section;
use Filament\Tables\Columns\TextColumn;
use Filament\Tables\Filters\SelectFilter;
use Filament\Forms\Components\Placeholder;

use Filament\Forms\Components\DateTimePicker;
use App\Filament\Resources\GerbangAbsensiResource\Pages;

class GerbangAbsensiResource extends Resource
{
    protected static ?string $model = GerbangAbsensi::class;
    protected static ?string $navigationIcon = 'heroicon-o-rectangle-stack';
    protected static ?string $navigationGroup = 'Presensi';
    protected static ?string $label = 'Jalankan Presensi';

    public static function form(Form $form): Form
    {
        return $form
            ->schema([
                DateTimePicker::make('waktu_mulai')
                    ->label('Dimulai Pada')
                    ->required(),

                DateTimePicker::make('waktu_selesai')
                    ->label('Berakhir Pada')
                    ->required(),

                Select::make('kelas_id')
                    ->required()
                    ->label('Nama Kelas')
                    ->relationship('kelas', 'nama_Kelas'),

                Select::make('mata_pelajaran_id')
                    ->required()
                    ->label('Nama Mata Pelajaran')
                    ->relationship('matapelajaran', 'nama_mata_pelajaran'),

                Select::make('pertemuan_id')
                    ->required()
                    ->label('Pertemuan Ke')
                    ->relationship('pertemuan', 'pertemuanke'),
            ]);
    }

    public static function table(Table $table): Table
    {
        return $table
            ->columns([

                TextColumn::make('waktu_mulai')
                    ->formatStateUsing(function ($state, $record) {
                        $waktuMulai = Carbon::parse($record->waktu_mulai)->translatedFormat('H:i');
                        $waktuSelesai = Carbon::parse($record->waktu_selesai)->translatedFormat('H:i');
                        $tanggal = Carbon::parse($record->waktu_selesai)->translatedFormat('l, d F Y');
                        return $waktuMulai . ' - ' . $waktuSelesai . ' ' . $tanggal;
                    }),

                TextColumn::make('kelas.nama_kelas')
                    ->label('Nama Kelas')
                    ->copyable()
                    ->copyMessage('Berhasil Menyalin Nama Kelas')
                    ->sortable()
                    ->searchable()
                    ->toggleable(isToggledHiddenByDefault:false),
            

                TextColumn::make('matapelajaran.nama_mata_pelajaran')
                    ->label('Nama Mata Pelajaran')
                    ->copyable()
                    ->copyMessage('Berhasil Menyalin Nama Mata Pelajaran')
                    ->sortable()
                    ->searchable()
                    ->toggleable(isToggledHiddenByDefault:false),
            
                TextColumn::make('pertemuan.pertemuanke')
                    ->label('Pertemuan Ke')
                    ->copyable()
                    ->copyMessage('Berhasil Menyalin')
                    ->sortable()
                    ->searchable()
                    ->tooltip('Pertemuan Ke')
                    ->searchable()
                    ->toggleable(isToggledHiddenByDefault:false),
            ])

            ->filters([
                SelectFilter::make('nama_kelas')
                    ->label('Nama Kelas')
                    ->relationship('kelas', 'nama_kelas')
                    ->searchable(), 

                SelectFilter::make('nama_mata_pelajaran')
                    ->label('Nama Mata Pelajaran')
                    ->relationship('matapelajaran', 'nama_mata_pelajaran')
                    ->searchable(), 
                
                SelectFilter::make('pertemuan')
                    ->label('Pertemuan')
                    ->relationship('pertemuan', 'pertemuanke')
                    ->searchable()
            ])

            ->actions([
                Tables\Actions\ActionGroup::make([
                    Tables\Actions\ViewAction::make(),
                    Tables\Actions\EditAction::make(),
                    Tables\Actions\DeleteAction::make(),
                ]),
            ])

            ->headerActions([
                Tables\Actions\Action::make('deteksiAbsensi')
                    ->label('Jalankan Presensi')
                    ->url(fn() => url('/admin/absensis/create'))
                    ->tooltip('Sebelum Memulai Menjalankan Presensi Pastikan Anda Membuka Gerbang Prensesi Terlebih Dahulu')
                    ->openUrlInNewTab(),
                    
                Tables\Actions\Action::make('deteksiAbsensi')
                    ->label('Buka Gerbang Presensi')
                    ->url(fn() => url('/admin/gerbang-absensis/create'))
            ])

            ->bulkActions([
                Tables\Actions\BulkActionGroup::make([
                    Tables\Actions\DeleteBulkAction::make(),
                ]),
            ]);
    }

    public static function getPages(): array
    {
        return [
            'index' => Pages\ListGerbangAbsensis::route('/'),
            'create' => Pages\CreateGerbangAbsensi::route('/create'),
            'edit' => Pages\EditGerbangAbsensi::route('/{record}/edit'),
            'view' => Pages\DetailGerbangAbsensi::route('/{record}/view'),
        ];
    }
}