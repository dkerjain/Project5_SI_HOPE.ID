@extends('layout.user.index')
@section('title', 'Registrasi Akun')
@section('content')
<section class="kahfibwa mt-5">
    <div class="container">
        <div class="row">
            <div class="col-2"></div>
            <div class="col-md-8">
                <div class="card">
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
                    <div class="card-body card-block">
                        <form action="{{url('/userbaru')}}" method="post">
                            {{csrf_field()}}
                            <div class="form-group">
                                <label>Username</label>
                                <input name="username" type="text" class="form-control" placeholder="Username" required>
                            </div>
                            <div class="form-group">
                                <label>Email address</label>
                                <input name="email" type="email" class="form-control" placeholder="Email" required>
                            </div>
                            <div class="form-group">
                                <label>Password</label>
                                <input name="password" type="password" class="form-control" placeholder="Password" required>
                                <input type="hidden" class="form-control" name="ROLE" value="customer" placeholder="">
                            </div>

                            <div class="register-link m-t-15 text-center">
                                <button type="submit" class="btn btn-success btn-block">Daftar</button>
                                <p>Sudah punya akun? <a href="{{ url('/login')}}"> Masuk</a></p>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
            <div class="col-2"></div>
        </div>
    </div>
</section>

@endsection