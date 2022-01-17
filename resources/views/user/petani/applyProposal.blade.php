@extends('layout.user.index')
@section('title', 'Login')
@section('content')
<section class="kahfibwa mt-5">
    <div class="container">
        <div class="row">
            <div class="col-2"></div>
            <div class="col-md-12">
                <div class="card mb-3">

                    <div class="row">

                        
                    <div class="col-8">
                            <div class="card-body card-block">
                                <form action="/" method="post">
                                    {{csrf_field()}}
                                    <div class="form-group">
                                        <label>Nama proyek</label>
                                        <input name="namaProyek" type="text" class="form-control" placeholder="Nama Proyek">
                                    </div>
                                    <div class="form-group">
                                        <label>Jumlah Kebutuhan</label>
                                        <input name="jumlahKebutuhan" type="number" class="form-control" placeholder="Jumlah Kebutuhan">
                                    </div>
                                    <div class="form-group">
                                        <label>Periode Kontrak</label>
                                        <input name="periode" type="text" class="form-control" placeholder="Periode">
                                    </div>
                                    <div class="form-group">
                                        <label>Jumlah Pengembalian</label>
                                        <input name="jumlahPengembalian" type="number" class="form-control" placeholder="Jumlah Pengembalian">
                                    </div>
                                    <div class="form-group">
                                        <label>Jenis Investasi</label>
                                        <input name="jenis" type="text" class="form-control" placeholder="Jenis Investasi">
                                    </div>

                                    <div class="register-link m-t-15 text-center">
                                        <button type="submit" class="btn btn-success btn-block">Ajukan</button>
                                    </div>
                                </form>
                            </div>                        
                        </div>

                        <div class="col-4">
                        <img class="p-2 pt-2 mb-4" width="100%" height="360" src="" id="img" name="img">
                        <center><input type="file" class="btn btn-success" value="Upload Profile Proyek"></center>
                        </div>

                    </div>

                    
                </div>

                
                <section class="mt-5" id="proyek">
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-sm-9 text-center proyek border-bottom">
                <h1>Proyek Pembiayaan Anda</h1>                    
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
                            <h5 class="cl-hijau">Pemasaran hasil panen</h5>
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
                            <h5 class="cl-hijau">Pemasaran hasil panen</h5>
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
                            <h5 class="cl-hijau">Pemasaran hasil panen</h5>
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
            </div>
            <div class="col-2"></div>
        </div>
    </div>
</section>

@endsection