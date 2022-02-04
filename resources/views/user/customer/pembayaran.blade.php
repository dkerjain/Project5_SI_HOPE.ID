@extends('layout.user.index')
@section('title', 'Register Petani Mitra')
@section('content')
<div class="content-wrapper">

    <!-- Main content -->
    <section class="content m-4">

      <!-- Default box -->
      <div class="row">
        <div class="col-lg-8">
            <div class="card card-solid mt-3 ">
            <form action="/konfirmasi" method="post" enctype="multipart/form-data">
                  {{csrf_field()}}
                <div class="card-body">
                  <b>Metode Pembayaran :</b>
                  <div class="input-group">
                      <div class="input-group-prepend">
                        <span class="mt-4">Transfer Bank/ATM</span>
                      </div>
                    </div>
                  <div class="input-group">
                      <div class="input-group-prepend">
                        <span class="input-group-text"><input type="radio" name="jawaban" value="bca"></span>
                      </div>
                      <input type="text" readonly class="form-control" value="5105619522 - PT HOPE INDONESIA">
                      <img width="60" height="30" src="img/bca.png" class="product-image ml-3 mr-4 mt-1" alt="bca">                      
                    </div>
                  <div class="input-group mt-2">
                      <div class="input-group-prepend">
                        <span class="input-group-text"><input type="radio" name="jawaban" value="jatim"></span>
                      </div>
                      <input type="text" readonly class="form-control" value="5105619522 - PT HOPE INDONESIA">
                      <img width="60" height="30" src="img/jatim.png" class="product-image ml-3 mr-4 mt-1" alt="jatim">                      
                    </div>

                    <div class="input-group">
                      <div class="input-group-prepend">
                        <span class="mt-4">Dompet Digital</span>
                      </div>
                    </div>
                  <div class="input-group">
                      <div class="input-group-prepend">
                        <span class="input-group-text"><input type="radio" name="jawaban" value="linkaja"></span>
                      </div>
                      <input type="text" readonly class="form-control" value="0812830281 - PT HOPE INDONESIA">
                      <img width="40" height="40" src="img/link.png" class="product-image ml-2 mr-5 mt-1" alt="bca">                      
                    </div>
                  <div class="input-group mt-2">
                      <div class="input-group-prepend">
                        <span class="input-group-text"><input type="radio" name="jawaban" value="gopay"></span>
                      </div>
                      <input type="text" readonly class="form-control" value="0812830281 - PT HOPE INDONESIA">
                      <img width="60" height="30" src="img/gopay.png" class="product-image ml-3 mr-4 mt-1" alt="jatim">                      
                    </div>
                </div>
            </div>
        </div>

        <div class="col-lg-4">
            <div class="card card-solid mt-3 ">
                <div class="card-body">
                  <b>Pembiayaan Hasil Panen :</b>
                  @foreach($proposal as $p)
                  <p>{{$p->NAMA_PROYEK}}</p>                  
                  <input class="form-control ml-4" type="hidden" name="id" value="{{$p->ID_INVESTASI}}">
                  @endforeach
                  <table width="100%" >
                    <tr >
                      <td>Harga</td>
                      <td align="right">Rp. {{ number_format($jumlah) }}</td>
                    </tr>
                    <tr >
                      <td>----------------------------</td>
                      <td>----------------------------</td>
                    </tr>
                    <tr >
                      <td>Total</td>
                      <td align="right">Rp. {{ number_format($jumlah) }}</td>
                      <input class="form-control ml-4" type="hidden" name="jumlah" value="{{$jumlah}}">
                    </tr>
                  </table>
                </div>

                <div class="m-4" align="right">
                <button type="submit" class="btn btn-success btn-lg btn-flat">
                  Bayar
                </button>
                </form>
              </div>
            </div>
         </div>
          
      </div>

    </section>
    <!-- /.content -->
  </div>
@endsection