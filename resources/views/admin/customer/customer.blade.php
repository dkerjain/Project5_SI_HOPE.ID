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
                                <th>Waktu Aktif</th>
                                <th>Email</th>
                                <th>Detail</th>                         
                            </tr>
                        </thead>
                        <tbody>
                            @foreach ($customer as $customer)
                            <tr style="text-align: center">
                                <td>{{date('d F Y H:i:s', strtotime($customer->created_at))}}</td>
                                <td>{{$customer->EMAIL}}</td>
                                <td>
                                    <a href="#detail-{{$customer->id}}" class="btn btn-outline-info btn-block btn-md" 
                                        data-toggle="modal"><i class="fa fa-user"></i>
                                         Preview Data
                                    </a>
                                    <a href="#preview-ktp-{{$customer->id}}" class="btn btn-outline-info btn-block btn-md" 
                                        data-toggle="modal"><i class="fa fa-file-photo-o"></i>
                                         Preview KTP
                                    </a>
                                    <a href="#preview-npwp-{{$customer->id}}" class="btn btn-outline-info btn-block btn-md" 
                                        data-toggle="modal"><i class="fa fa-file-photo-o"></i>
                                         Preview NPWP
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

    <!-- modal detail customer -->
    @foreach($customer as $c)
    <div class="modal fade" id="detail-{{$customer->id}}" >
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header bg-primary">
                    <h4 class="modal-title">Verifikasi Customer</h4>
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
                                    placeholder="" value="{{$customer->nama_customer}}" readonly>
                            </div>

                            <div class="col-md-6">
                                <label for="exampleFormControlInput1">Nama Ibu Kandung</label>
                                <input type="text" class="form-control" name="nama_ibukandung"
                                    placeholder="" value="{{$customer->nama_ibukandung}}" readonly>
                            </div>
                        </div>
                    </div>

                    <div class="row form-group">
                        <div class="col-md-6">
                            <label for="exampleFormControlInput1">Email</label>
                            <input type="text" class="form-control" name="EMAIL"
                                    placeholder="" value="{{$customer->EMAIL}}" readonly>
                        </div>
                        <div class="col-md-6">
                            <label for="exampleFormControlInput1">Nomor Handphone</label>
                            <input type="text" class="form-control" name="nomorhp"
                                    placeholder="" value="{{$customer->nomorhp}}" readonly>                     
                        </div>
                    </div>        

                    <div class="row form-group">
                        <div class="col-md-6">
                            <label for="exampleFormControlInput1">Alamat</label>
                            <input type="text" class="form-control" name="alamat"
                                    placeholder="" value="{{$customer->alamat}}" readonly>
                        </div>
                        <div class="col-md-6">
                            <label for="exampleFormControlInput1">Provinsi*</label>
                            <select class="form-control select-component select-provinsi" id="" name="provinsi" required>
                                <option>Pilih Provinsi ...</option>
                            </select>
                        </div>   
                    </div>
                    
                    <div class="row form-group">
                        <div class="col-md-6">
                            <label for="exampleFormControlInput1">Sumber dana</label>                           
                            <input type="text" class="form-control" name="sumberdana"
                                    placeholder="" value="{{$customer->sumberdana}}" readonly>
                            <label for="exampleFormControlInput1"></label>
                        </div>
                        <div class="col-md-6">
                            <label for="exampleFormControlInput1">Pekerjaan</label>                           
                            <input type="text" class="form-control" name="pekerjaan"
                                    placeholder="" value="{{$customer->pekerjaan}}" readonly>
                        </div>
                    </div>

                    <div class="row form-group">
                        <div class="col-md-6">
                            <label for="exampleFormControlInput1">Penghasilan</label>
                            <input type="text" class="form-control" name="penghasilan"
                                    placeholder="" value="{{$customer->penghasilan}}" readonly> 
                        </div>
                        <div class="col-md-6">
                            <label for="exampleFormControlInput1">Bank</label>
                            <input type="text" class="form-control" name="bank"
                                    placeholder="" value="{{$customer->bank}}" readonly> 
                        </div>    
                    </div>
                    <div class="row form-group">
                        <div class="col-md-3">
                            <input type="hidden">
                        </div>
                        <div class="col-md-6">
                            <label for="exampleFormControlInput1">Nomor Rekening</label>
                            <input type="text" class="form-control" name="nomorrekening"
                                    placeholder="" value="{{$customer->nomorrekening}}" readonly> 
                        </div>
                        <div class="col-md-3">
                            <input type="hidden">
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    @endforeach

    <!-- modal preview KTP customer -->
    @foreach($customer as $c)
    <div class="modal fade" id="preview-ktp-{{$customer->id}}" >
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
                        <div class="col-md-6">
                            <embed src="{{url('/previewktp/'.$customer->id)}}" style="height:100%" width="100%" heigth="100%"></embed>
                        </div>
                        <div class="col-md-6">
                            <embed src="{{url('/previewselfiektp/'.$customer->id)}}" style="height:100%" width="100%" heigth="100%"></embed>
                        </div>                    
                    </div>
                </div>
            </div>
        </div>
    </div>
    @endforeach

    <!-- modal preview npwp customer -->
    @foreach($customer as $c)
    <div class="modal fade" id="preview-npwp-{{$customer->id}}" >
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
                        <div class="col-md-12">
                            <embed src="{{url('/previewnpwp/'.$customer->id)}}" style="height:100%" width="100%" heigth="100%"></embed>
                        </div>                   
                    </div>
                </div>
            </div>
        </div>
    </div>
    @endforeach

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