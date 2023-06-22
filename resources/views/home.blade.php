@extends('layout.landing')
@section('content')
    <!-- ======= Header ======= -->
    <header id="header" class="fixed-top ">
        <div class="container d-flex align-items-center">

            <h1 class="logo me-auto"><a href="index.html">Maps Sekolah</a></h1>
            <!-- Uncomment below if you prefer to use an image logo -->
            <!-- <a href="index.html" class="logo me-auto"><img src="assets/img/logo.png" alt="" class="img-fluid"></a>-->

            <nav id="navbar" class="navbar">
                <ul>
                    <li><a class="nav-link scrollto" href="#hero">Maps</a></li>
                    <li><a class="nav-link s+crollto" href="#maps">Sekolah</a></li>
                    <li><a class="getstarted scrollto" href="/">Kembali</a></li>
                </ul>
                <i class="bi bi-list mobile-nav-toggle"></i>
            </nav><!-- .navbar -->

        </div>
    </header><!-- End Header -->
    <!-- ======= Hero Section ======= -->
    <section id="hero" class="d-flex align-items-center">
        <div class="container">
            <section class="content">
                <div class="container-fluid">
                    <div class="row">
                        <div class="col-md-12 connectedSortable py-4">
                            <div class="card bg-gradient-primary">
                                <div class="card-header border-0">
                                </div>
                                <div class="card-body">
                                    <div class="input-group" id="search-container">
                                        <input type="text" class="form-control col-md-2" id="search-input"
                                            placeholder="Cari Lokasi">
                                        <div class="input-group-append">
                                            <button class="input-group-text" id="search-button">
                                                <i class="fas fa-search fa-fw"></i>
                                            </button>
                                        </div>
                                    </div>
                                    <br>
                                    <div id="map" style="height: 550px;"></div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </section>
        </div>

    </section><!-- End Hero -->

    <section id="maps" class="maps">
        <div class="container" data-aos="fade-up">
            <div class="section-title">
                <h2>Sekolah</h2>
            </div>
            <div class="row">
                <div class="col-md-12">
                    <div class="card">
                        <div class="card-header">
                            <h3 class="card-title">Data sekolah</h3>
                        </div>
                        <div class="card-body">
                            <div class="card-tools">
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
                                            </tr>
                                        @endforeach
                                    </tbody>
                                </table>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
    <div class="card-body">
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
@endsection
