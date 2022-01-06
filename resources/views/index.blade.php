<!DOCTYPE html>
<html lang="en">
    <head>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <title>Hope.id</title>
        <link rel="stylesheet" href="css/style.css">
        <link rel="shortcut icon" href="assets/img/PAKCOY.png" type="imager/x-icon">
        <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.3/css/all.min.css">
        @yield('extracss')
        <link rel="stylesheet" href="assets/css/lib/datatable/dataTables.bootstrap.min.css">
        <link href='https://fonts.googleapis.com/css?family=Open+Sans:400,600,700,800' rel='stylesheet' type='text/css'>
        <!-- <link rel="stylesheet" href="bootstrap4/css/bootstrap.min.css">
        <link rel="stylesheet" href="fontawesome/css/all.min.css"> -->
    </head>
    <body>
        <div class="medsos">
            <div class="container">
                <ul>
                    <li><a href="#"><i class="fab fa-facebook"></i></a></li>
                    <li><a href="#"><i class="fab fa-twitter"></i></a></li>
                    <li><a href="#"><i class="fab fa-instagram"></i></a></li>
                </ul>
            </div>
        </div>
        <header>
            <div class="container">
                <a href="#"><img src="assets/img/logo_hope.png" 
                alt="" srcset="" height="41px"></a>
                <ul>
                    <li><a href="#" class="active">Mulai Investasi</a></li>
                    <li><a href="#">Jadi Mitra</a></li>
                    <li><a href="#">About</a></li>
                    <li><a href="#">Masuk</a></li>
                    <li><a href="#">Daftar</a></li>
                </ul>
            </div>
        </header>
        
        <section class="banner">
            <h2><a href="">Mulai Investasi Sekarang</h2>
        </section>
<!-- 
        <section class="investasi">
            <h3>Proyek Tersedia</h3><br>
            @yield('content')
            <div class="content">
                <div class="row">
                    <div class="col-md-12">
                        <div class="card">
                            <div class="card-body">
                                <table id="bootstrap-data-table" class="table table-striped table-bordered">
                                    <thead>
                                        <tr>
                                            <th>Nama Program</th>
                                            <th>Dana yang dibutuhkan</th>
                                            <th>Tingkat Resiko</th>
                                            <tr>
                                                <th>Akad</th>
                                            </tr>
                                            <th>Estimasi Profit</th>
                                            <tr>
                                                <th>Periode Kontrak</th>
                                            </tr>
                                            <th>Dana Terkumpul</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        <tr>
                                            <td></th>
                                            <td>Rp. 300.000</td>
                                            <td>Rendah</td>
                                            <tr>
                                                <td>Mudharabbah</td>
                                            </tr>
                                            <td>5-8%</td>
                                            <tr>
                                                <td>3 Bulan</td>                    </tr>
                                            <td>0%</td>
                                        </tr>
                                    </tbody>
                                </table>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </section> -->

        <!-- <section class="kalkulator">

        </section> -->

        <section class="about">
            <div class="container">
                <h3>About</h3>
                <p>
                    <strong>Hope.id</strong> merupakan platform berbasis website yang memfasilitasi <strong>jual-beli, investasi, dan edukasi</strong>
                    yang berfokus pada komoditas pertanian hidroponik. Hope.id Menghubungkan penjual dengan pembeli,
                    petani dengan investor serta siapapun yang tertarik belajar teknik pertanian hidroponik dengan ahlinya. 
                </p>
            </div>
        </section>

        <section class="product">
            <div class="container">
                <h3>Products</h3>
                <div class="box">
                    <div class="col-4">
                        <div class="icon">
                            <h4>Hope Market</h4>
                        </div>
                    </div>
                </div>
            </div>
        </section>

        <section class="footer">

        </section>

    </body>
    @yield('extrascript')
</html>
