@extends('layout.user.index')
@section('title', 'Lengkapi Dokumen')
@section('content')
<section class="kahfibwa mt-5">
    <div class="container">
    <div class="row">
        <div class="col-md-12">
            <div class="card">
                <div class="card-header">Silahkan mengisi data diri Anda pada kolom yang tertera
                    <a href="/dashboard" type="button" class="close"  aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </a>
                </div>
                    <div class="card-body card-block">
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
                        <form action="/dokumenbaru" method="post" enctype="multipart/form-data">
                            {{csrf_field()}}
                            @method('patch')
                            <div class="row form-group">
                                <div class="col-md-8">
                                    <label for="exampleFormControlInput1">Foto KTP*</label>
                                    @if($customer)
                                    <input type="file" class="form-control-file border" accept="image/*" name="fotoktp" value="{{$customer->fotoktp}}">

                                    @else
                                    <input type="file" class="form-control-file border" accept="image/*" name="fotoktp" required>
                                    @endif
                                </div>
                            </div>
                            <!-- <div class="row form-group">
                                <div class="col-md-8">
                                    <label for="exampleFormControlInput1">Foto Selfie dengan KTP*</label>
                                    <button type="button" class="btn btn-secondary btn-sm ambil-gambar" id="ambil-gambar" style="float : right" data-toggle="modal" data-target="#modalKTP_selfie">Ambil Gambar</button>
                                </div>
                            </div> -->
                            <div class="row form-group">
                                <div class="col-md-8">
                                    <label for="exampleFormControlInput1">Foto Selfie dengan KTP*</label>
                                    <img src="{{asset('img/fotoktp.jpg')}}" alt="" style="width : 640px; height: 320px"><br>
                                    @if($customer)
                                    <input type="file" class="form-control-file border mt-2" accept="image/*" name="selfiektp" required>
                                    @else
                                    <input type="file" class="form-control-file border mt-2" accept="image/*" name="selfiektp" value="{{$customer->selfiektp}}">
                                    @endif
                                </div>
                            </div>
                            <div class="row form-group">
                                <div class="col-md-8">
                                    <label for="exampleFormControlInput1">Foto NPWP*</label>
                                    @if($customer)
                                    <input type="file" class="form-control-file border" accept="image/*" name="fotonpwp" value="{{$customer->fotonpwp}}">
                                    @else
                                    <input type="file" class="form-control-file border" accept="image/*" name="fotonpwp">
                                    @endif
                                </div>
                            </div>
                            <div class="form-actions form-group">
                                    <button type="submit" class="btn btn-success btn-block btn-xl" style="float : right">Simpan</button>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div></div>
</section>
        
@endsection