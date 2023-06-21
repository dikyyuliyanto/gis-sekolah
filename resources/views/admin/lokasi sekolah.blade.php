@extends('admin/panel')

@section('content')
    <div class="content-wrapper">
        <br>
        <section class="content">
            <div class="container-fluid">
                @if (session()->has('success'))
                    <div id="alert-flash" class="alert alert-success" role="alert">
                        {{ session('success') }}
                    </div>
                @endif
                <div class="row">
                    <div class="col-md-12">
                        <div class="card">
                            <div class="card-header">
                                <h3 class="card-title">Data Lokasi</h3>
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
                                <div class="card-body table-responsive p-0">
                                    <table id="example1"
                                        class="table table-hover table-striped table-bordered text-nowrap">
                                        <thead>
                                            <tr class="bg-primary" style="text-align: center">
                                                <th style="width: 50px;">No</th>
                                                <th>Nama sekolah</th>
                                                <th>Latitude</th>
                                                <th>Longitude</th>
                                            </tr>
                                        </thead>
                                        <tbody>
                                            <?php $i = 1; ?>
                                            @foreach ($sekolah as $item)
                                                <tr>
                                                    <td class="text-center">{{ $i++ }}</td>
                                                    <td>{{ $item->nama_sekolah }}</td>
                                                    <td>{{ $item->latitude }}</td>
                                                    <td>{{ $item->longitude }}</td>
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
@endsection
