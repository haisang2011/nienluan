@extends('Backend.layout.master');

@section('tieude')
    Tin tức | Cập nhật tin tức
@endsection

@section('quyen')
    Cập nhật tin tức
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
    <form action="{{route('Backend.tintuc.update', ['id' => $id->tt_ma])}}" method="post" enctype="multipart/form-data">
            @csrf
            <input type="hidden" name="_method" value="PUT" />
            <div class="form-group">
                    <label for="tl_ma">Thể loại</label>
                    <select name="tl_ma" id="tl_ma" class="form-control">
                            <option>Chọn thể loại</option>
                        @foreach($danhsachtheloai as $dstheloai)
                            @if(old('tl_ma', $id->LoaiTin->TheLoai->tl_ma) == $dstheloai->tl_ma)
                                <option value="{{$dstheloai->tl_ma}}" selected>{{$dstheloai->tl_ten}}</option>
                            @else
                                <option value="{{$dstheloai->tl_ma}}">{{$dstheloai->tl_ten}}</option>
                            @endif
                        @endforeach
                    </select>
            </div>
            <div class="form-group">
                    <label for="lt_ma">Loại tin</label>
                    <select name="lt_ma" id="lt_ma" class="form-control">
                            <option></option>
                        @foreach($danhsachloaitin as $dsloaitin)
                            @if(old('lt_ma', $id->LoaiTin->lt_ma) == $dsloaitin->lt_ma)
                                <option value="{{$dsloaitin->lt_ma}}" selected>{{$dsloaitin->lt_ten}}</option>
                            @else
                                <option value="{{$dsloaitin->lt_ma}}">{{$dsloaitin->lt_ten}}</option>
                            @endif
                        @endforeach
                    </select>
            </div>
            <div class="form-group">
                <label for="tt_tieuDe">Tiêu đề</label>
                <input type="text" class="form-control" id="tt_tieuDe" name="tt_tieuDe" value="{{ old('tt_tieuDe', $id->tt_tieuDe) }}">
            </div>
            <div class="form-group">
                    <label for="tt_tomTat">Tóm tắt</label>
                    <input type="text" class="form-control" id="tt_tomTat" name="tt_tomTat" value="{{old('tt_tomTat', $id->tt_tomTat)}}">
            </div>
            <div class="form-group">
                    <label for="tt_noiDung">Nội dung</label>
                    <textarea class="ckeditor" id="tt_noiDung" rows="10" cols="80" name="tt_noiDung">{{old('tt_noiDung', $id->tt_noiDung)}}</textarea>
            </div>
            <div class="form-group mt-5">
                    <div class="mb-3"><img width="300" src="{{asset('storage/photos/'. $id->tt_hinhAnh)}}" alt="" id="show-image-old"><p style="margin-left:83px;">{{substr($id->tt_hinhAnh,5)}}</p></div>
                    <div>
                            <strong><label for="tt_hinhAnh" id="hinhAnh">Hình ảnh</label></strong>
                            <input type="file" id="tt_hinhAnh" name="tt_hinhAnh" value="{{ old('tt_hinhAnh', $id->tt_hinhAnh) }}">
                    </div>
            </div>
            <button class="btn btn-success">Save</button>
    </form>

    {{-- Comment  --}}
        @if(session('thongbaobinhluan'))
        <div class="alert alert-success fade show mt-5" role="alert">
        <strong>{{session('thongbaobinhluan')}}</strong>
        <button type="button" class="close" data-dismiss="alert" aria-label="Close">
            <span aria-hidden="true">&times;</span>
        </button>
        </div>
        @endif
        <h2 class="mt-5">Danh sách các bình luận</h2>
    <table class="table table-striped mt-5">
            <thead>
                <tr>
                    <th scope="col">ID</th>
                    <th scope="col">Nội dung</th>
                    <th scope="col">Người viết bình luận</th>
                    <th scope="col">ID bình luận con</th>
                    <th scope="col">Ngày tạo</th>
                    <th scope="col">Delete</th>
                </tr>
            </thead>
            <tbody>
                @foreach($id->BinhLuan as $ds)
                    <tr>
                        <th scope="row">{{$ds->bl_ma}}</th>
                        <td>{{$ds->bl_noiDung}}</td>
                        <td>{{$ds->NguoiDung->nd_hoTen}}</td>
                        <td>{{$ds->bl_ma_sub}}</td>
                        <td>{{$ds->bl_taoMoi}}</td>
                        <td>
                            <form class="d-inline" method="post" action="{{ route('Backend.binhluan.delete', ['id_tt' => $id->tt_ma ,'id_bl' => $ds->bl_ma]) }}">
                                {{ csrf_field() }}
                                <input type="hidden" name="_method" value="DELETE" />
                                <button class="btn btn-danger"><i class="far fa-trash-alt" style="opacity:1; margin-right:5px;"></i>Delete</button>
                            </form>
                        </td>
                    </tr>
                @endforeach
            </tbody>
    </table>
    {{-- End Comment  --}}

@endsection

@section('script')
    <script>
        $(document).ready(function(){
            $("#tl_ma").change(function(){
                var ID_TheLoai = $(this).val();
                $.get("/admin/ajax/tintuc/"+ID_TheLoai, function(data){
                    $("#lt_ma").html(data);
                });
            });
        });
    </script>

<script type="text/javascript">
    CKEDITOR.replace('tt_noiDung', {
        filebrowserUploadUrl: "{{route('ckeditor.upload', ['_token' => csrf_token() ])}}",
        filebrowserUploadMethod: 'form'
    });
    CKEDITOR.config.uiColor = '#9AB8F3';
    CKEDITOR.config.height = '500px';
</script>
@endsection