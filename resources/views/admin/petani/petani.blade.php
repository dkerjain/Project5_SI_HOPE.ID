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
                                <th>Waktu Aktif</th>
                                <th>Nama Perusahaan</th>
                                <th>No TLP</th>
                                <th>Alamat</th>
                                <th>Status</th>
                                <th>Verifikasi</th>                                
                            </tr>
                        </thead>
                        <tbody>
                            <tr style="text-align: center">
                                <td></td>
                                <td></td>
                                <td></td>
                                <td></td>
                                <td></td>
                                <td width="10px"><a href="#dokumen" data-toggle="modal"><button type="submit" class="btn btn-success btn-block">Dokumen</button></a></td>
                            </tr>
                        </tbody>
                    </table>
                </div>
            </div>
            
        </div>
    </div>

    <!-- modal dokumen -->
    <div class="modal fade" id="dokumen" >
        <div class="modal-dialog  modal-lg">
            <div class="modal-content">
                <div class="modal-header bg-primary">
                    <h4 class="modal-title">Verifikasi Dokumen</h4>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">x</span>
                    </button>
                </div>
                <div class="modal-body">
                    <!-- form redirect to admin\UserController @store -->
                    <div class="form-group">     
                        <div class="row form-group">
                            <div class="col-md-12">
                                <label for="exampleFormControlInput1">Bukti Perusahaan</label><br>
                                <iframe width="100%" id="iframepdf" src="{{asset('files/example.pdf')}}"></iframe>
                            </div>
                        </div>
                    </div>

                    <div class="row form-group">
                        <div class="col-md-12">
                            <label for="exampleFormControlInput1">Bukti Keuangan</label>
                            <iframe width="100%" id="iframepdf" src="{{asset('files/example.pdf')}}"></iframe>
                        </div>
                    </div>     
                    
                    <!-- Jika status belum tervirikasi button ini ditampilkan -->
                    <div class="row form-group">
                        <div class="col-md-4">
                        </div>                        
                        <div class="col-md-4">
                        <button  type="submit" class="btn btn-success btn-block">Verifikasi</button>
                        </div>
                        <div class="col-md-4">
                        </div>           
                    </div>
                    
                </div>
            </div>


        </div>
    </div>

    <!-- modal lokasi -->
    <div class="modal fade" id="lokasi" >
        <div class="modal-dialog modal-lg">
            <div class="modal-content">
                <div class="modal-header bg-primary">
                    <h4 class="modal-title">Verifikasi Lokasi</h4>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">x</span>
                    </button>
                </div>
                <div class="modal-body">
                    <!-- form redirect to admin\UserController @store -->
                    <div class="form-group">     
                        <div class="row form-group">
                            <div class="col-md-6">
                                <label for="exampleFormControlInput1">Latitude</label>
                                <input type="text" class="form-control" name="Latitude"
                                    placeholder="" value="" readonly>
                            </div>

                            <div class="col-md-6">
                                <label for="exampleFormControlInput1">longitude</label>
                                <input type="text" class="form-control" name="longitude"
                                    placeholder="" value="" readonly>
                            </div>
                        </div>
                    </div>

                    <div class="row form-group">
                        <div class="col-md-6">
                            <label for="exampleFormControlInput1">qrcode</label>
                            <input type="text" class="form-control" name="qrcode"
                                    placeholder="" value="" readonly>
                        </div>
                        <div class="col-md-6">
                            <label for="exampleFormControlInput1">Rekening</label>
                            <input type="text" class="form-control" name="rekening"
                                    placeholder="" value="" readonly>                     
                        </div>
                    </div>   
                    
                    <!-- Jika status belum tervirikasi button ini ditampilkan -->
                    <div class="row form-group">
                        <div class="col-md-4">
                        </div>                        
                        <div class="col-md-4">
                        <button  type="submit" class="btn btn-success btn-block">Verifikasi</button>
                        </div>
                        <div class="col-md-4">
                        </div>           
                    </div>

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
        </script>
        <!-- Datatable script -->
    @endsection    
@endsection