@extends('template/index')

@section('content')
<div class="container-fluid">
    <h1 class="mt-4"><i class="fas fa-shopping-bag"></i> Jasa Terbaru</h1>
    <ol class="breadcrumb mb-4">
        <li class="breadcrumb-item active">Jasa / Terbaru</li>
    </ol>
    @if($message = Session::get('status'))
    <div class="alert alert-success alert-dismissible fade show" role="alert">
        <strong>{{$message}}</strong>
        <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
    </div>
    @endif
</div>
<div class="container">
    @if(!$jasa->isEmpty())
    <table class="table table-striped">
        <thead>
            <tr class="bg-dark text-white">
                <td>#</td>
                <td>Foto</td>
                <td>Nama Jasa</td>
                <td>Harga</td>
                <td>Nama Pemilik</td>
                <td>Kategori</td>
                <td>Aksi</td>
            </tr>
        </thead>
        <tbody>
            @foreach($jasa as $j)
            <tr>
                <td>{{ $loop->iteration }}</td>
                <td>
                    <img src="/storage/images/{{$j->foto_jasa}}" alt="" class="img-thumbnail" style="max-width:100px; height:auto;">
                </td>
                <td> {{ $j->nama_jasa }} </td>
                <td><span class="badge bg-danger text-white">Rp {{ number_format($j->harga) }}</span></td>
                <td>{{$j->nama_pemilik}}</td>
                <td><span class="badge bg-success text-white">{{$j->nama_kategori}}</span></td>
                <td>
                    <a href="/jasa/detail/{{$j->id}}" class="btn btn-primary btn-sm"><i class="fas fa-eye"></i> Detail</a>
                    <a href="/jasa/hapus/{{$j->id}}" class="btn btn-danger btn-sm" onclick="javascript:return confirm('apakah yakin akan menghapus data ?')"><i class="fas fa-trash-alt"></i> Hapus</a>
                </td>
            </tr>
            @endforeach
            @else
            <h1 class="text-center">-- Tidak Ada Jasa Terbaru --</h1>
            @endif
        </tbody>
    </table>
</div>
@endsection
