@extends('layout.user.index')
@section('title', 'Register Customer')
@section('content')
<section class="kahfibwa mt-5">
    <div class="container">
    <div class="row">                
        <div class="col-md-12">
            <div class="card">
                <div class="card-header">Riwayat Investasi Anda
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
                                <th>Tanggal Apply</th>
                                <th>Nama Proyek</th>
                                <th>Jumlah Investasi</th>
                                <th>Jumlah Kembali</th>
                                <th>Status Invest</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach($riwayat as $r)
                            <tr style="text-align: center">
                                <td>{{$r->ID_PEMBAYARAN}}</td>
                                <td>{{\Carbon\Carbon::parse($r->TGLPEMBAYARAN)->translatedFormat('d-m-Y H:i')}}</td>
                                @foreach($riwayat_invest as $ri)
                                @if($r->ID_INVESTASI == $ri->ID_INVESTASI)
                                <td>{{$ri->NAMA_PROYEK}}</td>
                                @endif
                                @endforeach
                                <td>{{number_format($r->JUMLAHPEMBAYARAN)}}</td>
                                @php
                                    $jumlah=0;
                                    foreach($riwayat_invest as $ri){
                                        if($r->ID_INVESTASI == $ri->ID_INVESTASI){
                                            $jumlah=($ri->PERSENTASEPROFIT+100)/100*$r->JUMLAHPEMBAYARAN;
                                        }
                                    }                                    
                                @endphp
                                <td>{{number_format($jumlah)}}</td>
                                <td>Berjalan</td>
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