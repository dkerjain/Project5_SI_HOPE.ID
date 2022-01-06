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
                        
                        <form action="/rekeningbaru" method="post">
                            {{csrf_field()}}
                            @method('patch')    
                            <div class="row form-group">
                                <div class="col-md-6">
                                    <label for="exampleFormControlInput1">Nama Bank*</label>
                                    <select name="bank" class="form-control">
                                        @if($customer)
                                        <option selected>{{$customer->bank}}</option>
                                        @else
                                        <option>Pilih Bank ...</option>
                                        @endif
                                    @foreach ($bank as $b)
                                    <option value="{{$b->nama}}">{{$b->nama}}</option>
                                    @endforeach
                                    </select>
                                </div>
                            </div>

                            <div class="row form-group">
                                <div class="col-md-6">
                                    <label for="exampleFormControlInput1">Nomor Rekening*</label>
                                        @if($customer)
                                        <input type="text" class="form-control" name="nomorrekening"
                                            placeholder="" value="{{$customer->nomorrekening}}">
                                        @else
                                        <input type="text" class="form-control" name="nomorrekening"
                                            placeholder="" required>
                                            <!-- /.inputan nomorhp -->
                                            @endif
                                </div>
                            </div>

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