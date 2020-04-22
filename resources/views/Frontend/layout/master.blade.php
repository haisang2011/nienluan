<!doctype html>
<html lang="en">
<head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

    <!-- Bootstrap CSS -->
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css" integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">
    <link rel="stylesheet" href="{{asset('vendor/fontawesome/fontawesome-free-5.10.2-web/css/all.css')}}">
    <title>Hello, world!</title>
    <link href="https://fonts.googleapis.com/css?family=Nunito+Sans&display=swap" rel="stylesheet">
    <link rel="stylesheet" href="{{asset('css/frontend.css')}}">
</head>
<body>
        {{-- Navbar  --}}
        @include("Frontend.widgets.navbar", [$theloai = $theloai])
        {{-- End Navbar  --}}

        <section>
            <?php   
                $loaitin1 = $category->shift();
                $tin = DB::table('loaitin')->join('tintuc','tintuc.lt_ma','=','loaitin.lt_ma')
                ->join('theloai','theloai.tl_ma','=','loaitin.tl_ma')->where('loaitin.lt_ma',$loaitin1->lt_ma)
                ->orderBy('tt_capNhat','DESC')->take(6)->get();
            ?>
            <div class="container"> <!-- Container -->
                <h3 class="my-3" style="border-bottom:1px solid #78b43d;border-width:3px;display:inline-block">{{$loaitin1->lt_ten}}</h3>
                <div class="row">
                    <div class="col-lg-6"> <!-- Col 6 -->


                        <?php 
                            $tin1 = $tin->shift();
                        ?>
                        <div class="edit">
                                <div class="class">
                                    <a href="{{url('/'.$tin1->tl_tenkhongdau.'/'.$tin1->lt_tenkhongdau.'/'.$tin1->tt_ma)}}">
                                            <img src="{{asset('storage/photos/'.$tin1->tt_hinhAnh)}}" class="image" alt="">
                                    </a>
                                </div>
                                            <div class="overall"> <!-- cho nay gan cung style -->
                                                <div class="overall-content">
                                                    <h4>
                                                        <a href="{{url('/'.$tin1->tl_tenkhongdau.'/'.$tin1->lt_tenkhongdau.'/'.$tin1->tt_ma)}}">
                                                            {{$tin1->tt_tieuDe}}
                                                        </a>
                                                    </h4>
                                                </div>
                                            </div>
                        </div>

                        <?php
                            $tin4 = $tin->splice(0,2);
                        ?>
                        <div class="row mt-5"> <!-- row -->
                            @foreach($tin4 as $tins)
                            <div class="col-lg-6">
                                <div class="class">
                                    <a href="{{url('/'.$tins->tl_tenkhongdau.'/'.$tins->lt_tenkhongdau.'/'.$tins->tt_ma)}}">
                                            <img src="{{asset('storage/photos/'.$tins->tt_hinhAnh)}}" class="image" alt="">
                                    </a>
                                </div>
                                    <div class="mt-3">
                                        <h5>
                                            <a href="{{url('/'.$tins->tl_tenkhongdau.'/'.$tins->lt_tenkhongdau.'/'.$tins->tt_ma)}}">
                                                {{$tins->tt_tieuDe}}
                                            </a>
                                        </h5>
                                        <div class="ngayviet">
                                            <i><span>{{date('d/m/Y | H:i',strtotime($tins->tt_capNhat))}}</span></i>
                                        </div>
                                    </div>
                            </div>
                            @endforeach
                        </div> <!-- end row -->


                    </div>  <!-- End Col 6 -->

                    <div class="col-lg-6">  <!-- Col 6 -->
                        <div class="row">
                            @foreach($tin->all() as $tins)
                            <!----------------------------------- --------------------------------------------->
                            <div class="col-lg-6 mb-3">  <!-- Sub Col 6 -->
                                <div class="class">
                                <a href="{{url('/'.$tins->tl_tenkhongdau.'/'.$tins->lt_tenkhongdau.'/'.$tins->tt_ma)}}">
                                    <img src="{{asset('storage/photos/'.$tins->tt_hinhAnh)}}" class="image" alt="">
                                </a>
                            </div>
                            </div>  <!-- End Sub Col 6 -->

                            <div class="col-lg-6"> <!-- Sub Col 6 -->
                                <h5><a href="{{url('/'.$tins->tl_tenkhongdau.'/'.$tins->lt_tenkhongdau.'/'.$tins->tt_ma)}}">{{$tins->tt_tieuDe}}</a></h5>
                                <div class="ngayviet">
                                        <i><span>{{date('d/m/Y | H:i',strtotime($tins->tt_capNhat))}}</span></i>
                                    </div>
                            </div> <!-- End Sub Col 6 -->
                            <!---------------------------------------- ----------------------------------------->
                            @endforeach
                        </div>
                    </div>  <!-- End Col 6 -->
                </div> <!-- end row -->

                <?php
                    $loaitin2 = $category->shift();
                    $tin = DB::table('loaitin')->join('tintuc','tintuc.lt_ma','=','loaitin.lt_ma')
                    ->join('theloai','theloai.tl_ma','=','loaitin.tl_ma')
                    ->where('loaitin.lt_ma',$loaitin2->lt_ma)->orderBy('tt_capNhat','DESC')->take(4)->get();
                ?>
                <h4 class="mt-5" style="border-bottom:1px solid #78b43d;border-width:3px;display:inline-block">{{$loaitin2->lt_ten}}</h4>
                <div class="row mt-5"> <!-- row -->
                    <?php
                        $tin1 = $tin->shift();
                    ?>
                    <div class="col-lg-6"> <!-- Col-6 -->
                        <div class="class">
                            <a href="{{url('/'.$tin1->tl_tenkhongdau.'/'.$tin1->lt_tenkhongdau.'/'.$tin1->tt_ma)}}">
                                    <img src="{{asset('storage/photos/'.$tin1->tt_hinhAnh)}}" class="image" alt="">
                            </a>
                        </div>
                                <div class="mt-3">
                                    <div>
                                        <h5>
                                            <a href="{{url('/'.$tin1->tl_tenkhongdau.'/'.$tin1->lt_tenkhongdau.'/'.$tin1->tt_ma)}}">
                                                {{$tin1->tt_tieuDe}}
                                            </a>
                                        </h5>
                                        <div class="ngayviet">
                                            <i><span>{{date('d/m/Y | H:i',strtotime($tins->tt_capNhat))}}</span></i>
                                        </div>
                                    </div>
                                </div>
                    </div>  <!-- End Col-6 -->

                    <div class="col-lg-6">  <!-- Col-6 -->
                        <div class="row">
                            @foreach($tin->all() as $tins)
                            <div class="col-lg-6 mb-3"> <!--  -->
                                <h5>
                                    <a href="{{url('/'.$tins->tl_tenkhongdau.'/'.$tins->lt_tenkhongdau.'/'.$tins->tt_ma)}}">
                                        {{$tins->tt_tieuDe}}
                                    </a>
                                </h5>
                                <div class="ngayviet">
                                    <i><span>{{date('d/m/Y | H:i',strtotime($tins->tt_capNhat))}}</span></i>
                                </div>
                            </div>
                            <div class="col-lg-6 mb-3">
                                <div class="class">
                                <a href="{{url('/'.$tins->tl_tenkhongdau.'/'.$tins->lt_tenkhongdau.'/'.$tins->tt_ma)}}">
                                    <img src="{{asset('storage/photos/'.$tins->tt_hinhAnh)}}" class="image" alt="">
                                </a>
                            </div>
                            </div> <!--  -->
                            @endforeach
                        </div> <!-- end row -->

                    </div>  <!-- End Col-6 -->
                </div><!-- end row -->

                @foreach($category->all() as $categorys)
            <h4 class="mt-6 mb-5" style="border-bottom:1px solid #78b43d;border-width:3px;display:inline-block">{{$categorys->lt_ten}}</h4>
            <?php
                $tin = DB::table('loaitin')->join('tintuc','tintuc.lt_ma','=','loaitin.lt_ma')
                ->join('theloai','theloai.tl_ma','=','loaitin.tl_ma')
                ->where('loaitin.lt_ma',$categorys->lt_ma)->orderBy('tt_capNhat','DESC')->take(7)->get();
                $tin1 = $tin->shift();
            ?>
                <div class="row">
                    <div class="col-lg-6"> <!-- Col-6 -->
                            <div class="edit">
                                    <div class="class">
                                        <a href="{{url('/'.$tin1->tl_tenkhongdau.'/'.$tin1->lt_tenkhongdau.'/'.$tin1->tt_ma)}}">
                                            <img src="{{asset('storage/photos/'.$tin1->tt_hinhAnh)}}" class="image" alt="">
                                        </a>
                                    </div>
                                        <div class="overall">
                                            <h5>
                                                <a href="{{url('/'.$tin1->tl_tenkhongdau.'/'.$tin1->lt_tenkhongdau.'/'.$tin1->tt_ma)}}" style="color:white;">
                                                    {{$tin1->tt_tieuDe}}
                                                </a>
                                            </h5>
                                        </div>
                            </div>
                    
                    </div> <!-- End Col-6 -->
                    <?php
                        $tin2 = $tin->splice(0,2);
                    ?>
                    <div class="col-lg-6">
                        <div class="row">
                            @foreach($tin2 as $tins)
                            <div class="col-lg-6">
                                <div class="class">
                                    <a href="{{url('/'.$tins->tl_tenkhongdau.'/'.$tins->lt_tenkhongdau.'/'.$tins->tt_ma)}}">
                                            <img src="{{asset('storage/photos/'.$tins->tt_hinhAnh)}}" class="image" alt="">
                                    </a>
                                </div>
                                        <div class="mt-3">
                                            <h5>
                                                <a href="{{url('/'.$tins->tl_tenkhongdau.'/'.$tins->lt_tenkhongdau.'/'.$tins->tt_ma)}}">
                                                    {{$tins->tt_tieuDe}}
                                                </a>
                                            </h5>
                                        </div>
                                        <div class="ngayviet">
                                            <i><span>{{date('d/m/Y | H:i',strtotime($tins->tt_capNhat))}}</span></i>
                                        </div>
                            </div>
                            @endforeach
                        </div>
                    </div>
                </div>

                <div class="row mt-5">
                    @foreach($tin->all() as $tins)
                        <div class="col-lg-3">
                            <div class="class">
                            <a href="{{url('/'.$tins->tl_tenkhongdau.'/'.$tins->lt_tenkhongdau.'/'.$tins->tt_ma)}}">
                                <img src="{{asset('storage/photos/'.$tins->tt_hinhAnh)}}" class="image" alt="">
                            </a>
                        </div>
                            <div class="mt-3">
                                <h5>
                                    <a href="{{url('/'.$tins->tl_tenkhongdau.'/'.$tins->lt_tenkhongdau.'/'.$tins->tt_ma)}}">
                                        {{$tins->tt_tieuDe}}
                                    </a>
                                </h5>
                            </div>
                            <div class="ngayviet">
                                <i><span>{{date('d/m/Y | H:i',strtotime($tins->tt_capNhat))}}</span></i>
                            </div>
                        </div>
                    @endforeach
                        

                        

                        
                    </div>
                    @endforeach
            </div> <!-- End Container -->
        </section>

        @include('Frontend.widgets.footer')

    <script src="https://code.jquery.com/jquery-3.3.1.slim.min.js" integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo" crossorigin="anonymous"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.7/umd/popper.min.js" integrity="sha384-UO2eT0CpHqdSJQ6hJty5KVphtPhzWj9WO1clHTMGa3JDZwrnQq4sF86dIHNDz0W1" crossorigin="anonymous"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.min.js" integrity="sha384-JjSmVgyd0p3pXB1rRibZUAYoIIy6OrQ6VrjIEaFf/nJGzIxFDsf4x0xIM+B07jRM" crossorigin="anonymous"></script>
    <script>
            $(document).ready(function(){
              $("#toggle").click(function(){
                $("#sub-menu-toggle").toggle();
              });
            });
          </script>
</body>
</html>