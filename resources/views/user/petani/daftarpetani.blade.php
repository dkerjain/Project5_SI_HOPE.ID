@extends('layout.user.index')
@section('title', 'Register Petani Mitra')
@section('content')
<section class="kahfibwa mt-5">
    <div class="container">
        <div class="row">
            <div class="col-md-12">
                <div class="card">
                    <div class="card-header">Silahkan mengisi data perusahaan Anda pada kolom yang tertera
                        <a href="/dashboard" type="button" class="close" aria-label="Close">
                            <span aria-hidden="true">&times;</span>
                        </a>
                    </div>
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
                        <label for="" style="color:grey">Field dengan tanda * harus diisi</label>

                        <form action="/petanibaru" method="post">
                            {{csrf_field()}}
                            <div class="form-group">
                                <div class="row form-group">
                                    <div class="col-md-6">
                                        <label for="exampleFormControlInput1">Nama Pemilik Perusahaan (Sesuai KTP)*</label>
                                        @if($petani)
                                        <input type="text" class="form-control" name="nama_petani" placeholder="" value="{{$petani->nama_petani}}">
                                        @else
                                        <input type="text" class="form-control" name="nama_petani" placeholder="" required>
                                        <!-- /.inputan nama customer -->
                                        @endif
                                    </div>

                                    <div class="col-md-6">
                                        <label for="exampleFormControlInput1">Nama Perusahaan*</label>
                                        @if($petani)
                                        <input type="text" class="form-control" name="nama_perusahaan" placeholder="" value="{{$petani->nama_perusahaan}}">
                                        @else
                                        <input type="text" class="form-control" name="nama_petani" placeholder="" required>
                                        <!-- /.inputan nama perusahaan-->
                                        @endif
                                    </div>
                                </div>
                            </div>

                            <div class="row form-group">
                                <div class="col-md-6">
                                    <label for="exampleFormControlInput1" style="color:grey">Email*</label>

                                    <input type="text" class="form-control" name="email" value="{{Auth::user()->EMAIL}}" readonly>

                                </div>
                                <div class="col-md-6">
                                    <label for="exampleFormControlInput1">Nomor Telp. Perusahaan*</label>
                                    @if($petani)
                                    <input type="text" class="form-control" name="nomorhp" placeholder="" value="{{$customer->nomorhp}}">
                                    @else
                                    <input type="number" class="form-control" name="nomorhp" placeholder="" required>
                                    <!-- /.inputan nomorhp -->
                                    @endif
                                </div>
                            </div>

                            <div class="row form-group">
                                <div class="col-md-6">
                                    <label for="exampleFormControlInput1">Alamat Perusahaan*</label>
                                    @if($petani)
                                    <input type="text" class="form-control" name="alamat" placeholder="" value="{{$customer->alamat}}">
                                    @else
                                    <input type="text" class="form-control" name="alamat" required>
                                    <!-- /.inputan nomorhp -->
                                    @endif
                                </div>
                                <div class="col-md-6">
                                    <label for="exampleFormControlInput1">Provinsi*</label>
                                    <select class="form-control select-component select-provinsi" id="" name="provinsi" required>
                                        <option>Pilih Provinsi ...</option>
                                    </select>
                                </div>
                            </div>

                            <div class="row form-group">
                                <div class="col-md-4">
                                    <label for="namakota">Kota*</label>
                                    <select class="form-control select-component select-kota" id="kota" name="kota" required>
                                        <option>Pilih Kota ...</option>
                                    </select>
                                </div>
                                <div class="col-md-4">
                                    <label for="namakecamatan">Kecamatan*</label>
                                    <select class="form-control select select-kecamatan" id="kecamatan" name="kecamatan" required>
                                        <option>Pilih Kecamatan ...</option>
                                    </select>
                                </div>
                                <div class="col-md-4">
                                    <label for="namakelurahan">Kelurahan*</label>
                                    <select class="form-control select select-kelurahan" id="kelurahan" name="kelurahan" required>
                                        <option>Pilih Kelurahan ...</option>
                                    </select>
                                </div>
                            </div>

                            <div class="row form-group">
                                <div class="col-md-4">
                                    <label for="exampleFormControlInput1">Latitude</label>
                                    <input type="text" class="form-control" id="latitude" name="latitude" placeholder="Letak Latitude Anda" readonly>
                                </div>

                                <div class="col-md-4">
                                    <label for="exampleFormControlInput1">Longitude</label>
                                    <input type="text" class="form-control" id="longitude" name="longitude" placeholder="Letak Longitude Anda" readonly>
                                </div>

                                <div class="col-md-4">
                                    <label for="exampleFormControlInput1">Accuracy</label>
                                    <input type="text" class="form-control" id="accuracy" name="accuracy" placeholder="Akurasi Jarak" readonly>
                                </div>
                            </div>

                            <div class="form-actions form-group">
                                <button type="button" class="btn btn-secondary btn-block btn-xl" onclick="getLocation()">Lokasi Anda</button>
                                <button type="submit" class="btn btn-success btn-block btn-xl">Simpan</button>
                            </div>
                        </form>

                    </div>

                </div>
            </div>
        </div>
    </div>
</section>
@endsection