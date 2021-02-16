

<?php $__env->startSection('content'); ?>
<div class="container">
    <h1 class="mt-4"><i class="fas fa-boxes"></i> Kategori</h1>
    <ol class="breadcrumb mb-4">
        <li class="breadcrumb-item active">Kategori</li>
    </ol>
</div>
<div class="container">
    <button type="button" class="btn btn-primary mb-2" data-bs-toggle="modal" data-bs-target="#modalTambahKategori">
        <i class="fas fa-plus"></i> 
        Tambah Kategori
    </button>
    <table class="table table-striped col-md-6">
        <thead class="bg-dark text-white">
            <tr>
                <td>#</td>
                <td>Nama Kategori</td>
                <td>Aksi</td>
            </tr>
        </thead>
        <tbody>
            <?php $__currentLoopData = $kategori; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $k): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
            <tr>
                <td><?php echo e($loop->iteration); ?></td>
                <td><?php echo e($k->nama_kategori); ?></td>
                <td>
                    <a href="/hapuskategori/<?php echo e($k->id_kategori); ?>" class="btn btn-danger btn-sm"><i class="fas fa-trash-alt"></i></a>
                </td>
            </tr>
            <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
        </tbody>
    </table>
</div>
<?php $__env->stopSection(); ?>

<?php $__env->startSection('modal'); ?>
<div class="modal fade" id="modalTambahKategori" tabindex="-1" aria-labelledby="modalTambahKategori" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="modalTambahKategori">Form Tambah Kategori</h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <form action="/kategori" method="post">
                <?php echo csrf_field(); ?>
                <div class="modal-body">
                    <label>Nama Kategori</label>
                    <input type="text" name="nama_kategori" id="" class="form-control mb-2">

                </div>
                <div class="modal-footer">
                    <button type="submit" class="btn btn-primary">Simpan</button>
                    <button type="button" class="btn btn-danger" data-bs-dismiss="modal">Close</button>
                </div>
            </form>
        </div>
    </div>
</div>
<?php $__env->stopSection(); ?>

<?php echo $__env->make('template/index', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH C:\xampp\htdocs\dmi\resources\views/admin/kategori.blade.php ENDPATH**/ ?>