@extends('layout.user.index')
@section('title', 'Register Customer')
@section('content')
<section class="kahfibwa mt-5">
    <div class="container">
    <div class="row">                
        <div class="col-md-12">
            <div class="card">
                <div class="card-header">Riwayat Pengajuan Proyek Anda
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
                                <th>Periode Proyek</th>
                                <th>Status</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach($riwayat as $r)
                            <tr style="text-align: center">
                                <td>{{$r->ID_INVESTASI}}</td>
                                <td>{{$r->TGL_PENGAJUAN}}</td>
                                <td>{{$r->NAMA_PROYEK}}</td>
                                <td>{{$r->JUMLAHKEBUTUHAN}}</td>
                                <td>{{$r->PERIODEKONTRAK}}</td>
                                @if($r->STATUS_PROPOSAL == 0)
                                <td>Menunggu Verifikasi</td>
                                @elseif($r->STATUS_PROPOSAL == 1)
                                <td>Proposal Diterima</td>
                                @elseif($r->STATUS_PROPOSAL == 2)
                                <td>Proposal Ditolak</td>
                                @endif
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
        <!-- Datatable script -->

    @endsection   
@endsection