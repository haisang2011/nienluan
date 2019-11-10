@extends('Backend.layout.master');

@section('tieude')
    Người dùng | Danh sách người dùng
@endsection

@section('quyen')
    Danh sách người dùng
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
    <select name="nnd_ma" id="nnd_ma" class="form-control">
            <option value="-1">Tất cả</option>
        @foreach($nhomnguoidung as $nnd)
            <option value="{{$nnd->nnd_ma}}">{{$nnd->nnd_ten}}</option>
        @endforeach
    </select>
<div id="noidung">
    @foreach($danhsachnguoidung as $ds)
        @if($ds->nd_taiKhoan == "root")
            @continue
        @endif
        <table class="table table-striped mb-5 mt-5">
            
            <tr>
                <th scope="col">ID</th>
                <td>{{$ds->nd_ma}}</td>
            </tr>
            <tr>
                <th scope="col">Họ tên</th>
                <td>{{$ds->nd_hoTen}}</td>
            </tr>
            <tr>
                <th scope="col">Thuộc nhóm người dùng</th>
                <td>{{$ds->NhomNguoiDung->nnd_ten}}</td>
            </tr>
            <tr>
                <th scope="col">Email</th>
                <td>{{$ds->nd_email}}</td>
            </tr>
            <tr>
                <th scope="col">Tài khoản</th>
                <td>{{$ds->nd_taiKhoan}}</td>
            </tr>
            <tr>
                <th scope="col">Ngày sinh</th>
                <td>{{$ds->nd_ngaySinh}}</td>
            </tr>
            <tr>
                <th scope="col">Địa chỉ</th>
                <td>{{$ds->nd_diaChi}}</td>
            </tr>
            <tr>
                <th scope="col">Điện thoại</th>
                <td>{{$ds->nd_dienThoai}}</td>
            </tr>
            <tr>
                <th scope="col">Ngày tạo</th>
                <td>{{$ds->nd_taoMoi}}</td>
            </tr>
            <tr>
                <th scope="col">Ngày cập nhật</th>
                <td>{{$ds->nd_capNhat}}</td>
            </tr>
            @if($auth->nd_taiKhoan == "root" && $ds->nnd_ma == 1)
            <tr>
                <td>
                    <form class="d-inline" method="post" action="{{ route('Backend.nguoidung.delete', ['id' => $ds->nd_ma]) }}">
                        {{ csrf_field() }}
                        <input type="hidden" name="_method" value="DELETE" />
                        <button class="btn btn-danger"><i class="far fa-trash-alt" style="opacity:1; margin-right:5px;"></i>Delete</button>
                    </form>
                    <a href="{{route('Backend.nguoidung.edit', ['id' => $ds->nd_ma])}}" class="btn btn-success"><i class="far fa-edit" style="opacity:1; margin-right:5px;"></i>Edit</a>
                </td>
                <td></td>
            </tr>
            @elseif($auth->nd_taiKhoan != "root" && $ds->nnd_ma == 1)
            <tr>
                <td>
                    <form class="d-inline" method="post" action="{{ route('Backend.nguoidung.delete', ['id' => $ds->nd_ma]) }}">
                        {{ csrf_field() }}
                        <input type="hidden" name="_method" value="DELETE" />
                        <button disabled class="btn btn-danger"><i class="far fa-trash-alt" style="opacity:1; margin-right:5px;"></i>Delete</button>
                    </form>
                    <button disabled class="btn btn-success"><i class="far fa-edit" style="opacity:1; margin-right:5px;"></i>Edit</button>
                </td>
                <td></td>
            </tr>
            @else
            <tr>
                <td>
                    <form class="d-inline" method="post" action="{{ route('Backend.nguoidung.delete', ['id' => $ds->nd_ma]) }}">
                        {{ csrf_field() }}
                        <input type="hidden" name="_method" value="DELETE" />
                        <button class="btn btn-danger"><i class="far fa-trash-alt" style="opacity:1; margin-right:5px;"></i>Delete</button>
                    </form>
                    <a href="{{route('Backend.nguoidung.edit', ['id' => $ds->nd_ma])}}" class="btn btn-success"><i class="far fa-edit" style="opacity:1; margin-right:5px;"></i>Edit</a>
                </td>
                <td></td>
            </tr>
            @endif
        </table>
        @endforeach
</div>
@endsection

@section('script')
    <script>
        $(document).ready(function(){
            $("#nnd_ma").change(function(){
                var Id = $(this).val();
                // /admin ... ... ko co / o trc admin se k chay
                $.get('/admin/ajax/nguoidung/'+Id, function(data){
                    $("#noidung").html(data);
                });
            });
        });
    </script>
@endsection