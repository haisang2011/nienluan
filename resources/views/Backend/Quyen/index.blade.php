@extends('Backend.layout.master');

@section('tieude')
    Quyền | Danh sách quyền
@endsection

@section('quyen')
    Danh sách quyền
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
                        <th scope="col">Tên quyền</th>
                        <th scope="col">Diễn giải</th>
                        <th scope="col">Ngày tạo quyền</th>
                        <th scope="col">Ngày cập nhật quyền</th>
                        {{-- <th scope="col">Delete</th>
                        <th scope="col">Edit</th> --}}
                    </tr>
                </thead>
                <tbody id="list-loaitin">
                    @foreach($danhsachquyen as $ds)
                        <tr>
                            <th scope="row">{{$ds->q_ma}}</th>
                            <td>{{$ds->q_ten}}</td>
                            <td>{{$ds->q_dienGiai}}</td>
                            <td>{{$ds->q_taoMoi}}</td>
                            <td>{{$ds->q_capNhat}}</td>
                            {{-- <td>
                                <form class="d-inline" method="post" action="{{ route('Backend.quyen.delete', ['id' => $ds->q_ma]) }}">
                                    {{ csrf_field() }}
                                    <input type="hidden" name="_method" value="DELETE" />
                                    <button class="btn btn-danger"><i class="far fa-trash-alt" style="opacity:1; margin-right:5px;"></i>Delete</button>
                                </form>
                            </td>
                            <td>
                                <a href="{{route('Backend.quyen.edit', ['id' => $ds->q_ma])}}" class="btn btn-success"><i class="far fa-edit" style="opacity:1; margin-right:5px;"></i>Edit</a>
                            </td> --}}
                        </tr>
                    @endforeach
                </tbody>
        </table>
@endsection