@extends('admin.panel')

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
                    </div><!-- /.col -->
                </div><!-- /.row -->
            </div><!-- /.container-fluid -->
        </div>
        {{-- <ralasi kecamatan dan sekolah> --}}
        {{-- <div class="container-fluid">
            <div class="row">
                <div class="col-md-12">
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
                                                <label for="kecamatan">Kecamatan</label>
                                                <select class="form-control" name="id_kecamatan">
                                                    <option selected>Pilih Kecamatan</option>
                                                    @foreach ($kecamatan as $item)
                                                        <option value="{{ $item->id }}">{{ $item->nama_kecamatan }}
                                                        </option>
                                                    @endforeach
                                                </select>
                                            </div>
                                        </div>
                                        <div class="col-4">
                                            <div class="form-group">
                                                <label for="sekolah">Sekolah</label>
                                                <select class="form-control" name="id_sekolah">
                                                    <option selected>Pilih Sekolah</option>
                                                    @foreach ($sekolah as $item)
                                                        <option value="{{ $item->id }}">{{ $item->nama_sekolah }}
                                                        </option>
                                                    @endforeach
                                                </select>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </form>
                    </div>
                </div> --}}

        <div class="col-md-12 connectedSortable">
            <div class="card bg-gradient-primary">
                <div class="card-header border-0">
                    <h3 class="card-title">
                        <i class="fas fa-map-marker-alt mr-1"></i>
                        Peta Lokasi Sekolah
                    </h3>
                </div>
                <div class="card-body">
                    <div id="map" style="height: 650px">
                        <script>
                            // Initialize the map
                            var map = L.map('map').setView([-6.8814, 109.0527], 10);

                            // Add the default tile layer (street map)
                            var defaultLayer = L.tileLayer('https://{s}.tile.openstreetmap.org/{z}/{x}/{y}.png', {
                                attribution: 'Map data &copy; <a href="https://www.openstreetmap.org/">OpenStreetMap</a> contributors',
                                maxZoom: 18
                            }).addTo(map);

                            // Add the satellite tile layer
                            var satelliteLayer = L.tileLayer('https://{s}.google.com/vt/lyrs=s&x={x}&y={y}&z={z}', {
                                attribution: 'Map data &copy; <a href="https://www.google.com/">Google</a>',
                                maxZoom: 25,
                                subdomains: ['mt0', 'mt1', 'mt2', 'mt3']
                            });

                            // Define a base layers object to store the tile layers
                            var baseLayers = {
                                "Street Map": defaultLayer,
                                "Satellite": satelliteLayer
                            };

                            // Add a layer control to switch between the base tile layers
                            L.control.layers(baseLayers).addTo(map);

                            @foreach ($sekolah as $item)
                                var marker = L.marker([{{ $item->latitude }}, {{ $item->longitude }}]).addTo(map);
                                marker.bindPopup("<b>{{ $item->nama_sekolah }}</b> <br> {{ $item->alamat }}");
                            @endforeach
                        </script>

                    </div>
                </div>
            </div>
        </div>

    </div>
    </div>
    </section>
    </div>
@endsection

{{-- @push('scripts')
    <script>
        $(document).ready(function() {
            // Fungsi untuk memperbarui peta lokasi berdasarkan kecamatan yang dipilih
            function updateMap() {
                var kecamatan = $('#kecamatan').val();
                var sekolah = $('#sekolah').val();
                var jenisSekolah = $('#jenis_sekolah').val();
                // Lakukan aksi yang sesuai, misalnya memperbarui peta lokasi
                // atau mengirim data ke server untuk mendapatkan data terkait kecamatan yang dipilih
                $('#map').html('<p>Peta Lokasi ' + kecamatan + ' - ' + sekolah + ' - ' + jenisSekolah + '</p>');
            }

            // Event listener ketika combobox berubah
            $('#kecamatan, #sekolah, #jenis_sekolah').on('change', function() {
                updateMap();
            });

            // Panggil fungsi updateMap saat halaman pertama kali dimuat
            updateMap();
        });
    </script>
@endpush --}}
