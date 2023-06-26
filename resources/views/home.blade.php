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
                    <li><a class="nav-link s+crollto" href="#readme">ReadMe</a></li>
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
                                        <input type="text" class="form-control col-md-6" id="search-input"
                                            placeholder="Cari Lokasi sesuai kecamatan">
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
                                            <th>Website</th>
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
                                                <td><a href="{{ $item->website }}" target="_tab">{{ $item->website }}</a>
                                                </td>
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
    <section id="readme" class="readme">
        <div class="container" data-aos="fade-up">
            <div class="section-title">
                <h2>ReadMe</h2>
            </div>
            <div class="col-lg-12 pt-4 pt-lg-0 text-center">
                <p>
                    di isi cara search sesuai zonasi
                </p>
            </div>
    </section>

    <!DOCTYPE html>
    <html lang="en">

    {{-- <head>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <title>Google Maps-like Info Popup</title>
        <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/leaflet@1.7.1/dist/leaflet.css" />
        <style>
            #map {
                height: 650px;
            }
        </style>
    </head> --}}

    <body>
        <div id="map"></div>

        <script>
            var data = [
                <?php foreach ($sekolah as $item) { ?> {
                    "lokasi": [<?= $item->latitude ?>, <?= $item->longitude ?>],
                    "nama_sekolah": "<?= $item->nama_sekolah ?>",
                    "alamat": "<?= $item->alamat ?>",
                    "kecamatan": "<?= $item->nama_kecamatan ?>",
                    "website": "<?= $item->website ?>",
                    "jumlah_ppdb": <?= $item->jumlah_ppdb ?>
                },
                <?php } ?>
            ];

            var map = L.map('map').setView([-6.86333, 109.05667], 10);

            var defaultLayer = L.tileLayer('https://{s}.tile.openstreetmap.org/{z}/{x}/{y}.png', {
                attribution: 'Map data &copy; <a href="https://www.openstreetmap.org/">OpenStreetMap</a> contributors',
                maxZoom: 100
            }).addTo(map);

            var satelliteLayer = L.tileLayer('https://{s}.google.com/vt/lyrs=s&x={x}&y={y}&z={z}', {
                attribution: 'Map data &copy; <a href="https://www.google.com/">Google</a>',
                maxZoom: 25,
                subdomains: ['mt0', 'mt1', 'mt2', 'mt3']
            });

            var baseLayers = {
                "Street Map": defaultLayer,
                "Satellite": satelliteLayer
            };

            L.control.layers(baseLayers).addTo(map);

            var customIcon = L.icon({
                iconUrl: 'assets/img/marker.png',
                iconSize: [40, 40],
                iconAnchor: [16, 32],
                popupAnchor: [0, -32]
            });

            var markersLayer = new L.LayerGroup();
            map.addLayer(markersLayer);

            for (var i = 0; i < data.length; i++) {
                var sekolah = data[i];
                var nama_sekolah = sekolah.nama_sekolah;
                var lokasi = sekolah.lokasi;
                var alamat = sekolah.alamat;
                var kecamatan = sekolah.kecamatan;
                var website = sekolah.website;
                var jumlah_ppdb = sekolah.jumlah_ppdb;

                var marker = L.marker(new L.LatLng(lokasi[0], lokasi[1]), {
                    title: nama_sekolah,
                    icon: customIcon
                });

                var popupContent = '<b>Nama Sekolah:</b> ' + nama_sekolah + '<br>' +
                    '<b>Alamat:</b> ' + alamat + '<br>' +
                    '<b>Kecamatan:</b> ' + kecamatan + '<br>' +
                    '<b>Website:</b> <a href="' + website + '" target="_blank">' + website + '</a><br>' +
                    '<b>Jumlah PPDB:</b> ' + jumlah_ppdb;

                marker.bindPopup(popupContent);
                markersLayer.addLayer(marker);
            }

            function searchLocation(keyword) {
                markersLayer.clearLayers();
                var titikDitemukan = false;

                for (var i = 0; i < data.length; i++) {
                    var sekolah = data[i];
                    var nama_sekolah = sekolah.nama_sekolah;
                    if (nama_sekolah.toLowerCase().includes(keyword.toLowerCase())) {
                        var lokasi = sekolah.lokasi;
                        var alamat = sekolah.alamat;
                        var kecamatan = sekolah.kecamatan;
                        var website = sekolah.website;
                        var jumlah_ppdb = sekolah.jumlah_ppdb;

                        var customIcon = L.icon({
                            iconUrl: 'assets/img/marker.png',
                            iconSize: [40, 40],
                            iconAnchor: [16, 32],
                            popupAnchor: [0, -32]
                        });

                        var marker = L.marker(new L.LatLng(lokasi[0], lokasi[1]), {
                            title: nama_sekolah,
                            icon: customIcon
                        });

                        var popupContent = '<b>Nama Sekolah:</b> ' + nama_sekolah + '<br>' +
                            '<b>Alamat:</b> ' + alamat + '<br>' +
                            '<b>Kecamatan:</b> ' + kecamatan + '<br>' +
                            '<b>Website:</b> <a href="' + website + '" target="_blank">' + website + '</a><br>' +
                            '<b>Jumlah PPDB:</b> ' + jumlah_ppdb;

                        marker.bindPopup(popupContent);
                        markersLayer.addLayer(marker);

                        map.setView(new L.LatLng(lokasi[0], lokasi[1]), 12);
                    }
                }
            }

            document.getElementById('search-button').addEventListener('click', function() {
                var searchInput = document.getElementById('search-input').value;
                searchLocation(searchInput);
            });
        </script>
    </body>

    </html>
@endsection
