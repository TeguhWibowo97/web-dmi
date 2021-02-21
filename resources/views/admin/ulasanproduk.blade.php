@extends('template/index')

@section('content')
<div class="container">
    <h1 class="mt-4"><i class="fas fa-shopping-bag"></i> Ulasan Produk</h1>
    <ol class="breadcrumb mb-4">
        <li class="breadcrumb-item active">Ulasan / Produk</li>
    </ol>
</div>
<div class="container">
    <table class="table">
        <thead class="bg-dark text-white">
            <tr>
                <td>#</td>
                <td>Foto</td>
                <td>Nama Produk</td>
                <td>Harga</td>
                <td>Nama Pemilik</td>
                <td>Aksi</td>
            </tr>
        </thead>
        <tbody>
            @foreach($produk as $p)
            <tr>
                <td>{{$loop->iteration}}</td>
                <td>
                    <img src="/storage/images/{{$p->foto_produk}}" alt="" class="img-thumbnail" style="max-width:100px; height:auto;">
                </td>
                <td>{{$p->nama_produk}}</td>
                <td><span class="badge bg-danger text-white">Rp {{number_format($p->harga)}}</span></td>
                <td>{{$p->nama_pemilik}}</td>
                <td>
                    <a href="/ulasan/produk/{{$p->id}}" class="btn btn-primary">
                        <i class="fas fa-eye"></i>
                        Lihat Ulasan
                    </a>
                </td>
            </tr>
            @endforeach
        </tbody>
    </table>
</div>
@endsection