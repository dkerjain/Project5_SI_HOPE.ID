@extends('layout.admin.index')
@section('title', 'Customer')
@section('extracss')
    <link rel="stylesheet" href="{{asset('assets/plugins/datatables-bs4/css/dataTables.bootstrap4.min.css')}}">
    <link rel="stylesheet" href="{{asset('assets/plugins/datatables-responsive/css/responsive.bootstrap4.min.css')}}">
@endsection
@section('content')
    <div class="row">
        <div class="col-md-12">
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
                    <h3 class="card-title" style="font-weight : bold">Tabel Customer</h3>
                </div>
                <div class="card-body">
                    <table id="example1" class="table table-bordered table-striped">
                         <thead>
                            <tr style="text-align: center">
                                <th>ID Invstor</th>
                                <th>Nama</th>
                                <th>Kota</th>
                                <th>Pekerjaan</th>
                                <th>Preview Dokumen</th>                     
                            </tr>
                        </thead>
                        <tbody>
                            @foreach ($customer as $c)
                            <tr style="text-align: center">
                                <td>{{$c->ID_CUSTOMER}}</td>
                                <td>{{$c->NAMA_CUSTOMER}}</td>
                                @foreach($kota as $k)
                                @if($k->ID_KOTA == $c->KOTA)
                                <td>{{$k->NAMA_KOTA}}</td>
                                @endif
                                @endforeach
                                <td>{{$c->PEKERJAAN}}</td>
                                <td>
                                    <a href="#detail-{{$c->ID_CUSTOMER}}" class="btn btn-outline-info btn-block btn-md" 
                                        data-toggle="modal"><i class="fa fa-user"></i>
                                         Preview Data
                                    </a>
                                    <!-- modal detail customer -->
                                    <div class="modal fade" id="detail-{{$c->ID_CUSTOMER}}" >
                                        <div class="modal-dialog">
                                            <div class="modal-content">
                                                <div class="modal-header bg-primary">
                                                    <h4 class="modal-title">Detail Customer</h4>
                                                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                                        <span aria-hidden="true">x</span>
                                                    </button>
                                                </div>
                                                <div class="modal-body">
                                                    <!-- form redirect to admin\UserController @store -->
                                                    <div class="form-group">     
                                                        <div class="row form-group">
                                                            <div class="col-md-6">
                                                                <label for="exampleFormControlInput1">Nama Lengkap (Sesuai KTP)</label>
                                                                <input type="text" class="form-control" name="nama_customer"
                                                                    placeholder="" value="{{$c->NAMA_CUSTOMER}}" readonly>
                                                            </div>

                                                            <div class="col-md-6">
                                                                <label for="exampleFormControlInput1">Nama Ibu Kandung</label>
                                                                <input type="text" class="form-control" name="nama_ibukandung"
                                                                    placeholder="" value="{{$c->NAMA_IBUKANDUNG}}" readonly>
                                                            </div>
                                                        </div>
                                                    </div>

                                                    <div class="row form-group">
                                                        <div class="col-md-6">
                                                            <label for="exampleFormControlInput1">Email</label>
                                                            @foreach($user as $u)
                                                            @if($u->ID_USER == $c->ID_USER)
                                                            <input type="text" class="form-control" name="EMAIL"
                                                                    placeholder="" value="{{$u->EMAIL}}" readonly>
                                                            @endif
                                                            @endforeach
                                                        </div>
                                                        <div class="col-md-6">
                                                            <label for="exampleFormControlInput1">Nomor Handphone</label>
                                                            <input type="text" class="form-control" name="nomorhp"
                                                                    placeholder="" value="{{$c->NOMORHP}}" readonly>                     
                                                        </div>
                                                    </div>        

                                                    <div class="row form-group">
                                                        <div class="col-md-6">
                                                            <label for="exampleFormControlInput1">Alamat</label>
                                                            <input type="text" class="form-control" name="alamat"
                                                                    placeholder="" value="{{$c->ALAMAT}}" readonly>
                                                        </div>
                                                        <div class="col-md-6">
                                                            <label for="exampleFormControlInput1">Kota</label>
                                                            @foreach($kota as $k)
                                                            @if($k->ID_KOTA == $c->KOTA)
                                                            <input type="text" class="form-control" name="kota"
                                                                    placeholder="" value="{{$k->NAMA_KOTA}}" readonly>
                                                            @endif
                                                            @endforeach
                                                        </div>   
                                                    </div>
                                                    
                                                    <div class="row form-group">
                                                        <div class="col-md-6">
                                                            <label for="exampleFormControlInput1">Sumber dana</label>                           
                                                            <input type="text" class="form-control" name="sumberdana"
                                                                    placeholder="" value="{{$c->SUMBERDANA}}" readonly>
                                                            <label for="exampleFormControlInput1"></label>
                                                        </div>
                                                        <div class="col-md-6">
                                                            <label for="exampleFormControlInput1">Pekerjaan</label>                           
                                                            <input type="text" class="form-control" name="pekerjaan"
                                                                    placeholder="" value="{{$c->PEKERJAAN}}" readonly>
                                                        </div>
                                                    </div>

                                                    <div class="row form-group">
                                                        <div class="col-md-6">
                                                            <label for="exampleFormControlInput1">Penghasilan</label>
                                                            <input type="text" class="form-control" name="penghasilan"
                                                                    placeholder="" value="{{ number_format($c->PENGHASILAN)}}" readonly> 
                                                        </div>
                                                        <div class="col-md-6">
                                                            <label for="exampleFormControlInput1">Bank</label>
                                                            @foreach($bank as $b)
                                                            @if($c->ID_BANK == $b->ID_BANK)
                                                            <input type="text" class="form-control" name="bank"
                                                                    placeholder="" value="{{$b->NAMA_BANK}}" readonly> 
                                                            @endif
                                                            @endforeach
                                                        </div>    
                                                    </div>
                                                    <div class="row form-group">
                                                        <div class="col-md-3">
                                                            <input type="hidden">
                                                        </div>
                                                        <div class="col-md-6">
                                                            <label for="exampleFormControlInput1">Nomor Rekening</label>
                                                            <input type="text" class="form-control" name="nomorrekening"
                                                                    placeholder="" value="{{$c->NOMORREKENING}}" readonly> 
                                                        </div>
                                                        <div class="col-md-3">
                                                            <input type="hidden">
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                    <a href="#preview-ktp-{{$c->ID_CUSTOMER}}" class="btn btn-outline-info btn-block btn-md" 
                                        data-toggle="modal"><i class="fa fa-file-photo-o"></i>
                                         Preview KTP
                                    </a>
                                    <!-- modal preview KTP customer -->
                                    <div class="modal fade" id="preview-ktp-{{$c->ID_CUSTOMER}}" >
                                        <div class="modal-dialog">
                                            <div class="modal-content">
                                                <div class="modal-header bg-primary">
                                                    <h4 class="modal-title">Preview KTP</h4>
                                                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                                        <span aria-hidden="true">x</span>
                                                    </button>
                                                </div>
                                                <div class="modal-body">
                                                    <div class="row form-group">
                                                        @foreach($dokumen_customer as $d)
                                                        @if($d->ID_CUSTOMER == $c->ID_CUSTOMER)
                                                        <div class="col-md-6">
                                                            <embed src="{{url($d->FOTOKTP)}}" style="height:100%" width="100%" heigth="100%"></embed>
                                                        </div>
                                                        <div class="col-md-6">
                                                            <embed src="{{url($d->SELFIEKTP)}}" style="height:100%" width="100%" heigth="100%"></embed>
                                                        </div>    
                                                        @endif
                                                        @endforeach                
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                    <a href="#preview-npwp-{{$c->ID_CUSTOMER}}" class="btn btn-outline-info btn-block btn-md" 
                                        data-toggle="modal"><i class="fa fa-file-photo-o"></i>
                                         Preview NPWP
                                    </a>
                                        <!-- modal preview npwp customer -->
                                    <div class="modal fade" id="preview-npwp-{{$c->ID_CUSTOMER}}" >
                                        <div class="modal-dialog">
                                            <div class="modal-content">
                                                <div class="modal-header bg-primary">
                                                    <h4 class="modal-title">Preview NPWP</h4>
                                                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                                        <span aria-hidden="true">x</span>
                                                    </button>
                                                </div>
                                                <div class="modal-body">
                                                <div class="row form-group">
                                                        @foreach($dokumen_customer as $d)
                                                        @if($d->ID_CUSTOMER == $c->ID_CUSTOMER)                                                
                                                        <div class="col-md-12">
                                                            <embed src="{{url($d->FOTONPWP)}}" style="height:100%" width="100%" heigth="100%"></embed>
                                                        </div>       
                                                        @endif
                                                        @endforeach            
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
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