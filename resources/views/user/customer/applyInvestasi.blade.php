@extends('layout.user.index')
@section('title', 'Register Petani Mitra')
@section('content')

<section class="kahfibwa mt-5">
    <div class="container">
    <div class="row">                
        <div class="col-md-12">
        @foreach($proposal as $p)
            <div class="card">
                    <div class="card-body card-block">
                      <div class="row">
            <div class="col-12 col-sm-6">
              <div class="col-12">
                <img width="100%" src="{{asset($p->PATH)}}" class="product-image" alt="Product Image">
                
              </div>
            </div>
            
            <div for="exampleFormControlInput1" class="col-12 col-sm-6">
              @foreach($petani as $pt)
              @if($p->ID_PETANI == $pt->ID_PETANI)
              <h3 for="exampleFormControlInput1" class="my-3">{{$pt->NAMA_PERUSAHAAN}}</h3>
              <h4 for="exampleFormControlInput1" class="my-3">{{$p->NAMA_PROYEK}}</h4>
              <b>Alamat :</b><p>{{$pt->ALAMAT_PERUSAHAAN}}</p>
              <b>No Telp :</b><p>{{$pt->NOTELP_PERUSAHAAN}}</p>
              @endif
              @endforeach
              <b>Periode</b><p>{{$p->PERIODEKONTRAK}} Bulan</p>
              <hr>
              
              
              <div for="exampleFormControlInput1" class="bg-gray py-2 px-3 mt-4">
                <h4 class="mt-0">
                  <small>Jumlah Kebutuhan</small>
                </h4>
                <h2 class="mb-0">
                  Rp. {{number_format($p->JUMLAHKEBUTUHAN)}}
                </h2>
              </div>
              <div for="exampleFormControlInput1" class="row">
                <div class="bg-gray py-2 px-3 ml-3">
                  <h4 class="mt-0">
                    <small>Masukan Jumlah Beli</small>
                  </h4>
                  <h4 class="mb-0">
                  <form action="/pembayaran" method="post" enctype="multipart/form-data">
                  {{csrf_field()}}
                  <input class="form-control ml-4" type="number" name="jumlah">
                  <input class="form-control ml-4" type="hidden" name="id" value="{{$p->ID_INVESTASI}}">
                  </h4>
                </div>

                <div for="exampleFormControlInput1" class="m-4">
                  <button type="submit" class="btn btn-success btn-lg btn-flat">
                    <i class="fas fa-cart-plus fa-lg mr-2"></i>
                    Beli
                  </button>
                </div>
                </form>
              </div>
          </div>
          <div class="row m-4">
            <nav class="w-100">
              <div class="nav nav-tabs" id="product-tab" role="tablist">
                <a class="nav-item nav-link active" id="product-desc-tab" data-toggle="tab" href="#product-desc" role="tab" aria-controls="product-desc" aria-selected="true">Detail</a>
                <a class="nav-item nav-link" id="product-comments-tab" data-toggle="tab" href="#product-comments" role="tab" aria-controls="product-comments" aria-selected="false">Simulasi Keuntungan</a>
              </div>
            </nav>
            <div class="tab-content p-3" id="nav-tabContent">
              <div class="tab-pane fade show active" id="product-desc" role="tabpanel" aria-labelledby="product-desc-tab"> 
                {{$p->DETAIL}}
              </div>
              <div class="tab-pane fade" id="product-comments" role="tabpanel" aria-labelledby="product-comments-tab"> 
								<b for="exampleFormControlInput1">Simulasi Keuntungan :</b>
								<div for="exampleFormControlInput1" class="col-12 col-sm-12">
									<div class="row m-1 mt-4">
										<div class="col-6">
											<p>Persentase Keuntungan :</p>
										</div>
										<div class="col-6">
											<b class="ml-4">{{$p->PERSENTASEPROFIT}} %</b>
										</div>
									</div>	
									<div class="row m-1">
										<div class="col-6">
											<p>Masukan Jumlah Investasi :</p>
										</div>
										<div class="col-4">
											<input type="number" class="form-control" id="hitung" class="ml-4">
                      <p class="ml-4">*Min Rp. 100.000</p>
										</div>
										<div class="col-2">
											<button type="submit" onclick="recount()" class="btn btn-success btn-lg btn-flat ml-4">Hitung</button>
										</div>
									</div>
									<div class="row m-1">
										<div class="col-6">
											<p>Hasil Investasi :</p>
										</div>
										<div class="col-2">
											<b class="ml-4">Rp. </b>
										</div>
										<div class="col-4">
											<b  id="hasil" > </b>
										</div>
									</div>
								</div>								
							</div>
            </div>
          </div>
          @endforeach
                    </div>
                
            </div>
        </div>
    </div>
</div>
</section>



  <script>
    var proposal = <?php echo json_encode($proposal); ?>;
    function recount(){
      var sembarang = document.getElementById("hitung").value;
      console.log(sembarang);
      var profit = proposal[0]["PERSENTASEPROFIT"]+100;
      var total = parseInt((profit/100)*sembarang);
      document.getElementById("hasil").innerHTML = total;
    }
  </script>
@endsection