<header>
    <nav class="navbar navbar-expand-lg bg">
            <div class="container">
            <a class="navbar-brand" style="color:white" href="{{route('Frontend.index')}}">Trang Chủ</a>
            <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
              <span class="navbar-toggler-icon"></span>
            </button>
          
            <div class="collapse navbar-collapse" id="navbarSupportedContent">
            
              <?php 
              function convert_vi_to_en($str) {
                $str = preg_replace('/(à|á|ạ|ả|ã|â|ầ|ấ|ậ|ẩ|ẫ|ă|ằ|ắ|ặ|ẳ|ẵ)/', 'a', $str);
                $str = preg_replace('/(è|é|ẹ|ẻ|ẽ|ê|ề|ế|ệ|ể|ễ)/', 'e', $str);
                $str = preg_replace('/(ì|í|ị|ỉ|ĩ)/', 'i', $str);
                $str = preg_replace('/(ò|ó|ọ|ỏ|õ|ô|ồ|ố|ộ|ổ|ỗ|ơ|ờ|ớ|ợ|ở|ỡ)/', 'o', $str);
                $str = preg_replace('/(ù|ú|ụ|ủ|ũ|ư|ừ|ứ|ự|ử|ữ)/', 'u', $str);
                $str = preg_replace('/(ỳ|ý|ỵ|ỷ|ỹ)/', 'y', $str);
                $str = preg_replace('/(đ)/', 'd', $str);
                $str = preg_replace('/(À|Á|Ạ|Ả|Ã|Â|Ầ|Ấ|Ậ|Ẩ|Ẫ|Ă|Ằ|Ắ|Ặ|Ẳ|Ẵ)/', 'A', $str);
                $str = preg_replace('/(È|É|Ẹ|Ẻ|Ẽ|Ê|Ề|Ế|Ệ|Ể|Ễ)/', 'E', $str);
                $str = preg_replace('/(Ì|Í|Ị|Ỉ|Ĩ)/', 'I', $str);
                $str = preg_replace('/(Ò|Ó|Ọ|Ỏ|Õ|Ô|Ồ|Ố|Ộ|Ổ|Ỗ|Ơ|Ờ|Ớ|Ợ|Ở|Ỡ)/', 'O', $str);
                $str = preg_replace('/(Ù|Ú|Ụ|Ủ|Ũ|Ư|Ừ|Ứ|Ự|Ử|Ữ)/', 'U', $str);
                $str = preg_replace('/(Ỳ|Ý|Ỵ|Ỷ|Ỹ)/', 'Y', $str);
                $str = preg_replace('/(Đ)/', 'D', $str);
                //$str = str_replace(” “, “-”, str_replace(“&*#39;”,”",$str));
                return $str;
                }
                ?>
                {{-- ul --}}
                <ul class="navbar-nav mr-auto mx-5">
                @foreach($theloai as $category)
                    {{-- Loop Category  --}}
                    <li class="nav-item sub-dropdown mx-3 menu-custom">
                        <a class="nav-link" style="color:white" href="{{route('Frontend.show', ['theloai' => $category->tl_tenkhongdau])}}">
                            {{$category->tl_ten}}
                        </a>
                        <div class="sub-menu" style="background:#639630;">
                            {{-- Loop Loai Tin  --}}
                            @foreach($category->LoaiTin->all() as $loaitins)
                                <a class="dropdown-item menu-sub-custom" href="{{url('/'. $category->tl_tenkhongdau.'/'.$loaitins->lt_tenkhongdau.'.html')}}">{{$loaitins->lt_ten}}</a>
                            @endforeach
                            {{-- End Loop Loai Tin  --}}
                        </div>
                    </li>
                      {{-- End Loop category  --}}
                @endforeach
                </ul>
              {{-- end ul  --}}

            @if(!isset($auth))
                <div class="sign-in-up">
                    <a href="{{route('login')}}" style="color:white"><i class="fas fa-sign-in-alt"></i>Đăng nhập</a>
                    <a href="{{route('register')}}" style="color:white"><i class="fas fa-user-plus"></i>Đăng ký</a>
                </div>
            @else
                <ul class="navbar-nav px-3 text-white">
                    <li class="nav-item text-nowrap mr-4" id="menu-toggle">
                      <a class="nav-link" style="color:white" href="#" id="toggle"><i class="fas fa-sort-down" style="font-size:16px"></i><i class="fas fa-user" style="font-size:20px"></i></a>
                      <ul id="sub-menu-toggle" style="background:#639630;">
                            @if(isset($auth))
                              <li>{{$auth->nd_hoTen}}</li>
                            @endif
                            <?php
                              $trangquantri = DB::table('nhomnguoidung_quyen')->join('quyen','quyen.q_ma','=','nhomnguoidung_quyen.q_ma')
                              ->join('nhomnguoidung','nhomnguoidung.nnd_ma','=','nhomnguoidung_quyen.nnd_ma')->where('nhomnguoidung.nnd_ma',$auth->nnd_ma)->pluck('quyen.q_ma');

                              $check = 0;
                              $mang;
                              foreach($trangquantri as $index => $value){
                                  $mang[$index] = $value;
                              }
                              if(in_array(7,$mang)){
                                  $check = 1;
                              }

                            ?>
                          @if($check == 0)
                            <li><a class="text-white" href="{{route('admin')}}">Trang Quản Trị</a></li>
                          @endif
                          <li>
                              <a href="{{ route('logout') }}" class="text-white"  onclick="event.preventDefault(); document.getElementById('frm-logout').submit();">
                                  <i class="fas fa-sign-out-alt"></i>Đăng xuất
                              </a>    
                              <form id="frm-logout" action="{{ route('logout') }}" method="POST" style="display: none;">
                                  {{ csrf_field() }}
                              </form>
                          </li>
                          <li>
                            <a class="text-white" href="{{route('password.changepassword')}}"><i class="fas fa-key"></i>Đổi mật khẩu</a>
                          </li>
                        </ul>
                    </li>
                  </ul>
            @endif
              <div class="nav-search">
                    <form class="form-inline" action="{{route('timkiem')}}" method="post"> 
                        @csrf
                        <input class="custom" id="tukhoa" type="text" name="tukhoa" placeholder="Search...">
                        <button class="btn-search" type="submit"><i class="fas fa-search"></i></button>
                    </form>
              </div>
            </div>
        </div>
    </nav>
    <!-- my-2 my-lg-0 -->
</header>