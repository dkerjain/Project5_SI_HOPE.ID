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

        <!-- modal selfie KTP -->
        <!-- <div class="modal fade" id="modalKTP_selfie">
            <div class="modal-dialog">
                <div class="modal-content">
                    <div class="modal-header bg-success">
                        <h4 class="modal-title">Ambil foto dengan KTP</h4>
                        <button type="button" class="close" data-dismiss="modal" id="close" aria-label="Close">
                            <span aria-hidden="true">x</span>
                        </button>
                    </div>
                    <div class="modal-body">
                        <!-- form redirect to admin\AdminController @store -->
                        <form action="{{url('/dokumenbaru')}}" method="post">
                            {{csrf_field()}}
                            <div class="modal-body">
                                <div class="row">
                                    <div class="col-sm-6">
                                        <video autoplay="" id="video-webcam" class="border w-100">
                                        Browser anda tidak compatible</video>
                                    </div>
                                    <div class="col-sm-6" text-right>
                                        <canvas id="myCanvas" width="640" height="480" style="style="border:1px solid #ffffff"></canvas>
                                        <button type="button" class="btn btn-success-outline" onclick="takeSnapshot()">Ambil Foto</button>
                                    </div>
                                </div>   
                            </div>
                            
                            <div class="modal-footer">
                                <button type="button" class="btn btn-danger-outline" data-dismiss="modal" id="close">Cancel</button>
                                <button type="button" class="btn btn-success-outline"  data-dismiss="modal" onclick="saveSnapshot()">Simpan Foto</button>
                            </div>
                        </form>
                    </div>
                </div>
            <!-- </div> -->
        <!-- </div> -->
        
@endsection
@section('script')
<!-- <script>
    // $(document).ready(function(){
    //     $('.ambil-gambar').on('click',function(){
        // seleksi elemen video
        var video = document.querySelector("#video-webcam");

        // minta izin user
        navigator.getUserMedia = navigator.getUserMedia || navigator.webkitGetUserMedia || navigator.mozGetUserMedia || navigator.msGetUserMedia || navigator.oGetUserMedia;

        // jika user memberikan izin
        if (navigator.getUserMedia) {
            // jalankan fungsi handleVideo, dan videoError jika izin ditolak
            navigator.getUserMedia({ video: true }, handleVideo, videoError);
        }

        // fungsi ini akan dieksekusi jika  izin telah diberikan
        function handleVideo(stream) {
            video.srcObject = stream;
        }

        // fungsi ini akan dieksekusi kalau user menolak izin
        function videoError(e) {
            // do something
            alert("Izinkan menggunakan webcam untuk mengambil foto!")
        }
    // });

        function takeSnapshot() {
            // ambil ukuran video
            var width = video.offsetWidth
                    , height = video.offsetHeight;

            // buat elemen canvas
            canvas = document.getElementById("myCanvas");
            canvas.width = width;
            canvas.height = height;

            // ambil gambar dari video dan masukan 
            // ke dalam canvas
            context = canvas.getContext('2d');
            context.drawImage(video, 0, 0, width, height);
        }

        function saveSnapshot() {
            var img = document.createElement('img');

            // ambil ukuran video
            var width = video.offsetWidth
                    , height = video.offsetHeight;

            // buat elemen canvas
            canvas1 = document.getElementById("myCanvas2");
            canvas1.width = width;
            canvas1.height = height;
            foto = document.getElementById("myCanvas");

            context = canvas1.getContext('2d');
            context.drawImage(foto, 0, 0, width, height);

            img.src = canvas1.toDataURL('image/png');
            document.getElementById("foto").value=img;
        }
        // $("#close").on('click',function(){
        //     navigator.mediaDevices.getUserMedia({ video: true }).then(mediaStream => {
        //         const stream = mediaStream;
        //         const tracks = stream.getTracks();

        //         tracks[0].stop;
        //     });
        // });
        // });
    
</script> -->
@endsection