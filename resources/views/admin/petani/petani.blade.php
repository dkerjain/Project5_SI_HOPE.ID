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
                                <th>Lokasi</th>
                                <th>Status</th>
                                <th colspan="2">Verifikasi</th>                                
                            </tr>
                        </thead>
                        <tbody>
                            <tr style="text-align: center">
                                <td></td>
                                <td></td>
                                <td></td>
                                <td></td>
                                <td width="10px"><button type="submit" class="btn btn-success btn-block">Dokumen</button></td>
                                <td width="10px"><button type="submit" class="btn btn-primary btn-block">Lokasi</button></td>
                            </tr>
                        </tbody>
                    </table>
                </div>
            </div>

            
            <!-- card tabel pengambilan souvenir (SouvenirController @index_ambil) -->
            <div class="card">
                <div class="card-header">
                    <h3 class="card-title" style="font-weight : bold">Data Petani Terverifikasi</h3>
                </div>
                <div class="card-body">
                    <table id="example1" class="table table-bordered table-striped">
                         <thead>
                            <tr style="text-align: center">
                                <th>Waktu Aktif</th>
                                <th>Nama Perusahaan</th>
                                <th>Lokasi</th>
                                <th>Status</th>
                                <th colspan="2">Detail</th>                                
                            </tr>
                        </thead>
                        <tbody>
                            <tr style="text-align: center">
                                <td></td>
                                <td></td>
                                <td></td>
                                <td></td>
                                <td width="10px"><button type="submit" class="btn btn-success btn-block">Dokumen</button></td>
                                <td width="10px"><button type="submit" class="btn btn-primary btn-block">Lokasi</button></td>
                            </tr>
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
        </script>
        <!-- Datatable script -->
    @endsection    
@endsection