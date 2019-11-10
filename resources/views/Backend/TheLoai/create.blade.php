@extends('Backend.layout.master');

@section('tieude')
    Thể loại | Thêm thể loại
@endsection

@section('quyen')
    Thêm Thể loại
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
    <form action="{{route('Backend.theloai.store')}}" method="post">
            @csrf
            <div class="form-group">
                <label for="tl_ten">Tên thể loại</label>
                <input type="text" class="form-control" id="tl_ten" name="tl_ten" value="{{ old('tl_ten') }}">
            </div>
            <button class="btn btn-success">Save</button>
    </form>
@endsection