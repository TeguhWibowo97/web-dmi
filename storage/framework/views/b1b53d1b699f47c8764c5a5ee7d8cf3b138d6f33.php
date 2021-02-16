

<?php $__env->startSection('content'); ?>
<div class="container">
    <h1 class="mt-4"><i class="fas fa-shopping-bag"></i> Detail Produk</h1>
    <ol class="breadcrumb mb-4">
        <li class="breadcrumb-item active">Produk / Detail</li>
    </ol>
</div>
<div class="container">
    <?php $__currentLoopData = $produk; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $p): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
    <div class="card mb-12">
        <div class="row g-0">
            <div class="col-md-4">
                <img src="/storage/images/<?php echo e($p->foto_produk); ?>" alt="..." class="img-fluid">
                <button type="button" class="btn btn-warning btn-block mt-3" data-bs-toggle="modal"
                    data-bs-target="#exampleModal">
                    <i class="fas fa-edit"></i>
                    Edit Data
                </button>
            </div>
            <div class="col-md-8">
                <div class="card-body">
                    <table class="table table-borderless">
                        <tr>
                            <td>Nama Produk</td>
                            <td>:</td>
                            <td><?php echo e($p->nama_produk); ?></td>
                        </tr>
                        <tr>
                            <td>Harga</td>
                            <td>:</td>
                            <td><span class="badge bg-danger text-white">Rp <?php echo e(number_format($p->harga)); ?></span></td>
                        </tr>
                        <tr>
                            <td>Nama Pemilik</td>
                            <td>:</td>
                            <td><?php echo e($p->nama_pemilik); ?></td>
                        </tr>
                        <tr>
                            <td>Alamat Pemilik</td>
                            <td>:</td>
                            <td><?php echo e($p->alamat_pemilik); ?></td>
                        </tr>
                        <tr>
                            <td>Nomor Pemilik</td>
                            <td>:</td>
                            <td><?php echo e($p->nomor_pemilik); ?></td>
                        </tr>
                        <tr>
                            <td>Nomor Whatsapp</td>
                            <td>:</td>
                            <td><?php echo e($p->nomor_wa); ?></td>
                        </tr>
                        <tr>
                            <td>Deskripsi</td>
                            <td>:</td>
                            <td><?php echo e($p->deskripsi); ?></td>
                        </tr>
                        <tr>
                            <td>Kategori</td>
                            <td>:</td>
                            <td><span class="badge bg-success text-white"><?php echo e($p->nama_kategori); ?></span> </td>
                        </tr>
                    </table>
                </div>
            </div>
        </div>
    </div>
    <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
</div>
<?php $__env->stopSection(); ?>

<?php $__env->startSection('modal'); ?>

<!-- Modal -->
<div class="modal fade" id="exampleModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="exampleModalLabel">Form Edit Data</h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <form action="/produk/update/<?php echo e($p->id); ?>" method="post">
            <?php echo csrf_field(); ?>
            <div class="modal-body">
                <label>Nama Produk</label>
                <input type="text" name="nama_produk" id="" class="form-control mb-2" value="<?php echo e($p->nama_produk); ?>">

                <label>Harga</label>
                <input type="text" name="harga" id="" class="form-control mb-2" value="<?php echo e($p->harga); ?>">

                <label>Nama Pemilik</label>
                <input type="text" name="nama_pemilik" id="" class="form-control mb-2" value="<?php echo e($p->nama_pemilik); ?>">

                <label>Alamat Pemilik</label>
                <input type="text" name="alamat_pemilik" id="" class="form-control mb-2" value="<?php echo e($p->alamat_pemilik); ?>">

                <label>Nomor Pemilik</label>
                <input type="text" name="nomor_pemilik" id="" class="form-control mb-2" value="<?php echo e($p->nomor_pemilik); ?>">

                <label>Nomor Whatsapp</label>
                <input type="text" name="nomor_wa" id="" class="form-control mb-2" value="<?php echo e($p->nomor_wa); ?>">

                <label>Kategori</label>
                <select class="form-select form-control" name="id_kategori" aria-label="Default select example">
                    <?php $__currentLoopData = $kategori; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $k): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                        <?php if($k->id_kategori == $p->id_kategori): ?>
                            <option value="<?php echo e($k->id_kategori); ?>" selected><?php echo e($k->nama_kategori); ?></option>
                        <?php else: ?>
                            <option value="<?php echo e($k->id_kategori); ?>"><?php echo e($k->nama_kategori); ?></option>
                        <?php endif; ?>
                    <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                </select>
                
                <label>Deskripsi</label>
                <textarea name="deskripsi" cols="30" rows="5" class="form-control"><?php echo e($p->deskripsi); ?>

                </textarea>

                <label>Status Aktif</label>
                <select name="status_aktif" class="form-control form-select">
                    <option value="0">Tidak Aktif</option>
                    <option value="1">Aktif</option>
                </select>

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

<?php echo $__env->make('template/index', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH C:\xampp\htdocs\dmi\resources\views/admin/detailproduk.blade.php ENDPATH**/ ?>