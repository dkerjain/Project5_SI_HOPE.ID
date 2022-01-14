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
                    <h3 class="card-title" style="font-weight : bold">Data Pembayaran Investasi</h3>
                </div>
                <div class="card-body">
                    <table id="example1" class="table table-bordered table-striped">
                         <thead>
                            <tr style="text-align: center">
                                <th>Nama Pembayaran</th>
                                <th>Tanggal Pembayaran</th>
                                <th>Jenis Investasi</th>
                                <th>Jumlah Pembayaran</th>
                                <th>Status</th>
                                <th >Action</th>                                
                            </tr>
                        </thead>
                        <tbody>
                            <tr style="text-align: center">
                            <td></td>
                                <td></td>
                                <td></td>
                                <td></td>
                                <td></td>
                                <td width="10px"><button type="submit" class="btn btn-success btn-block">Approve</button>
                                    <a href="#tolak" data-toggle="modal"><button type="submit" class="btn btn-secondary btn-block">Tolak</button></a></td>
                            </tr>
                        </tbody>
                    </table>
                </div>
            </div>
            
        </div>
    </div>

     <!-- modal tolak -->
     <div class="modal fade" id="tolak" >
        <div class="modal-dialog modal-md">
            <div class="modal-content">
                <div class="modal-header bg-danger">
                    <h4 class="modal-title">Verifikasi Lokasi</h4>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">x</span>
                    </button>
                </div>
                <div class="modal-body">
                    <!-- form redirect to admin\UserController @store -->
                    <div class="form-group">     
                        <div class="row form-group">
                            <div class="col-md-12">
                                <label for="exampleFormControlInput1">Alasan Penolakan</label>
                                <textarea width="100%" type="text" class="form-control" name="Latitude"
                                    placeholder="" value="" ></textarea>
                            </div>
                        </div>
                    </div>

                   
                    <div class="row form-group">
                        <div class="col-md-4">
                        </div>                        
                        <div class="col-md-4">
                        <button  type="submit" class="btn btn-danger btn-block">Tolak Pengajuan</button>
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