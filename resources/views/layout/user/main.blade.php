<!DOCTYPE html>
<html lang="en">
    <head>
        <meta charset="utf-8" />
        <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no" />
        <meta name="description" content="" />
        <meta name="author" content="" />
        <title>Hope.id</title>
        <!-- Favicon-->
        <link rel="icon" type="image/x-icon" href="assets/img/PAKCOY.png" />
        <!-- Font Awesome icons (free version)-->
        <script src="https://use.fontawesome.com/releases/v5.15.3/js/all.js" crossorigin="anonymous"></script>
        <!-- Google fonts-->
        <link href="https://fonts.googleapis.com/css?family=Montserrat:400,700" rel="stylesheet" type="text/css" />
        <link href="https://fonts.googleapis.com/css?family=Roboto+Slab:400,100,300,700" rel="stylesheet" type="text/css" />
        <!-- Core theme CSS (includes Bootstrap)-->
        <link href="css/style_bs2.css" rel="stylesheet" />
        @yield('extracss')
    </head>
    <body id="page-top">
        <!-- Navigation-->
        <nav class="navbar navbar-expand-lg navbar-dark fixed-top" id="mainNav">
            <div class="container">
                <a class="navbar-brand" href="#page-top">
                    <img src="assets/img/logo_hope_white.png" style="height: 10%; width: 20%" alt="..." /></a>
                <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarResponsive" aria-controls="navbarResponsive" aria-expanded="false" aria-label="Toggle navigation">
                    Menu
                    <i class="fas fa-bars ms-1"></i>
                </button>
                <div class="collapse navbar-collapse"  id="navbarResponsive">
                    <ul class="navbar-nav text-uppercase ms-auto py-4 py-lg-0">
                        <li class="nav-item"><a class="nav-link"href="#!">Mulai Investasi</a></li>
                        <li class="nav-item"><a class="nav-link" href="#!">Jadi Mitra</a></li>
                        <li class="nav-item"><a class="nav-link" href="#!">Tentang Kami</a></li>
                        <li class="nav-item"><a class="nav-link" href="#!">Akun Saya</a></li>
                    </ul>
                </div>
            </div>
        </nav>
        <!-- Header-->
        <header class="masthead">
            <div class="container">
                <div class="masthead-subheading">Selamat Datang di Hope.id!</div>
                <div class="masthead-heading text-uppercase">Platform Investasi Pertanian Hidroponik Pertama di Indonesia</div>
                <p class="lead text-white-50 mb-4">
                    <strong>Hope.id</strong> merupakan platform berbasis investasi syariah <strong>pertama di Indonesia</strong>, yang memfasilitasi investasi <strong>pertanian hidroponik</strong>
                             Hope.id Menghubungkan petani dengan investor secara langsung untuk menciptakan ruang untuk pertumbuhan ekonomi Indonesia. 
                </p>            
                <a class="btn btn-secondary btn-sm text-uppercase" href="#services">Daftar</a>
                <a class="btn btn-success btn-sm text-uppercase" href="#services">Masuk</a>
            </div>
        </header>
        <!-- Produk Kami-->
        <section class="page-section bg-hope-green" id="services">
            <div class="container">
                <div class="text-center">
                    <h2 class="section-heading text-uppercase">Produk Kami</h2>
                    <h3 class="section-subheading text-white">Produk Unggulan Hope.id</h3>
                </div>
                <div class="row text-center">
                    <div class="col-md-4">
                        <div class="team-member">
                            <a href="#">
                                <img class="mx-auto rounded-circle" src="assets/img/logo-edhope.png" alt="..." />
                            </a>
                        </div>
                        <h4 class="my-3">edHope</h4>
                        <p class="text-white">    
                            Pelatihan dan konsultasi seputar pertanian hidoponik bersama mitra ahli Kami yang tersebar di seluruh Indonesia.
                        </p>
                    </div>
                    <div class="col-md-4">
                        <div class="team-member">
                            <a href="#">
                                <img class="mx-auto rounded-circle" src="assets/img/logo-hopeinvest.png" alt="..." />
                            </a>
                        </div>
                        <h4 class="my-3">Hope Invest</h4>
                        <p class="text-white">
                            Investasikan dana Anda kepada mitra petani terbaik Kami yang tersebar di seluruh Indonesia.
                        </p>
                    </div>
                    <div class="col-md-4">
                        <div class="team-member">
                            <a href="#">
                                <img class="mx-auto rounded-circle" src="assets/img/logo-hopemarket.png" alt="..." />
                            </a>
                        </div>
                        <h4 class="my-3">Hope Market</h4>
                        <p class="text-white">
                            Kebutuhan pertanian dan produk hidroponik terbaik dari toko mitra Kami yang tersebar di seluruh Indonesia.
                        </p>
                    </div>
                </div>
            </div>
        </section>
        <!-- Portfolio Grid-->
        <section class="page-section bg-hope-green" id="portfolio">
            @yield('content')
        </section>
        <!-- Team-->
        <section class="page-section bg-light" id="team">
            <div class="container">
                <div class="text-center">
                    <h2 class="section-heading text-uppercase">Tim Hope.id</h2>
                </div>
                <div class="row">
                    <div class="col-lg-4">
                        <div class="team-member">
                            <img class="mx-auto rounded-circle" src="assets/img/team/1.jpg" alt="..." />
                            <h4>Fardan Syahrul H</h4>
                            <p class="text-muted">Chief Executive Officer</p>
                        </div>
                    </div>
                    <div class="col-lg-4">
                        <div class="team-member">
                            <img class="mx-auto rounded-circle" src="assets/img/team/2.jpg" alt="..." />
                            <h4>Alief Ramadhani K</h4>
                            <p class="text-muted">Chief Marketing Officer</p>
                        </div>
                    </div>
                    <div class="col-lg-4">
                        <div class="team-member">
                            <img class="mx-auto rounded-circle" src="assets/img/team/3.jpg" alt="..." />
                            <h4>Yudhi Rangga A</h4>
                            <p class="text-muted">Chief Operational Officer</p>
                        </div>
                    </div>
                </div>
            </div>
        </section>
        <!-- Footer-->
        <footer class="footer py-4">
            <div class="container">
                <div class="row align-items-center">
                    <div class="col-lg-4 text-lg-start">Copyright &copy; Hope.id All Rights Reserved 2021</div>
                    <div class="col-lg-4 my-3 my-lg-0">
                        <a class="btn btn-dark btn-social mx-2" href="#!"><i class="fab fa-instagram"></i></a>
                        <a class="btn btn-dark btn-social mx-2" href="#!"><i class="fab fa-twitter"></i></a>
                        <a class="btn btn-dark btn-social mx-2" href="#!"><i class="fab fa-facebook-f"></i></a>
                    </div>
                    <div class="col-lg-4 text-lg-end">
                        <a class="link-dark text-decoration-none me-3" href="#!">Privacy Policy</a>
                        <a class="link-dark text-decoration-none" href="#!">Terms of Use</a>
                    </div>
                </div>
            </div>
        </footer>
        <!-- Portfolio Modals-->
        <div class="portfolio-modal modal fade" id="portfolioModal1" tabindex="-1" role="dialog" aria-hidden="true">
            <div class="modal-dialog">
                <div class="modal-content d-block w-100">
                    <div class="close-modal" data-bs-dismiss="modal">
                        <i class="fas fa-times me-1"></i>
                    </div>
                    <div class="container">
                        <div class="row justify-content-center">
                            <div class="col-md-8">
                                <div class="modal-body">
                                    
                                <img class="img-fluid-modal d-block mx-auto" src="assets/img/selada.png" alt="..." />
                                    <p class="item-intro text-dark">Nama Program
                                        <br>Dana yang dibutuhkan : Rp. 20.000.000
                                    </p>
                                    <ul class="list-inline">

                                        <li>
                                            <strong>Akad :</strong>
                                            Mudharabbah
                                        </li>
                                        <li>
                                            <strong>Tingkat Resiko :</strong>
                                            Rendah
                                        </li>
                                        <li>
                                            <strong>Estimasi Profit :</strong>
                                            5-10%
                                        </li>
                                        <li>
                                            <strong>Minimum Invest :</strong>
                                            Rp. 2.000.000.,
                                        </li>
                                    </ul>
                                    <a class="btn btn-success btn-xl text-uppercase" href="{{url('/user/pembayaran')}}">
                                        Invest Sekarang
                                    </a>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <!-- Bootstrap core JS-->
        <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.1/dist/js/bootstrap.bundle.min.js"></script>
        <!-- Core theme JS-->
        <script src="/js/scripts.js"></script>
        <!-- * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * *-->
        <!-- * *                               SB Forms JS                               * *-->
        <!-- * * Activate your form at https://startbootstrap.com/solution/contact-forms * *-->
        <!-- * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * *-->
        <script src="https://cdn.startbootstrap.com/sb-forms-latest.js"></script>
        <!-- // Activate Carousel -->
        <script>
            $("#myCarousel").carousel();
            // Enable Carousel Indicators
            $(".item").click(function(){
            $("#myCarousel").carousel(1);
            });

            // Enable Carousel Controls
            $(".left").click(function(){
            $("#myCarousel").carousel("prev");
            });
        </script>
        @yield('extrascript')
    </body>
</html>