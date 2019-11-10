@extends('Backend.layout.master');

@section('tieude')
    Loại tin | Danh sách loại tin
@endsection

@section('quyen')
    Danh sách loại tin
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
        <div>
            <select name="category" id="category" class="mb-3 form-control category">
                    <option value="-1">Tất cả</option>
                @foreach($danhsachtheloai as $theloai)
                    <option value="{{$theloai->tl_ma}}">{{$theloai->tl_ten}}</option>
                @endforeach
            </select>
        </div>
        <table class="table table-striped">
                <thead>
                    <tr>
                        <th scope="col">ID</th>
                        <th scope="col">Tên loại tin</th>
                        <th scope="col">Tên Thể loại</th>
                        <th scope="col">Ngày tạo loại tin</th>
                        <th scope="col">Ngày cập nhật loại tin</th>
                        <th scope="col">Delete</th>
                        <th scope="col">Edit</th>
                    </tr>
                </thead>
                <tbody id="list-loaitin">
                    @foreach($danhsachloaitin as $ds)
                        <tr>
                            <th scope="row">{{$ds->lt_ma}}</th>
                            <td>{{$ds->lt_ten}}</td>
                            <td>{{$ds->TheLoai->tl_ten}}</td>
                            <td>{{$ds->lt_taoMoi}}</td>
                            <td>{{$ds->lt_capNhat}}</td>
                            <td>
                                {{-- <a href="#"><i class="far fa-trash-alt"></i>Delete</a> --}}
                                <form class="d-inline" method="post" action="{{ route('Backend.loaitin.delete', ['id' => $ds->lt_ma]) }}">
                                    {{ csrf_field() }}
                                    <input type="hidden" name="_method" value="DELETE" />
                                    <button class="btn btn-danger"><i class="far fa-trash-alt" style="opacity:1; margin-right:5px;"></i>Delete</button>
                                </form>
                            </td>
                            <td>
                                <a href="{{route('Backend.loaitin.edit', ['id' => $ds->lt_ma])}}" class="btn btn-success"><i class="far fa-edit" style="opacity:1; margin-right:5px;"></i>Edit</a>
                            </td>
                        </tr>
                    @endforeach
                </tbody>
        </table>
@endsection

@section('script')
    <script>
        $(document).ready(function(){
            $("#category").change(function(){
                var id = $(this).val();
                $.get('/admin/ajax/loaitin/'+id, function(data){
                    $("#list-loaitin").html(data);
                });
            });
        });
    </script>
@endsection

