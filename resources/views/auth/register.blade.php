@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">{{ __('Register') }}</div>

                <div class="card-body">
                    <form method="POST" action="{{ route('register') }}">
                        @csrf

                        {{-- Ho ten --}}
                        <div class="form-group row">
                            <label for="nd_hoTen" class="col-md-4 col-form-label text-md-right">{{ __('Họ Tên') }}</label>

                            <div class="col-md-6">
                                <input id="nd_hoTen" type="text" class="form-control @error('nd_hoTen') is-invalid @enderror" name="nd_hoTen" value="{{ old('nd_hoTen') }}" autocomplete="nd_hoTen" autofocus>

                                @error('nd_hoTen')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                        </div>
                        {{-- End Ho Ten --}}

                        {{-- Email --}}
                        <div class="form-group row">
                            <label for="nd_email" class="col-md-4 col-form-label text-md-right">{{ __('Email') }}</label>

                            <div class="col-md-6">
                                <input id="nd_email" type="email" class="form-control @error('nd_email') is-invalid @enderror" name="nd_email" value="{{ old('nd_email') }}" autocomplete="nd_email" autofocus>

                                @error('nd_email')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                        </div>
                        {{-- End Email --}}


                        {{-- tai khoan --}}
                        <div class="form-group row">
                            <label for="nd_taiKhoan" class="col-md-4 col-form-label text-md-right">{{ __('Tài Khoản') }}</label>

                            <div class="col-md-6">
                                <input id="nd_taiKhoan" type="text" class="form-control @error('nd_taiKhoan') is-invalid @enderror" name="nd_taiKhoan" value="{{ old('nd_taiKhoan') }}" autocomplete="nd_taiKhoan" autofocus>

                                @error('nd_taiKhoan')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                        </div>
                        {{-- End tai khoan --}}

                        {{-- mat khau --}}
                        <div class="form-group row">
                            <label for="nd_matKhau" class="col-md-4 col-form-label text-md-right">{{ __('Mật Khẩu') }}</label>

                            <div class="col-md-6">
                                <input id="nd_matKhau" type="password" class="form-control @error('nd_matKhau') is-invalid @enderror" name="nd_matKhau" value="{{ old('nd_matKhau') }}" autocomplete="nd_matKhau" autofocus>

                                @error('nd_matKhau')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                        </div>
                        {{-- end mat khau --}}

                        {{-- ngay sinh --}}
                        <div class="form-group row">
                            <label for="nd_ngaySinh" class="col-md-4 col-form-label text-md-right">{{ __('Ngày Sinh') }}</label>

                            <div class="col-md-6">
                                <input id="nd_ngaySinh" type="date" class="form-control @error('nd_ngaySinh') is-invalid @enderror" name="nd_ngaySinh" value="{{ old('nd_ngaySinh') }}" autocomplete="nd_ngaySinh" autofocus>

                                @error('nd_ngaySinh')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                        </div>
                        {{-- End ngay sinh  --}}

                        {{-- dia chi --}}
                        <div class="form-group row">
                            <label for="nd_diaChi" class="col-md-4 col-form-label text-md-right">{{ __('Địa Chỉ') }}</label>

                            <div class="col-md-6">
                                <input id="nd_diaChi" type="text" class="form-control @error('nd_diaChi') is-invalid @enderror" name="nd_diaChi" value="{{ old('nd_diaChi') }}" autocomplete="nd_diaChi" autofocus>

                                @error('nd_diaChi')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                        </div>
                        {{-- End dia chi --}}

                        {{-- dien thoai --}}
                        <div class="form-group row">
                            <label for="nd_dienThoai" class="col-md-4 col-form-label text-md-right">{{ __('Số Điện Thoại') }}</label>

                            <div class="col-md-6">
                                <input id="nd_dienThoai" type="text" class="form-control @error('nd_dienThoai') is-invalid @enderror" name="nd_dienThoai" value="{{ old('nd_dienThoai') }}" autocomplete="nd_dienThoai" autofocus>

                                @error('nd_dienThoai')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                        </div>
                        {{-- End dien thoai  --}}

                        <div class="form-group row mb-0">
                            <div class="col-md-6 offset-md-4">
                                <button type="submit" class="btn btn-primary">
                                    {{ __('Register') }}
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
