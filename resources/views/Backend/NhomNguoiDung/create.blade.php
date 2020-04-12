@extends('Backend.layout.master');

@section('tieude')
    Nhóm người dùng | Thêm nhóm
@endsection

@section('quyen')
    Thêm nhóm
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
    <form action="{{route('Backend.nhomnguoidung.store')}}" method="post">
            @csrf
            <div class="form-group">
                <label for="nnd_ten">Tên nhóm người dùng</label>
                <input type="text" class="form-control" id="nnd_ten" name="nnd_ten" value="{{ old('nnd_ten') }}">
            </div>
            <div class="form-group">
                <table class="table table-striped">
                    <tr>
                        <th>ID</th>
                        <th>Quyền</th>
                        <th>Lựa chọn</th>
                    </tr>
                    @foreach ($quyen as $q)
                        <tr>
                            <td>{{$q->q_ma}}</td>
                            <td>{{$q->q_ten}}</td>
                            <td><input type="checkbox" name="quyen[]" id="quyen_create_cb" value="{{$q->q_ma}}"></td>
                        </tr>
                    @endforeach
                </table>
            </div>
            <button class="btn btn-success">Save</button>
    </form>
@endsection