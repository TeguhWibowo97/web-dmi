

<?php $__env->startSection('content'); ?>
<div class="container">
    <h1 class="mt-4"><i class="fas fa-shopping-bag"></i> Detail Ulasan</h1>
    <ol class="breadcrumb mb-4">
        <li class="breadcrumb-item active">Ulasan / Jasa / Detail</li>
    </ol>
</div>
<div class="container">
    <?php $__currentLoopData = $jasa; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $j): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
    <div class="alert alert-warning alert-dismissible fade show" role="alert">
        <strong class="float-center">Nama Jasa : </strong><?php echo e($j->nama_jasa); ?>

    </div>
    <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
</div>
<div class="container">
    <div class="container">
        <div class="row">

            <?php if(!$ulasan->isEmpty()): ?>
            <?php $__currentLoopData = $ulasan; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $u): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
            <div class="card mb-2 col-md-6">
                <div class="row g-0">
                    <div class="col-md-4">
                        <img src="/storage/images/user.jpg" class="img-fluid">
                    </div>
                    <div class="col-md-8">
                        <div class="card-body">
                            <h5 class="card-title"><?php echo e($u->nama_pengulas); ?></h5>
                            <p class="card-text"><?php echo e($u->deskripsi); ?></p>
                            <p class="card-text">
                                <?php for($i=0; $i<$u->bintang; $i++): ?>
                                    <small class="text-muted"><i class="fas fa-star"></i></small>
                                <?php endfor; ?>
                                <a href="/hapus-ulasan/<?php echo e($u->id_ulasan); ?>" class="btn btn-danger btn-sm float-right" onclick="javascript:return confirm('apakah yakin akan menghapus data ?')"><i class="fas fa-trash-alt"></i></a>
                            </p>
                        </div>
                    </div>
                </div>
            </div>
            <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
            <?php else: ?>
            <h1>-- Tidak Ada Ulasan --</h1>
            <?php endif; ?>
        </div>
    </div>
</div>
<?php $__env->stopSection(); ?>

<?php echo $__env->make('template/index', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH C:\xampp\htdocs\dmi\resources\views/admin/detailulasanjasa.blade.php ENDPATH**/ ?>