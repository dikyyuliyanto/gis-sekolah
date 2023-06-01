@extends('admin/panel')

@section('content')
    <div class="content-wrapper">
        <!-- Content Header (Page header) -->
        <div class="content-header">
            <div class="container-fluid">
                <div class="row mb-2">
                    <div class="col-sm-6">
                        <h1 class="m-0">GIS sekolah</h1>
                    </div><!-- /.col -->
                    <div class="col-sm-6">
                        <ol class="breadcrumb float-sm-right">
                            <li class="breadcrumb-item"><a href="#">Home</a></li>
                            <li class="breadcrumb-item"><a href="#">logout</a></li>
                        </ol>
                    </div><!-- /.col -->
                </div><!-- /.row -->
            </div><!-- /.container-fluid -->
        </div>
        <section class="content">
            <div class="form-group">
                <div class="input-group input-group-lg">
                    <input type="search" class="form-control form-control-lg" placeholder="search" value="">
                    <div class="input-group-append">
                        <button type="submit" class="btn btn-lg btn-default">
                            <i class="fa fa-search"></i>
                        </button>
                    </div>
                </div>
            </div>
            <div class="container-fluid">
                <form action="enhanced-results.html">
                    <div class="row">
                        <div class="col-md-12 offset-md-0">
                            <div class="row">
                                <div class="col-4">
                                    <div class="form-group">
                                        <label>Sekolah</label>
                                        <select class="select2" style="width: 100%;">
                                            <option selected>SMA 01 Losari</option>
                                            <option>SMA 02 Losari</option>
                                        </select>
                                    </div>
                                </div>
                                <div class="col-4">
                                    <div class="form-group">
                                        <label>Kecamatan:</label>
                                        <select class="select2" style="width: 100%;">
                                            <option selected>Losari</option>
                                            <option>Kersana</option>
                                        </select>
                                    </div>
                                </div>
                                <div class="col-4">
                                    <div class="form-group">
                                        <label>Jenis Sekolah:</label>
                                        <select class="select2" style="width: 100%;">
                                            <option selected>Negeri</option>
                                            <option>Swasta</option>
                                        </select>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </form>
            </div>
        </section>
        <section class="content">
            <div class="conter-fluid">
                <div class="row">
                    <div class="col-md-6 connectedSortable">
                        <div class="card bg-gradient-primary">
                            <div class="card-header border-0">
                                <h3 class="card-title">
                                    <i class="fas fa-map-marker-alt mr-1"></i>
                                    Peta Lokasi Sekolah
                                </h3>
                                <div class="card-tools">
                                    <button type="button" class="btn btn-primary btn-sm daterange" title="Date range">
                                        <i class="far fa-calendar-alt"></i>
                                    </button>
                                    <button type="button" class="btn btn-primary btn-sm" data-card-widget="collapse"
                                        title="Collapse">
                                        <i class="fas fa-minus"></i>
                                    </button>
                                </div>

                            </div>
                            <div class="card-body">
                                <div id="world-map" style="height: 470px; width: 100%;"></div>
                            </div>

                            <div class="card-footer bg-transparent">
                                <div class="row">
                                    <div class="col-4 text-center">
                                        <div id="sparkline-1"></div>
                                        <div class="text-white">Visitors</div>
                                    </div>

                                    <div class="col-4 text-center">
                                        <div id="sparkline-2"></div>
                                        <div class="text-white">Online</div>
                                    </div>

                                    <div class="col-4 text-center">
                                        <div id="sparkline-3"></div>
                                        <div class="text-white">Sales</div>
                                    </div>

                                </div>

                            </div>
                        </div>
                    </div>
                    <div class="col-md-6 connectedSortable">
                        <div class="card card-secondary">
                            <div class="card-header bg-gradient-primary">
                                <h3 class="card-title">Tambah Lokasi Sekolah</h3>
                                <div class="card-tools">
                                    <button type="button" class="btn btn-tool" data-card-widget="collapse"
                                        title="Collapse">
                                        <i class="fas fa-minus"></i>
                                    </button>
                                </div>
                            </div>
                            <div class="card-body">
                                <form action="#" method="post" id="add-spt" name="add-spt">
                                    <div class="card-body">

                                        <div class="form-group">
                                            <label for="owner">Latitude</label>
                                            <input type="text" class="form-control" id="owner" name="owner">
                                        </div>
                                        <div class="form-group">
                                            <label for="address">Longititude</label>
                                            <input type="text" class="form-control" id="address" name="address">
                                        </div>
                                        <div class="form-group">
                                            <label for="address">Warna</label>
                                            <input type="text" class="form-control" id="address" name="address">
                                        </div>
                                    </div>
                                    <div class="card-footer">
                                        <button type="submit" class="btn btn-warning ">Save</button>
                                        <!-- type="submit"  -->
                                        <button href="#" class="btn btn-default float-right">Cancel</button></a>
                                    </div>
                                </form>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </section>
    </div>
@endsection
