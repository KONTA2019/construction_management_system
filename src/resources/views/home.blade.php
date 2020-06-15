
<body>
    <link rel="stylesheet" href="{{ asset('css/home2.css') }}">
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
            トップページ
        </h2>
    </div>


    <div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <!-- <div class="card-header">Dashboard</div> -->
                <div class="card-body">
                    @if (session('status'))
                        <div class="alert alert-success" role="alert">
                            {{ session('status') }}
                        </div>
                    @endif
                    <ul>
                        <li>新規工事の登録を行う場合</li>
                        <li>
                            <a href="{{ route('project.create') }}">工事(委託)区分登録ページに移動する</a>
                        </li>
                        <li>工事区分登録済みで途中保存してあるのもの</li>
                        <li>
                            <a href="#">県単道路改良（一般）工事（〇〇・舗装工）</a>
                        </li>
                        <li>当初・変更区分登録済みで途中保存してあるのもの</li>
                        <li>
                            <a href="#">国道道路改築工事（〇〇・改良工） 当初</a>
                        </li>
                        <li>工種区分登録済みのものを編集する</li>
                        <li>
                            <a href="#">社会資本整備総合交付金工事（〇〇・改良工その２） 当初</a>
                        </li>
                    </ul>
                </div>
            </div>
        </div>
    </div>
</div>

</body>    

