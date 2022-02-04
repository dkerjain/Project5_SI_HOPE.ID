@extends('layout.user.index')
@section('title', 'Login')
@section('content')
<section class="kahfibwa mt-5">
    <div class="container">
        <div class="row">
            <div class="col-2"></div>
            <div class="col-md-12">
            @foreach($petani as $p)
            @if($p->STATUS == '1')
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
            @else
            <div class="card mb-3">
                <div class="row justify-content-center">
                    <div class="alert alert-danger" role="alert">
                        Maaf, Anda belum bisa mengajukan proposal. Akun Anda masih dalam proses verifikasi.
                            <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                                <span aria-hidden="true">&times;</span>
                            </button>
                    </div>
                </div>
            </div>
            @endif
            @endforeach

                                
                
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