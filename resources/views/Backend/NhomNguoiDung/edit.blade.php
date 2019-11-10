@extends('Backend.layout.master');

@section('tieude')
    Nhóm người dùng | Cập nhật nhóm
@endsection

@section('quyen')
    Cập nhật nhóm
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

    <form action="{{route('Backend.nhomnguoidung.update', ['id' => $id->nnd_ma])}}" method="post">
            @csrf
            <input type="hidden" name="_method" value="PUT" />
            <div class="form-group">
                <label for="nnd_ten">Tên nhóm người dùng</label>
                <input type="text" class="form-control" id="nnd_ten" name="nnd_ten" value="{{ old('nnd_ten', $id->nnd_ten) }}">
            </div>
            <div class="form-group">
                <table class="table table-striped">
                    <tr>
                        <th>ID</th>
                        <th>Quyền</th>
                        <th>Lựa chọn</th>
                    </tr>
                    @foreach ($quyen as $q)
                        @php
                            $check = 0;   
                        @endphp
                        <tr>
                            <td>{{$q->q_ma}}</td>
                            <td>{{$q->q_ten}}</td>
                           
                            @foreach($show as $shows)
                                @if($q->q_ma === $shows->q_ma)
                                    @php
                                        $check = 1;
                                    @endphp
                                    @break
                                @endif
                            @endforeach
                            @if($check == 1)
                            <td><input type="checkbox" name="quyen[]" id="quyen_create_cb" value="{{$q->q_ma}}" checked ></td>
                            @else
                            <td><input type="checkbox" name="quyen[]" id="quyen_create_cb" value="{{$q->q_ma}}" ></td>
                            @endif
                        </tr>
                    @endforeach
                </table>
            </div>
            <button class="btn btn-success">Save</button>
    </form>
@endsection