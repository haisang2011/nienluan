<div class="container-fluid">
    <div class="row">
      <nav class="col-md-2 d-none d-md-block bg-light sidebar">
        <div class="sidebar-sticky">
          <ul class="nav flex-column">
            <li class="nav-item">
              <a class="nav-link active" href="#">
                <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="feather feather-home"><path d="M3 9l9-7 9 7v11a2 2 0 0 1-2 2H5a2 2 0 0 1-2-2z"></path><polyline points="9 22 9 12 15 12 15 22"></polyline></svg>
                Dashboard <span class="sr-only">(current)</span>
              </a>
            </li>

            <?php
                              $trangquantri = DB::table('nhomnguoidung_quyen')->join('quyen','quyen.q_ma','=','nhomnguoidung_quyen.q_ma')
                              ->join('nhomnguoidung','nhomnguoidung.nnd_ma','=','nhomnguoidung_quyen.nnd_ma')->where('nhomnguoidung.nnd_ma',$auth->nnd_ma)->pluck('quyen.q_ma');

                              $check = 0;
                              $mang;
                              foreach($trangquantri as $index => $value){
                                  $mang[$index] = $value;
                              }
                              if(in_array(5,$mang)){
                                  $check = 1;
                              }

            ?>
            
            @if($check==1)
            <li class="nav-item">
              <a class="nav-link" href="{{route('Backend.theloai.index')}}">
                <i class="fas fa-list"></i>
                Danh sách thể loại
              </a>
            </li>
            <li class="nav-item">
              <a class="nav-link" href="{{route('Backend.theloai.create')}}">
                <i class="fas fa-plus"></i>
                Thêm thể loại
              </a>
            </li>
            <li class="nav-item">
              <a class="nav-link" href="{{route('Backend.loaitin.index')}}">
                <i class="fas fa-list"></i>
                Danh sách loại tin
              </a>
            </li>
            <li class="nav-item">
              <a class="nav-link" href="{{route('Backend.loaitin.create')}}">
                <i class="fas fa-plus"></i>
                Thêm loại tin
              </a>
            </li>
            @endif


            <?php
                              $trangquantri = DB::table('nhomnguoidung_quyen')->join('quyen','quyen.q_ma','=','nhomnguoidung_quyen.q_ma')
                              ->join('nhomnguoidung','nhomnguoidung.nnd_ma','=','nhomnguoidung_quyen.nnd_ma')->where('nhomnguoidung.nnd_ma',$auth->nnd_ma)->pluck('quyen.q_ma');

                              $check = 0;
                              $mang;
                              foreach($trangquantri as $index => $value){
                                  $mang[$index] = $value;
                              }
                              if(in_array(1,$mang)){
                                  $check = 1;
                              }

            ?>

            @if($check==1)
            <li class="nav-item">
              <a class="nav-link" href="{{route('Backend.tintuc.create')}}">
                <i class="fas fa-plus"></i>
                Thêm tin tức
              </a>
            </li>
            @endif


            <?php
            $trangquantri = DB::table('nhomnguoidung_quyen')->join('quyen','quyen.q_ma','=','nhomnguoidung_quyen.q_ma')
            ->join('nhomnguoidung','nhomnguoidung.nnd_ma','=','nhomnguoidung_quyen.nnd_ma')->where('nhomnguoidung.nnd_ma',$auth->nnd_ma)->pluck('quyen.q_ma');

            $check = 0;
            $mang;
            foreach($trangquantri as $index => $value){
                $mang[$index] = $value;
            }
            if(in_array(4,$mang)){
                $check = 1;
            }

            ?>

              @if($check==1)
              <li class="nav-item">
                <a class="nav-link" href="{{route('Backend.tintuc.index')}}">
                  <i class="fas fa-list"></i>
                  Danh sách tin tức
                </a>
              </li>
              @endif


              <?php
              $trangquantri = DB::table('nhomnguoidung_quyen')->join('quyen','quyen.q_ma','=','nhomnguoidung_quyen.q_ma')
              ->join('nhomnguoidung','nhomnguoidung.nnd_ma','=','nhomnguoidung_quyen.nnd_ma')->where('nhomnguoidung.nnd_ma',$auth->nnd_ma)->pluck('quyen.q_ma');
  
              $check = 0;
              $mang;
              foreach($trangquantri as $index => $value){
                  $mang[$index] = $value;
              }
              if(in_array(6,$mang)){
                  $check = 1;
              }
  
              ?>
  
                @if($check==1)
                <li class="nav-item">
                  <a class="nav-link" href="{{route('Backend.nguoidung.index')}}">
                    <i class="fas fa-list"></i>
                    Danh sách người dùng
                  </a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="{{route('Backend.nguoidung.create')}}">
                      <i class="fas fa-plus"></i>
                      Thêm người dùng
                    </a>
                  </li>
                @endif


                <?php
              $trangquantri = DB::table('nhomnguoidung_quyen')->join('quyen','quyen.q_ma','=','nhomnguoidung_quyen.q_ma')
              ->join('nhomnguoidung','nhomnguoidung.nnd_ma','=','nhomnguoidung_quyen.nnd_ma')->where('nhomnguoidung.nnd_ma',$auth->nnd_ma)->pluck('quyen.q_ma');
  
              $check = 0;
              $mang;
              foreach($trangquantri as $index => $value){
                  $mang[$index] = $value;
              }
              if(in_array(8,$mang)){
                  $check = 1;
              }
  
              ?>
  
                @if($check==1)
                <li class="nav-item">
                  <a class="nav-link" href="{{route('Backend.nhomnguoidung.index')}}">
                    <i class="fas fa-list"></i>
                    Danh sách nhóm người dùng
                  </a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="{{route('Backend.nhomnguoidung.create')}}">
                      <i class="fas fa-plus"></i>
                      Thêm nhóm
                    </a>
                  </li>
                @endif

                <?php
                $trangquantri = DB::table('nhomnguoidung_quyen')->join('quyen','quyen.q_ma','=','nhomnguoidung_quyen.q_ma')
                ->join('nhomnguoidung','nhomnguoidung.nnd_ma','=','nhomnguoidung_quyen.nnd_ma')
                ->where('nhomnguoidung.nnd_ma',$auth->nnd_ma)->pluck('quyen.q_ma');
  
              $checkAll = 1;
              $check = 0;
              $Per;
              $dieukienvao = [1,2,3,4,5,6,8];
              foreach($trangquantri as $index => $value){
                $Per[$index] = $value;
              }
  
              for($i = 0; $i<count($dieukienvao); $i++){ //array dieukienvao
                $check = 0;
                for($j = 0; $j<count($Per); $j++){ //array Per
                  if($dieukienvao[$i] == $Per[$j]){
                      $check = 1;
                      break;
                    }
                  }
                  if($check == 0){
                    $checkAll = 0;
                    break;
                  }
                }
              
              ?>
  
              @if($checkAll == 1)
                <li class="nav-item">
                  <a class="nav-link" href="{{route('Backend.quyen.index')}}">
                    <i class="fas fa-list"></i>
                    Danh sách quyền
                  </a>
                </li>
              @endif
            {{-- <li class="nav-item">
              <a class="nav-link" href="{{route('Backend.theloai.index')}}">
                <i class="fas fa-list"></i>
                Danh sách thể loại
              </a>
            </li>
            <li class="nav-item">
              <a class="nav-link" href="{{route('Backend.theloai.create')}}">
                <i class="fas fa-plus"></i>
                Thêm thể loại
              </a>
            </li>
            <li class="nav-item">
              <a class="nav-link" href="{{route('Backend.loaitin.index')}}">
                <i class="fas fa-list"></i>
                Danh sách loại tin
              </a>
            </li>
            <li class="nav-item">
              <a class="nav-link" href="{{route('Backend.loaitin.create')}}">
                <i class="fas fa-plus"></i>
                Thêm loại tin
              </a>
            </li>
            <li class="nav-item">
              <a class="nav-link" href="{{route('Backend.quyen.index')}}">
                <i class="fas fa-list"></i>
                Danh sách quyền
              </a>
            </li>
            <li class="nav-item">
                <a class="nav-link" href="{{route('Backend.quyen.create')}}">
                  <i class="fas fa-plus"></i>
                  Thêm quyền
                </a>
              </li>
              <li class="nav-item">
                  <a class="nav-link" href="{{route('Backend.nhomnguoidung.index')}}">
                    <i class="fas fa-list"></i>
                    Danh sách nhóm người dùng
                  </a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="{{route('Backend.nhomnguoidung.create')}}">
                      <i class="fas fa-plus"></i>
                      Thêm nhóm
                    </a>
                  </li>
                  <li class="nav-item">
                    <a class="nav-link" href="{{route('Backend.nguoidung.index')}}">
                      <i class="fas fa-list"></i>
                      Danh sách người dùng
                    </a>
                  </li>
                  <li class="nav-item">
                      <a class="nav-link" href="{{route('Backend.nguoidung.create')}}">
                        <i class="fas fa-plus"></i>
                        Thêm người dùng
                      </a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="{{route('Backend.tintuc.index')}}">
                          <i class="fas fa-list"></i>
                          Danh sách tin tức
                        </a>
                      </li>
                      <li class="nav-item">
                          <a class="nav-link" href="{{route('Backend.tintuc.create')}}">
                            <i class="fas fa-plus"></i>
                            Thêm tin tức
                          </a>
                        </li> --}}
          </ul>
  

        </div>
      </nav>
    </div>
  </div>