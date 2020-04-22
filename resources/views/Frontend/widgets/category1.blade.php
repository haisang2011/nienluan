<div class="row">
        <div class="col-lg-12 my-4">
            <div class="title">
                <h2 style="border-bottom:1px solid #78b43d;border-width:3px;display:inline-block">
                    {{$theloai1->tl_ten}}
                </h2>
            </div>
        </div>
</div>
    
    <?php
    $tinmoinhat = $tinmoinhat->pluck('tt_ma');
                $mang;
                foreach($tinmoinhat as $index => $value){
                    $mang[$index] = $value;
                }
    ?>
    <?php
        $tin = DB::table('loaitin')->join('tintuc', 'tintuc.lt_ma', '=', 'loaitin.lt_ma')
        ->join('theloai', 'theloai.tl_ma', '=', 'loaitin.tl_ma')->whereNotIn('tintuc.tt_ma',$mang)
        ->where('theloai.tl_ma',$theloai1->tl_ma)->orderBy('tintuc.tt_taoMoi', 'DESC')->take(6)->get();
    ?>

    <div class="row">
        @foreach($tin as $tins)
            <div class="col-lg-4">
                <div class="class">
                <a href="{{url('/'.$tins->tl_tenkhongdau.'/'.$tins->lt_tenkhongdau.'/'.$tins->tt_ma)}}">
                    <img src="{{asset('storage/photos/'.$tins->tt_hinhAnh)}}" class="image" alt="">
                </a>
                </div>
                <div class="overall-recent-post mb-5">
                    <div class="loaitin">
                    <a href="{{url('/'.$tins->tl_tenkhongdau.'/'.$tins->lt_tenkhongdau.'.html')}}">{{$tins->lt_ten}}</a>
                    </div>
                    <div class="ngayviet">
                        <i><span>{{date('d/m/Y | H:i',strtotime($tins->tt_capNhat))}}</span></i>
                    </div>
                    <div class="overall-content-recent-post">
                        <h5>
                            <a href="{{url('/'.$tins->tl_tenkhongdau.'/'.$tins->lt_tenkhongdau.'/'.$tins->tt_ma)}}">{{$tins->tt_tieuDe}}</a>
                        </h5>
                    </div>
                </div>
            </div>
        @endforeach
    </div>