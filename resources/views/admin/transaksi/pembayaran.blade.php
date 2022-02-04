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
                                <th>Nama Proyek</th>
                                <th>Tanggal Pembayaran</th>
                                <th>Jumlah Pembayaran</th>
                                <th>Bukti Pembayaran</th>
                                <th>Status</th>
                                <th >Action</th>                                
                            </tr>
                        </thead>
                        <tbody>
                            @foreach ($pembayaran as $p)
                            <tr style="text-align: center">
                                @foreach ($proposal as $pr)
                                @if($p->ID_INVESTASI == $pr->ID_INVESTASI)
                                <td>{{$pr->NAMA_PROYEK}}</td>
                                @endif
                                @endforeach
                                <td>{{$p->TGLPEMBAYARAN}}</td>
                                <td>{{$p->JUMLAHPEMBAYARAN}}</td>
                                <td>
                                <a href="#bukti-{{$p->ID_PEMBAYARAN}}" class="btn btn-outline-info btn-block btn-md" 
                                        data-toggle="modal"><i class="fa fa-file-photo-o"></i>
                                         Bukti Transfer
                                    </a>
                                        <!-- modal bukti bayar -->
                                    <div class="modal fade" id="bukti-{{$p->ID_PEMBAYARAN}}" >
                                        <div class="modal-dialog">
                                            <div class="modal-content">
                                                <div class="modal-header bg-primary">
                                                    <h4 class="modal-title">Bukti Transfer</h4>
                                                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                                        <span aria-hidden="true">x</span>
                                                    </button>
                                                </div>
                                                <div class="modal-body">
                                                <div class="row form-group">                                                
                                                        <div class="col-md-12">
                                                            <embed src="{{url($p->BUKTI)}}" style="height:100%" width="100%" heigth="100%"></embed>
                                                        </div>           
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </td>
                                @if ($p->STATUSPEMBAYARAN == 0)
                                    <td>Proses</td>
                                @elseif ($p->STATUSPEMBAYARAN == 1)
                                    <td>di Tolak</td>
                                @else 
                                    <td>di Setujui</td>                                    
                                @endif
                                    @if ($p->STATUSPEMBAYARAN == 0)
                                        <form action="/admin/approvePembayaran/{{ $p->ID_PEMBAYARAN}}" method="post">
                                            {{csrf_field()}}
                                        <td width="10px"><button type="submit" class="btn btn-success btn-block">Approve</button>
                                        </form>
                                        <a href="#tolak{{ $p->ID_PEMBAYARAN}}" data-toggle="modal"><button type="submit" class="btn btn-secondary btn-block">Tolak</button></a></td>
                                        <div class="modal fade" id="tolak{{ $p->ID_PEMBAYARAN}}" >
                                            <div class="modal-dialog modal-md">
                                                <div class="modal-content">
                                                    <div class="modal-header bg-danger">
                                                        <h4 class="modal-title">Tolak</h4>
                                                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                                            <span aria-hidden="true">x</span>
                                                        </button>
                                                    </div>
                                                    <div class="modal-body">
                                                        <!-- form redirect to admin\UserController @store -->
                                                        <form action="/admin/tolak_pemabayaran/{{ $p->ID_PEMBAYARAN}}" method="post">
                                                                {{csrf_field()}}
                                                        <div class="form-group">     
                                                            <div class="row form-group">
                                                                <div class="col-md-12">
                                                                    <label for="exampleFormControlInput1">Alasan Penolakan</label>
                                                                    <textarea width="100%" type="text" class="form-control" name="keterangan"
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
                                                        </form>

                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    @else
                                        <td><a href="#alasan{{ $p->ID_PEMBAYARAN}}" data-toggle="modal"><button type="submit" class="btn btn-secondary btn-block">Alasan</button></a></td>
                                        <div class="modal fade" id="alasan{{ $p->ID_PEMBAYARAN}}" >
                                            <div class="modal-dialog modal-md">
                                                <div class="modal-content">
                                                    <div class="modal-header bg-danger">
                                                        <h4 class="modal-title">Alasan </h4>
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
                                                                    <textarea width="100%" type="text" class="form-control" name="keterangan"
                                                                        value="" readonly >{{$p->ALASAN}}</textarea>
                                                                </div>
                                                            </div>
                                                        </div>


                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    @endif
                            </tr>
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
        </script>
        <!-- Datatable script -->
    @endsection    
@endsection