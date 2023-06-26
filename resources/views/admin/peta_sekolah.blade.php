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
                            iconSize: [32, 32],
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
                                        iconSize: [32, 32],
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

                                    titikDitemukan = true;
                                }
                            }

                            if (!titikDitemukan) {
                                $('#lokasiNotFoundModal').modal('show');
                            }
                        }

                        document.getElementById('search-button').addEventListener('click', function() {
                            var searchInput = document.getElementById('search-input').value;
                            searchLocation(searchInput);
                        });
                    </script>
                </div>
            </div>
        </div>
    </div>
    <!-- Modal -->
    <div class="modal fade" id="lokasiNotFoundModal" tabindex="-1" role="dialog"
        aria-labelledby="lokasiNotFoundModalLabel" aria-hidden="true">
        <div class="modal-dialog" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="lokasiNotFoundModalLabel">Pesan</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <div class="modal-body">
                    <p>Titik lokasi tidak ditemukan.</p>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-dismiss="modal">Tutup</button>
                </div>
            </div>
        </div>
    </div>
@endsection
