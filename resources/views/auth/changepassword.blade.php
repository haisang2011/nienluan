@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header"><strong><h3>Thay đổi mật khẩu</h3></strong></div>

                <div class="card-body">
                    <form method="POST" id="" action="{{ route('password.changepassword') }}">
                        @csrf

                        {{-- <input type="hidden" name="token" value="{{ $token }}"> --}}
                        @if(count('errors') > 0)
                            @foreach($errors->all() as $err)
                            <div class="alert alert-danger fade show" role="alert">
                                <b>{{$err}}</b>
                                <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                                    <span aria-hidden="true">&times;</span>
                                </button>
                            </div>
                            @endforeach
                        @endif

                        @if(session("message_error"))
                        <div class="alert alert-danger fade show" role="alert">
                                <b>{{session('message_error')}}</b>
                                <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                                    <span aria-hidden="true">&times;</span>
                                </button>
                            </div>
                        @endif

                        @if(session("thongbao"))
                        <div class="alert alert-success fade show" role="alert">
                                <b>{{session('thongbao')}}</b>
                                <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                                    <span aria-hidden="true">&times;</span>
                                </button>
                            </div>
                        @endif

                        <div class="form-group row">
                                <label for="nd_taiKhoan" class="col-md-4 col-form-label text-md-right">Tài khoản</label>
    
                                <div class="col-md-6">
                                    <input disabled id="nd_taiKhoan" type="text" class="form-control" name="taiKhoan" value="{{$auth->nd_taiKhoan}}" required autocomplete="nd_taiKhoan" autofocus>    
                                    <input id="nd_taiKhoan_hidden" type="hidden" class="form-control" name="nd_taiKhoan" value="{{$auth->nd_taiKhoan}}" required autocomplete="nd_taiKhoan" autofocus>    
                                </div>
                            </div>

                        <div class="form-group row">
                            <label for="nd_matKhau" class="col-md-4 col-form-label text-md-right">Mật khẩu cũ</label>

                            <div class="col-md-6">
                                <input id="nd_matKhau" type="password" class="form-control" name="nd_matKhau" value="" required autocomplete="nd_matKhau" autofocus>
                                <input type="hidden" value="{{$auth->nd_ma}}" id="manguoidung">
                            </div>
                        </div>

                        <div class="form-group row">
                            <label for="nd_matKhau_new" class="col-md-4 col-form-label text-md-right">Mật khẩu mới</label>

                            <div class="col-md-6">
                                <input id="nd_matKhau_new" type="password" class="form-control" name="nd_matKhau_new" required autocomplete="nd_matKhau_new">

                                
                            </div>
                        </div>

                        <div class="form-group row">
                            <label for="password-confirm" class="col-md-4 col-form-label text-md-right">Xác nhận mật khẩu</label>

                            <div class="col-md-6">
                                <input id="password-confirm" type="password" class="form-control" name="password_confirmation" required autocomplete="nd_matKhau_new">
                            </div>
                        </div>
                        <div class="form-group row mb-0">
                            <div class="col-md-6 offset-md-4">
                                <button type="submit" id="submit" class="btn btn-primary">
                                    Save
                                </button>
                            </div>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
