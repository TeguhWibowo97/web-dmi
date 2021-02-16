@extends('template/index')

@section('content')
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
            @foreach($kategori as $k)
            <tr>
                <td>{{$loop->iteration}}</td>
                <td>{{$k->nama_kategori}}</td>
                <td>
                    <a href="/hapuskategori/{{$k->id_kategori}}" class="btn btn-danger btn-sm"><i class="fas fa-trash-alt"></i></a>
                </td>
            </tr>
            @endforeach
        </tbody>
    </table>
</div>
@endsection

@section('modal')
<div class="modal fade" id="modalTambahKategori" tabindex="-1" aria-labelledby="modalTambahKategori" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="modalTambahKategori">Form Tambah Kategori</h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <form action="/kategori" method="post">
                @csrf
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
@endsection
