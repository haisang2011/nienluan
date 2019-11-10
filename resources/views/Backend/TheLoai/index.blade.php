@extends('Backend.layout.master');

@section('tieude')
    Thể loại | Danh sách thể loại
@endsection

@section('quyen')
    Danh sách thể loại
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
                        <th scope="col">Tên thể loại</th>
                        <th scope="col">Ngày tạo thể loại</th>
                        <th scope="col">Ngày cập nhật thể loại</th>
                        <th scope="col">Delete</th>
                        <th scope="col">Edit</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach($danhsachtheloai as $ds)
                        <tr>
                            <th scope="row">{{$ds->tl_ma}}</th>
                            <td>{{$ds->tl_ten}}</td>
                            <td>{{$ds->tl_taoMoi}}</td>
                            <td>{{$ds->tl_capNhat}}</td>
                            <td>
                                {{-- <a href="#"><i class="far fa-trash-alt"></i>Delete</a> --}}
                                <form class="d-inline" method="post" action="{{ route('Backend.theloai.delete', ['id' => $ds->tl_ma]) }}">
                                    {{ csrf_field() }}
                                    <input type="hidden" name="_method" value="DELETE" />
                                    <button class="btn btn-danger"><i class="far fa-trash-alt" style="opacity:1; margin-right:5px;"></i>Delete</button>
                                </form>
                            </td>
                            <td>
                                <a href="{{route('Backend.theloai.edit', ['id' => $ds->tl_ma])}}" class="btn btn-success"><i class="far fa-edit" style="opacity:1; margin-right:5px;"></i>Edit</a>
                            </td>
                        </tr>
                    @endforeach
                </tbody>
        </table>
@endsection