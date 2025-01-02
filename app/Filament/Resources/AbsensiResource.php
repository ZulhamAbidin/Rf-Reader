<?php

namespace App\Filament\Resources;

use Filament\Forms;
use Filament\Tables;
use App\Models\Siswa;
use App\Models\Absensi;
use Filament\Forms\Form;
use Filament\Tables\Table;
use App\Models\GerbangAbsensi;
use Illuminate\Support\Carbon;
use Filament\Resources\Resource;
use Filament\Forms\Components\Button;
use Filament\Forms\Components\Hidden;
use Filament\Tables\Columns\TextColumn;
use Filament\Forms\Components\TextInput;
use Filament\Notifications\Notification;
use Filament\Tables\Filters\SelectFilter;
use Illuminate\Support\Facades\Validator;
use App\Filament\Resources\AbsensiResource\Pages;

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

                        $currentTime = Carbon::now();
                        $validGerbang = GerbangAbsensi::where('kelas_id', $siswa->kelas_id)
                            ->where('waktu_mulai', '<=', $currentTime)
                            ->where('waktu_selesai', '>=', $currentTime)
                            ->exists();

                        if ($validGerbang) {
                            static::autoSave(
                                [
                                    'siswa_id' => $siswa->id,
                                    'gerbang_absensi_id' => GerbangAbsensi::where('kelas_id', $siswa->kelas_id)
                                        ->where('waktu_mulai', '<=', $currentTime)
                                        ->where('waktu_selesai', '>=', $currentTime)
                                        ->first()->id,
                                    'status_kehadiran' => 'hadir',
                                    'waktu_kehadiran' => $currentTime,
                                ],
                                $set,
                            );
                        } else {
                            Notification::make()->title('Absensi Gagal')->body('Tidak ada gerbang absensi yang aktif untuk siswa ini.')->warning()->send();
                        }
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
            'siswa_id' => 'required|exists:siswa,id',
            'gerbang_absensi_id' => 'required|exists:gerbangabsensi,id',
        ]);

        if ($validator->fails()) {
            Notification::make()->title('Validasi Gagal')->body('Data tidak valid untuk absensi.')->warning()->send();
            return;
        }

        $existingAbsensi = Absensi::where('siswa_id', $data['siswa_id'])
            ->where('gerbang_absensi_id', $data['gerbang_absensi_id'])
            ->first();

        if (!$existingAbsensi) {
            Absensi::create([
                'siswa_id' => $data['siswa_id'],
                'gerbang_absensi_id' => $data['gerbang_absensi_id'],
                'status_kehadiran' => 'hadir',
                'waktu_kehadiran' => Carbon::now(),
            ]);
        } else {
            if ($existingAbsensi->status_kehadiran != 'hadir') {
                $existingAbsensi->update([
                    'status_kehadiran' => 'hadir',
                    'waktu_kehadiran' => Carbon::now(),
                ]);
            }
        }

        Notification::make()->title('Absensi Berhasil')->body('Absensi untuk siswa telah berhasil disimpan.')->success()->send();
        $kelasId = GerbangAbsensi::find($data['gerbang_absensi_id'])->kelas_id;
        $siswaHadirIds = Absensi::where('gerbang_absensi_id', $data['gerbang_absensi_id'])
            ->whereNotNull('waktu_kehadiran')
            ->pluck('siswa_id')
            ->toArray();

        $siswaBelumHadir = Siswa::where('kelas_id', $kelasId)->whereNotIn('id', $siswaHadirIds)->get();
        foreach ($siswaBelumHadir as $siswa) {
            Absensi::create([
                'siswa_id' => $siswa->id,
                'gerbang_absensi_id' => $data['gerbang_absensi_id'],
                'status_kehadiran' => 'alfa',
                'waktu_kehadiran' => null,
            ]);
        }

        $set('rfid_id', null);
        $set('siswa_id', null);
        $set('nama', null);
    }

    public static function table(Table $table): Table
    {
        return $table
            ->columns([
                TextColumn::make('gerbangAbsensi.pertemuan.pertemuanke')->label('Pertemuan Ke')->sortable()->searchable(),

                TextColumn::make('siswa.nama')->label('Nama Siswa')->copyable()->copyMessage('Berhasil Menyalin Nama Siswa')->sortable()->searchable(),

                TextColumn::make('gerbangAbsensi.mataPelajaran.nama_mata_pelajaran')->label('Mata Pelajaran')->copyable()->copyMessage('Berhasil Menyalin')->sortable()->searchable(),

                TextColumn::make('gerbangAbsensi.waktu_mulai')
                    ->label('Waktu Mulai')
                    ->searchable()
                    ->sortable()
                    ->formatStateUsing(function ($state) {
                        return '<div class="text-center">' . Carbon::parse($state)->translatedFormat('H:i') . ' ' . Carbon::parse($state)->translatedFormat('l') . '<br>' . Carbon::parse($state)->translatedFormat('d F Y') . '</div>';
                    })
                    ->html(),

                TextColumn::make('gerbangAbsensi.waktu_selesai')
                    ->label('Waktu Selesai')
                    ->searchable()
                    ->sortable()
                    ->formatStateUsing(function ($state) {
                        return '<div class="text-center">' . Carbon::parse($state)->translatedFormat('H:i') . ' ' . Carbon::parse($state)->translatedFormat('l') . '<br>' . Carbon::parse($state)->translatedFormat('d F Y') . '</div>';
                    })
                    ->html(),

                TextColumn::make('status_kehadiran')
                    ->badge()
                    ->color(
                        fn(string $state): string => match ($state) {
                            'hadir' => 'success',
                            'alfa' => 'danger',
                        },
                    )
                    ->label('Status')
                    ->sortable()
                    ->searchable(),
                TextColumn::make('created_at')
                    ->label('Waktu Absensi')
                    ->sortable()
                    ->formatStateUsing(function ($state) {
                        return '<div class="text-center">' . Carbon::parse($state)->translatedFormat('H:i') . ' ' . Carbon::parse($state)->translatedFormat('l') . '<br>' . Carbon::parse($state)->translatedFormat('d F Y') . '</div>';
                    })
                    ->html(),
            ])

            ->filters([
                SelectFilter::make('nama_kelas')->label('Nama Kelas')->relationship('gerbangAbsensi.kelas', 'nama_kelas')->searchable(), 
            SelectFilter::make('nama_mata_pelajaran')->label('Nama Mata Pelajaran')->relationship('ab.mataPelajaran', 'nama_mata_pelajaran')->searchable(), 
            SelectFilter::make('pertemuan')->label('Pertemuan')->relationship('gerbangAbsensi.pertemuan', 'pertemuanke')->searchable()])

            ->actions([Tables\Actions\EditAction::make(), Tables\Actions\DeleteAction::make()])

            ->bulkActions([Tables\Actions\BulkActionGroup::make([Tables\Actions\DeleteBulkAction::make()])]);
    }

    public static function getPages(): array
    {
        return [
            'index' => Pages\ListAbsensi::route('/'),
            'create' => Pages\CreateAbsensi::route('/create'),
            'edit' => Pages\EditAbsensi::route('/{record}/edit'),
        ];
    }
}
