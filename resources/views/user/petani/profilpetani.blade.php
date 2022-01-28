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

                        <form action="/petaniupdate" method="post">
                            {{csrf_field()}}
                            @foreach($petani as $p)
                            <div class="form-group">
                                <div class="row form-group">
                                    <div class="col-md-6">
                                        <label for="exampleFormControlInput1">Nama Pemilik Perusahaan (Sesuai KTP)*</label>
                                        <input type="text" class="form-control" name="nama_petani" placeholder="" value="{{$p->NAMA_PJ}}">
                                    </div>

                                    <div class="col-md-6">
                                        <label for="exampleFormControlInput1">Nama Perusahaan*</label>
                                        <input type="text" class="form-control" name="nama_perusahaan" placeholder="" value="{{$p->NAMA_PERUSAHAAN}}">
                                    </div>
                                </div>
                            </div>

                            <div class="row form-group">
                                <div class="col-md-6">
                                    <label for="exampleFormControlInput1" style="color:grey">Email*</label>
                                    @if(\Session::has('email'))
                                    <input type="text" class="form-control" name="email"
                                        value="{{ Session::get('email') }}" readonly>  
                                    @endif
                                </div>
                                <div class="col-md-6">
                                    <label for="exampleFormControlInput1">Nomor Telp. Perusahaan*</label>
                                    <input type="text" class="form-control" name="nomorhp" placeholder="" value="{{$p->NOTELP_PERUSAHAAN}}">
                                </div>
                            </div>

                            <div class="row form-group">
                                <div class="col-md-12">
                                    <label for="exampleFormControlInput1">Alamat Perusahaan*</label>
                                    <input type="text" class="form-control" name="alamat" placeholder="" value="{{$p->ALAMAT_PERUSAHAAN}}">
                                    
                                </div>
                            </div>

                            <div class="row form-group">
                                <div class="col-md-6">
                                    <label for="exampleFormControlInput1">Provinsi*</label>
                                    <select class="form-control select-component select-provinsi" id="" name="provinsi" required>
                                        <option>Pilih Provinsi ...</option>
                                        @foreach ($provinsi as $key => $value)
                                            <option value="{{ $key }}">{{ $value }}</option>
                                        @endforeach
                                    </select>
                                </div>
                                <div class="col-md-6">
                                    <label for="namakota">Kota*</label>
                                    <select class="form-control select-component select-kota" id="kota" name="kota" required>
                                        <option>Pilih Kota ...</option>
                                    </select>
                                </div>
                            </div>

                            <div class="row form-group">
                                <div class="col-md-4">
                                    <label for="exampleFormControlInput1">Latitude</label>
                                    <input type="text" class="form-control" id="latitude" name="latitude" value="{{$p->LATITUDE}}" readonly>
                                </div>

                                <div class="col-md-4">
                                    <label for="exampleFormControlInput1">Longitude</label>
                                    <input type="text" class="form-control" id="longitude" name="longitude" value="{{$p->LONGITUDE}}" readonly>
                                </div>

                                <div class="col-md-4">
                                    <label for="exampleFormControlInput1">Accuracy</label>
                                    <input type="text" class="form-control" id="accuracy" name="accuracy" value="{{$p->ACCURACY}}" readonly>
                                </div>
                            </div>

                            <div class="form-actions form-group">
                                <button type="button" class="btn btn-secondary btn-block btn-xl" onclick="getLocation()">Lokasi Anda</button>
                                <button type="submit" class="btn btn-success btn-block btn-xl">Simpan</button>
                            </div>
                            @endforeach
                        </form>

                    </div>

                </div>
            </div>
        </div>
    </div>
</section>

<script src="https://code.jquery.com/jquery-3.5.1.slim.min.js" integrity="sha384-DfXdz2htPH0lsSSs5nCTpuj/zy4C+OGpamoFVy38MVBnE+IbbVYUew+OrCXaRkfj" crossorigin="anonymous"></script>
<script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.1/dist/umd/popper.min.js" integrity="sha384-9/reFTGAW83EW2RDu2S0VKaIzap3H66lZH81PoYlFhbGU+6BZp6G7niu735Sk7lN" crossorigin="anonymous"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/webcamjs/1.0.26/webcam.min.js" integrity="sha512-dQIiHSl2hr3NWKKLycPndtpbh5iaHLo6MwrXm7F0FM5e+kL2U16oE9uIwPHUl6fQBeCthiEuV/rzP3MiAB8Vfw==" crossorigin="anonymous"></script>

<script type="text/javascript">
	jQuery(document).ready(function ()
	{
			jQuery('select[name="provinsi"]').on('change',function(){
				var countryID = jQuery(this).val();
				if(countryID)
				{
					jQuery.ajax({
						url : '/admin/petani/addKota/' +countryID,
						type : "GET",
						dataType : "json",
						success:function(data)
						{
						console.log(data);
						jQuery('select[name="kota"]').empty();
						jQuery.each(data, function(key,value){
							$('select[name="kota"]').append('<option value="'+ key +'">'+ value +'</option>');
						});
						}
					});
				}
				else
				{
					$('select[name="kota"]').empty();
				}
			});
	});
	jQuery(document).ready(function ()
	{
			jQuery('select[name="kota"]').on('change',function(){
				var id_kota = jQuery(this).val();
				if(id_kota)
				{
					jQuery.ajax({
						url : '/admin/petani/addKecamatan/' +id_kota,
						type : "GET",
						dataType : "json",
						success:function(data)
						{
						console.log(data);
						jQuery('select[name="kecamatan"]').empty();
						jQuery.each(data, function(key,value){
							$('select[name="kecamatan"]').append('<option value="'+ key +'">'+ value +'</option>');
						});
						}
					});
				}
				else
				{
					$('select[name="kecamatan"]').empty();
				}
			});
	});
	jQuery(document).ready(function ()
	{
			jQuery('select[name="kecamatan"]').on('change',function(){
		var kecamatanID = jQuery(this).val();
		if(kecamatanID)
		{
			jQuery.ajax({
			url : '/admin/petani/addKelurahan/' +kecamatanID,
			type : "GET",
			dataType : "json",
			success:function(data)
			{
				console.log(data);
				jQuery('select[name="kelurahan"]').empty();
				jQuery.each(data, function(key, value){
				$('select[name="kelurahan"]').append('<option value="'+ value.ID_KELURAHAN +'">'+ value.KODEPOS + ' - ' + value.NAMA_KELURAHAN +'</option>');
				});
			}
			});
		}
		else
		{
			$('select[name="kelurahan"]').empty();
		}
		});
	});
</script>

<script>
var lat = document.getElementById("latitude");
var long = document.getElementById("longitude");
var acc = document.getElementById("accuracy");

function getLocation() {
    if (navigator.geolocation) {
    navigator.geolocation.watchPosition(showPosition);
    } else { 
    x.innerHTML = "Geolocation is not supported by this browser.";
    }
}
     
function showPosition(position) {
    lat.value=position.coords.latitude;
    long.value=position.coords.longitude;
    acc.value=position.coords.accuracy;
}
</script>

@endsection