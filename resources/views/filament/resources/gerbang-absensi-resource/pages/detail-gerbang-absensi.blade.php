<x-filament-panels::page>
    {{-- Gunakan Grid untuk Tata Letak yang Terstruktur --}}
    <x-filament::grid 
        :default="1" 
        sm="2" 
        lg="3" 
        class="gap-6"
    >
        {{-- Informasi Gerbang Absensi --}}
        <x-filament::card>
            <h2 class="text-lg font-bold">Informasi Gerbang Absensi</h2>
            <div class="mt-4 space-y-2">
                <p><strong>Mata Pelajaran:</strong> {{ $record->mataPelajaran->nama_mata_pelajaran ?? '-' }}</p>
                <p><strong>Pertemuan:</strong> {{ $record->pertemuan->pertemuanke ?? '-' }}</p>
                <p><strong>Kelas:</strong> {{ $record->kelas->nama_kelas ?? '-' }}</p>
                <p><strong>Waktu Mulai:</strong> {{ \Carbon\Carbon::parse($record->waktu_mulai)->format('H:i') }}</p>
                <p><strong>Waktu Selesai:</strong> {{ \Carbon\Carbon::parse($record->waktu_selesai)->format('H:i') }}</p>
            </div>
        </x-filament::card>

        {{-- Siswa Hadir --}}
        <x-filament::card>
            <h2 class="text-lg font-bold">Siswa Hadir</h2>
            <div class="mt-4">
                <ul class="list-disc list-inside space-y-2">
                    @forelse ($siswaHadir as $absen)
                        <li>
                            <strong>{{ $absen->siswa->nama }}</strong> 
                            (RFID: {{ $absen->siswa->rfid_id }})
                        </li>
                    @empty
                        <li class="text-gray-500">Belum ada siswa hadir.</li>
                    @endforelse
                </ul>
            </div>
        </x-filament::card>

        {{-- Siswa Alpha --}}
        <x-filament::card>
            <h2 class="text-lg font-bold">Siswa Alpha</h2>
            <div class="mt-4">
                <ul class="list-disc list-inside space-y-2">
                    @forelse ($siswaAlpha as $absen)
                        <li>
                            <strong>{{ $absen->siswa->nama }}</strong> 
                            (RFID: {{ $absen->siswa->rfid_id }})
                        </li>
                    @empty
                        <li class="text-gray-500">Tidak ada siswa alpha.</li>
                    @endforelse
                </ul>
            </div>
        </x-filament::card>
    </x-filament::grid>
</x-filament-panels::page>