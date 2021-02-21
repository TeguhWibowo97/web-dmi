@extends('template/index')

@section('content')

<main>
    <div class="container-fluid">
        <h1 class="mt-4">Dashboard</h1>
        <ol class="breadcrumb mb-4">
            <li class="breadcrumb-item active">Dashboard</li>
        </ol>
        <div class="row">
            <div class="col-xl-3 col-md-6">
                <div class="card bg-primary text-white mb-4">
                    <div class="card-body">Produk Terbaru <i class="fas fa-shopping-bag float-right"></i></div>
                    <div class="card-footer d-flex align-items-center justify-content-between">
                        15
                    </div>
                </div>
            </div>
            <div class="col-xl-3 col-md-6">
                <div class="card bg-warning text-white mb-4">
                    <div class="card-body">Produk Tampil <i class="fas fa-shopping-bag float-right"></i></div>
                    <div class="card-footer d-flex align-items-center justify-content-between">
                        20
                    </div>
                </div>
            </div>
            <div class="col-xl-3 col-md-6">
                <div class="card bg-success text-white mb-4">
                    <div class="card-body">Layanan Jasa Terbaru <i class="fas fa-user-secret float-right"></i></div>
                    <div class="card-footer d-flex align-items-center justify-content-between">
                        3
                    </div>
                </div>
            </div>
            <div class="col-xl-3 col-md-6">
                <div class="card bg-danger text-white mb-4">
                    <div class="card-body">Layanan Jasa Tampil <i class="fas fa-user-secret float-right"></i></div>
                    <div class="card-footer d-flex align-items-center justify-content-between">
                        15
                    </div>
                </div>
            </div>
        </div>
    </div>
</main>
@endsection
