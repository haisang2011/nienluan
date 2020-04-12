@extends('Backend.layout.master');

@section('quyen')
    Thêm quyền
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
    <form action="{{route('Backend.quyen.store')}}" method="post">
            @csrf
            <div class="form-group">
                <label for="q_ten">Tên quyền</label>
                <input type="text" class="form-control" id="q_ten" name="q_ten" value="{{ old('q_ten') }}">
            </div>
            <div class="form-group">
                    <label for="q_dienGiai">Diễn giải</label>
                    <input type="text" class="form-control" id="q_dienGiai" name="q_dienGiai" value="{{ old('q_dienGiai') }}">
            </div>
            <button class="btn btn-success">Save</button>
    </form>
@endsection