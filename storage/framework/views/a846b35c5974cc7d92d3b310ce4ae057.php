<?php if (isset($component)) { $__componentOriginalbe23554f7bded3778895289146189db7 = $component; } ?>
<?php if (isset($attributes)) { $__attributesOriginalbe23554f7bded3778895289146189db7 = $attributes; } ?>
<?php $component = Filament\View\LegacyComponents\Page::resolve([] + (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag ? $attributes->all() : [])); ?>
<?php $component->withName('filament::page'); ?>
<?php if ($component->shouldRender()): ?>
<?php $__env->startComponent($component->resolveView(), $component->data()); ?>
<?php if (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag): ?>
<?php $attributes = $attributes->except(\Filament\View\LegacyComponents\Page::ignoredParameterNames()); ?>
<?php endif; ?>
<?php $component->withAttributes([]); ?>
    <h2 class="text-xl font-bold">Detail Gerbang Absensi</h2>

    <div class="mt-4">
        <h3 class="text-lg font-semibold">Informasi Gerbang</h3>
        <ul>
            <li><strong>Mata Pelajaran:</strong> <?php echo e($gerbang->mataPelajaran->nama_mata_pelajaran); ?></li>
            <li><strong>Pertemuan:</strong> <?php echo e($gerbang->pertemuan->pertemuanke); ?></li>
            <li><strong>Kelas:</strong> <?php echo e($gerbang->kelas->nama_kelas); ?></li>
        </ul>
    </div>

    <div class="mt-6">
        <h3 class="text-lg font-semibold">Siswa Hadir</h3>
        <ul>
            <?php $__empty_1 = true; $__currentLoopData = $siswaHadir; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $absen): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); $__empty_1 = false; ?>
                <li><?php echo e($absen->siswa->nama); ?> (RFID: <?php echo e($absen->siswa->rfid_id); ?>)</li>
            <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); if ($__empty_1): ?>
                <li>Belum ada siswa hadir.</li>
            <?php endif; ?>
        </ul>
    </div>

    <div class="mt-6">
        <h3 class="text-lg font-semibold">Siswa Alpha</h3>
        <ul>
            <?php $__empty_1 = true; $__currentLoopData = $siswaAlpha; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $absen): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); $__empty_1 = false; ?>
                <li><?php echo e($absen->siswa->nama); ?> (RFID: <?php echo e($absen->siswa->rfid_id); ?>)</li>
            <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); if ($__empty_1): ?>
                <li>Tidak ada siswa alpha.</li>
            <?php endif; ?>
        </ul>
    </div>
 <?php echo $__env->renderComponent(); ?>
<?php endif; ?>
<?php if (isset($__attributesOriginalbe23554f7bded3778895289146189db7)): ?>
<?php $attributes = $__attributesOriginalbe23554f7bded3778895289146189db7; ?>
<?php unset($__attributesOriginalbe23554f7bded3778895289146189db7); ?>
<?php endif; ?>
<?php if (isset($__componentOriginalbe23554f7bded3778895289146189db7)): ?>
<?php $component = $__componentOriginalbe23554f7bded3778895289146189db7; ?>
<?php unset($__componentOriginalbe23554f7bded3778895289146189db7); ?>
<?php endif; ?><?php /**PATH C:\laragon\www\baru\Rf-Reader\resources\views/filament/resources/gerbang-absensi/view.blade.php ENDPATH**/ ?>