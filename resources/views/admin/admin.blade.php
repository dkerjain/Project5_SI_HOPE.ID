@extends('layout.admin.index')
@section('title', 'Tabel Admin')
@section('extracss')
    <link rel="stylesheet" href="{{asset('assets/plugins/datatables-bs4/css/dataTables.bootstrap4.min.css')}}">
    <link rel="stylesheet" href="{{asset('assets/plugins/datatables-responsive/css/responsive.bootstrap4.min.css')}}">
@endsection
@section('content')
    <div class="row">
        <div class="col-md-12">
            @if (count($errors) > 0)
            <div class="alert alert-danger">
                <ul>
                    <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                    @foreach ($errors->all() as $error)
                        <li>{{ $error }}</li>
                    @endforeach
                </ul>
            </div>
            @endif
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
            <!-- card tabel pengambilan souvenir (SouvenirController @index_ambil) -->
            <div class="card">
                <div class="card-header">
                    <h3 class="card-title" style="font-weight : bold">Tabel Admin</h3>
                        <!-- modal button create ambil baru -->
                        <button type="button" class="btn btn-success btn-sm" style="float: right"
                                data-toggle="modal" data-target="#modal-default-tambah">
                            <i class="fa fa-plus"></i> Tambah Baru
                        </button>
                </div>
                <div class="card-body">
                    <table id="example1" class="table table-bordered table-striped">
                         <thead>
                            <tr style="text-align: center">
                                <th>ID User</th>    
                                <th>Nama</th>
                                <th>Username</th>
                                <th>Email</th>
                                <th>Aksi</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach($user as $u)
                            <tr style="text-align: center">
                                <td>{{ $u->ID_USER }}</th>
                                <td>{{ $u->NAMA }}</td>
                                <td>{{ $u->USERNAME }}</td>
                                <td>{{ $u->EMAIL }}</td>
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
    
    <!-- modal tambah admin -->
    <div class="modal fade" id="modal-default-tambah">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header bg-primary">
                    <h4 class="modal-title">Tambah Admin</h4>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">x</span>
                    </button>
                </div>
                <div class="modal-body">
                    <!-- form redirect to admin\AdminController @store -->
                    <form action="{{url('/adminbaru')}}" method="post">
                        {{csrf_field()}}
                        <div class="input-group flex-nowrap">
                            <span class="input-group-text" id="addon-wrapping">Name</span>
                            <input type="text" class="form-control" name="NAME" placeholder="" aria-label="Name" aria-describedby="addon-wrapping">
                        </div>
                        <br>
                        <div class="input-group flex-nowrap">
                            <span class="input-group-text" id="addon-wrapping">Username</span>
                            <input type="text" class="form-control" name="USERNAME" placeholder="" aria-label="Username" aria-describedby="addon-wrapping">
                        </div>
                        <br>
                        <div class="input-group flex-nowrap">
                            <span class="input-group-text" id="addon-wrapping">Email</span>
                            <input type="email" class="form-control" name="EMAIL" placeholder="" aria-label="Email" aria-describedby="addon-wrapping">
                        </div>
                        <br>
                        <div class="input-group flex-nowrap">
                            <span class="input-group-text" id="addon-wrapping">Password</span>
                            <input type="password" class="form-control" name="PASSWORD" placeholder="" aria-label="Password" aria-describedby="addon-wrapping">
                        </div>
                        <br>
                        <!-- button simpan -->
                        <div class="form-actions form-group">
                            <div class="modal-footer justify-content-between" style="float: right">
                                <button type="button" class="btn btn-danger" data-dismiss="modal" aria-label="Close">
                                    <span aria-hidden="true">Batal</span>
                                </button>
                                <button type="submit" class="btn btn-success">Simpan</button>
                            </div>
                        </div>
                    </form>
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