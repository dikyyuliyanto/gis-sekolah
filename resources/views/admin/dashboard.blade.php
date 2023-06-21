@extends('admin/panel')

@section('content')
    <div class="content-wrapper">
        <!-- Content Header (Page header) -->
        @if (session()->has('success'))
            <div id="alert-flash" class="alert alert-success" role="alert">
                {{ session('success') }}
            </div>
        @endif
        <div class="content-header">
            <div class="container-fluid">
                <div class="row mb-2">
                    <div class="col-sm-6">
                        <h1 class="m-0">DASHBOARD</h1>
                    </div><!-- /.col -->
                    <div class="col-sm-6">
                    </div><!-- /.col -->
                </div><!-- /.row -->
            </div><!-- /.container-fluid -->
        </div>
        <section class="content">
            <div class="container-fluid">

                <div class="row">
                    <div class="col-12 col-sm-6 col-md-4">
                        <div class="info-box mb-3">
                            <span class="info-box-icon bg-danger elevation-1"><i class="fas fa-school"></i></span>
                            <div class="info-box-content">
                                <span class="info-box-text">Data Sekolah</span>
                                <span class="info-box-number">{{ $sekolahCount }}</span>
                            </div>

                        </div>

                    </div>

                    <div class="col-12 col-sm-6 col-md-4">
                        <div class="info-box mb-3">
                            <span class="info-box-icon bg-primary elevation-1"><i class="fas fa-landmark"></i></span>
                            <div class="info-box-content">
                                <span class="info-box-text">Data Kecamatan</span>
                                <span class="info-box-number">{{ $kecamatanCount }}</span>
                            </div>

                        </div>

                    </div>


                    <div class="clearfix hidden-md-up"></div>
                    <div class="col-12 col-sm-6 col-md-4">
                        <div class="info-box mb-3">
                            <span class="info-box-icon bg-success elevation-1"><i class="fas fa-map-marker"></i></span>
                            <div class="info-box-content">
                                <span class="info-box-text">Data Lokasi</span>
                                <span class="info-box-number">{{ $sekolahCount }}</span>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </section>
    </div>
@endsection
