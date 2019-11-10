<nav class="navbar fixed-top flex-md-nowrap p-0 shadow">
    <a class="navbar-brand bg-light col-sm-3 col-md-2 mr-0 text-center" id="trangchu" href="{{route('Frontend.index')}}"><i class="fas fa-home"></i>Trang Chủ</a>
   
    <ul class="navbar-nav px-3">
      <li class="nav-item text-nowrap mr-4" id="menu-toggle">
        <a class="nav-link" href="#" id="toggle"><i class="fas fa-sort-down" style="font-size:16px"></i><i class="fas fa-user" style="font-size:20px"></i></a>
        <ul id="sub-menu-toggle">
            @if(isset($auth))
              <li>{{$auth->nd_hoTen}}</li>
            @endif
          <li>
              <a href="{{ route('logout') }}" onclick="event.preventDefault(); document.getElementById('frm-logout').submit();">
                  <i class="fas fa-sign-out-alt"></i>Đăng xuất
              </a>    
              <form id="frm-logout" action="{{ route('logout') }}" method="POST" style="display: none;">
                  {{ csrf_field() }}
              </form>
          </li>
          <li>
            <a href="{{route('password.changepassword')}}"><i class="fas fa-key"></i>Đổi mật khẩu</a>
          </li>
        </ul>
      </li>
    </ul>
</nav>
