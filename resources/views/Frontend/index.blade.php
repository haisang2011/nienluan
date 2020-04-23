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
    <link rel="stylesheet" type="text/css" href="http://www.example.com/style.css?ts=<?=time()?>" />
  </head>
  <body>
    <!-- Header -->
    @include('Frontend.widgets.navbar', [$theloai = $theloai])
    <!-- End Header -->

<!-- Section -->
<section>
    <!-- Container -->
    <div class="container">

    <div class="chatbot-circle"><i class="fas fa-sms"></i></div>
    <div class="chatbot-box">
        <div id="getting">Nhấn Vào để Bắt Đầu</div>
        <div class="chatbot-head">
            <div class="avatar">
                <span class="icon"><img src="{{asset('chatbot.png')}}" width="30" height="30" alt="Avatar Chatbot"></span>
                <span class="name-chatbot">ChatBot News</span>
                <span class="status"></span>
            </div>
            <span class="close"><i class="fas fa-times"></i></span>
        </div>
        <div class="chatbot-body" id="chat-body">
            <div style="margin-top:15px;"></div>
            {{-- Section Messages --}}
            {{-- <div class="res-bot">
                <div class="block-icon">
                    <div class="res-avatar"><i class="fas fa-comment-alt"></i></div>
                </div>
                <div class="block-messages" style="35%">
                    <div class="res-messages"><span>Nguyen Huynh Hai Sang la</span> </div>
                </div>
            </div>
            <div style="clear:both;"></div>
            <div class="res-u">
                <div class="block-messages-u">
                    <div class="res-messages-u"><span>Nguyen Huynh Hai Sang la</span> </div>
                </div>
            </div>
            <div style="clear:both;" class="bottom"></div> --}}
            {{-- =================================================== --}}

            {{-- End Section Messages --}}
        </div>
        <div class="chatbot-footer">
            <input type="text" placeholder="Type a message..." class="type-message">
            <button class="submit-chatbot" ><img src="{{asset('send.png')}}" alt="Icon Send" srcset=""></button>
        </div>
    </div>

    <!-- Bài viết mới nhất -->
    {{-- @include('Frontend.widgets.newposts', [$newpost_2 = $newpost_2]); --}}
    <?php
      $tinmoinhat = DB::table('loaitin')->join('tintuc','tintuc.lt_ma','=','loaitin.lt_ma')->join('theloai','theloai.tl_ma','=','loaitin.tl_ma')
      ->orderBy('tintuc.tt_capNhat','DESC')->orderBy('tintuc.tt_soLuotXem','ASC')->take(2)->get();

    $loaibotin = $tinmoinhat->pluck('tt_ma');
            $mang;
            foreach($loaibotin as $index => $value){
                $mang[$index] = $value;
            }
    ?>
    <div class="row">
        @foreach($tinmoinhat as $tinmoinhat_2)
        <div class="col-lg-6 mt-5">
            <div class="class">
                <a href="{{url('/trangchu/'.$tinmoinhat_2->tl_tenkhongdau.'/'.$tinmoinhat_2->lt_tenkhongdau.'/'.$tinmoinhat_2->tt_ma)}}">
                    <img src="{{asset('storage/photos/'.$tinmoinhat_2->tt_hinhAnh)}}" class="image-section-one image" alt="">
                </a>
                <div class="overall">
                    <div class="loaitin">
                        <a href="{{url('/trangchu/'.$tinmoinhat_2->tl_tenkhongdau.'/'.$tinmoinhat_2->lt_tenkhongdau.'.html')}}" style="color:white">{{$tinmoinhat_2->lt_ten}}</a>
                    </div>
                    <div class="overall-content">
                        <h5>
                            <a href="{{url('/trangchu/'.$tinmoinhat_2->tl_tenkhongdau.'/'.$tinmoinhat_2->lt_tenkhongdau.'/'.$tinmoinhat_2->tt_ma)}}" style="color:white">
                                {{$tinmoinhat_2->tt_tieuDe}}
                            </a>
                        </h5>
                    </div>
                </div>
                <div class="lastest">
                    Mới nhất
                </div>
            </div>
        </div>
        @endforeach
    </div>
    <!-- End Bài viết mới nhất -->


    {{-- Category Sports --}}
    <?php
        $theloai1 = $theloai->shift();
    ?>
    @include('Frontend.widgets.category1', [$theloai1 = $theloai1, $tinmoinhat = $tinmoinhat]) 
    {{-- End Category Sports  --}}

        
    {{-- Tong hop --}}
    {{-- @include("Frontend.widgets.tonghop", [$tintuc_world_1 = $tintuc_world_1, $tintuc_world = $tintuc_world, $highviews = $highviews, $tintuc_fashion = $tintuc_fashion]); --}}
    
<?php
$theloai2 = $theloai->shift();
$tin = DB::table('loaitin')->join('tintuc', 'tintuc.lt_ma', '=', 'loaitin.lt_ma')
    ->join('theloai', 'theloai.tl_ma', '=', 'loaitin.tl_ma')
    ->where('theloai.tl_ma',$theloai2->tl_ma)->whereNotIn('tintuc.tt_ma',$mang)->orderBy('tintuc.tt_capNhat', 'DESC')->take(7)->get();
$loaitin1 = $tin->shift();
?>
<!-- Row 8 : 4 -->
<!-- Row 8 -->
<div class="row">
<div class="col-lg-12 mt-4">
    <div class="title">
        <h2 style="border-bottom:1px solid #78b43d;border-width:3px;display:inline-block">
            {{$theloai2->tl_ten}}
        </h2>
    </div>
</div>
</div>

<div class="row">
<div class="col-lg-8 mt-5 img750">
    <div class="edit">
        <div class="class">
        <a href="{{url('/trangchu/'.$loaitin1->tl_tenkhongdau.'/'.$loaitin1->lt_tenkhongdau.'/'.$loaitin1->tt_ma)}}">
            <img src="{{asset('storage/photos/'.$loaitin1->tt_hinhAnh)}}" class="image" alt="">
            </a>
        </div>
            <div class="overall">
                <div class="loaitin">
                <a href="{{url('/trangchu/'.$loaitin1->tl_tenkhongdau.'/'.$loaitin1->lt_tenkhongdau.'.html')}}">{{$loaitin1->lt_ten}}</a>
                </div>
            <h5>
                <a href="{{url('/trangchu/'.$loaitin1->tl_tenkhongdau.'/'.$loaitin1->lt_tenkhongdau.'/'.$loaitin1->tt_ma)}}" style="color:white">{{$loaitin1->tt_tieuDe}}</a>
            </h5>
            </div>
    </div>

    {{-- Row 8 --}}
    <div class="row"> {{-- start row --}}
        @foreach($tin->all() as $tins)
        <div class="col-lg-6 mt-5">
            <div class="class">
            <a href="{{url('/trangchu/'.$tins->tl_tenkhongdau.'/'.$tins->lt_tenkhongdau.'/'.$tins->tt_ma)}}">
                <img src="{{asset('storage/photos/'.$tins->tt_hinhAnh)}}" class="image" alt="">
            </a>
        </div>
            <div class="overall-2">
                <div class="loaitin">
                    <a href="{{url('/trangchu/'.$tins->tl_tenkhongdau.'/'.$tins->lt_tenkhongdau.'.html')}}">{{$tins->lt_ten}}</a>
                </div>
                <div class="ngayviet">
                    <i><span>{{date('d/m/Y | H:i',strtotime($tins->tt_capNhat))}}</span></i>
                </div>
                <h5>
                <a href="{{url('/trangchu/'.$tins->tl_tenkhongdau.'/'.$tins->lt_tenkhongdau.'/'.$tins->tt_ma)}}">{{$tins->tt_tieuDe}}</a>
                </h5>
            </div>
        </div>
        @endforeach
    </div> <!-- End Row -->
</div>
<!-- End Row 8 -->

<!-- Row 4 -->
<?php
    $docnhieu = DB::table('loaitin')->join('tintuc', 'tintuc.lt_ma', '=', 'loaitin.lt_ma')
        ->join('theloai', 'theloai.tl_ma', '=', 'loaitin.tl_ma')
        ->orderBy('tintuc.tt_soLuotXem', 'DESC')->take(4)->get();
?>
<div class="col-lg-4 mt-5">

    <div class="title"> <!-- Bài Viết Đọc Nhiều -->
        <h2 style="border-bottom:1px solid #78b43d;border-width:3px;display:inline-block">
            Bài Viết Đọc Nhiều
        </h2>
    </div>
    @foreach($docnhieu as $docnhieus)
        <div class="row">
            <div class="col-lg-4 col-4 mt-5">
                <a href="{{url('/trangchu/'.$docnhieus->tl_tenkhongdau.'/'.$docnhieus->lt_tenkhongdau.'/'.$docnhieus->tt_ma)}}">
                <img src="{{asset('storage/photos/'.$docnhieus->tt_hinhAnh)}}" class="image-90" width="120" height="90" alt="">
                </a>
            </div>
            <div class="col-lg-8 col-8 mt-5">
                <strong>
                    <a style="font-size:13px;" href="{{url('/trangchu/'.$docnhieus->tl_tenkhongdau.'/'.$docnhieus->lt_tenkhongdau.'/'.$docnhieus->tt_ma)}}">
                        {{$docnhieus->tt_tieuDe}}
                    </a>
                  </strong>
                  <div class="ngayviet">
                        <i class="mr-1"><span>{{date('d/m/Y | H:i',strtotime($docnhieus->tt_capNhat))}}</span></i>
                        <i><span>{{$docnhieus->tt_soLuotXem}} views</span></i>
                    </div>
              </div>
            </div>
        @endforeach
      <!-- End Bài Viết Nhiều -->


            <!-- Các Bài Khác -->
            <?php
              $theloai3 = $theloai->shift();
              $tin_theloai3 = DB::table('loaitin')->join('tintuc', 'tintuc.lt_ma', '=', 'loaitin.lt_ma')
              ->join('theloai', 'theloai.tl_ma', '=', 'loaitin.tl_ma')->whereNotIn('tintuc.tt_ma',$mang)
              ->where('theloai.tl_ma',$theloai3->tl_ma)->orderBy('tintuc.tt_capNhat', 'DESC')->take(3)->get();
            ?>

            <div class="title mt-5">
                <h2 style="border-bottom:1px solid #78b43d;border-width:3px;display:inline-block">
                  {{$theloai3->tl_ten}}
                </h2>
            </div>

            <div class="row">

              @foreach($tin_theloai3 as $tins)
              <div class="col-lg-12 mt-5">
                  <div class="class">
                  <a href="{{url('/trangchu/'.$tins->tl_tenkhongdau.'/'.$tins->lt_tenkhongdau.'/'.$tins->tt_ma)}}">
                      <img src="{{asset('storage/photos/'.$tins->tt_hinhAnh)}}" class="image" alt="">
                  </a>
                </div>
                  <div class="overall">
                      <div class="loaitin">
                          <a href="{{url('/trangchu/'.$tins->tl_tenkhongdau.'/'.$tins->lt_tenkhongdau.'.html')}}">{{$tins->lt_ten}}</a>
                      </div>
                      <div class="overall-content">
                        <h5>
                          <a href="{{url('/trangchu/'.$tins->tl_tenkhongdau.'/'.$tins->lt_tenkhongdau.'/'.$tins->tt_ma)}}">
                              {{$tins->tt_tieuDe}}
                          </a>
                        </h5>
                      </div>
                  </div>
              </div>
              @endforeach

            </div>
            <!-- End Các Bài Viết Khác -->
  </div>
  <!-- End Row 4 -->

</div>
<!-- End Row 8 : 4 -->
</div>
<!-- End Container -->
      {{-- End tong hop --}}

    {{-- Category Law --}}
    {{-- @include("Frontend.widgets.law", [$tintuc_law = $tintuc_law]); --}}

    <!-- Thanh Kết Thúc -->
    <?php
      $theloai4 = $theloai->shift();
      $tin_theloai4 = DB::table('loaitin')->join('tintuc', 'tintuc.lt_ma', '=', 'loaitin.lt_ma')
              ->join('theloai', 'theloai.tl_ma', '=', 'loaitin.tl_ma')->whereNotIn('tintuc.tt_ma',$mang)
              ->where('theloai.tl_ma',$theloai4->tl_ma)->orderBy('tintuc.tt_capNhat', 'DESC')->take(6)->get();
    ?>
<div class="row">
  <div class="col-lg-12 text-center">
    <hr />
    <h3 class="mb-3" style="border-bottom:1px solid #78b43d;border-width:3px;display:inline-block">{{$theloai4->tl_ten}}</h3>
  </div>
</div>
<!-- End Thanh Kết Thúc -->

<!-- Container -->
<div class="container">

<!-- Các Bài Viết Row 4 : 4 : 4 -->
<div class="row">

  <!-- Row 4 -->
  @foreach($tin_theloai4 as $tins)
  <div class="col-lg-4 mt-5">
      <div class="class">
      <a href="{{url('/trangchu/'.$tins->tl_tenkhongdau.'/'.$tins->lt_tenkhongdau.'/'.$tins->tt_ma)}}">
          <img src="{{asset('storage/photos/'.$tins->tt_hinhAnh)}}" class="image" alt="">
      </a>
    </div>
      <div class="overall">
          <div class="loaitin">
              <a href="{{url('/trangchu/'.$tins->tl_tenkhongdau.'/'.$tins->lt_tenkhongdau.'.html')}}">{{$tins->lt_ten}}</a>
          </div>
          <div class="overall-content">
            <h5>
              <a href="{{url('/trangchu/'.$tins->tl_tenkhongdau.'/'.$tins->lt_tenkhongdau.'/'.$tins->tt_ma)}}">
                   {{$tins->tt_tieuDe}}
              </a>
            </h5>
          </div>
      </div>
  </div>
  @endforeach
  <!-- End Row 4 -->
</div>
</div>
<!-- End Container -->
    {{-- End Category Law --}}

    {{-- Lastest --}}
    @include("Frontend.widgets.category_other", [$theloai = $theloai, $tinmoinhat = $tinmoinhat])
    {{-- End Lastest --}}

</section>
  <!-- End Section -->

    @include("Frontend.widgets.footer")

    <!-- Optional JavaScript -->
    <!-- jQuery first, then Popper.js, then Bootstrap JS -->
    <script src="https://code.jquery.com/jquery-3.3.1.slim.min.js" integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo" crossorigin="anonymous"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.7/umd/popper.min.js" integrity="sha384-UO2eT0CpHqdSJQ6hJty5KVphtPhzWj9WO1clHTMGa3JDZwrnQq4sF86dIHNDz0W1" crossorigin="anonymous"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.min.js" integrity="sha384-JjSmVgyd0p3pXB1rRibZUAYoIIy6OrQ6VrjIEaFf/nJGzIxFDsf4x0xIM+B07jRM" crossorigin="anonymous"></script>
    <script src="{{asset('vendor/vendor/jquery/jquery.min.js')}}"></script>
    <script type="text/javascript" src="https://cdnjs.cloudflare.com/ajax/libs/socket.io/1.4.8/socket.io.min.js"></script>
    <script>
        $(document).ready(function(){
        var socket = io.connect("http://localhost:5000/");
// 15% -> 7 letters
// 20% -> 9 letters
// 35% -> 19 letters
//>19 ---
// 65% -> > 19 letters

            socket.on('my response', function(msg) {
                    console.log(msg)
                });

            $(".submit-chatbot").click(function(){
                var message = $(".type-message").val();
                var check_letters = 1;
                var messages = message.length
                socket.emit('Client-Send-Data', {data:message});

                if(messages <= 7){

                }else if(messages > 7 && messages <= 9){
                    check_letters = 2;
                }else if(messages > 9 && messages <= 19){
                    check_letters = 3;
                }else{
                    check_letters = 4;
                }

                if(check_letters == 1){
                    $(".chatbot-body").append('<div class="res-u"><div class="block-messages-u" style="width:15%; text-align:center;"><div class="res-messages-u"><span>'+message+'</span></div></div></div><div style="clear:both;" class="bottom"></div>');
                }else if(check_letters == 2){
                    $(".chatbot-body").append('<div class="res-u"><div class="block-messages-u" style="width:20%; text-align:center;"><div class="res-messages-u"><span>'+message+'</span></div></div></div><div style="clear:both;" class="bottom"></div>');
                }else if(check_letters == 3){
                    $(".chatbot-body").append('<div class="res-u"><div class="block-messages-u" style="width:35%; text-align:center;"><div class="res-messages-u"><span>'+message+'</span></div></div></div><div style="clear:both;" class="bottom"></div>');
                }else{
                    $(".chatbot-body").append('<div class="res-u"><div class="block-messages-u" style="width:65%"><div class="res-messages-u"><span>'+message+'</span></div></div></div><div style="clear:both;" class="bottom"></div>');
                }

                $(".type-message").val("");
                //
                var l = document.getElementsByClassName("res-u").length;
                document.getElementsByClassName("res-u")[l-1].scrollIntoView();
            });
            $('.type-message').keypress(function (e) {
                if (e.which == 13) {
                    var message = $(".type-message").val();
                    var check_letters = 1;
                    var messages = message.length
                    socket.emit('Client-Send-Data', {data:message});

                    if(messages <= 7){

                    }else if(messages > 7 && messages <= 9){
                        check_letters = 2;
                    }else if(messages > 9 && messages <= 19){
                        check_letters = 3;
                    }else{
                        check_letters = 4;
                    }

                    if(check_letters == 1){
                        $(".chatbot-body").append('<div class="res-u"><div class="block-messages-u" style="width:15%; text-align:center;"><div class="res-messages-u"><span>'+message+'</span></div></div></div><div style="clear:both;" class="bottom"></div>');
                    }else if(check_letters == 2){
                        $(".chatbot-body").append('<div class="res-u"><div class="block-messages-u" style="width:20%; text-align:center;"><div class="res-messages-u"><span>'+message+'</span></div></div></div><div style="clear:both;" class="bottom"></div>');
                    }else if(check_letters == 3){
                        $(".chatbot-body").append('<div class="res-u"><div class="block-messages-u" style="width:35%; text-align:center;"><div class="res-messages-u"><span>'+message+'</span></div></div></div><div style="clear:both;" class="bottom"></div>');
                    }else{
                        $(".chatbot-body").append('<div class="res-u"><div class="block-messages-u" style="width:65%"><div class="res-messages-u"><span>'+message+'</span></div></div></div><div style="clear:both;" class="bottom"></div>');
                    }

                    $(".type-message").val("");
                    //XU LY SCROLL
                    var l = document.getElementsByClassName("res-u").length;
                    document.getElementsByClassName("res-u")[l-1].scrollIntoView();
                    //////////////////////////////////////////////////////////////////
                }

            });
            

            socket.on('Server-Send-Data', function(data){
                
                var message = data['data'];
                var check = 1;
                var messages = message.length

                if(messages <= 7){

                }else if(messages > 7 && messages <= 9){
                    check = 2;
                }else if(messages > 9 && messages <= 19){
                    check = 3;
                }else{
                    check = 4;
                }

                if(check == 1){
                    $(".chatbot-body").append('<div class="res-bot"><div class="block-icon"><div class="res-avatar"><i class="fas fa-comment-alt"></i></div></div><div class="block-messages"><div class="res-messages001"><span>'+'<img src="css/real.gif" width="50" height="50">'+'</span> </div></div></div><div style="clear:both;" class="bottom"></div>');
                    $(".block-messages:last").css({"width":"15%","text-align":"center"});
                    setTimeout(() => {
                        $(".res-messages001:last").html('<div class="res-messages"><span>'+message+'</span></div>');
                    }, 3000);
                }else if(check == 2){
                    $(".chatbot-body").append('<div class="res-bot"><div class="block-icon"><div class="res-avatar"><i class="fas fa-comment-alt"></i></div></div><div class="block-messages"><div class="res-messages001"><span>'+'<img src="css/real.gif" width="50" height="50">'+'</span> </div></div></div><div style="clear:both;" class="bottom"></div>');
                    $(".block-messages:last").css({"width":"20%","text-align":"center"});
                    setTimeout(() => {
                        $(".res-messages001:last").html('<div class="res-messages"><span>'+message+'</span></div>');
                    }, 3000);
                }else if(check == 3){
                    $(".chatbot-body").append('<div class="res-bot"><div class="block-icon"><div class="res-avatar"><i class="fas fa-comment-alt"></i></div></div><div class="block-messages"><div class="res-messages001"><span>'+'<img src="css/real.gif" width="50" height="50">'+'</span> </div></div></div><div style="clear:both;" class="bottom"></div>');
                    $(".block-messages:last").css({"width":"40%","text-align":"center"});
                    setTimeout(() => {
                        $(".res-messages001:last").html('<div class="res-messages"><span>'+message+'</span></div>');
                    }, 3000);
                }else{
                    $(".chatbot-body").append('<div class="res-bot"><div class="block-icon"><div class="res-avatar"><i class="fas fa-comment-alt"></i></div></div><div class="block-messages"><div class="res-messages001"><span>'+'<img src="css/real.gif" width="50" height="50">'+'</span> </div></div></div><div style="clear:both;" class="bottom"></div>');
                    $(".block-messages:last").css("width","65%");
                    setTimeout(() => {
                        $(".res-messages001:last").html('<div class="res-messages"><span>'+message+'</span></div>');
                    }, 3000);
                }
                var l = document.getElementsByClassName("res-bot").length;
                document.getElementsByClassName("res-bot")[l-1].scrollIntoView();
                                
            });

            //End ChatBot

            $("#getting").click(function(){
                $("#getting").css({"display":"none"});
                $(".chatbot-footer").css("display","block");
                //Greeting First
                $(".chatbot-body").append('<div class="res-bot"><div class="block-icon"><div class="res-avatar"><i class="fas fa-comment-alt"></i></div></div><div class="block-messages"><div class="res-messages000"><span>'+'<img src="css/real.gif" width="50" height="50">'+'</span> </div></div></div><div style="clear:both;"></div>');
                setTimeout(() => {
                    $(".res-messages000").html('<div class="res-messages"><span>'+'Kính Chào Qúy Khách Đến Với WEBSITE Của Chúng Tui @'+'</span></div>')
                }, 3000);
            });

            $(".close").click(function(){
                $(".chatbot-box").css("display","none");
                $('.chatbot-circle').css('display','block');
                //$("#getting").css({"display":"block"});
            });

            $('.chatbot-circle').click(function(){
                $('.chatbot-circle').css('display','none');
                $(".chatbot-box").css("display","block");
            })

            $("#toggle").click(function(){
            $("#sub-menu-toggle").toggle();
            });
        });
      </script>
  </body>
</html>