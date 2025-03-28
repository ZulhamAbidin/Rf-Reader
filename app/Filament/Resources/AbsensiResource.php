<?php

namespace App\Filament\Resources;

use Log;
use Filament\Tables;
use App\Models\Siswa;
use App\Models\Absensi;
use Filament\Forms\Form;
use Filament\Tables\Table;
use App\Models\GerbangAbsensi;
use Illuminate\Support\Carbon;
use Filament\Resources\Resource;
use Illuminate\Support\Facades\DB;
use Filament\Forms\Components\Grid;
use Filament\Forms\Components\View;
use Filament\Forms\Components\Hidden;
use Filament\Forms\Components\Section;
use Filament\Tables\Columns\TextColumn;
use Filament\Forms\Components\TextInput;
use Filament\Notifications\Notification;
use Filament\Tables\Filters\SelectFilter;
use Illuminate\Support\Facades\Validator;
use App\Filament\Resources\AbsensiResource\Pages;

// oksih

class AbsensiResource extends Resource
{
    protected static ?string $model = Absensi::class;
    protected static ?string $navigationIcon = 'heroicon-o-rectangle-stack';
    protected static ?string $navigationGroup = 'Presensi';

    public static function getBreadcrumb(): string
    {
        return 'Jalankan Absensi';
    }




    public static function getNavigationBadge(): ?string
    {
        return static::getModel()::count();
    }

    public static function form(Form $form): Form
    {
        return $form->schema([
            Section::make('Tempelkan Kartu')
                ->schema([
                    View::make('filament.components.rfid-image'),
                    Grid::make(3)
                        ->schema([
                            TextInput::make('rfid_id')
                                ->label('RFID ID')
                                ->columnSpan(1)
                                ->reactive()
                                ->autofocus()
                                ->afterStateUpdated(function ($state, $set) {
                                    if (empty($state)) return;
                                    $siswa = Siswa::where('rfid_id', $state)
                                        ->lockForUpdate()
                                        ->first();
                                    if (!$siswa) {
                                        self::resetFields($set);
                                        Notification::make()
                                            ->title('Kartu Tidak Terdaftar!')
                                            ->body('RFID: ' . $state . ' tidak dikenali')
                                            ->danger()
                                            ->send();
                                        return;
                                    }
                                    $set('siswa_id', $siswa->id);
                                    $set('nama', $siswa->nama);
                                    $set('kelas', optional($siswa->kelas)->nama ?? '-');
                                    $set('status_kehadiran', 'Hadir');
                                    $set('waktu_kehadiran', now()->format('H:i:s'));
                                    $currentTime = Carbon::now();
                                    $gerbang = GerbangAbsensi::where('kelas_id', $siswa->kelas_id)
                                        ->where('waktu_mulai', '<=', $currentTime)
                                        ->where('waktu_selesai', '>=', $currentTime)
                                        ->first();

                                    if (!$gerbang) {
                                        self::resetFields($set);
                                        Notification::make()
                                            ->title('Absensi Ditolak')
                                            ->body('Tidak ada sesi absensi aktif untuk kelas ini')
                                            ->warning()
                                            ->send();
                                        return;
                                    }

                                    DB::transaction(function () use ($siswa, $gerbang, $set, $currentTime) {
                                        try {
                                            $siswaKelas = Siswa::where('kelas_id', $gerbang->kelas_id)->get();

                                            foreach ($siswaKelas as $siswaAlfa) {
                                                $exists = Absensi::where('siswa_id', $siswaAlfa->id)
                                                    ->where('gerbang_absensi_id', $gerbang->id)
                                                    ->exists();

                                                if (!$exists) {
                                                    Absensi::create([
                                                        'siswa_id' => $siswaAlfa->id,
                                                        'gerbang_absensi_id' => $gerbang->id,
                                                        'status_kehadiran' => 'alfa',
                                                        'waktu_kehadiran' => null,
                                                    ]);
                                                }
                                            }

                                            $absensiSiswa = Absensi::where('siswa_id', $siswa->id)
                                                ->where('gerbang_absensi_id', $gerbang->id)
                                                ->first();

                                            if ($absensiSiswa && $absensiSiswa->status_kehadiran === 'hadir') {
                                                Notification::make()
                                                    ->title('Peringatan')
                                                    ->body($siswa->nama . ' sudah melakukan absensi')
                                                    ->warning()
                                                    ->send();
                                                return;
                                            }

                                            Absensi::where('siswa_id', $siswa->id)
                                                ->where('gerbang_absensi_id', $gerbang->id)
                                                ->update([
                                                    'status_kehadiran' => 'hadir',
                                                    'waktu_kehadiran' => $currentTime,
                                                ]);

                                            Notification::make()
                                                ->title('Absensi Berhasil')
                                                ->body($siswa->nama . ' tercatat hadir')
                                                ->success()
                                                ->send();
                                        } catch (\Exception $e) {
                                            Notification::make()
                                                ->title('Error Sistem')
                                                ->body($e->getMessage())
                                                ->danger()
                                                ->send();
                                        }
                                    });

                                    self::resetFields($set);
                                }),

                            TextInput::make('status_kehadiran')
                                ->label('Status Kehadiran')
                                ->readonly()
                                ->columnSpan(1),
                            TextInput::make('waktu_kehadiran')
                                ->label('Waktu Kehadiran')
                                ->readonly(),

                            Hidden::make('siswa_id')
                                ->required()
                                ->columnSpan(1)
                                ->rules(['exists:siswa,id']),
                            TextInput::make('nama')
                                ->label('Nama Siswa')
                                ->hidden()
                                ->formatStateUsing(fn($record) => $record?->siswa?->nama)
                                ->readonly(),
                            TextInput::make('kelas')
                                ->label('Kelas')
                                ->hidden()
                                ->formatStateUsing(fn($record) => $record?->siswa?->kelas?->nama ?? 'Tidak ada kelas')
                                ->readonly(),
                        ])
                ]),

            // Section::make('Detail Absensi')
            //     ->description('Status kehadiran siswa setelah melakukan scan.')
            //     ->schema([
            //         TextInput::make('status_kehadiran')
            //             ->label('Status Kehadiran')
            //             ->readonly(),
            //         TextInput::make('waktu_kehadiran')
            //             ->label('Waktu Kehadiran')
            //             ->readonly(),
            //     ]),
        ]);
    }


    private static function resetFields($set): void
    {
        $set('rfid_id', null);
        $set('siswa_id', null);
        $set('nama', null);
    }

    public static function autoSave(array $data, $set): void
    {
        DB::beginTransaction();

        try {
            // Validasi RFID
            $siswa = Siswa::where('rfid_id', $data['rfid_id'])
                ->lockForUpdate()
                ->first();

            if (!$siswa) {
                throw new \Exception("RFID tidak terdaftar");
            }

            // Validasi gerbang aktif
            $gerbang = GerbangAbsensi::where('id', $data['gerbang_absensi_id'])
                ->where('kelas_id', $siswa->kelas_id)
                ->where('waktu_mulai', '<=', now())
                ->where('waktu_selesai', '>=', now())
                ->first();

            if (!$gerbang) {
                throw new \Exception("Gerbang tidak aktif untuk kelas ini");
            }

            // Cek duplikasi
            $existing = Absensi::where('siswa_id', $siswa->id)
                ->where('gerbang_absensi_id', $gerbang->id)
                ->exists();

            if ($existing) {
                throw new \Exception("Absensi sudah tercatat");
            }

            // Simpan data
            Absensi::create([
                'siswa_id' => $siswa->id,
                'gerbang_absensi_id' => $gerbang->id,
                'waktu_kehadiran' => now(),
                'status_kehadiran' => 'hadir'
            ]);

            DB::commit();

            Notification::make()
                ->title('Absensi Tercatat')
                ->success()
                ->send();
        } catch (\Exception $e) {
            DB::rollBack();
            Notification::make()
                ->title('Error')
                ->body($e->getMessage())
                ->danger()
                ->send();
            self::resetFields($set);
        }
    }


    public static function table(Table $table): Table
    {
        return $table
            ->columns([

                TextColumn::make('siswa.nama')
                    ->label('Nama Siswa')
                    ->wrap()
                    ->copyable()
                    ->copyMessage('Berhasil Menyalin Nama Siswa')
                    ->sortable()
                    ->searchable()
                    ->toggleable(isToggledHiddenByDefault: false),

                TextColumn::make('gerbangAbsensi.mataPelajaran.nama_mata_pelajaran')
                    ->label('Mata Pelajaran')
                    ->copyable()
                    ->copyMessage('Berhasil Menyalin')
                    ->sortable()
                    ->searchable()
                    ->toggleable(isToggledHiddenByDefault: false),

                TextColumn::make('created_at')
                    ->label('Waktu Presensi')
                    ->sortable()
                    ->formatStateUsing(function ($state) {
                        return
                            Carbon::parse($state)->translatedFormat('H:i') . ' ' .
                            Carbon::parse($state)->translatedFormat('l') . ' ' .
                            Carbon::parse($state)->translatedFormat('d F Y');
                    })
                    ->html()
                    ->toggleable(isToggledHiddenByDefault: false),

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
                    ->searchable()
                    ->toggleable(isToggledHiddenByDefault: false),

                TextColumn::make('gerbangAbsensi.waktu_mulai')
                    ->label('Waktu Mulai & Berakhirnya Presensi')
                    ->searchable()
                    ->sortable()
                    ->formatStateUsing(function ($state, $record) {
                        $waktuMulai = Carbon::parse($record->gerbangAbsensi->waktu_mulai)->translatedFormat('H:i');
                        $waktuSelesai = Carbon::parse($record->gerbangAbsensi->waktu_selesai)->translatedFormat('H:i');
                        $tanggal = Carbon::parse($record->gerbangAbsensi->waktu_selesai)->translatedFormat('l, d F Y');

                        return $waktuMulai . ' - ' . $waktuSelesai . '  ' . $tanggal;
                    })
                    ->html()
                    ->toggleable(isToggledHiddenByDefault: false),

                TextColumn::make('gerbangAbsensi.pertemuan.pertemuanke')
                    ->label('P')
                    ->tooltip('Pertemuan Ke')
                    ->sortable()
                    ->copyable()
                    ->searchable()->toggleable(isToggledHiddenByDefault: false),

                TextColumn::make('gerbangAbsensi.kelas.nama_kelas')
                    ->label('Kelas')
                    ->wrap()
                    ->copyable()
                    ->copyMessage('Berhasil Menyalin Nama Siswa')
                    ->sortable()
                    ->searchable()
                    ->toggleable(isToggledHiddenByDefault: true),
            ])

            ->filters([
                SelectFilter::make('nama_kelas')
                    ->label('Nama Kelas')
                    ->relationship('gerbangAbsensi.kelas', 'nama_kelas')
                    ->searchable(),

                SelectFilter::make('nama_mata_pelajaran')
                    ->label('Nama Mata Pelajaran')
                    ->relationship('gerbangAbsensi.matapelajaran', 'nama_mata_pelajaran')
                    ->searchable(),

                SelectFilter::make('pertemuan')
                    ->label('Pertemuan')
                    ->relationship('gerbangAbsensi.pertemuan', 'pertemuanke')
                    ->searchable(),
            ])

            ->actions([
                Tables\Actions\ActionGroup::make([
                    Tables\Actions\EditAction::make(),
                    Tables\Actions\DeleteAction::make()
                ])
            ])

            ->bulkActions([
                Tables\Actions\BulkActionGroup::make([
                    Tables\Actions\DeleteBulkAction::make(),
                    \pxlrbt\FilamentExcel\Actions\Tables\ExportBulkAction::make()
                        ->label('Download Excel')
                        ->color('primary')
                ])
            ]);
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
