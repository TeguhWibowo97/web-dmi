

<?php $__env->startSection('content'); ?>
<div class="container-fluid">
    <h1 class="mt-4"><i class="fas fa-shopping-bag"></i> Produk Terbaru</h1>
    <ol class="breadcrumb mb-4">
        <li class="breadcrumb-item active">Produk / Terbaru</li>
    </ol>
    <?php if($message = Session::get('status')): ?>
    <div class="alert alert-success alert-dismissible fade show" role="alert">
        <strong><?php echo e($message); ?></strong>
        <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
    </div>
    <?php endif; ?>
</div>
<div class="container">
    <?php if(!$produk->isEmpty()): ?>
    <table class="table table-striped">
        <thead>
            <tr class="bg-dark text-white">
                <td>#</td>
                <td>Foto</td>
                <td>Nama Produk</td>
                <td>Harga</td>
                <td>Nama Pemilik</td>
                <td>Kategori</td>
                <td>Aksi</td>
            </tr>
        </thead>
        <tbody>
            
            <?php $__currentLoopData = $produk; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $p): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
            <tr>
                <td><?php echo e($loop->iteration); ?></td>
                <td>
                    <img src="/storage/images/<?php echo e($p->foto_produk); ?>" alt="" class="img-thumbnail" style="max-width:100px; height:auto;">
                </td>
                <td> <?php echo e($p->nama_produk); ?> </td>
                <td><span class="badge bg-danger text-white">Rp <?php echo e(number_format($p->harga)); ?></span></td>
                <td><?php echo e($p->nama_pemilik); ?></td>
                <td><span class="badge bg-success text-white"><?php echo e($p->nama_kategori); ?></span></td>
                <td>
                    <a href="/produk/detail/<?php echo e($p->id); ?>" class="btn btn-primary btn-sm mb-1"><i class="fas fa-eye"></i> Detail</a>
                    <a href="/produk/hapus/<?php echo e($p->id); ?>" class="btn btn-danger btn-sm" onclick="javascript:return confirm('apakah yakin akan menghapus data ?');"><i class="fas fa-trash-alt"></i> Hapus</a>
                </td>
            </tr>
            <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
            <?php else: ?>
            <h1 class="text-center">-- Tidak Ada Produk Terbaru --</h1>
            <?php endif; ?>
        </tbody>
    </table>
</div>
<?php $__env->stopSection(); ?>

<?php echo $__env->make('template/index', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH C:\xampp\htdocs\dmi\resources\views/admin/produkterbaru.blade.php ENDPATH**/ ?>