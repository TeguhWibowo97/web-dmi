@extends('template/index')

@section('content')
<div class="container">
    <h1 class="mt-4"><i class="fas fa-shopping-bag"></i> Detail Ulasan</h1>
    <ol class="breadcrumb mb-4">
        <li class="breadcrumb-item active">Ulasan / Produk / Detail</li>
    </ol>
</div>
<div class="container">
    @foreach($produk as $p)
    <div class="alert alert-warning alert-dismissible fade show" role="alert">
        <strong class="float-center">Nama Produk : </strong>{{$p->nama_produk}}
    </div>
    @endforeach
</div>
<div class="container">
    <div class="container">
        <div class="row">
            @if(!$ulasan->isEmpty())
            @foreach($ulasan as $u)
            <div class="card mb-2 col-md-6">
                <div class="row g-0">
                    <div class="col-md-4">
                        <img src="/storage/images/user.jpg" class="img-fluid">
                    </div>
                    <div class="col-md-8">
                        <div class="card-body">
                            <h5 class="card-title">{{$u->nama_pengulas}}</h5>
                            <p class="card-text">{{$u->deskripsi}}</p>
                            <p class="card-text">
                                @for($i=0; $i<$u->bintang; $i++)
                                    <small class="text-muted"><i class="fas fa-star"></i></small>
                                @endfor   
                                <a href="#" class="btn btn-danger btn-sm float-right" onclick="javascript:return confirm('apakah yakin akan menghapus data ?')"><i class="fas fa-trash-alt"></i></a>
                            </p>
                            <p class="card-text">
                            </p>
                        </div>
                    </div>
                </div>
            </div>
            @endforeach
            @else
            <h1 class="text-center">-- Tidak Ada Ulasan --</h1>
            @endif
        </div>
    </div>
</div>
@endsection
