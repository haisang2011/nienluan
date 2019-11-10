@extends('Backend.layout.master');

@section('tieude')
    Người dùng | Thêm người dùng
@endsection

@section('quyen')
    Thêm người dùng
@endsection

@section('content')
        @if(session('thongbao'))
            <div class="alert alert-success fade show" role="alert">
            <strong>{{session('thongbao')}}</strong>
            <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                <span aria-hidden="true">&times;</span>
            </button>
            </div>
        @endif

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
    <form action="{{route('Backend.nguoidung.store')}}" method="post">
            @csrf
            <div class="form-group">
                    <label for="nnd_ma">Nhóm người dùng</label>
                    <select name="nnd_ma" id="nnd_ma" class="form-control">
                        @foreach($nnd as $ds)
                            <option value="{{$ds->nnd_ma}}">{{$ds->nnd_ten}}</option>
                        @endforeach
                    </select>
            </div>
            <div class="form-group">
                <label for="nd_hoTen">Họ tên</label>
                <input type="text" class="form-control" id="nd_hoTen" name="nd_hoTen" value="{{ old('nd_hoTen') }}">
            </div>
            <div class="form-group">
                    <label for="nd_email">Email</label>
                    <input type="text" class="form-control" id="nd_email" name="nd_email" value="{{ old('nd_email') }}">
            </div>
            <div class="form-group">
                    <label for="nd_taiKhoan">Tài khoản</label>
                    <input type="text" class="form-control" id="nd_taiKhoan" name="nd_taiKhoan" value="{{ old('nd_taiKhoan') }}">
            </div>
            <div class="form-group">
                    <label for="nd_matKhau">Mật khẩu</label>
                    <input type="password" class="form-control" id="nd_matKhau" name="nd_matKhau" value="{{ old('nd_matKhau') }}">
            </div>
            <div class="form-group">
                    <label for="nd_ngaySinh">Ngày sinh</label>
                    <input type="date" class="form-control" id="nd_ngaySinh" name="nd_ngaySinh" value="{{ old('nd_ngaySinh') }}">
            </div>
            <div class="form-group">
                    <label for="nd_diaChi">Địa chỉ</label>
                    <input type="text" class="form-control" id="nd_diaChi" name="nd_diaChi" value="{{ old('nd_diaChi') }}">
            </div>
            <div class="form-group">
                    <label for="nd_dienThoai">Điện thoại</label>
                    <input type="text" class="form-control" id="nd_dienThoai" name="nd_dienThoai" value="{{ old('nd_dienThoai') }}">
            </div>
            <button class="btn btn-success">Save</button>
    </form>
@endsection