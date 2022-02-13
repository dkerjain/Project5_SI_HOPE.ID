@extends('layout.admin.index')
@section('title', 'Petani')
@section('extracss')
    <link rel="stylesheet" href="{{asset('assets/plugins/datatables-bs4/css/dataTables.bootstrap4.min.css')}}">
    <link rel="stylesheet" href="{{asset('assets/plugins/datatables-responsive/css/responsive.bootstrap4.min.css')}}">
@endsection
@section('content')
    <div class="row">
        <div class="col-md-12">
            
            <!-- card tabel pengambilan souvenir (SouvenirController @index_ambil) -->
            <div class="card">
                <div class="card-header">
                    <h3 class="card-title" style="font-weight : bold">Data Petani Belum Terverifikasi</h3>
                </div>
                <div class="card-body">
                    <table id="example1" class="table table-bordered table-striped">
                         <thead>
                            <tr style="text-align: center">
                                <th>ID</th>
                                <th>Nama Perusahaan</th>
                                <th>No TLP</th>
                                <th>Alamat</th>
                                <th>Scan Lokasi</th>                                
                            </tr>
                        </thead>
                        <tbody>
                            @foreach($petani as $p)
                            @if($p->STATUS == 0)
                            <tr style="text-align: center">
                                <td>{{$p->ID_PETANI}}</td>
                                <td>{{$p->NAMA_PERUSAHAAN}}</td>
                                <td>{{$p->NOTELP_PERUSAHAAN}}</td>
                                <td>{{$p->ALAMAT_PERUSAHAAN}}</td>
                                <td width="10px"><a href="/admin/scan"><button type="submit" class="btn btn-success btn-block">Scan</button></a></td>
                            </tr>
                            @endif
                            @endforeach
                        </tbody>
                    </table>
                </div>
            </div>
            
            <div class="card">
                <div class="card-header">
                    <h3 class="card-title" style="font-weight : bold">Data Petani Terverifikasi</h3>
                </div>
                <div class="card-body">
                    <table id="tabel2" class="table table-bordered table-striped">
                         <thead>
                         
                            <tr style="text-align: center">
                                <th>ID</th>
                                <th>Nama Perusahaan</th>
                                <th>No TLP</th>
                                <th>Alamat</th>
                                <th>Preview Dokumen</th>                                
                            </tr>
                        </thead>
                        <tbody>
                        @foreach($petani as $p)
                            @if($p->STATUS == 1)
                            <tr style="text-align: center">
                                <td>{{$p->ID_PETANI}}</td>
                                <td>{{$p->NAMA_PERUSAHAAN}}</td>
                                <td>{{$p->NOTELP_PERUSAHAAN}}</td>
                                <td>{{$p->ALAMAT_PERUSAHAAN}}</td>
                                <td width="10px"><a href="#dokumen" data-toggle="modal"><button type="submit" class="btn btn-outline-primary btn-block"> Perusahaan</button></a>
                                <a href="#dokumenKeuangan" data-toggle="modal"><button type="submit" class="btn btn-outline-info btn-block mt-2">Keuangan</button></a></td>
                                <!-- modal dokumen perusahaan-->
                                <div class="modal fade" id="dokumen" >
                                    <div class="modal-dialog  modal-lg">
                                        <div class="modal-content">
                                            <div class="modal-header bg-primary">
                                                <h4 class="modal-title">Preview Dokumen Bukti Perusahaan</h4>
                                                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                                    <span aria-hidden="true">x</span>
                                                </button>
                                            </div>
                                            <div class="modal-body">
                                                <!-- form redirect to admin\UserController @store -->
                                                @foreach($dokumen_petani as $d)
                                                @if($p->ID_PETANI == $d->ID_PETANI)
                                                <div class="form-group">     
                                                    <div class="row form-group">
                                                        <div class="col-md-12">
                                                            <label for="exampleFormControlInput1">Bukti Perusahaan</label><br>
                                                            <iframe width="100%" height="360px" id="iframepdf" src="{{asset($d->BUKTIPERUSAHAAN)}}"></iframe>
                                                        </div>
                                                    </div>
                                                </div>
                                                @endif
                                                @endforeach
                                            </div>
                                        </div>


                                    </div>
                                </div>
                                <!-- modal dokumen keuangan-->
                                <div class="modal fade" id="dokumenKeuangan" >
                                    <div class="modal-dialog  modal-lg">
                                        <div class="modal-content">
                                            <div class="modal-header bg-primary">
                                                <h4 class="modal-title">Preview Dokumen Keuangan</h4>
                                                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                                    <span aria-hidden="true">x</span>
                                                </button>
                                            </div>
                                            <div class="modal-body">
                                                <!-- form redirect to admin\UserController @store -->
                                                @foreach($dokumen_petani as $d)
                                                @if($p->ID_PETANI == $d->ID_PETANI)
                                                <div class="row form-group">
                                                    <div class="col-md-12">
                                                        <label for="exampleFormControlInput1">Bukti Keuangan</label>
                                                        <iframe width="100%" height="360px" id="iframepdf" src="{{asset($d->LAPORANKEUANGAN)}}"></iframe>
                                                    </div>
                                                </div>
                                                @endif
                                                @endforeach
                                            </div>
                                        </div>


                                    </div>
                                </div>
    
                            </tr>
                            @endif
                            @endforeach
                        </tbody>
                    </table>
                </div>
            </div>
            
        </div>
    </div>
                                

    
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
        <!-- Datatable script -->
    @endsection    
@endsection