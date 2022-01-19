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
                <div class="card-body">
                  <div class="row">
                    <b class="ml-3">Batas Pembayaran : </b>
                    <p id="demo" class="ml-3"></p>
                  </div>
                  <div class="input-group">
                      <div class="input-group-prepend">
                        <span class="mt-2">Transfer Bank/ATM</span>
                      </div>
                    </div>
                  <div class="input-group">
                      <div class="input-group-prepend">
                        <span class="input-group-text"><input type="radio"></span>
                      </div>
                      <input type="text" readonly class="form-control" value="5105619522 - PT HOPE INDONESIA">
                      <img width="60" height="30" src="img/bca.png" class="product-image ml-3 mr-4 mt-1" alt="bca">                      
                    </div>
                </div>
            </div>
            <div class="card card-solid mt-3 ">
                <div class="card-body">
                    <b>Upload Bukti Pembayaran :</b>
                    <div class="input-group">
                        <input type="file" class="btn btn-secondary mt-2" value="Upload Profile Proyek">
                    </div>
                </div>
            </div>
        </div>

        <div class="col-lg-4">
            <div class="card card-solid mt-3 ">
                <div class="card-body">
                  <b>Pembiayaan Hasil Panen :</b>
                  <p>Jawara Farm</p>
                  <table width="100%" >
                    <tr >
                      <td>Harga</td>
                      <td align="right">Rp  1.000.000</td>
                    </tr>
                    <tr >
                      <td>Slot</td>
                      <td align="right">2</td>
                    </tr>
                    <tr >
                      <td>----------------------------</td>
                      <td>----------------------------</td>
                    </tr>
                    <tr >
                      <td>Total</td>
                      <td align="right">Rp. 2.000.000</td>
                    </tr>
                  </table>
                </div>

                <div class="m-4" align="right">
                <a href="/konfirmasi">
                <div class="btn btn-success btn-lg btn-flat">
                  Bayar
                </div>
                </a>
              </div>
            </div>
         </div>
          
      </div>

    </section>
    <!-- /.content -->
  </div>

  <!-- Scrip Count Down -->
<script>
// Set the date we're counting down to
var countDownDate = new Date();
countDownDate.setDate(countDownDate.getDate() + 1);

// Update the count down every 1 second
var x = setInterval(function() {

  // Get today's date and time
  var now = new Date().getTime();
    
  // Find the distance between now and the count down date
  var distance = countDownDate - now;
    
  // Time calculations for days, hours, minutes and seconds
  var hours = Math.floor((distance % (1000 * 60 * 60 * 24)) / (1000 * 60 * 60));
  var minutes = Math.floor((distance % (1000 * 60 * 60)) / (1000 * 60));
  var seconds = Math.floor((distance % (1000 * 60)) / 1000);
    
  // Output the result in an element with id="demo"
  document.getElementById("demo").innerHTML =  hours + "h "
  + minutes + "m " + seconds + "s ";
    
  // If the count down is over, write some text 
  if (distance < 0) {
    clearInterval(x);
    document.getElementById("demo").innerHTML = "EXPIRED";
  }
}, 1000);
</script>
@endsection