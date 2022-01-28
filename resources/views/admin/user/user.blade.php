@extends('layout.admin.index')
@section('title', 'User')
@section('extracss')
    <link rel="stylesheet" href="{{asset('assets/plugins/datatables-bs4/css/dataTables.bootstrap4.min.css')}}">
    <link rel="stylesheet" href="{{asset('assets/plugins/datatables-responsive/css/responsive.bootstrap4.min.css')}}">
@endsection
@section('content')
    <div class="row">
        <div class="col-md-12">
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
            @if (count($errors) > 0)
                <div class="m-2 alert alert-danger">
                    <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                    <ul>
                        @foreach ($errors->all() as $error)
                        <li>{{ $error }}</li>
                        @endforeach
                    </ul>
                </div>
                @endif
            <!-- card tabel pengambilan souvenir (SouvenirController @index_ambil) -->
            <div class="card">
                <div class="card-header">
                    <h3 class="card-title" style="font-weight : bold">Tabel User</h3>
                </div>
                <div class="card-body">
                    <table id="example1" class="table table-bordered table-striped">
                         <thead>
                            <tr style="text-align: center">
                                <th>ID User</th>
                                <th>Username</th>
                                <th>Email</th>
                                <th>Role</th>
                                <th>Aksi</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach($user as $u)
                            <tr style="text-align: center">
                                <td>{{$u->ID_USER}}</td>
                                <td>{{$u->USERNAME}}</td>
                                <td>{{$u->EMAIL}}</td>
                                @if($u->ROLE==1)
                                    <td>Admin</td>
                                @elseif($u->ROLE==2)
                                    <td>Umum</td>
                                @elseif($u->ROLE==3)
                                    <td>Petani</td>
                                @elseif($u->ROLE==4)
                                    <td>Customer</td>
                                @endif
                                <td> 
                                    <a href="/hapususer/{{$u->ID_USER}}">
                                        <button type="submit" class="btn btn-danger btn-sm" onclick="return confirm('Apakah Anda yakin menghapus data ini?')">
                                            <i class="fa fa-trash"></i> Hapus
                                        </button>
                                    </a>
                                </td>
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