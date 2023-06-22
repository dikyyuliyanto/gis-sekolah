@extends('admin.panel')

@section('content')
    <div class="content-wrapper">
        <!-- Content Header (Page header) -->
        <div class="content-header">
            <div class="container-fluid">
                <div class="row mb-2">
                    <div class="col-sm-6">
                        <h1 class="m-0">Maps Sekolah</h1>
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
                </div>
                <div class="card-body">
                    <div class="input-group" id="search-container">
                        <input type="text" class="form-control col-md-2" id="search-input" placeholder="Cari Lokasi">
                        <div class="input-group-append">
                            <button class="input-group-text" id="search-button">
                                <i class="fas fa-search fa-fw"></i>
                            </button>
                        </div>
                    </div>
                    <br>
                    <div id="map" style="height: 650px"></div>
                    <script>
                        var data = [
                            <?php foreach ($sekolah as $item) { ?> {
                                "lokasi": [<?= $item->latitude ?>, <?= $item->longitude ?>],
                                "nama_sekolah": "<?= $item->nama_sekolah ?>"
                            },
                            <?php } ?>
                        ];

                        // Initialize the map
                        var map = L.map('map').setView([-6.8814, 109.0527], 10);

                        // Add the default tile layer (street map)
                        var defaultLayer = L.tileLayer('https://{s}.tile.openstreetmap.org/{z}/{x}/{y}.png', {
                            attribution: 'Map data &copy; <a href="https://www.openstreetmap.org/">OpenStreetMap</a> contributors',
                            maxZoom: 25
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

                        // Populate map with markers from sample data
                        var markersLayer = new L.LayerGroup(); // Layer contains searched elements
                        map.addLayer(markersLayer);

                        for (var i = 0; i < data.length; i++) {
                            var nama_sekolah = data[i].nama_sekolah; // Value searched
                            var lokasi = data[i].lokasi; // Position found
                            var marker = L.marker(new L.LatLng(lokasi[0], lokasi[1]), {
                                title: nama_sekolah
                            }); // Set property searched
                            marker.bindPopup('Nama Sekolah: ' + nama_sekolah);
                            markersLayer.addLayer(marker);
                        }

                        // Search function
                        document.getElementById('search-button').addEventListener('click', function() {
                            var searchInput = document.getElementById('search-input').value;
                            searchLocation(searchInput);
                        });

                        function searchLocation(keyword) {
                            markersLayer.clearLayers(); // Clear existing markers

                            for (var i = 0; i < data.length; i++) {
                                var nama_sekolah = data[i].nama_sekolah;
                                if (nama_sekolah.toLowerCase().includes(keyword.toLowerCase())) {
                                    var lokasi = data[i].lokasi;
                                    var marker = L.marker(new L.LatLng(lokasi[0], lokasi[1]), {
                                        title: nama_sekolah
                                    });
                                    marker.bindPopup('Nama Sekolah: ' + nama_sekolah);
                                    markersLayer.addLayer(marker);
                                }
                            }
                        }
                    </script>
                </div>
            </div>
        </div>
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
