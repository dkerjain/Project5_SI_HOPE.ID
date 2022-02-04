@extends('layout.user.index')
@section('title', 'Login')
@section('content')
<section class="kahfibwa mt-5">
    <div class="container">
        <div class="row">
            <div class="col-2"></div>
            <div class="col-md-12">
                <div class="card mb-3">

                    <form action="/applyproposalbaru" method="post" enctype="multipart/form-data">
                    {{csrf_field()}}
                    <div class="row justify-content-center">

                        
                        <div class="col-8">
                            <div class="card-body card-block">
                                <!-- function alert create action -->
                            @if(session('alert'))
                            <div class="alert alert-success" role="alert">
                                {{session('alert')}}
                                    <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                                        <span aria-hidden="true">&times;</span>
                                    </button>
                            </div>
                            @endif
                            <!-- function alert delete action -->
                            @if(session('alert_danger'))
                            <div class="alert alert-danger" role="alert">
                                {{session('alert_danger')}}
                                    <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                                        <span aria-hidden="true">&times;</span>
                                    </button>
                            </div>
                            @endif
                            <!-- function alert edit action -->
                            @if(session('alert_primary'))
                            <div class="alert alert-primary" role="alert">
                                {{session('alert_primary')}}
                                    <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                                        <span aria-hidden="true">&times;</span>
                                    </button>
                            </div>
                            @endif
                                    <div class="form-group">
                                        <label>Nama proyek</label>
                                        <input name="namaProyek" type="text" class="form-control" placeholder="Nama Proyek">
                                    </div>
                                    <div class="form-group">
                                        <label>Jumlah Kebutuhan</label>
                                        <input name="jumlahKebutuhan" type="number" class="form-control" placeholder="Jumlah Kebutuhan">
                                    </div>
                                    <div class="form-group">
                                        <label>Periode Kontrak *dalam satuan bulan</label>
                                        <input name="periode" type="number" class="form-control" placeholder="Periode">
                                    </div>
                                    <div class="form-group">
                                        <label>Persentase Profit</label>
                                        <input name="profit" type="number" class="form-control" placeholder="Persentase Profit">
                                    </div>
                                    <div class="form-group">
                                        <label>Jenis Investasi</label>
                                        <input name="jenis" type="text" class="form-control" placeholder="Jenis Investasi">
                                    </div>
                                    <div class="form-group">
                                        <label>Detail Proyek</label>
                                        <textarea name="detail" type="text" class="form-control" placeholder="Detail Proyek"></textarea>
                                    </div>
                            </div>                        
                        </div>

                        <div class="col-4">
                            <label class="mt-4">
                                <div id="output"  style="width: 327px; height:362px; border: solid 1px;"></div>
                                <input class="form-control" type="file" id="inputFoto2" name="inputFoto2" hidden>
                                <center><input type="file" class="input-file btn btn-success mt-2" id="inputFoto" name="inputFoto" accept="image/png, image/jpg, image/jpeg"></center>
                            </label>
                        </div>
                    </div>

                    <div class="row justify-content-center">                     
                        <div class="col-8">
                            <div class="card-body card-block">
                                <div class="register-link m-t-15 text-center">
                                    <button type="submit" class="btn btn-success btn-block">Ajukan</button>
                                </div>
                            </div>                        
                        </div>
                        <div class="col-4"></div>
                    </div>

                    </form>
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



<script>
    inputFoto.onchange = evt => {
        const [file] = inputFoto.files
        if (file) {
            src = URL.createObjectURL(file)

            document.getElementById('output').innerHTML = 
            '<img src="'+src+'" id="hasil" style="width: 325px; height:360px;"/>';
            
            var hasil = $('#hasil').attr('src');
            $('#inputFoto2').val(hasil);
        }
    }
</script>
@endsection