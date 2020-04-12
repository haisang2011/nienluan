@extends('Backend.layout.master');

@section('tieude')
    Loại tin | Thêm loại tin
@endsection

@section('quyen')
    Thêm loại tin
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


        @if(count($errors) > 0)
            @foreach($errors->all() as $err)
                <div class="alert alert-danger fade show" role="alert">
                    <b>{{$err}}</b>
                    <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
            @endforeach
        @endif
        
    <form action="{{route('Backend.loaitin.store')}}" method="post">
        @csrf
        <div class="form-group">
            <label for="tl_ma">Thể loại</label>
            <select name="tl_ma" id="tl_ma" class="form-control">
                @foreach ($theloai as $dstl)
                    @if(old('tl_ma') == $dstl->tl_ma)
                        <option value="{{$dstl->tl_ma}}" selected>{{$dstl->tl_ten}}</option>
                    @else
                        <option value="{{$dstl->tl_ma}}">{{$dstl->tl_ten}}</option>
                    @endif
                @endforeach
            </select>
        </div>
        <div class="form-group">
            <label for="lt_ten">Tên loại tin</label>
            <input type="text" class="form-control" id="lt_ten" name="lt_ten" value="{{ old('lt_ten') }}">
        </div>
        <button class="btn btn-success">Save</button>
    </form>
@endsection