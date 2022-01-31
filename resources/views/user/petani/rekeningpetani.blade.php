@extends('layout.user.index')
@section('title', 'Informasi Rekening')
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
                        
                        <form action="/rekeningbarupetani" method="post">
                            {{csrf_field()}}   
                            @foreach($petani as $p)
                            @if($p->ID_BANK == null )
                            <div class="row form-group">
                                <div class="col-md-6">
                                    <label for="exampleFormControlInput1">Nama Bank*</label>
                                    <select name="bank" class="form-control">
                                        <option>Pilih Bank ...</option>
                                        @foreach ($bank as $b)
                                        <option value="{{$b->ID_BANK}}">{{$b->NAMA_BANK}}</option>
                                        @endforeach
                                    </select>
                                </div>
                            </div>

                            <div class="row form-group">
                                <div class="col-md-6">
                                    <label for="exampleFormControlInput1">Nomor Rekening*</label>
                                        <input type="text" class="form-control" name="nomorrekening"
                                            placeholder="" required>
                                </div>
                            </div>
                            @else
                            <div class="row form-group">
                                <div class="col-md-6">
                                    <label for="exampleFormControlInput1">Nama Bank*</label>
                                    <select name="bank" class="form-control">
                                        <option>Pilih Bank ...</option>
                                        @foreach ($bank as $b)
                                        <option value="{{$b->ID_BANK}}" @if($p->ID_BANK == $b->ID_BANK) selected @endif> {{ $b->NAMA_BANK }}</option>
                                        @endforeach
                                    </select>
                                </div>
                            </div>

                            <div class="row form-group">
                                <div class="col-md-6">
                                    <label for="exampleFormControlInput1">Nomor Rekening*</label>
                                        <input type="text" class="form-control" name="nomorrekening" value="{{$p->NOMORREKENING}}" placeholder="" required>
                                </div>
                            </div>
                            @endif
                            @endforeach

                            <div class="form-actions form-group">
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