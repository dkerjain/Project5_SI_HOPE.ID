@extends('layout.user.index')
@section('title', 'Dashboard')
@section('content')
<section class="kahfibwa mt-5">
    <div class="container">
        <img src="vendor/images/header-back.jpg" class="img-fluid" alt="GambarHomePage">
    </div>
</section>

<section class="mt-5" id="proyek">
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-sm-9 text-center proyek border-bottom">
                <h1>Proyek Pembiayaan yang Tersedia</h1>                    
            </div>
        </div>
        <div  class="row my-5 px-4" >
            <div class="row">
                <!-- Item -->
                <div class="col-md-4 mb-5">
                    
                        <div class="bg-white rounded shadow">
                            <a href="#" data-toggle="lightbox">
                                <img src="vendor/images/7185.jpg" alt="" class="img-fluid card-img-top galeri px-2 py-2">                    
                            </a>
                            <div class="p-4">
                                <!-- Jika Ingin Menambah Judul dan Caption Gambar -->
                                <!-- Direct Ke halaman Detail Investasi -->
                                <a href="/applyInvestasi">
                                    <h5 class="cl-hijau">Pemasaran hasil panen</h5>
                                </a>
                                <p class="small text-muted mb-2">Dana yang Dibutuhkan :</p>
                                <h5 class="text-black border-bottom pb-2">Rp. 300.000</h5>
                                <div class="row">
                                    <div class="col-6">
                                        <p class="text-black mb-0">Tingkat Resiko</p>
                                        <p class="cl-hijau">Rendah</p>
                                    </div>
                                    <div class="col-6">
                                        <p class="text-black mb-0">Akad</p>
                                        <p class="cl-hijau">Mudharabah</p>
                                    </div>
                                </div>
                                <div class="row">
                                    <div class="col-6">
                                        <p class="text-black mb-0">Estimasi Profit</p>
                                        <p class="cl-hijau">8% - 20%</p>
                                    </div>
                                    <div class="col-6">
                                        <p class="text-black mb-0">Periode Kontrak</p>
                                        <p class="cl-hijau">4 Minggu</p>
                                    </div>
                                </div>
                                <div class="row">
                                    <div class="col-6">
                                        <h5 class="text-black" style="font-size: 16px !important">Dana Terkumpul :</h5>
                                    </div>
                                    <div class="col-6">
                                        <p class="cl-hijau text-right mb-0">0/100%</p>
                                    </div>
                                </div>
                            </div>
                        </div>
                </div>
                <div class="col-md-4 mb-5">
                    <div class="bg-white rounded shadow">
                        <a href="#" data-toggle="lightbox">
                            <img src="vendor/images/7185.jpg" alt="" class="img-fluid card-img-top galeri px-2 py-2">                    
                        </a>
                        <div class="p-4">
                            <!-- Jika Ingin Menambah Judul dan Caption Gambar -->
                                <!-- Direct Ke halaman Detail Investasi -->
                                <a href="/applyInvestasi">
                                    <h5 class="cl-hijau">Pemasaran hasil panen</h5>
                                </a>
                            <p class="small text-muted mb-2">Dana yang Dibutuhkan :</p>
                            <h5 class="text-black border-bottom pb-2">Rp. 300.000</h5>
                            <div class="row">
                                <div class="col-6">
                                    <p class="text-black mb-0">Tingkat Resiko</p>
                                    <p class="cl-hijau">Rendah</p>
                                </div>
                                <div class="col-6">
                                    <p class="text-black mb-0">Akad</p>
                                    <p class="cl-hijau">Mudharabah</p>
                                </div>
                            </div>
                            <div class="row">
                                <div class="col-6">
                                    <p class="text-black mb-0">Estimasi Profit</p>
                                    <p class="cl-hijau">8% - 20%</p>
                                </div>
                                <div class="col-6">
                                    <p class="text-black mb-0">Periode Kontrak</p>
                                    <p class="cl-hijau">4 Minggu</p>
                                </div>
                            </div>
                            <div class="row">
                                <div class="col-6">
                                    <h5 class="text-black" style="font-size: 16px !important">Dana Terkumpul :</h5>
                                </div>
                                <div class="col-6">
                                    <p class="cl-hijau text-right mb-0">0/100%</p>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="col-md-4 mb-5">
                    <div class="bg-white rounded shadow">
                        <a href="#" data-toggle="lightbox">
                            <img src="vendor/images/7185.jpg" alt="" class="img-fluid card-img-top galeri px-2 py-2">                    
                        </a>
                        <div class="p-4">
                            <!-- Jika Ingin Menambah Judul dan Caption Gambar -->
                                <!-- Direct Ke halaman Detail Investasi -->
                                <a href="/applyInvestasi">
                                    <h5 class="cl-hijau">Pemasaran hasil panen</h5>
                                </a>
                            <p class="small text-muted mb-2">Dana yang Dibutuhkan :</p>
                            <h5 class="text-black border-bottom pb-2">Rp. 300.000</h5>
                            <div class="row">
                                <div class="col-6">
                                    <p class="text-black mb-0">Tingkat Resiko</p>
                                    <p class="cl-hijau">Rendah</p>
                                </div>
                                <div class="col-6">
                                    <p class="text-black mb-0">Akad</p>
                                    <p class="cl-hijau">Mudharabah</p>
                                </div>
                            </div>
                            <div class="row">
                                <div class="col-6">
                                    <p class="text-black mb-0">Estimasi Profit</p>
                                    <p class="cl-hijau">8% - 20%</p>
                                </div>
                                <div class="col-6">
                                    <p class="text-black mb-0">Periode Kontrak</p>
                                    <p class="cl-hijau">4 Minggu</p>
                                </div>
                            </div>
                            <div class="row">
                                <div class="col-6">
                                    <h5 class="text-black" style="font-size: 16px !important">Dana Terkumpul :</h5>
                                </div>
                                <div class="col-6">
                                    <p class="cl-hijau text-right mb-0">0/100%</p>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="col-md-4 mb-5">
                    <div class="bg-white rounded shadow">
                        <a href="#" data-toggle="lightbox">
                            <img src="vendor/images/7185.jpg" alt="" class="img-fluid card-img-top galeri px-2 py-2">                    
                        </a>
                        <div class="p-4">
                            <!-- Jika Ingin Menambah Judul dan Caption Gambar -->
                                <!-- Direct Ke halaman Detail Investasi -->
                                <a href="/applyInvestasi">
                                    <h5 class="cl-hijau">Pemasaran hasil panen</h5>
                                </a>
                            <p class="small text-muted mb-2">Dana yang Dibutuhkan :</p>
                            <h5 class="text-black border-bottom pb-2">Rp. 300.000</h5>
                            <div class="row">
                                <div class="col-6">
                                    <p class="text-black mb-0">Tingkat Resiko</p>
                                    <p class="cl-hijau">Rendah</p>
                                </div>
                                <div class="col-6">
                                    <p class="text-black mb-0">Akad</p>
                                    <p class="cl-hijau">Mudharabah</p>
                                </div>
                            </div>
                            <div class="row">
                                <div class="col-6">
                                    <p class="text-black mb-0">Estimasi Profit</p>
                                    <p class="cl-hijau">8% - 20%</p>
                                </div>
                                <div class="col-6">
                                    <p class="text-black mb-0">Periode Kontrak</p>
                                    <p class="cl-hijau">4 Minggu</p>
                                </div>
                            </div>
                            <div class="row">
                                <div class="col-6">
                                    <h5 class="text-black" style="font-size: 16px !important">Dana Terkumpul :</h5>
                                </div>
                                <div class="col-6">
                                    <p class="cl-hijau text-right mb-0">0/100%</p>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="col-md-4 mb-5">
                    <div class="bg-white rounded shadow">
                        <a href="#" data-toggle="lightbox">
                            <img src="vendor/images/7185.jpg" alt="" class="img-fluid card-img-top galeri px-2 py-2">                    
                        </a>
                        <div class="p-4">
                            <!-- Jika Ingin Menambah Judul dan Caption Gambar -->
                                <!-- Direct Ke halaman Detail Investasi -->
                                <a href="/applyInvestasi">
                                    <h5 class="cl-hijau">Pemasaran hasil panen</h5>
                                </a>
                            <p class="small text-muted mb-2">Dana yang Dibutuhkan :</p>
                            <h5 class="text-black border-bottom pb-2">Rp. 300.000</h5>
                            <div class="row">
                                <div class="col-6">
                                    <p class="text-black mb-0">Tingkat Resiko</p>
                                    <p class="cl-hijau">Rendah</p>
                                </div>
                                <div class="col-6">
                                    <p class="text-black mb-0">Akad</p>
                                    <p class="cl-hijau">Mudharabah</p>
                                </div>
                            </div>
                            <div class="row">
                                <div class="col-6">
                                    <p class="text-black mb-0">Estimasi Profit</p>
                                    <p class="cl-hijau">8% - 20%</p>
                                </div>
                                <div class="col-6">
                                    <p class="text-black mb-0">Periode Kontrak</p>
                                    <p class="cl-hijau">4 Minggu</p>
                                </div>
                            </div>
                            <div class="row">
                                <div class="col-6">
                                    <h5 class="text-black" style="font-size: 16px !important">Dana Terkumpul :</h5>
                                </div>
                                <div class="col-6">
                                    <p class="cl-hijau text-right mb-0">0/100%</p>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="col-md-4 mb-5">
                    <div class="bg-white rounded shadow">
                        <a href="#" data-toggle="lightbox">
                            <img src="vendor/images/7185.jpg" alt="" class="img-fluid card-img-top galeri px-2 py-2">                    
                        </a>
                        <div class="p-4">
                            <!-- Jika Ingin Menambah Judul dan Caption Gambar -->
                                <!-- Direct Ke halaman Detail Investasi -->
                                <a href="/applyInvestasi">
                                    <h5 class="cl-hijau">Pemasaran hasil panen</h5>
                                </a>
                            <p class="small text-muted mb-2">Dana yang Dibutuhkan :</p>
                            <h5 class="text-black border-bottom pb-2">Rp. 300.000</h5>
                            <div class="row">
                                <div class="col-6">
                                    <p class="text-black mb-0">Tingkat Resiko</p>
                                    <p class="cl-hijau">Rendah</p>
                                </div>
                                <div class="col-6">
                                    <p class="text-black mb-0">Akad</p>
                                    <p class="cl-hijau">Mudharabah</p>
                                </div>
                            </div>
                            <div class="row">
                                <div class="col-6">
                                    <p class="text-black mb-0">Estimasi Profit</p>
                                    <p class="cl-hijau">8% - 20%</p>
                                </div>
                                <div class="col-6">
                                    <p class="text-black mb-0">Periode Kontrak</p>
                                    <p class="cl-hijau">4 Minggu</p>
                                </div>
                            </div>
                            <div class="row">
                                <div class="col-6">
                                    <h5 class="text-black" style="font-size: 16px !important">Dana Terkumpul :</h5>
                                </div>
                                <div class="col-6">
                                    <p class="cl-hijau text-right mb-0">0/100%</p>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <!-- End -->
            </div>    
        </div>
    </div>
</section>

@endsection

@section('script')

@endsection 
    