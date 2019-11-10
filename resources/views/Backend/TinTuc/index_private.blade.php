@extends('Backend.layout.master');

@section('tieude')
    Tin tức | Danh sách tin tức
@endsection

@section('quyen')
    Danh sách tin tức
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
    <?php
        $trangquantri = DB::table('nhomnguoidung_quyen')->join('quyen','quyen.q_ma','=','nhomnguoidung_quyen.q_ma')
        ->join('nhomnguoidung','nhomnguoidung.nnd_ma','=','nhomnguoidung_quyen.nnd_ma')->where('nhomnguoidung.nnd_ma',$auth->nnd_ma)->pluck('quyen.q_ma');

        $check_per2 = 0;
        $check_per3 = 0;
        $mang;
        foreach($trangquantri as $index => $value){
        $mang[$index] = $value;
        }
        if(in_array(2,$mang)){
            $check_per2 = 1;
        }
        if(in_array(3,$mang)){
            $check_per3 = 1;
        }

    ?>
        <table class="table table-striped">
                <thead>
                    <tr>
                        <th scope="col">ID</th>
                        <th scope="col">Tiêu đề</th>
                        <th scope="col">Tóm tắt</th>
                        <th scope="col">Thể loại</th>
                        <th scope="col">Loại tin</th>
                        <th scope="col">Số lượt xem</th>
                        @if($check_per2==1)
                        <th scope="col">Delete</th>
                        @endif
                        @if($check_per3==1)
                        <th scope="col">Edit</th>
                        @endif
                    </tr>
                </thead>
                <tbody>
                    @foreach($danhsachtintuc as $ds)
                        <tr>
                            <th scope="row">{{$ds->tt_ma}}</th>
                            <td>{{$ds->tt_tieuDe}}</td>
                            <td>{{$ds->tt_tomTat}}</td>
                            <td>{{$ds->LoaiTin->TheLoai->tl_ten}}</td>
                            <td>{{$ds->LoaiTin->lt_ten}}</td>
                            <td>{{$ds->tt_soLuotXem}}</td>
                            @if($check_per2==1)
                            <td>
                                {{-- <a href="#"><i class="far fa-trash-alt"></i>Delete</a> --}}
                                <form class="d-inline" method="post" action="{{ route('Backend.tintuc.delete', ['id' => $ds->tt_ma]) }}">
                                    {{ csrf_field() }}
                                    <input type="hidden" name="_method" value="DELETE" />
                                    <button class="btn btn-danger"><i class="far fa-trash-alt" style="opacity:1; margin-right:5px;"></i>Delete</button>
                                </form>
                            </td>
                            @endif
                            @if($check_per3==1)
                            <td>
                                <a href="{{route('Backend.tintuc.edit', ['id' => $ds->tt_ma])}}" class="btn btn-success"><i class="far fa-edit" style="opacity:1; margin-right:5px;"></i>Edit</a>
                            </td>
                            @endif
                        </tr>
                    @endforeach
                </tbody>
        </table>
@endsection


