
<body>
    <link rel="stylesheet" href="{{ asset('css/project-create.css') }}">
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


<div class="firstregistration">
<div class="firstregistration__body">
    工事（委託）区分を登録
<form method="POST" action="{{route('project.store')}}">
@csrf
<br>工事（委託）名<br>
<input type="text" name="projectname">
<br>予算区分<br>
<input type="text" name="budget_division">
<br>工事箇所の市町村名<br>
<input type="text" name="city">
<br>工事箇所の地区名<br>
<input type="text" name="district">
<br>県の担当者<br>
<input type="text" name="prefperson_in_charge">
<br>元請の担当者<br>
<input type="text" name="vendorperson_in_charge">
<br>
<button type="submit" class="btn btn-primary">
    新規登録
</button>
</form>
</div>
</div>