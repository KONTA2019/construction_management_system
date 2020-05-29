<body>
<link rel="stylesheet" href="{{ asset('css/operation-syousai_matome1.css') }}">
  <div class="header-form">
    <div class="header-form__title">
      <a href="{{route('welcome')}}" class="header-form__title_chr">
        ConstructionManagementSystem
      </a>
    </div>
    <div>
      <ul class="header-form__nav">
        @guest
          <li class="header-form__nav__left">
              <a class="nav-link" href="{{ route('login') }}">{{ __('Login') }}</a>
          </li>
          @if (Route::has('register'))
            <li class="header-form__nav__right">
              <a class="nav-link" href="{{ route('register') }}">{{ __('Register') }}</a>
            </li>
          @endif
        @else
          <li class="header-form__nav__left">
            <a class="nav-link" href="{{ route('login') }}">
                {{ Auth::user()->name }} <span class="caret"></span>
            </a>
          </li>

          <li class="header-form__nav__right">
            <a class="dropdown-item" href="{{ route('logout') }}"
              onclick="event.preventDefault();
              document.getElementById('logout-form').submit();">
              {{ __('Logout') }}
            </a>
            <form id="logout-form" action="{{ route('logout') }}" method="POST" style="display: none;">
              @csrf
            </form>
          </li>
        @endguest
      </ul>
    </div>
  </div>

  <nav role="navigation">
    <div class="nav_in">
      <ul class="drop">
        <li class="nav01"><a href="{{route('home')}}" >トップページ</a></li>
        <li class="nav02"><a href="{{ route('project.create') }}" >工事内容登録</a></li>
        <li class="nav03"><a href="#" >工事内容編集</a></li>
        <li class="nav04"><a href="#" >登録内容確認</a></li>
        <li class="nav05"><a href="#" >変更内容登録</a></li>
        <li class="nav06"><a href="#" >他のシステムに書込み</a></li>
      </ul>
    </div>
  </nav>

  <div class = "title">
    <h2>
      工事内容登録
    </h2>
  </div>

  <div class="thirdregistration__title">
    数量計算書① ({{$kouzimeiyou->project->projectname}} {{$kouzimeiyou->specific}})
  </div>


  @foreach ($operations as $operation)
    <div >
      <ul class="yon-roku_kousyu">
        <li>{{ $operation->forth_operation_class }}</li>
        <li>{{ $operation->fifth_operation_class }}</li>
        <li>{{ $operation->sixth_operation_class }}</li>
      </ul>
    </div>
  @endforeach



</body>