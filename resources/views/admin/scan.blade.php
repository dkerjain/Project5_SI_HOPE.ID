@extends('layout.admin.index')
@section('title', 'Tabel Admin')
@section('content')
<div class="col-lg-12" class="form-inline">
<br>  
<div class="row">
	<div class="col-lg-6">
    <div class="card" >
    <br>
        <div class="block margin-bottom-sm"> 
          <div class="card-header"><center><h2 class="h5 no-margin-bottom">Verifikasi Lokasi</h2></center></div>
          <br>
            <center>
            <div>
                <a class="btn btn-primary" id="startButton" >Start</a>
                <a class="btn btn-primary" id="resetButton">Reset</a>
            </div>
            <br>
            <div>
                <video id="video" width="300" height="200" style="border: 1px solid gray"></video>
            </div>

            <div id="sourceSelectPanel" style="display:none">
                <label for="sourceSelect">Change video source:</label> <br>
                <select id="sourceSelect" style="max-width:400px">
                </select>
            </div>

            <div class="col-lg-4">
              <label for="inlineFormInput" class="col-sm-form-control-label">Result :</label>
                <div class="alert alert-secondary" role="alert" id="result" name="barcode"></div>
            </div>
            <table width="450px" >
            <tr align="center">
              <td><label for="inlineFormInput" class="col-sm-form-control-label">Nama :</label></td>
              <td><label for="inlineFormInput" class="col-sm-form-control-label">Latitude :</label></td>
            </tr>
            <tr align="center">
              <td><div class="alert alert-secondary" role="alert" id="nama" name="nama"></div> </td>
              <td><div class="alert alert-secondary" role="alert" id="lat1" name="lat1"></div> </td>
            </tr>
            <tr align="center">
              <td><label for="inlineFormInput" class="col-sm-form-control-label">Longitude :</label></td>
              <td><label for="inlineFormInput" class="col-sm-form-control-label">Accuracy :</label></td>
            </tr> 
            <tr align="center">
              <td><div class="alert alert-secondary" role="alert" id="lon1" name="lon1"></div></td>
              <td><div class="alert alert-secondary" role="alert" id="acc1" name="acc1"></div> </td>
            </tr>
            </table>

            </center>
        </div>
    </div>
</div>
	<div class="col-lg-6">
    <div class="card" >
    <br>
        <div class="block margin-bottom-sm"> 
          <div class="card-header"><center><h2 class="h5 no-margin-bottom">Verifikasi Dokumen</h2></center></div>
          <br>

            <div class="form-group m-4">     
                <div class="row form-group">
                    <div class="col-md-12">
                        <label for="exampleFormControlInput1">Bukti Perusahaan</label><br>
                        <iframe width="100%" id="iframepdf1" src=""></iframe>
                    </div>
                </div>
            </div>

            <div class="row form-group m-4">
                <div class="col-md-12">
                    <label for="exampleFormControlInput1">Bukti Keuangan</label>
                    <iframe width="100%" id="iframepdf2" src=""></iframe>
                </div>
            </div>   
            
        </div>
    </div>
    <a id="link" href=""><button  type="submit" class="btn btn-success btn-block">Verifikasi</button></a>
  </div>


</div>

<script type="text/javascript" src="https://unpkg.com/@zxing/library@latest"></script>
  <script type="text/javascript">
    var petani = <?php echo json_encode($petani); ?>;
    window.addEventListener('load', function () {
      let selectedDeviceId;
      const codeReader = new ZXing.BrowserMultiFormatReader()
      console.log('ZXing code reader initialized')
      codeReader.listVideoInputDevices()
        .then((videoInputDevices) => {
          const sourceSelect = document.getElementById('sourceSelect')
          selectedDeviceId = videoInputDevices[0].deviceId
          if (videoInputDevices.length >= 1) {
            videoInputDevices.forEach((element) => {
              const sourceOption = document.createElement('option')
              sourceOption.text = element.label
              sourceOption.value = element.deviceId
              sourceSelect.appendChild(sourceOption)
            })

            sourceSelect.onchange = () => {
              selectedDeviceId = sourceSelect.value;
            };

            const sourceSelectPanel = document.getElementById('sourceSelectPanel')
            sourceSelectPanel.style.display = 'block'
          }

          document.getElementById('startButton').addEventListener('click', () => {
            codeReader.decodeFromVideoDevice(selectedDeviceId, 'video', (result, err) => {
              if (result) {
                console.log(result)
                document.getElementById('result').textContent = result.text

                var id_toko = document.getElementById('result').innerHTML;
                console.log(id_toko);
                for(var i=0;i<petani.length;i++){
                  if(petani[i]["NAMA_PERUSAHAAN"]==id_toko){
                    console.log(petani[i]);
                    document.getElementById('nama').textContent = petani[i]["NAMA_PERUSAHAAN"];
                    document.getElementById('lat1').textContent = petani[i]["LATITUDE"];
                    document.getElementById('lon1').textContent = petani[i]["LONGITUDE"];
                    document.getElementById('acc1').textContent = petani[i]["ACCURACY"];
                    var bukti ='http://localhost:8000/'+petani[i]["BUKTIPERUSAHAAN"];
                    document.getElementById('iframepdf1').src = bukti;
                    var laporan ='http://localhost:8000/'+petani[i]["LAPORANKEUANGAN"];
                    document.getElementById('iframepdf2').src = laporan;
                    document.getElementById('link').href = '/petani/verifikasi/'+petani[i]["ID_PETANI"];
                  }
                }
              }
              if (err && !(err instanceof ZXing.NotFoundException)) {
                console.error(err)
                document.getElementById('result').textContent = err
              }
            })
            console.log(`Started continous decode from camera with id ${selectedDeviceId}`)
          })

          document.getElementById('resetButton').addEventListener('click', () => {
            codeReader.reset()
            document.getElementById('result').textContent = '';
            document.getElementById('nama').textContent = '';
            document.getElementById('lat1').textContent = '';
            document.getElementById('lon1').textContent = '';
            document.getElementById('acc1').textContent = '';
            document.getElementById('iframepdf1').src = '';
            document.getElementById('iframepdf2').src = '';
            console.log('Reset.')
          })

        })
        .catch((err) => {
          console.error(err)
        })
    })

  </script>

    <script>
        function getDistanceFromLatLonInKm(lat1,lon1,lat2,lon2) {   
        var R = 6371; // Radius of the earth in km   
        var dLat = deg2rad(lat2-lat1);  // deg2rad below   
        var dLon = deg2rad(lon2-lon1);    
        var a = Math.sin(dLat/2) * Math.sin(dLat/2) + Math.cos(deg2rad(lat1)) * Math.cos(deg2rad(lat2)) * Math.sin(dLon/2) * Math.sin(dLon/2);    
        var c = 2 * Math.atan2(Math.sqrt(a), Math.sqrt(1-a));    
        var d = R * c; // Distance in km 
        return d; } 
        
        function deg2rad(deg) {   
            return deg * (Math.PI/180) 
        } 

        function konfirmasi(){
            var lat1 = document.getElementById("lat1").innerHTML;
            var lon1 = document.getElementById("lon1").innerHTML;
            var acc1 = document.getElementById("acc1").innerHTML;
            var lat2 = document.getElementById("lat2").innerHTML;
            var lon2 = document.getElementById("lon2").innerHTML;
            var acc2 = document.getElementById("acc2").innerHTML;
            var jarak = getDistanceFromLatLonInKm(lat1,lon1,lat1,lon2);
            console.log(jarak);
            var rataAcc = (acc1+acc2)/2;
            console.log(rataAcc);
            if (jarak <= rataAcc)
                window.alert("Anda berada didalam jangkauan toko");
            else
                window.alert("Anda tidak berada dalam jangkauan toko");
            }
  </script>


@endsection