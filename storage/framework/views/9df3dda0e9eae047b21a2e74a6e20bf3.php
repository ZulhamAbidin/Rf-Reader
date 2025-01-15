<div class="space-y-4">
    <table class="w-full table-auto border border-gray-300">
        <thead class="bg-gray-100">
            <tr>
                <th class="px-4 py-2 border border-gray-300 text-left">Nama Siswa</th>
                <th class="px-4 py-2 border border-gray-300 text-left">Waktu Kehadiran</th>
                <th class="px-4 py-2 border border-gray-300 text-left">Status Kehadiran</th>
            </tr>
        </thead>
        <tbody>
            <!--[if BLOCK]><![endif]--><?php $__empty_1 = true; $__currentLoopData = $absensi; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $item): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); $__empty_1 = false; ?>
                <tr>
                    <td class="px-4 py-2 border border-gray-300">
                        <?php echo e($item->siswa->nama); ?>

                    </td>
                    <td class="px-4 py-2 border border-gray-300">
                        <?php echo e($item->waktu_kehadiran ? \Carbon\Carbon::parse($item->waktu_kehadiran)->translatedFormat('d F Y, H:i') : '-'); ?>

                    </td>
                    <td class="px-4 py-2 border border-gray-300">
                        <?php echo e($item->status_kehadiran); ?>

                    </td>
                </tr>
            <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); if ($__empty_1): ?>
                <tr>
                    <td colspan="3" class="px-4 py-2 border border-gray-300 text-center">
                        Tidak ada data absensi.
                    </td>
                </tr>
            <?php endif; ?><!--[if ENDBLOCK]><![endif]-->
        </tbody>
    </table>
    <div class="mt-4">
        <?php echo e($absensi->links()); ?>

    </div>
</div>
<?php /**PATH C:\laragon\www\baru\Rf-Reader\resources\views/filament/modals/lihat-siswa.blade.php ENDPATH**/ ?>