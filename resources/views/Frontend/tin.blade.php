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
        @include("Frontend.widgets.navbar", [$theloai = $theloai])
        <?php
            $tin = DB::table('tintuc')->where('tt_ma',$id_tin)->first();

            $cookie = DB::table('loaitin')->join('tintuc','loaitin.lt_ma','=','tintuc.lt_ma')
            ->join('theloai','loaitin.tl_ma','=','theloai.tl_ma')->where("tintuc.tt_ma",$id_tin)->first();

            $tinlienquan = DB::table('loaitin')->join('tintuc','loaitin.lt_ma','=','tintuc.lt_ma')
            ->join('theloai','loaitin.tl_ma','=','theloai.tl_ma')->take(5)
            ->where('loaitin.lt_tenkhongdau',$loaitin)->whereNotIn('tintuc.tt_ma',[$id_tin])->get();

            $path_comment = "/trangchu/".$cookie->tl_tenkhongdau."/".$cookie->lt_tenkhongdau."/".$cookie->tt_ma;
            Session::flash('duongdan', $path_comment);
        ?>
        <?php
            $soLuotXem = $tin->tt_soLuotXem;
            $soLuotXem++;
            $post = DB::table('tintuc')->where('tt_ma',$tin->tt_ma)->update(['tt_soLuotXem' => $soLuotXem]);
        ?>
        <div class="container">
            <div class="row">
                <div class="col-lg-8">
                    <h2 class="my-5">{{$tin->tt_tieuDe}}</h2>
                    <p class="my-3"><i style="font-size:13px;">Được viết lúc : {{date('d/m/Y | H:i:s')}}</i></p>
                    <p class="my-3">Số lượt xem : {{$tin->tt_soLuotXem}}</p>
                    <p  class="my-5"><strong>{!! $tin->tt_tomTat !!}</strong></p>
                    {!! $tin->tt_noiDung !!}
                </div>
                <div class="col-lg-4">
                    <h4 class="my-5" style="border-bottom:1px solid #78b43d; border-width:2px">Tin Liên Quan</h4>
                    <div class="row">
                        <?php
                            $i = 0;    
                        ?>
                        @foreach($tinlienquan as $tlq)
                            @if($i == 0)
                                <div class="col-lg-5">
                                        <a href="{{url('/trangchu/'.$tlq->tl_tenkhongdau.'/'.$tlq->lt_tenkhongdau.'/'.$tlq->tt_ma)}}"><img src="{{asset('storage/photos/'.$tlq->tt_hinhAnh)}}" width="150" height="100" alt=""></a>
                                </div>
                                <div class="col-lg-7">
                                    <a style="font-size:14px;" href="{{url('/trangchu/'.$tlq->tl_tenkhongdau.'/'.$tlq->lt_tenkhongdau.'/'.$tlq->tt_ma)}}"><strong>{{$tlq->tt_tieuDe}}</strong></a>
                                </div>
                            @else
                                <div class="col-lg-5 mt-4">
                                        <a href="{{url('/trangchu/'.$tlq->tl_tenkhongdau.'/'.$tlq->lt_tenkhongdau.'/'.$tlq->tt_ma)}}"><img src="{{asset('storage/photos/'.$tlq->tt_hinhAnh)}}" width="150" height="100" alt=""></a>
                                </div>
                                <div class="col-lg-7 mt-4">
                                    <a style="font-size:14px;" href="{{url('/trangchu/'.$tlq->tl_tenkhongdau.'/'.$tlq->lt_tenkhongdau.'/'.$tlq->tt_ma)}}"><strong>{{$tlq->tt_tieuDe}}</strong></a>
                                </div>
                            @endif
                            <?php
                                $i++;
                            ?>
                        @endforeach
                    </div>
                </div>
            </div>

            @if(isset($auth))
            {{-- comment  --}}
            <div id="comment" class="my-5">
                    <textarea name="binhluan" id="binhluan" cols="70" rows="5" placeholder="Hãy nghĩ gì về tin này" style="display:block"></textarea>
                    <input type="hidden" name="id_tintuc" id="id_tintuc" value="{{$id_tin}}">
                    <input type="hidden" name="id_nguoidung" id="id_nguoidung" value="{{$auth->nd_ma}}">
                    <button  id="submit" class="btn btn-primary mt-2">Gửi bình luận</button>
            </div>

            <?php
                $cmt = DB::table('binhluan')->join('tintuc','tintuc.tt_ma','=','binhluan.tt_ma')
                ->join('nguoidung','nguoidung.nd_ma','=','binhluan.nd_ma')->where('tintuc.tt_ma',$id_tin)->orderBy('bl_taoMoi','DESC')->get();
                // dd($cmt);
            ?>
            {{-- <div id="ajax_binhluan">
            @foreach($cmt as $comments)
                <div class="show-cmt my-5">
                    <div id="user-cmt">
                        <i class="fas fa-user-alt" style="font-size:22px"></i>
                        <strong>{{$comments->nd_hoTen}}</strong>
                        <div id="cmt" class="ml-5">{{$comments->bl_noiDung}}</div>
                    </div>
                </div>
            @endforeach
            </div> --}}

            <h5>Ý kiến bạn đọc</h5>
            <hr>
            <?php
                $i=0;
            ?>
            <div id="ajax_binhluan">
                @foreach($cmt as $comments)
                    <div class="khungbinhluan">
                    @if($comments->bl_ma_sub == null)
                        <div class="show-cmt my-5">
                            <div class="user-cmt">
                                <div class="frame ml-1 mt-1"><i class="fas fa-user-alt" style="font-size:22px"></i></div>
                                <strong>{{$comments->nd_hoTen}}</strong>
                                <div class="ml-5 cmt">{{$comments->bl_noiDung}}</div>
                                <span class="ml-5" style="font-size:12px"><i>{{date('d/m/Y | H:i:s',strtotime($comments->bl_taoMoi))}}</i></span>
                                <span onclick="show({{$i}})" class="ml-5" style="color:blue;cursor:pointer">Trả lời</span> 
                                {{-- comments sub  --}}
                                <div class="comment_sub ml-5" style="display:none;">
                                    <textarea name="binhluan_sub" class="binhluan" cols="40" rows="3" placeholder="Hãy nghĩ gì về tin này" style="display:block"></textarea>
                                    <input type="hidden" name="id_tintuc_sub" class="id_tintuc_sub" value="{{$id_tin}}">
                                    <input type="hidden" name="bl_ma_sub" class="bl_ma_sub" value="{{$comments->bl_ma}}">
                                    <input type="hidden" name="id_nguoidung_sub" class="id_nguoidung_sub" value="{{$auth->nd_ma}}">
                                    <button type="submit" class="btn btn-primary mt-2 submit_sub" onclick="xuly({{$i}})">Trả lời</button>
                                    <button type="submit" class="btn btn-info mt-2" onclick="hide({{$i}})">Đóng</button>
                                </div>
                                <?php
                                    $i++;
                                ?>
                                {{-- end comments sub  --}}
                            </div>
                        </div>
                    @endif
                    @foreach($cmt as $sub_comments)
                        @if($sub_comments->bl_ma != $comments->bl_ma && $sub_comments->bl_ma_sub != null && $sub_comments->bl_ma_sub == $comments->bl_ma)
                            <div class="show-cmt my-5 ml-5">
                                <div id="user-cmt">
                                    <div class="frame"><i class="fas fa-user-alt" style="font-size:22px"></i></div>
                                    <strong>{{$sub_comments->nd_hoTen}}</strong>
                                    <div id="cmt" class="ml-5">{{$sub_comments->bl_noiDung}}</div>
                                    <span class="ml-5" style="font-size:12px"><i>{{date('d/m/Y | H:i:s',strtotime($sub_comments->bl_taoMoi))}}</i></span>
                                </div>
                            </div>
                        @endif
                    @endforeach
                    </div>
                @endforeach
            </div>
            {{-- end comment  --}}
            @else
            <div id="comment" class="my-5">
                    <textarea name="binhluan" id="binhluan" cols="70" rows="5" placeholder="Hãy nghĩ gì về tin này" style="display:block"></textarea>
                    <input type="hidden" name="id_tintuc" id="id_tintuc" value="">
                    <input type="hidden" name="id_nguoidung" id="id_nguoidung" value="">
                    <input type="hidden" value="<?php $path ?>" id="path" />
                    <button id="submit" class="btn btn-primary mt-2">Gửi bình luận</button>
            </div>

            <?php
                $cmt = DB::table('binhluan')->join('tintuc','tintuc.tt_ma','=','binhluan.tt_ma')
                ->join('nguoidung','nguoidung.nd_ma','=','binhluan.nd_ma')->where('tintuc.tt_ma',$id_tin)->orderBy('bl_taoMoi','DESC')->get();
            ?>

            <h5>Ý kiến bạn đọc</h5>
            <hr>
            <?php
                $i=0;
            ?>
            <div id="ajax_binhluan">
                @foreach($cmt as $comments)
                    <div class="khungbinhluan">
                    @if($comments->bl_ma_sub == null)
                        <div class="show-cmt my-5">
                            <div id="user-cmt">
                                <div class="frame ml-1 mt-1"><i class="fas fa-user-alt" style="font-size:22px"></i></div>
                                <strong>{{$comments->nd_hoTen}}</strong>
                                <div id="cmt" class="ml-5">{{$comments->bl_noiDung}}</div>
                                <span class="ml-5" style="font-size:12px"><i>{{date('d/m/Y | H:i:s',strtotime($comments->bl_taoMoi))}}</i></span>
                                <span onclick="show({{$i}})" class="ml-5" style="color:blue;cursor:pointer">Trả lời</span>
                                {{-- comments sub  --}}
                                <div class="comment_sub ml-5" style="display:none;">
                                    <textarea name="binhluan_sub" class="binhluan" cols="40" rows="3" placeholder="Hãy nghĩ gì về tin này" style="display:block"></textarea>
                                    <input type="hidden" name="id_tintuc_sub" class="id_tintuc_sub" value="{{$id_tin}}">
                                    <input type="hidden" name="bl_ma_sub" class="bl_ma_sub" value="{{$comments->bl_ma}}">
                                    <input type="hidden" name="id_nguoidung_sub" class="id_nguoidung_sub" value="">
                                    <button type="submit" class="btn btn-primary mt-2 submit_sub" onclick="xuly({{$i}})">Trả lời</button>
                                    <button type="submit" class="btn btn-info mt-2" onclick="hide({{$i}})">Đóng</button>
                                </div>
                                <?php
                                    $i++;
                                ?>
                                {{-- end comments sub  --}}
                            </div>
                        </div>
                    @endif
                    @foreach($cmt as $sub_comments)
                        @if($sub_comments->bl_ma != $comments->bl_ma && $sub_comments->bl_ma_sub != null && $sub_comments->bl_ma_sub == $comments->bl_ma)
                            <div class="show-cmt my-5 ml-5">
                                <div id="user-cmt">
                                    <div class="frame"><i class="fas fa-user-alt" style="font-size:22px"></i></div>
                                    <strong>{{$sub_comments->nd_hoTen}}</strong>
                                    <div id="cmt" class="ml-5">{{$sub_comments->bl_noiDung}}</div>
                                    <span class="ml-5" style="font-size:12px"><i>{{date('d/m/Y | H:i:s',strtotime($sub_comments->bl_taoMoi))}}</i></span>
                                </div>
                            </div>
                        @endif
                    @endforeach
                    </div>
                @endforeach
            </div>
            @endif
        </div>
        @include('Frontend.widgets.footer')

    <script src="https://code.jquery.com/jquery-3.3.1.slim.min.js" integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo" crossorigin="anonymous"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.7/umd/popper.min.js" integrity="sha384-UO2eT0CpHqdSJQ6hJty5KVphtPhzWj9WO1clHTMGa3JDZwrnQq4sF86dIHNDz0W1" crossorigin="anonymous"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.min.js" integrity="sha384-JjSmVgyd0p3pXB1rRibZUAYoIIy6OrQ6VrjIEaFf/nJGzIxFDsf4x0xIM+B07jRM" crossorigin="anonymous"></script>
    <script src="https://code.jquery.com/jquery-3.4.1.js"integrity="sha256-WpOohJOqMqqyKL9FccASB9O0KwACQJpFTUBLTYOVvVU="crossorigin="anonymous"></script>
    <script>
            $(document).ready(function(){
            $("#toggle").click(function(){
                $("#sub-menu-toggle").toggle();
            });

              //binhluan
            $("#submit").click(function(){
                var check;
                if($("#id_nguoidung").val() == ""){
                    var check = confirm("Bạn phải đăng nhập mới có thể bình luận");
                    if(check){
                        window.location = "/login";
                    }
                }else{
                    var binhluan = $("#binhluan").val();
                    var id_tintuc = $("#id_tintuc").val();
                    var id_nguoidung = $("#id_nguoidung").val();
                    $.get("/admin/ajax/binhluan/",{binhluan:binhluan, id_tintuc:id_tintuc, id_nguoidung:id_nguoidung},function(data){
                        $("#ajax_binhluan").html(data);
                    });
                }
            });

    });

            // xu ly ngoai ready 

            function show(i){
                // $(".comment_sub").show()[i];
                // $(".comment-sub").show(100)[i];
                var list = document.getElementsByClassName("comment_sub")[i].style = "display:block";
            }

            function hide(i){
                // $(".comment_sub").hide()[i];
                var lists = document.getElementsByClassName("comment_sub")[i].style = "display:none";
            }

            function xuly(i){
                var check;
                if($("#id_nguoidung").val() == ""){
                    var check = confirm("Bạn phải đăng nhập mới có thể bình luận");
                    if(check){
                        window.location = "/login";
                    }
                }else{
                    var binhluan = document.getElementsByClassName('binhluan')[i].value;
                    var id_tintuc_sub = document.getElementsByClassName('id_tintuc_sub')[i].value;
                    var bl_ma_sub = document.getElementsByClassName('bl_ma_sub')[i].value;
                    var id_nguoidung_sub = document.getElementsByClassName('id_nguoidung_sub')[i].value;
                    
                    $.get('/admin/ajax/binhluancon/',{binhluan:binhluan,id_tintuc_sub:id_tintuc_sub,bl_ma_sub:bl_ma_sub,id_nguoidung_sub:id_nguoidung_sub},function(data){
                        $("#ajax_binhluan").html(data);
                    })
                }
            }
          </script>
</body>
</html>