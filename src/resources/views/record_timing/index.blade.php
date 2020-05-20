
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
{{ Auth::user()->name }}さんの登録工事一覧
    @foreach ($record_timings ?? '' as $record_timing)
    <!-- <form method="POST" action="{{route('record_timing.create')}}">
    @csrf
    <Input  type="hidden"  name="record_timing_id" value="{{$record_timing->id}}" >
    </form> -->
        <div class="card mb-4">
                <div class="card-header">
                <a href="{{route('operation.create',['record_timing' => $record_timing->id])}}" >
                <!-- <a href="{{route('operation.create',['record_timing' => $record_timing->id],['project_id' => $record_timing->project_id])}}" > -->
                    {{ $record_timing->project->projectname }}  {{ $record_timing->specific }}  {{ $record_timing->created_at->format('Y年n月d日H時i分') }}に編集
                </a>
                </div>
        </div>
    @endforeach
</div>
</div>