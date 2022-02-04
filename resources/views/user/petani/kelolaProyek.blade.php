@extends('layout.user.index')
@section('title', 'Register Customer')
@section('content')
<section class="kahfibwa mt-5">
    <div class="container">
    <div class="row">                
        <div class="col-md-12">
            <div class="card">
                <div class="card-header">Daftar Proyek Anda
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
                        
                        <table id="example1" class="table table-bordered table-striped">
                         <thead>
                            <tr style="text-align: center">
                                <th>ID</th>
                                <th>Tanggal Pengajuan</th>
                                <th>Nama Proyek</th>
                                <th>Target</th>
                                <th>Total Tercapai</th>
                                <th>Status</th>
                                <th>Aksi</th>                                
                            </tr>
                        </thead>
                        <tbody>
                            
                        @foreach($proposal as $p)
                            <tr style="text-align: center">
                                <td>{{$p->ID_INVESTASI}}</td>
                                <td>{{$p->TGL_PENGAJUAN}}</td>
                                <td>{{$p->NAMA_PROYEK}}</td>
                                <td>{{$p->JUMLAHKEBUTUHAN}}</td>
                                    @php
                                        $jumlah=0;
                                        foreach($pembayaran_investasi as $pb){
                                            if($p->ID_INVESTASI == $pb->ID_INVESTASI){                                            
                                                $jumlah=$jumlah+($pb->JUMLAHPEMBAYARAN);
                                            }
                                        }
                                    @endphp
                                <td>{{$jumlah}}</td>
                                @foreach($pengembalian as $pb)
                                    @if($p->ID_INVESTASI == $pb->ID_INVESTASI)
                                        @if($pb->STATUS == '2')
                                            <td>Selesai</td>
                                        @else
                                            <td>Verifikasi Pengembalian</td>
                                        @endif
                                    @else
                                        <td>Proyek Berlangsung</td>
                                        <td width="10px"><a href="#dokumen{{$p->ID_INVESTASI}}" data-toggle="modal"><button type="submit" class="btn btn-success btn-block"><i class="nav-icon fas fa-edit" ></i></button></a></td>
                                            <!-- modal dokumen -->
                                            <div class="modal fade" id="dokumen{{$p->ID_INVESTASI}}" >
                                                    <div class="modal-dialog  modal-lg">
                                                        <div class="modal-content">
                                                            <div class="modal-header">
                                                                <h4 class="modal-title">Pengembalian Dana</h4>
                                                                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                                                    <span aria-hidden="true">x</span>
                                                                </button>
                                                            </div>
                                                            <div class="modal-body">
                                                                <!-- form redirect to admin\UserController @store -->
                                                                <form action="/pengembalian" method="post" enctype="multipart/form-data">
                                                                {{csrf_field()}}
                                                                <div class="form-group">     
                                                                    <div class="row form-group">
                                                                        <div class="col-md-6">                                                                
                                                                            <label for="exampleFormControlInput1">Profit</label><br>
                                                                            <input type="hidden" name="id" value="{{$p->ID_INVESTASI}}">
                                                                            <input class="form-control" type="text" value="{{$p->PERSENTASEPROFIT}} %" readonly>
                                                                            <input class="form-control" type="hidden" name="profit" value="{{$p->PERSENTASEPROFIT}}" >
                                                                        </div>
                                                                        <div class="col-md-6">
                                                                            <label for="exampleFormControlInput1">Total Bayar</label><br>
                                                                            @php
                                                                                $jumlah=(($p->PERSENTASEPROFIT+100)/100)*$p->JUMLAHKEBUTUHAN;
                                                                            @endphp
                                                                            <input class="form-control" type="text" value="Rp. {{number_format($jumlah)}}" readonly>
                                                                            <input class="form-control" type="hidden" name="total" value="{{$jumlah}}">
                                                                        </div>
                                                                    </div>
                                                                </div>
                                                                <div class="form-group">     
                                                                    <div class="row form-group">
                                                                        <div class="col-md-12">
                                                                            <label for="exampleFormControlInput1">Bukti Transfer Pengembalian Dana</label><br>
                                                                            <input type="file" class="input-file btn btn-primary mt-2" id="bukti" name="bukti" accept="image/png, image/jpg, image/jpeg" value="Upload Bukti Pengembaian Dana">
                                                                        </div>
                                                                    </div>
                                                                </div>

                                                                <!-- Jika status belum tervirikasi button ini ditampilkan -->
                                                                <div class="row form-group">
                                                                    <div class="col-md-4">
                                                                    </div>                        
                                                                    <div class="col-md-4">
                                                                    <button  type="submit" class="btn btn-success btn-block">Upload</button>
                                                                    </div>
                                                                    <div class="col-md-4">
                                                                    </div>           
                                                                </div>
                                                                </form>
                                                            </div>
                                                        </div>


                                                    </div>
                                                </div>
                                    @endif
                                @endforeach
                                
                            </tr>
                            @endforeach
                        </tbody>
                    </table>

                        
                    </div>
                
            </div>
        </div>
    </div>
</div>
</section>


@section('script')
        <!-- DataTables -->
        <script src="{{asset('assets/plugins/datatables/jquery.dataTables.min.js')}}"></script>
        <script src="{{asset('assets/plugins/datatables-bs4/js/dataTables.bootstrap4.min.js')}}"></script>
        <script src="{{asset('assets/plugins/datatables-responsive/js/dataTables.responsive.min.js')}}"></script>
        <script src="{{asset('assets/plugins/datatables-responsive/js/responsive.bootstrap4.min.js')}}"></script>
        <!-- AdminLTE App -->
        <script>                   
        $(document).ready(function () {
            $('#konfigurasi_aktor').addClass('active');
        });
        $(function () {
            $("#example1").DataTable({
            "responsive": true,
            "autoWidth": false,
            });
            $('#example2').DataTable({
            "paging": true,
            "lengthChange": false,
            "searching": false,
            "ordering": true,
            "info": true,
            "autoWidth": false,
            "responsive": true,
            });
        });
        $(function () {
            $("#tabel2").DataTable({
            "responsive": true,
            "autoWidth": false,
            });
            $('#tabel3').DataTable({
            "paging": true,
            "lengthChange": false,
            "searching": false,
            "ordering": true,
            "info": true,
            "autoWidth": false,
            "responsive": true,
            });
        });
        </script>
        
    @endsection   
@endsection