<?php
$tinmoinhat = $tinmoinhat->pluck('tt_ma');
            $mang;
            foreach($tinmoinhat as $index => $value){
                $mang[$index] = $value;
            }
?>
@foreach($theloai as $theloais)
<!-- Thanh Kết Thúc -->
<div class="row">
        <div class="col-lg-12 mt-5">
          <hr />
        </div>
    </div>
    <!-- End Thanh Kết Thúc -->

    <!-- Container -->
    <div class="container">

      <!-- Row -->
      <div class="row">
          <!-- Bài Đọc Nhiều Nhất -->
          <div class="col-lg-12 mb-5">
            <h3 style="border-bottom:1px solid #78b43d;border-width:3px;display:inline-block">{{$theloais->tl_ten}}</h3>
          </div>
          <!-- End Bài Đọc Nhiều Nhất -->
      </div>
      <!-- End Row -->

      <?php
        $tin = DB::table('loaitin')->join('tintuc', 'tintuc.lt_ma', '=', 'loaitin.lt_ma')
                ->join('theloai', 'theloai.tl_ma', '=', 'loaitin.tl_ma')
                ->where('theloai.tl_ma',$theloais->tl_ma)->orderBy('tintuc.tt_capNhat', 'DESC')
                ->whereNotIn('tintuc.tt_ma',$mang)
                ->take(5)->get();
      ?>
      <div class="row">
        <!-- row 4 -->
        @foreach($tin as $tins)
        <div class="col-lg-4 mb-5">
          <div class="class">
          <a href="{{url('/'.$tins->tl_tenkhongdau.'/'.$tins->lt_tenkhongdau.'/'.$tins->tt_ma)}}">
            <img src="{{asset('storage/photos/'.$tins->tt_hinhAnh)}}" width="350" height="200" alt="">
          </a>
          </div>
        </div>
        <div class="col-lg-8 mb-5">
            <div class="tieude">
                <h5 style="font-weight : bold;">
                  <a href="{{url('/'.$tins->tl_tenkhongdau.'/'.$tins->lt_tenkhongdau.'/'.$tins->tt_ma)}}">
                      {{$tins->tt_tieuDe}}
                  </a>
                </h5>
              </div>
                <div class="loaitin">
                    <a href="{{url('/'.$tins->tl_tenkhongdau.'/'.$tins->lt_tenkhongdau.'.html')}}">{{$tins->lt_ten}}</a>
                </div>
                <div class="ngayviet">
                    <i><span>{{date('d/m/Y | H:i',strtotime($tins->tt_capNhat))}}</span></i>
                </div>
                <div class="overall-content">
                  {{$tins->tt_tomTat}}
                </div>
        </div>
        @endforeach
      </div>

    </div>
    <!-- End Container -->
@endforeach