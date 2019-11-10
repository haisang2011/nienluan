@extends('Backend.layout.master');

@section('tieude')
    Nhóm người dùng | Danh sách nhóm người dùng
@endsection

@section('quyen')
    Danh sách nhóm người dùng
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
        <table class="table table-striped">
                <thead>
                    <tr>
                        <th scope="col">ID</th>
                        <th scope="col">Nhóm</th>
                        <th scope="col">Quyền</th>
                        <th scope="col">Ngày tạo nhóm</th>
                        <th scope="col">Ngày cập nhật nhóm</th>
                        <th scope="col">Delete</th>
                        <th scope="col">Edit</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach($danhsach as $ds)
                        <tr>
                            <th scope="row">{{$ds->nnd_ma}}</th>
                            <td>{{$ds->nnd_ten}}</td>
                            <td>
                                <table>
                                    <tr>
                                        <th>ID</th>
                                        <th>Tên</th>
                                    </tr>
                                    @foreach($ds->NhomNguoiDungQuyen->all() as $nnd_q)
                                        <tr>
                                            <td>{{$nnd_q->q_ma}}</td>
                                            <td>{{$nnd_q->Quyen->q_ten}}</td>
                                        </tr>
                                    @endforeach
                                </table>
                            </td>
                            <td>{{$ds->nnd_taoMoi}}</td>
                            <td>{{$ds->nnd_capNhat}}</td>
                            @if($auth->nd_taiKhoan == "root" && $ds->nnd_ma == 1)
                            <td>
                                {{-- <a href="#"><i class="far fa-trash-alt"></i>Delete</a> --}}
                                <form class="d-inline" method="post" action="{{ route('Backend.nhomnguoidung.delete', ['id' => $ds->nnd_ma]) }}">
                                    {{ csrf_field() }}
                                    <input type="hidden" name="_method" value="DELETE" />
                                    <button class="btn btn-danger"><i class="far fa-trash-alt" style="opacity:1; margin-right:5px;"></i>Delete</button>
                                </form>
                            </td>
                            <td>
                                <a href="{{route('Backend.nhomnguoidung.edit', ['id' => $ds->nnd_ma])}}" class="btn btn-success"><i class="far fa-edit" style="opacity:1; margin-right:5px;"></i>Edit</a>
                            </td>
                            @elseif($auth->nd_taiKhoan != "root" && $ds->nnd_ma == 1)
                            <td>
                                {{-- <a href="#"><i class="far fa-trash-alt"></i>Delete</a> --}}
                                <form class="d-inline" method="post" action="{{ route('Backend.nhomnguoidung.delete', ['id' => $ds->nnd_ma]) }}">
                                    {{ csrf_field() }}
                                    <input type="hidden" name="_method" value="DELETE" />
                                    <button disabled class="btn btn-danger"><i class="far fa-trash-alt" style="opacity:1; margin-right:5px;"></i>Delete</button>
                                </form>
                            </td>
                            <td>
                                <button disabled class="btn btn-success"><i class="far fa-edit" style="opacity:1; margin-right:5px;"></i>Edit</button>
                            </td>
                            @else
                            <td>
                                {{-- <a href="#"><i class="far fa-trash-alt"></i>Delete</a> --}}
                                <form class="d-inline" method="post" action="{{ route('Backend.nhomnguoidung.delete', ['id' => $ds->nnd_ma]) }}">
                                    {{ csrf_field() }}
                                    <input type="hidden" name="_method" value="DELETE" />
                                    <button class="btn btn-danger"><i class="far fa-trash-alt" style="opacity:1; margin-right:5px;"></i>Delete</button>
                                </form>
                            </td>
                            <td>
                                <a href="{{route('Backend.nhomnguoidung.edit', ['id' => $ds->nnd_ma])}}" class="btn btn-success"><i class="far fa-edit" style="opacity:1; margin-right:5px;"></i>Edit</a>
                            </td>
                            @endif
                        </tr>
                    @endforeach
                </tbody>
        </table>
@endsection