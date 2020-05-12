<body>
    <link rel="stylesheet" href="{{ asset('css/reset-password.css') }}">
    <div class="header-form">
        <div class="header-form__title">
            <a href="{{route('home')}}" class="header-form__title_chr">
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
                <li class="nav01"><a href="#" >トップページ</a></li>
                <li class="nav02"><a href="#" >工事内容登録</a></li>
                <li class="nav03"><a href="#" >工事内容編集</a></li>
                <li class="nav04"><a href="#" >登録内容確認</a></li>
                <li class="nav05"><a href="#" >登録内容削除</a></li>
                <li class="nav06"><a href="#" >他のシステムに書込み</a></li>
            </ul>
        </div>
    </nav>

    <div class = "title">
        <h2>
            パスワード再設定
        </h2>
    </div>


<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <!-- <div class="card-header">{{ __('Reset Password') }}</div> -->

                <div class="card-body">
                    @if (session('status'))
                        <div class="alert alert-success" role="alert">
                            {{ session('status') }}
                        </div>
                    @endif

                    <form method="POST" action="{{ route('password.email') }}">
                        @csrf

                        <div class="form-group row">
                            <label for="email" class="col-md-4 col-form-label text-md-right">{{ __('E-Mail Address') }}</label>

                            <div class="col-md-6">
                                <input id="email" type="email" class="form-control @error('email') is-invalid @enderror" name="email" value="{{ old('email') }}" required autocomplete="email" autofocus>

                                @error('email')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                        </div>

                        <div class="form-group row mb-0">
                            <div class="col-md-6 offset-md-4">
                                <button type="submit" class="btn btn-primary">
                                    {{ __('Send Password Reset Link') }}
                                </button>
                            </div>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>
</body>
