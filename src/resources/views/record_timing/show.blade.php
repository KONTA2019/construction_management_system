<body>
<link rel="stylesheet" href="{{ asset('css/operation-show4.css') }}">
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
    数量総括表プレビュー
  </div>

  <div class="yokonarabi">
  
    <div class="kurikaeshi">
      <div class="soukatsu__kousyu__title">
        工種&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
      </div>
      @foreach ($record_timing->operations as $operation)
        <div class="soukatsu__kousyu">
          <p>
          {{ $operation->first_operation_class }}
          </p>
          <p>
              &nbsp;&nbsp;{{ $operation->second_operation_class }}
          </p>
          <p>
              &nbsp;&nbsp;&nbsp;&nbsp;{{ $operation->third_operation_class }}
          </p>
          <p>
              &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;{{ $operation->forth_operation_class }}
          </p>
          <p>
              &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;{{ $operation->fifth_operation_class }}
          </p>
          <p>
              &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;{{ $operation->sixth_operation_class }}
          </p>
        </div>
      @endforeach
    </div>
      
    <div class="kurikaeshi_sekouryou">
      <div class="soukatsu__keisan__title">
        計算式
      </div>
      @foreach ($record_timing->operations as $operation)
        <div class="soukatsu__keisan">
          <pre>{{ $operation->kanni_keisan }}</pre>
        </div>
      @endforeach
    </div>

    <div class="kurikaeshi">
      <div class="soukatsu__tanni__title">
        単位
      </div>
      @foreach ($record_timing->operations as $operation)
        <div class="soukatsu__tanni">
          {{ $operation->tanni }}
        </div>
      @endforeach
    </div>

    <div class="kurikaeshi__sekouryou">
      <div class="kurikaeshi__reigai">
        @foreach ($sekouryou_titles as $sekouryou_title)
          <div class="soukatsu__sekouryou__title">
            <p>{{$sekouryou_title}}</p>
          </div>
        @endforeach
      </div>
      @foreach ($record_timing->operations as $operation)
        <div class="soukatsu__sekouryou">
          <ul class="soukatsu__sekouryou__detail">
            @foreach ($sekouryou_titles as $sekouryou_title)
              @if ($sekouryou_title == $operation->first_amount_name)
                <div class="keisen">
                  <li>{{ $operation->first_amount }}</li> 
                </div>      
              @elseif ($sekouryou_title == $operation->second_amount_name)
                <div class="keisen">
                  <li>{{ $operation->second_amount }}</li>
                </div>
              @elseif ($sekouryou_title == $operation->third_amount_name)
                <div class="keisen">
                  <li>{{ $operation->third_amount }}</li>
                </div>
              @elseif ($sekouryou_title == $operation->forth_amount_name)
                <div class="keisen">
                  <li>{{ $operation->forth_amount }}</li>
                </div>
              @else
                <div class="keisen">
                  <li></li>
                </div> 
              @endif
            @endforeach
          </ul>
        </div>
      @endforeach
    </div>

    <div class="kurikaeshi">
      <div class="soukatsu__memo__title">
        備考
      </div>
      @foreach ($record_timing->operations as $operation)
        <div class="soukatsu__memo">
          <p>{{ $operation->meomo }}</p>
        </div>
      @endforeach
    </div>

  </div><!-- "yokonarabi"ここまで -->
</body>


