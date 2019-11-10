@extends('layouts.app')
@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">{{ __('Login') }}</div>

                <div class="card-body">
                    <form method="POST" action="{{ route('login') }}">
                        @csrf

                        <div class="form-group row">
                            <label for="email" class="col-md-4 col-form-label text-md-right">{{ __('Tài Khoản') }}</label>

                            <div class="col-md-6">
                                <input id="nd_taiKhoan" type="text" class="form-control" name="nd_taiKhoan" value="{{ old('nd_taiKhoan') }}" required autocomplete="email" autofocus>
                            </div>
                        </div>

                        <div class="form-group row">
                            <label for="password" class="col-md-4 col-form-label text-md-right">{{ __('Mật khẩu') }}</label>

                            <div class="col-md-6">
                                <input id="nd_matKhau" type="password" class="form-control" name="nd_matKhau" required autocomplete="current-password">
                                
                                @if(session('thongbao'))
                                    <div class="alert alert-danger mt-3" role="alert">
                                    <strong>{{session('thongbao')}}</strong>
                                    </div>
                                @endif
                            </div>
                        </div>

                        @if(Session::has('duongdan'))
                            <input type="hidden" value="{{Session::get('duongdan')}}" name="path">
                        @endif

                        <div class="form-group row mb-0">
                            <div class="col-md-8 offset-md-4">
                                <button type="submit" class="btn btn-primary">
                                    {{ __('Login') }}
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
