@extends('template/index')

@section('content')
<div class="container-fluid">
    <h1 class="mt-4"><i class="fas fa-shopping-bag"></i> Produk Ditampilkan</h1>
    <ol class="breadcrumb mb-4">
        <li class="breadcrumb-item active">Produk / Tampil</li>
    </ol>
</div>
<div class="container">
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
            @foreach($produk as $p)
            <tr>
                <td>{{ $loop->iteration }}</td>
                <td>
                    <img src="/storage/images/{{$p->foto_produk}}" alt="" class="img-thumbnail" style="max-width:100px; height:auto;">
                </td>
                <td> {{ $p->nama_produk }} </td>
                <td><span class="badge bg-danger text-white">Rp {{ number_format($p->harga) }}</span></td>
                <td>{{$p->nama_pemilik}}</td>
                <td><span class="badge bg-success text-white">{{$p->nama_kategori}}</span></td>
                <td>
                    <a href="/produk/detail/{{$p->id}}" class="btn btn-primary btn-sm mb-1"><i class="fas fa-eye"></i> Detail</a>
                    <a href="/produk/hapus/{{$p->id}}" class="btn btn-danger btn-sm"><i class="fas fa-trash-alt" onclick="javascript:return confirm('apakah yakin akan menghapus data ?')"></i> Hapus</a>
                </td>
            </tr>
            @endforeach
        </tbody>
    </table>
</div>
@endsection
