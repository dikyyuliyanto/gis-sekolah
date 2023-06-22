@extends('layout/landing')

@section('content')
    <!-- ======= Header ======= -->
    <header id="header" class="fixed-top ">
        <div class="container d-flex align-items-center">

            <h1 class="logo me-auto"><a href="index.html">GIS Sekolah</a></h1>
            <!-- Uncomment below if you prefer to use an image logo -->
            <!-- <a href="index.html" class="logo me-auto"><img src="assets/img/logo.png" alt="" class="img-fluid"></a>-->

            <nav id="navbar" class="navbar">
                <ul>
                    <li><a class="nav-link scrollto active" href="#hero">Home</a></li>
                    <li><a class="nav-link scrollto" href="#maps">Maps</a></li>
                    <li><a class="nav-link s+crollto" href="#services">Sekolah</a></li>
                    <li><a class="nav-link scrollto" href="#zonasi">Zonasi</a></li>
                    <li><a class="nav-link scrollto" href="#about">About</a></li>
                    <li><a class="getstarted scrollto" href="login">Admin</a></li>

                </ul>
                <i class="bi bi-list mobile-nav-toggle"></i>
            </nav><!-- .navbar -->

        </div>
    </header><!-- End Header -->

    <!-- ======= Hero Section ======= -->
    <section id="hero" class="d-flex align-items-center">

        <div class="container">
            <div class="row">
                <div class="col-lg-6 d-flex flex-column justify-content-center pt-4 pt-lg-0 order-2 order-lg-1"
                    data-aos="fade-up" data-aos-delay="200">
                    <h1>GEOGRAFIS INFORMATION SYSTEM</h1>
                    <h2>KABUPATEN BREBES</h2>
                    <div class="d-flex justify-content-center justify-content-lg-start">
                        <a href="home" class="btn-get-started scrollto">GO TO MAPS</a>
                    </div>
                </div>
                <div class="col-lg-6 order-1 order-lg-2 hero-img" data-aos="zoom-in" data-aos-delay="200">
                    <img src="assets/img/maps.png" class="img-fluid animated" alt="">
                </div>
            </div>
        </div>

    </section><!-- End Hero -->

    <section id="maps" class="maps">
        <div class="container" data-aos="fade-up">
            <div class="section-title">
                <h2>Maps</h2>
            </div>
            <div class="col-lg-12 pt-4 pt-lg-0 text-justify">
                <p>Pemetaan sekolah adalah Suatu kegiatan untuk memberikan gambaran atau mungkin secara rinci dan tepat
                    di permukaan suatu daerah tertentu mengenai keadaan sekolah serta hubungannya dengan jumlah anak usia
                    sekolah, perkembangan pemukiman penduduk, social ekonomi dan lingkungan dalam arti luas.
                </p>
            </div>
    </section>

    <main id="main">
        <!-- ======= Services Section ======= -->
        <section id="services" class="services section-bg">
            <div class="container" data-aos="fade-up">
                <div class="section-title ">
                    <h2>Sekolah</h2>
                </div>
                <div class="col-lg-12 pt-4 pt-lg-0 text-justify">
                    <p>Sekolah adalah suatu lembaga atau bangunan yang dipakai untuk aktivitas belajar dan mengajar123.
                        Sekolah dapat dibedakan menurut tingkatannya, jurusannya, atau sifatnya, misalnya sekolah dasar,
                        sekolah teknik, atau sekolah formal12. Sekolah didirikan oleh negara atau swasta dengan tujuan untuk
                        memberikan pengajaran, mengelola, dan mendidik para murid melalui bimbingan yang diberikan oleh para
                        pendidik atau guru2.</p>
                </div>
            </div>
        </section><!-- End Services Section -->

        <!-- ======= zonasi ======= -->
        <section id="zonasi" class="zonasi">
            <div class="container" data-aos="fade-up">
                <div class="section-title">
                    <h2>Zonasi</h2>
                </div>
                <div class="col-lg-12 pt-4 pt-lg-0 text-justify">
                    <p> Sistem zonasi adalah seleksi penerimaan siswa didik atau peserta didik baru secara lebih
                        transparan
                        dan adil, ditetapkan sesuai tempat tinggal.
                        Sistem ini mulai digunakan pada tahun 2017 dalam penataan sistem Penerimaan Peserta Didik Baru
                        (PPDB) yang mengacu pada Peraturan Menteri Pendidikan dan Kebudayaan Nomor 14 Tahun 2018, tentang
                        Penerimaan Peserta Didik Baru pada Taman Kanak-kanak, Sekolah Dasar, Sekolah Menengah Pertama,
                        Sekolah Menengah Atas, Sekolah Menengah Kejuruan, atau bentuk lain yang sederajat. Pemberlakuan
                        sistem ini baru efektif di tahun 2018.
                        Pengertian ‘zonasi’ dimaknai sebagai pembagian atau pemecahan suatu areal menjadi beberapa bagian,
                        sesuai dengan fungsi dan tujuan pengelolaan (Kamus Besar Bahasa Indonesia). Dengan sistem ini,
                        diharapkan semua jenjang pendidikan khususnya sekolah negeri untuk memberikan layanan pendidikan
                        yang bermutu secara merata bagi masyarakat pada suatu areal atau kawasan tertentu.
                        Pada sistem ini, ditargetkan akan mengubah paradigma di mana ‘anak-anak terbaik’ tidak perlu mencari
                        ‘sekolah terbaik’ yang berlokasi jauh dari tempat tinggalnya. Sejauh penerapannya, sistem Penerimaan
                        Peserta Didik Baru (PPDB) diklaim mampu memberi implikasi terhadap kesiapan seluruh sekolah dengan
                        mutu yang setara sekolah unggul atau sekolah favorit.</p>
                </div>
            </div>
        </section><!-- End zonasi -->

        <!-- ======= About Us Section ======= -->
        <section id="about" class="about">
            <div class="container" data-aos="fade-up">

                <div class="section-title">
                    <h2>About Us</h2>
                </div>
                <div class="row content text-center">
                    <div class="col-lg-12 pt-4 pt-lg-0">
                        <p>
                            Aplikasi WEB GIS sekolah ini dirancang khusus untuk membantu siswa/siswi yang akan mencari
                            informasi sekolah berupa titik koordinat dan memperoleh informasi sekolah yang ada di kabupaten
                            Brebes.
                        </p>
                        <a href="#" class="btn-learn-more">USE APP</a>
                    </div>
                </div>

            </div>
        </section><!-- End About Us Section -->

        <!-- ======= Footer ======= -->
        <footer id="footer">
            <div class="footer-newsletter">
                <div class="container">
                    <div class="row justify-content-center">
                        <div class="footer-top">
                            <div class="container">
                                <div class="row">
                                    <center>
                                        <div class="col-lg-3 col-md-6 footer-contact">
                                            <h3>Diky Yuliyanto</h3>
                                            <p>
                                                BREBES <br><br>
                                                <strong>Phone:</strong>+62-8560-0371-897<br>
                                                <strong>Email:</strong> dikit388@gmail.com<br>
                                            </p>
                                        </div>

                                        <div class="col-lg-3 col-md-6 footer-links">
                                            <h4>Our Services</h4>
                                            <ul>
                                                <a>Graphic Design</a>
                                            </ul>
                                        </div>

                                        <div class="col-lg-3 col-md-6 footer-links">
                                            <h4>Media Sosial</h4>
                                            <p>Untuk informasi lebih lanjut Terkait Aplikasi WEB-GIS sekolah hubungi sosial
                                                media saya
                                            </p>
                                            <div class="social-links mt-3">
                                                <a href="#" class="twitter"><i class="bx bxl-twitter"></i></a>
                                                <a href="#" class="facebook"><i class="bx bxl-facebook"></i></a>
                                                <a href="#" class="instagram"><i class="bx bxl-instagram"></i></a>
                                                <a href="#" class="google-plus"><i class="bx bxl-skype"></i></a>
                                                <a href="#" class="linkedin"><i class="bx bxl-linkedin"></i></a>
                                            </div>
                                    </center>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>

            <div class="container footer-bottom clearfix">
                <div class="copyright">
                    &copy; Copyright <strong><span>Diky</span></strong>. All Rights Reserved
                </div>
            </div>
        </footer><!-- End Footer -->

        <div id="preloader"></div>
        <a href="#" class="back-to-top d-flex align-items-center justify-content-center"><i
                class="bi bi-arrow-up-short"></i></a>
    @endsection
