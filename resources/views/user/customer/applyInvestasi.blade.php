@extends('layout.user.index')
@section('title', 'Register Petani Mitra')
@section('content')
<div class="content-wrapper">

    <!-- Main content -->
    <section class="content m-4">

      <!-- Default box -->
      <div class="card card-solid">
        <div class="card-body">
          <div class="row">
            <div class="col-12 col-sm-6">
              <h3 class="d-inline-block d-sm-none">Jawara Farm Surabaya</h3>
              <div class="col-12">
                <img width="100%" src="vendor/images/7185.jpg" class="product-image" alt="Product Image">
                
              </div>
            </div>
            <div class="col-12 col-sm-6">
              <h3 class="my-3">Jawara Farm Surabaya</h3>
              <b>Alamat :</b><p>Jl. Ketintang No 145</p>
              <b>No Telp :</b><p>0812483819210</p>
              <b>Periode</b><p>6 Bulan</p>
              <hr>
              
              
              <div class="bg-gray py-2 px-3 mt-4">
                <h4 class="mt-0">
                  <small>Jumlah Kebutuhan</small>
                </h4>
                <h2 class="mb-0">
                  Rp. 3.000.000
                </h2>
              </div>
              <div class="row">
                <div class="bg-gray py-2 px-3 ml-3">
                  <h4 class="mt-0">
                    <small>Masukan Jumlah Beli</small>
                  </h4>
                  <h4 class="mb-0">
                  <input class="ml-4">
                  </h4>
                </div>

                <div class="m-4">
                  <a href="/pembayaran">
                  <div class="btn btn-success btn-lg btn-flat">
                    <i class="fas fa-cart-plus fa-lg mr-2"></i>
                    Beli
                  </div>
                  </a>
                </div>
              </div>
          </div>
          <div class="row m-4">
            <nav class="w-100">
              <div class="nav nav-tabs" id="product-tab" role="tablist">
                <a class="nav-item nav-link active" id="product-desc-tab" data-toggle="tab" href="#product-desc" role="tab" aria-controls="product-desc" aria-selected="true">Detail</a>
                <a class="nav-item nav-link" id="product-comments-tab" data-toggle="tab" href="#product-comments" role="tab" aria-controls="product-comments" aria-selected="false">Simulasi Keuntungan</a>
                <a class="nav-item nav-link" id="product-rating-tab" data-toggle="tab" href="#product-rating" role="tab" aria-controls="product-rating" aria-selected="false">Profil Perusahaan</a>
              </div>
            </nav>
            <div class="tab-content p-3" id="nav-tabContent">
              <div class="tab-pane fade show active" id="product-desc" role="tabpanel" aria-labelledby="product-desc-tab"> 
                  Lorem ipsum dolor sit amet, consectetur adipiscing elit. Morbi vitae condimentum erat. Vestibulum ante ipsum primis in faucibus orci luctus et ultrices posuere cubilia Curae; Sed posuere, purus at efficitur hendrerit, augue elit lacinia arcu, a eleifend sem elit et nunc. Sed rutrum vestibulum est, sit amet cursus dolor fermentum vel. Suspendisse mi nibh, congue et ante et, commodo mattis lacus. Duis varius finibus purus sed venenatis. Vivamus varius metus quam, id dapibus velit mattis eu. Praesent et semper risus. Vestibulum erat erat, condimentum at elit at, bibendum placerat orci. Nullam gravida velit mauris, in pellentesque urna pellentesque viverra. Nullam non pellentesque justo, et ultricies neque. Praesent vel metus rutrum, tempus erat a, rutrum ante. Quisque interdum efficitur nunc vitae consectetur. Suspendisse venenatis, tortor non convallis interdum, urna mi molestie eros, vel tempor justo lacus ac justo. Fusce id enim a erat fringilla sollicitudin ultrices vel metus. 
              </div>
              <div class="tab-pane fade" id="product-comments" role="tabpanel" aria-labelledby="product-comments-tab"> 
								<b>Simulasi Keuntungan :</b>
								<div class="col-12 col-sm-12">
									<div class="row m-1 mt-4">
										<div class="col-6">
											<p>Persentase Keuntungan :</p>
										</div>
										<div class="col-6">
											<b class="ml-4">10%</b>
										</div>
									</div>	
									<div class="row m-1">
										<div class="col-6">
											<p>Masukan Jumlah Investasi :</p>
										</div>
										<div class="col-4">
											<input class="ml-4">
											<p  class="ml-4">*minimal Rp.100.000</p>
										</div>
										<div class="col-2">
											<button type="submit" class="btn btn-success btn-block ml-4">Hitung</button>
										</div>
									</div>
									<div class="row m-1">
										<div class="col-6">
											<p>Hasil Investasi :</p>
										</div>
										<div class="col-6">
											<b class="ml-4">Rp. 0</b>
										</div>
									</div>
								</div>								
							</div>
              <div class="tab-pane fade" id="product-rating" role="tabpanel" aria-labelledby="product-rating-tab"> 
								Cras ut ipsum ornare, aliquam ipsum non, posuere elit. In hac habitasse platea dictumst. Aenean elementum leo augue, id fermentum risus efficitur vel. Nulla iaculis malesuada scelerisque. Praesent vel ipsum felis. Ut molestie, purus aliquam placerat sollicitudin, mi ligula euismod neque, non bibendum nibh neque et erat. Etiam dignissim aliquam ligula, aliquet feugiat nibh rhoncus ut. Aliquam efficitur lacinia lacinia. Morbi ac molestie lectus, vitae hendrerit nisl. Nullam metus odio, malesuada in vehicula at, consectetur nec justo. Quisque suscipit odio velit, at accumsan urna vestibulum a. Proin dictum, urna ut varius consectetur, sapien justo porta lectus, at mollis nisi orci et nulla. Donec pellentesque tortor vel nisl commodo ullamcorper. Donec varius massa at semper posuere. Integer finibus orci vitae vehicula placerat. 
							</div>
            </div>
          </div>
        </div>
        <!-- /.card-body -->
      </div>
      <!-- /.card -->

    </section>
    <!-- /.content -->
  </div>
@endsection