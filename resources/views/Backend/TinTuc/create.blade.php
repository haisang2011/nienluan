@extends('Backend.layout.master');

@section('tieude')
    Tin tức | Thêm tin tức
@endsection

@section('quyen')
    Thêm tin tức
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
    <form action="{{route('Backend.tintuc.store')}}" method="post" enctype="multipart/form-data">
            @csrf
            <div class="form-group">
                    <label for="tl_ma">Thể loại</label>
                    <select name="tl_ma" id="tl_ma" class="form-control">
                            <option>Chọn thể loại</option>
                        @foreach($danhsachtheloai as $dstheloai)
                            @if(old('tl_ma') == $dstheloai->tl_ma)
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
                            @if(old('lt_ma') == $dsloaitin->lt_ma)
                                <option value="{{$dsloaitin->lt_ma}}" selected>{{$dsloaitin->lt_ten}}</option>
                            @else
                                <option value="{{$dsloaitin->lt_ma}}">{{$dsloaitin->lt_ten}}</option>
                            @endif
                        @endforeach
                    </select>
            </div>
            <div class="form-group">
                <label for="tt_tieuDe">Tiêu đề</label>
                <input type="text" class="form-control" id="tt_tieuDe" name="tt_tieuDe" value="{{ old('tt_tieuDe') }}">
            </div>
            <div class="form-group">
                    <label for="tt_tomTat">Tóm tắt</label>
                    <input id="tt_tomTat" class="form-control" name="tt_tomTat" value="{{old('tt_tomTat')}}" />
            </div>
            <div class="form-group">
                    <label for="tt_noiDung">Nội dung</label>
                    <textarea class="ckeditor" id="tt_noiDung" rows="10" cols="80" name="tt_noiDung">{{old('tt_noiDung')}}</textarea>
            </div>
            <div class="form-group">
                    <label for="tt_hinhAnh">Hình ảnh</label>
                    <input type="file" class="" id="tt_hinhAnh" name="tt_hinhAnh" value="{{ old('tt_hinhAnh') }}">
            </div>
            <button class="btn btn-success">Save</button>
    </form>
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

    {{-- editor --}}
<script type="text/javascript">
    CKEDITOR.replace('tt_noiDung', {
        filebrowserUploadUrl: "{{route('ckeditor.upload', ['_token' => csrf_token() ])}}",
        filebrowserUploadMethod: 'form'
    });
    CKEDITOR.config.uiColor = '#9AB8F3';
    CKEDITOR.config.height = '500px';
</script>
@endsection