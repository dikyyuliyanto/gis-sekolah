@extends('admin/panel')

@section('content')
    <div class="content-wrapper">
        <section class="content">
            <div class="container-fluid">
                @if (session()->has('success'))
                    <div id="alert-flash" class="alert alert-success" role="alert">
                        {{ session('success') }}
                        <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                            <span aria-hidden="true">&times;</span>
                        </button>
                    </div>
                @endif
                <br>
                <div class="row">
                    <div class="col-md-12">
                        <div class="card">
                            <div class="card-header">
                                <h3 class="card-title">Data sekolah</h3>
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
                                        &nbsp;
                                        <div class="input-group-append">
                                            <a class="btn btn-info btn-sm" href="">
                                                <i class="fas fa-sync-alt"></i>
                                            </a>
                                        </div>
                                        &nbsp;
                                        <div class="input-group-append">
                                            <a type="button" class="btn btn-info btn-sm" data-toggle="modal"
                                                data-target="#form-tambah">
                                                <i class="fas fa-plus-circle"></i>
                                            </a>
                                        </div>
                                        &nbsp;
                                    </form>
                                </div>
                                <br>
                                <div class="card-body table-responsive p-0">
                                    <table id="example1" class="table table-bordered table-striped">
                                        <thead>
                                            <tr class="bg-primary" style="text-align: center">
                                                <th style="width: 50px;">No</th>
                                                <th>Nama sekolah</th>
                                                <th>Alamat Sekolah</th>
                                                <th>Kecamatan</th>
                                                <th>Foto</th>
                                                <th>Jenis Sekolah</th>
                                                <th>Jumlah PPDB</th>
                                                <th>Deskripsi</th>
                                                <th>Aksi</th>
                                            </tr>
                                        </thead>
                                        <tbody>
                                            <?php $i = 1; ?>
                                            @foreach ($sekolah as $item)
                                                <tr>
                                                    <td class="text-center">{{ $i++ }}</td>
                                                    <td>{{ $item->nama_sekolah }}</td>
                                                    <td>{{ $item->alamat }}</td>
                                                    <td>{{ $item->nama_kecamatan }}</td>
                                                    <td>{{ $item->foto }}</td>
                                                    <td align="center">{{ $item->jenis_sekolah }}</td>
                                                    <td align="center">{{ $item->jumlah_ppdb }}</td>
                                                    <td>{{ $item->deskripsi }}</td>
                                                    <td align="center">
                                                        <button type="button" class="btn btn-warning btn-sm mx-1"
                                                            data-toggle="modal"
                                                            data-target="#form-edit{{ $item->id_sekolah }}"><i
                                                                class="fas fa-pencil-alt"></i></button>
                                                        <button type="submit" class="btn btn-danger btn-sm mx-1"
                                                            data-toggle="modal"
                                                            data-target="#konfirmasi-hapus-{{ $item->id_sekolah }}">
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
        <div class="modal-dialog modal-dialog-centered">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="exampleModalLabel">Form Tambah sekolah</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <div class="modal-body">
                    <form action="{{ route('sekolah.store') }}" method="POST" enctype="multipart/from-data">
                        @csrf
                        <div class="form-group">
                            <label for="nama_sekolah">Nama sekolah</label>
                            <input type="text" class="form-control" id="nama_sekolah" name="nama_sekolah"
                                @error('nama_sekolah') is invalid @enderror required>
                            @error('nama_sekolah')
                                <div class="invalid-feedback">
                                    {{ $message }}
                                </div>
                            @enderror
                        </div>
                        <div class="form-group">
                            <label for="alamat">Alamat Sekolah</label>
                            <input type="text" class="form-control" id="alamat" name="alamat"
                                @error('alamat') is invalid @enderror required>
                            @error('alamat')
                                <div class="invalid-feedback">
                                    {{ $message }}
                                </div>
                            @enderror
                        </div>
                        <div class="form-group">
                            <label for="id_kecamatan">Kecamatan</label>
                            <select class="form-control" id="id_kecamatan" name="id_kecamatan">
                                <option value="">Pilih Kecamatan</option>
                                @foreach ($kecamatan as $itemKecamatan)
                                    <option value="{{ $itemKecamatan->id_kecamatan }}">
                                        {{ $itemKecamatan->nama_kecamatan }}
                                    </option>
                                @endforeach
                            </select>
                        </div>
                        <div class="form-group">
                            <label for="foto">File Sekolah</label>
                            <input type="file" class="form-control" id="foto" name="foto"
                                @error('foto') is invalid @enderror required>
                            @error('foto')
                                <div class="invalid-feedback">
                                    {{ $message }}
                                </div>
                            @enderror
                        </div>
                        <div class="form-group">
                            <label for="jenis_sekolah">Jenis Sekolah</label>
                            <select class="form-control" id="jenis_sekolah" name="jenis_sekolah">
                                <option value="Negeri">Negeri</option>
                                <option value="Swasta">Swasta</option>
                            </select>
                        </div>
                        <div class="form-group">
                            <label for="jumlah_ppdb">Jumlah PPDB</label>
                            <input type="text" class="form-control" id="jumlah_ppdb" name="jumlah_ppdb"
                                @error('jumlah_ppdb') is invalid @enderror required>
                            @error('jumlah_ppdb')
                                <div class="invalid-feedback">
                                    {{ $message }}
                                </div>
                            @enderror
                        </div>
                        <div class="form-group">
                            <label for="deskripsi">Deskripsi</label>
                            <input type="text" class="form-control" id="deskripsi" name="deskripsi"
                                @error('deskripsi') is invalid @enderror required>
                            @error('deskripsi')
                                <div class="invalid-feedback">
                                    {{ $message }}
                                </div>
                            @enderror
                        </div>
                        <div class="form-group">
                            <label for="latitude">latitude</label>
                            <input type="text" class="form-control" id="latitude" name="latitude"
                                @error('latitude') is invalid @enderror required>
                            @error('latitude')
                                <div class="invalid-feedback">
                                    {{ $message }}
                                </div>
                            @enderror
                        </div>
                        <div class="form-group">
                            <label for="longitude">longitude</label>
                            <input type="text" class="form-control" id="longitude" name="longitude"
                                @error('longitude') is invalid @enderror required>
                            @error('longitude')
                                <div class="invalid-feedback">
                                    {{ $message }}
                                </div>
                            @enderror
                        </div>
                        <div class="modal-footer">
                            <button type="button" class="btn btn-secondary" data-dismiss="modal">Cancel</button>
                            <button type="submit" class="btn btn-primary">Save</button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
    {{-- MODAL EDIT --}}
    @foreach ($sekolah as $item)
        <!-- Modal -->
        <div class="modal fade" id="form-edit{{ $item->id_sekolah }}" tabindex="-1"
            aria-labelledby="exampleModalLabel" aria-hidden="true">
            <div class="modal-dialog modal-dialog-centered">
                <div class="modal-content">
                    <div class="modal-header">
                        <h5 class="modal-title" id="exampleModalLabel">Form Edit sekolah</h5>
                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                            <span aria-hidden="true">&times;</span>
                        </button>
                    </div>
                    <div class="modal-body">
                        <form action="{{ route('sekolah.update', ['id' => $item->id_sekolah]) }}" method="POST">
                            @csrf
                            <div class="form-group">
                                <label for="nama_sekolah">Nama sekolah</label>
                                <input type="text" class="form-control" id="nama_sekolah" name="nama_sekolah"
                                    value="{{ $item->nama_sekolah }}" @error('nama_sekolah')is invalid @enderror required>
                                @error('nama_sekolah')
                                    <div class="invalid-feedback">
                                        {{ $message }}
                                    </div>
                                @enderror
                            </div>
                            <div class="form-group">
                                <label for="alamat">Alamat Sekolah</label>
                                <input type="text" class="form-control" id="alamat" name="alamat"
                                    value="{{ $item->alamat }}" @error('alamat') is invalid @enderror required>
                                @error('alamat')
                                    <div class="invalid-feedback">
                                        {{ $message }}
                                    </div>
                                @enderror
                            </div>
                            <div class="form-group">
                                <label for="id_kecamatan">Kecamatan</label>
                                <select class="form-control" id="id_kecamatan" name="id_kecamatan">
                                    <option value="">Pilih Kecamatan</option>
                                    @foreach ($kecamatan as $itemKecamatan)
                                        <option value="{{ $itemKecamatan->id_kecamatan }}">
                                            {{ $itemKecamatan->nama_kecamatan }}
                                        </option>
                                    @endforeach
                                </select>
                            </div>
                            <div class="form-group">
                                <label for="foto">File Sekolah</label>
                                <input type="file" class="form-control" id="foto" name="foto"
                                    value="{{ $item->foto }}" @error('foto') is invalid @enderror required>
                                @error('foto')
                                    <div class="invalid-feedback">
                                        {{ $message }}
                                    </div>
                                @enderror
                            </div>
                            <div class="form-group">
                                <label for="jenis_sekolah">Jenis Sekolah</label>
                                <select class="form-control" id="jenis_sekolah" name="jenis_sekolah">
                                    <option value="Negeri">Negeri</option>
                                    <option value="Swasta">Swasta</option>
                                </select>
                            </div>
                            <div class="form-group">
                                <label for="jumlah_ppdb">Jumlah PPDB</label>
                                <input type="text" class="form-control" id="jumlah_ppdb" name="jumlah_ppdb"
                                    value="{{ $item->jumlah_ppdb }}" @error('jumlah_ppdb') is invalid @enderror required>
                                @error('jumlah_ppdb')
                                    <div class="invalid-feedback">
                                        {{ $message }}
                                    </div>
                                @enderror
                            </div>
                            <div class="form-group">
                                <label for="deskripsi">Deskripsi</label>
                                <input type="text" class="form-control" id="deskripsi" name="deskripsi"
                                    value="{{ $item->deskripsi }}" @error('deskripsi') is invalid @enderror required>
                                @error('deskripsi')
                                    <div class="invalid-feedback">
                                        {{ $message }}
                                    </div>
                                @enderror
                            </div>
                            <div class="form-group">
                                <label for="latitude">latitude</label>
                                <input type="text" class="form-control" id="latitude" name="latitude"
                                    value="{{ $item->latitude }}" @error('latitude') is invalid @enderror required>
                                @error('latitude')
                                    <div class="invalid-feedback">
                                        {{ $message }}
                                    </div>
                                @enderror
                            </div>
                            <div class="form-group">
                                <label for="longitude">longitude</label>
                                <input type="text" class="form-control" id="longitude" name="longitude"
                                    value="{{ $item->longitude }}" @error('longitude') is invalid @enderror required>
                                @error('longitude')
                                    <div class="invalid-feedback">
                                        {{ $message }}
                                    </div>
                                @enderror
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
    @foreach ($sekolah as $item)
        <!-- Modal -->
        <div class="modal fade" id="konfirmasi-hapus-{{ $item->id_sekolah }}" tabindex="-1"
            aria-labelledby="exampleModalLabel" aria-hidden="true">
            <div class="modal-dialog modal-dialog-centered">
                <div class="modal-content">
                    <div class="modal-header">
                        <h5 class="modal-title" id="exampleModalLabel">Hapus sekolah</h5>
                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                            <span aria-hidden="true">&times;</span>
                        </button>
                    </div>
                    <div class="modal-body">
                        <form action="{{ route('sekolah.destroy', ['id' => $item->id_sekolah]) }}" method="POST"
                            class="d-inline">
                            @csrf
                            @method('DELETE')
                            Apakah anda yakin ingin menghapus data ini?
                            <div class="modal-footer">
                                <button type="button" class="btn btn-secondary" data-dismiss="modal">Cancel</button>
                                <button type="submit" class="btn btn-primary">Delete</button>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    @endforeach
@endsection
