

<?php $__env->startSection('content'); ?>
<div class="container">
    <h1 class="mt-4"><i class="fas fa-shopping-bag"></i> Ulasan Jasa</h1>
    <ol class="breadcrumb mb-4">
        <li class="breadcrumb-item active">Ulasan / Jasa</li>
    </ol>
</div>
<div class="container">
    <table class="table">
        <thead class="bg-dark text-white">
            <tr>
                <td>#</td>
                <td>Foto</td>
                <td>Nama Jasa</td>
                <td>Harga</td>
                <td>Nama Pemilik</td>
                <td>Aksi</td>
            </tr>
        </thead>
        <tbody>
            <?php $__currentLoopData = $jasa; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $j): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
            <tr>
                <td><?php echo e($loop->iteration); ?></td>
                <td>
                    <img src="/storage/images/<?php echo e($j->foto_jasa); ?>" alt="" class="img-thumbnail" style="max-width:100px; height:auto;">
                </td>
                <td><?php echo e($j->nama_jasa); ?></td>
                <td><span class="badge bg-danger text-white">Rp <?php echo e(number_format($j->harga)); ?></span></td>
                <td><?php echo e($j->nama_pemilik); ?></td>
                <td>
                    <a href="/ulasan/jasa/<?php echo e($j->id); ?>" class="btn btn-primary">
                        <i class="fas fa-eye"></i>
                        Lihat Ulasan
                    </a>
                </td>
            </tr>
            <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
        </tbody>
    </table>
</div>
<?php $__env->stopSection(); ?>
<?php echo $__env->make('template/index', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH C:\xampp\htdocs\dmi\resources\views/admin/ulasanjasa.blade.php ENDPATH**/ ?>