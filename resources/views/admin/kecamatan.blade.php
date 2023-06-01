@extends('admin/panel')

@section('content')
    <div class="content-wrapper">
        <!-- Content Header (Page header) -->
        <div class="content-header">
            <div class="container-fluid">
                <div class="row mb-2">
                    <div class="col-sm-6">
                        <h1 class="m-0">Kecamatan</h1>
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
            <div class="container-fluid">
                <div class="row">
                    <div class="col-md-12">
                        <div class="card">
                            <div class="card-header">
                                <h3 class="card-title">Data Kecamatan</h3>
                                <div class="card-tools">
                                    <button type="button" class="btn btn-tool" data-card-widget="collapse">
                                        <i class="fas fa-minus"></i>
                                    </button>
                                    <button type="button" class="btn btn-tool" data-card-widget="remove">
                                        <i class="fas fa-times"></i>
                                    </button>
                                </div>
                            </div>
                            <div class="card-body">
                                <div class="card-tools">
                                    <form ng-submit="itemSearch()" class="form-inline" role="form">
                                        <div class="input-group input-group-sm" style="width: 250px;">
                                            <input type="text" name="table_search" class="form-control float-right"
                                                placeholder="Search" [(ngModel)]="searchText">
                                            <div class="input-group-append">
                                                <button type="submit" class="btn btn-default" (click)="itemSearch()">
                                                    <i class="fas fa-search"></i>
                                                </button>
                                            </div>
                                        </div>
                                        &nbsp;
                                        <div class="input-group-append">
                                            <a type="button" class="btn btn-info btn-sm" data-toggle="modal"
                                                data-target="#form-tambah">
                                                <i class="fas fa-plus-circle"></i>
                                            </a>
                                        </div>
                                        &nbsp;
                                        <div class="input-group-append">
                                            <a class="btn btn-info btn-sm" href="">
                                                <i class="fas fa-sync-alt"></i>
                                            </a>
                                        </div>
                                        &nbsp;
                                    </form>
                                </div>
                                <br>
                                <table class="table table-hover table-striped table-bordered text-nowrap">
                                    <thead>
                                        <tr class="bg-primary" style="text-align: center">
                                            <th style="width: 50px;">No</th>
                                            <th>Nama Kecamatan</th>
                                            <th>Jumlah Sekolah</th>
                                            <th>Aksi</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        <?php $i = 1; ?>
                                        @foreach ($kecamatan as $item)
                                            <tr>
                                                <td class="text-center">{{ $i++ }}</td>
                                                <td>{{ $item->nama_kecamatan }}</td>
                                                <td align="center">{{ $item->jumlah_sekolah }}</td>
                                                <td align="center">
                                                    <button type="button" class="btn btn-warning btn-sm mx-1"
                                                        data-toggle="modal"
                                                        data-target="#form-edit{{ $item->id_kecamatan }}"><i
                                                            class="fas fa-pencil-alt"></i></button>

                                                    <button type="submit" class="btn btn-danger btn-sm mx-1"
                                                        data-toggle="modal"
                                                        data-target="#konfirmasi-hapus-{{ $item->id_kecamatan }}">
                                                        <i class="fas fa-trash"></i>
                                                    </button>
                                                </td>
                                            </tr>
                                        @endforeach
                                    </tbody>
                                </table>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </section>
    </div>

    <!-- Modal -->
    {{-- MODAL TAMBAH --}}
    <div class="modal fade" id="form-tambah" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="exampleModalLabel">Form Tambah Kecamatan</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <div class="modal-body">
                    <form action="{{ route('kecamatan.store') }}" method="POST">
                        @csrf
                        <div class="form-group">
                            <label for="nama_kecamatan">Nama Kecamatan</label>
                            <input type="text" class="form-control" id="nama_kecamatan" name="nama_kecamatan">
                        </div>
                        <div class="form-group">
                            <label for="jumlah_sekolah">Jumlah Sekolah</label>
                            <input type="text" class="form-control" id="jumlah_sekolah" name="jumlah_sekolah">
                        </div>
                        <div class="modal-footer">
                            <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                            <button type="submit" class="btn btn-primary">Simpan</button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
    {{-- MODAL EDIT --}}

    @foreach ($kecamatan as $item)
        <!-- Modal -->
        <div class="modal fade" id="form-edit{{ $item->id_kecamatan }}" tabindex="-1"
            aria-labelledby="exampleModalLabel" aria-hidden="true">
            <div class="modal-dialog">
                <div class="modal-content">
                    <div class="modal-header">
                        <h5 class="modal-title" id="exampleModalLabel">Form Edit Kecamatan</h5>
                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                            <span aria-hidden="true">&times;</span>
                        </button>
                    </div>
                    <div class="modal-body">
                        <form action="{{ route('kecamatan.update', ['id' => $item->id_kecamatan]) }}" method="POST">
                            @csrf
                            <div class="form-group">
                                <label for="nama_kecamatan">Nama Kecamatan</label>
                                <input type="text" class="form-control" id="nama_kecamatan" name="nama_kecamatan"
                                    value="{{ $item->nama_kecamatan }}">
                            </div>
                            <div class="form-group">
                                <label for="jumlah_sekolah">Jumlah Sekolah</label>
                                <input type="text" class="form-control" id="jumlah_sekolah" name="jumlah_sekolah"
                                    value="{{ $item->jumlah_sekolah }}">
                            </div>
                            <div class="modal-footer">
                                <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                                <button type="submit" class="btn btn-primary">Simpan</button>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    @endforeach

    @foreach ($kecamatan as $item)
        <!-- Modal -->
        <div class="modal fade" id="konfirmasi-hapus-{{ $item->id_kecamatan }}" tabindex="-1"
            aria-labelledby="exampleModalLabel" aria-hidden="true">
            <div class="modal-dialog">
                <div class="modal-content">
                    <div class="modal-header">
                        <h5 class="modal-title" id="exampleModalLabel">Hapus Kecamatan</h5>
                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                            <span aria-hidden="true">&times;</span>
                        </button>
                    </div>
                    <div class="modal-body">
                        <form action="{{ route('kecamatan.destroy', ['id' => $item->id_kecamatan]) }}" method="POST"
                            class="d-inline">
                            @csrf
                            @method('DELETE')
                            Apakah anda yakin ingin menghapus data ini?
                            <div class="modal-footer">
                                <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                                <button type="submit" class="btn btn-primary">Hapus</button>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    @endforeach
@endsection
