@extends('Backend.layout.master');

@section('tieude')
    Người dùng | Cập nhật người dùng
@endsection

@section('quyen')
    Cập nhật người dùng
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
    <form action="{{route('Backend.nguoidung.update', ['id' => $id->nd_ma])}}" method="post">
            @csrf
            <input type="hidden" name="_method" value="PUT" />
            <div class="form-group">
                    <label for="nnd_ma">Nhóm người dùng</label>
                    <select name="nnd_ma" id="nnd_ma" class="form-control">
                        @foreach($nnd as $ds)
                            @if(old('nnd_ma',$id->nnd_ma) == $ds->nnd_ma)
                                <option value="{{$ds->nnd_ma}}" selected>{{$ds->nnd_ten}}</option>
                            @else
                                <option value="{{$ds->nnd_ma}}">{{$ds->nnd_ten}}</option>
                            @endif
                        @endforeach
                    </select>
            </div>
            <div class="form-group">
                <label for="nd_hoTen">Họ tên</label>
                <input type="text" class="form-control" id="nd_hoTen" name="nd_hoTen" value="{{ old('nd_hoTen', $id->nd_hoTen) }}">
            </div>
            <div class="form-group">
                    <?php
                        $ngay = date('Y-m-d',strtotime($id->nd_ngaySinh));
                    ?>
                    <label for="nd_ngaySinh">Ngày sinh</label>
                    <input type="date" class="form-control" id="nd_ngaySinh" name="nd_ngaySinh" value="{{ old('nd_ngaySinh', $ngay) }}">
            </div>
            <div class="form-group">
                    <label for="nd_diaChi">Địa chỉ</label>
                    <input type="text" class="form-control" id="nd_diaChi" name="nd_diaChi" value="{{ old('nd_diaChi', $id->nd_diaChi) }}">
            </div>
            <button class="btn btn-success">Save</button>
    </form>
@endsection