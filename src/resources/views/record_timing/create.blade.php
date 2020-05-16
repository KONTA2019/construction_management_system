
<body>
    <link rel="stylesheet" href="{{ asset('css/record_timing-create.css') }}">
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
                </div>
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
    

<div class="secondregistration">
<div class="secondregistration__body">
    当初・変更区分を登録
<form method="POST" action="{{route('record_timing.store')}}">
@csrf
<Input  type="hidden"  name="project_id" value="{{$project->id}}" >
<br>当初か変更か<br>
<select name="specific" >
<option valu="">選択してください</option>
<option value="当初">当初</option>
<option value="変更（１回目）">変更（１回目）</option>
<option value="変更（２回目）">変更（２回目）</option>
<option value="変更（３回目）">変更（３回目）</option>
<option value="変更（４回目）">変更（４回目）</option>
<option value="変更（５回目）">変更（５回目）</option>
<option value="変更（６回目）">変更（６回目）</option>
<option value="変更（７回目）">変更（７回目）</option>
<option value="変更（８回目）">変更（８回目）</option>
<option value="変更（９回目）">変更（９回目）</option>
<option value="変更（１０回目）">変更（１０回目）</option>
</select>
<br>延長<br>
<input type="text" name="span">
<br>工期<br>
<input type="text" name="period">
<br>
<button type="submit" class="btn btn-primary">
    新規登録
</button>
</form>
</div>
</div>