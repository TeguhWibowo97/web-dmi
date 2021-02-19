@extends('template/index')

@section('content')
<div class="container-fluid">
    <h1 class="mt-4"><i class="fas fa-shopping-bag"></i> Jasa Ditampilkan</h1>
    <ol class="breadcrumb mb-4">
        <li class="breadcrumb-item active">Jasa / Tampil</li>
    </ol>
</div>
<div class="container">
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
                    <a href="/jasa/hapus/{{$j->id}}" class="btn btn-danger btn-sm"><i class="fas fa-trash-alt" onclick="javascript:return confirm('apakah yakin akan menghapus data ?')"></i> Hapus</a>
                </td>
            </tr>
            @endforeach
        </tbody>
    </table>
</div>
@endsection
