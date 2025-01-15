<x-filament-panels::page>
    <div class="relative overflow-x-auto shadow-md sm:rounded-lg normal-case">
        <table class="w-full text-sm text-left rtl:text-right text-gray-500 dark:text-gray-400">
            <caption class="p-5 text-sm text-left rtl:text-right text-gray-900 bg-white dark:text-white dark:bg-gray-800">
                <div class="mb-5 flex">
                    <input type="text" id="text" readonly value="Nama Mata Pelajaran" class="mr-4 bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500" required />
                    <input type="text" id="text" readonly value="{{ $record->mataPelajaran->nama_mata_pelajaran ?? '-' }}" class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500" required />
                </div>
                <div class="mb-5 flex">
                    <input type="text" id="text" readonly value="Pertemuan Ke" class="mr-4 bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500" required />
                    <input type="text" id="text" readonly value="{{ $record->pertemuan->pertemuanke ?? '-' }}" class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500" required />
                </div>
               <div class="mb-5 flex">
                    <input type="text" id="text" readonly value="Nama Mata Pelajaran" class="mr-4 bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500" required />
                    <input type="text" id="text" readonly value="{{ $record->mataPelajaran->nama_mata_pelajaran ?? '-' }}" class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500" required />
                </div>
                <div class="mb-5 flex">
                    <input type="text" id="text" readonly value="Nama Kelas" class="mr-4 bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500" required />
                    <input type="text" id="text" readonly value="{{ $record->kelas->nama_kelas ?? '-' }}" class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500" required />
                </div>
               <div class="mb-5 flex">
                    <input type="text" id="text" readonly value="Waktu Mulai Absensi" class="mr-4 bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500" required />
                    <input type="text" id="text" readonly value="{{ \Carbon\Carbon::parse($record->waktu_mulai)->format('H:i') }}" class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500" required />
                </div>
               <div class="mb-5 flex">
                    <input type="text" id="text" readonly value="Waktu Berakhir Absensi" class="mr-4 bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500" required />
                    <input type="text" id="text" readonly value="{{ \Carbon\Carbon::parse($record->waktu_selesai)->format('H:i') }}" class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500" required />
                </div>
            </caption>
        </table>
    </div>

    <div class="relative overflow-x-auto shadow-md sm:rounded-lg normal-case">
        <table class="w-full text-sm text-left rtl:text-right text-gray-500 dark:text-gray-400">
            <thead class="text-xs text-gray-700 uppercase bg-gray-50 dark:bg-gray-700 dark:text-gray-400">
                <tr>
                    <th scope="col" class="px-6 py-3">
                        Nama Siswa
                    </th>
                    <th scope="col" class="px-6 py-3">
                        Waktu Kehadiran
                    </th>
                    <th scope="col" class="px-6 py-3">
                        RFID
                    </th>
                </tr>
            </thead>
            <tbody>
                @forelse ($siswaHadir as $absen)
                <tr class="bg-white border-b dark:bg-gray-800 dark:border-gray-700">
                    <th scope="row" class="px-6 py-4 font-medium text-gray-900 whitespace-nowrap dark:text-white">
                        {{ $absen->siswa->nama }}
                    </th>
                    <td class="px-6 py-4">
                        {{ $absen->waktu_kehadiran ? \Carbon\Carbon::parse($absen->waktu_kehadiran)->translatedFormat('d F Y, H:i') : '-' }}
                    </td>
                    <td class="px-6 py-4">
                        {{ $absen->siswa->rfid_id }}
                    </td>
                </tr>
                @empty
                <tr class="bg-white border-b dark:bg-gray-800 dark:border-gray-700">
                    <th scope="row" class="px-6 py-4 font-medium text-gray-900 whitespace-nowrap dark:text-white">
                        Tidak data Absensi
                    </th>
                </tr>
                @endforelse
            </tbody>
        </table>
    </div>
    
    <div class="relative overflow-x-auto shadow-md sm:rounded-lg">
        <table class="w-full text-sm text-left rtl:text-right text-gray-500 dark:text-gray-400">
            <thead class="text-xs text-gray-700 uppercase bg-gray-50 dark:bg-gray-700 dark:text-gray-400">
                <tr>
                    <th scope="col" class="px-6 py-3">
                        Nama Siswa
                    </th>
                    <th scope="col" class="px-6 py-3">
                        Waktu Kehadiran
                    </th>
                    <th scope="col" class="px-6 py-3">
                        RFID
                    </th>
                </tr>
            </thead>
            <tbody>
                @forelse ($siswaAlpha as $absen)
                <tr class="bg-white border-b dark:bg-gray-800 dark:border-gray-700">
                    <th scope="row" class="px-6 py-4 font-medium text-gray-900 whitespace-nowrap dark:text-white">
                        {{ $absen->siswa->nama }}
                    </th>
                    <td class="px-6 py-4">
                        {{ $absen->waktu_kehadiran ? \Carbon\Carbon::parse($absen->waktu_kehadiran)->translatedFormat('d F Y, H:i') : '-' }}
                    </td>
                    <td class="px-6 py-4">
                        {{ $absen->siswa->rfid_id }}
                    </td>
                </tr>
                @empty
                <tr class="bg-white border-b dark:bg-gray-800 dark:border-gray-700">
                    <th scope="row" class="px-6 py-4 font-medium text-gray-900 whitespace-nowrap dark:text-white">
                        Tidak data Absensi
                    </th>
                </tr>
                @endforelse
            </tbody>
        </table>
    </div>
</x-filament-panels::page>