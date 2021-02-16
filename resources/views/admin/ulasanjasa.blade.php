@extends('template/index')

@section('content')
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
            @foreach($jasa as $j)
            <tr>
                <td>{{$loop->iteration}}</td>
                <td>
                    <img src="/storage/images/{{$j->foto_jasa}}" alt="" class="img-thumbnail" style="max-width:100px; height:auto;">
                </td>
                <td>{{$j->nama_jasa}}</td>
                <td><span class="badge bg-danger text-white">Rp {{number_format($j->harga)}}</span></td>
                <td>{{$j->nama_pemilik}}</td>
                <td>
                    <a href="/ulasan/jasa/{{$j->id}}" class="btn btn-primary">
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