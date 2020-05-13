<link rel="stylesheet" href="{{ asset('css/operation-create.css') }}">


<body>
    <link rel="stylesheet" href="{{ asset('css/record_timing-create.css') }}">
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
    

<div class="registration">
    工種区分の登録
<form method="POST" action="{{route('operation.store')}}">
@csrf
<Input  type="hidden"  name="record_timing_id" value="{{$record_timing->id}}" >

<div class="hidari">
<div class="kousyu">
<br>第一工種<br>
<input type="text" name="first_operation_class">
<br>第二工種<br>
<input type="text" name="second_operation_class">
<br>第三工種<br>
<input type="text" name="third_operation_class">
<br>第四工種<br>
<input type="text" name="forth_operation_class">
<br>第五工種<br>
<input type="text" name="fifth_operation_class">
<br>第六工種<br>
<input type="text" name="sixth_operation_class">
</div>


<div class="henkou">
<br>変更内容<br>
<input type="text" name="reason_title">
<br>変更理由<br>
<input type="text" name="reason_text">
</div>
</div>


<div class="migi">
<br>施工量名（１）<br>
<input type="text" name="first_amount_name">
<br>施工量（１）<br>
<input type="number" name="first_amount">
<br>施工量名（２）<br>
<input type="text" name="second_amount_name">
<br>施工量（２）<br>
<input type="number" name="second_amount">
<br>施工量名（３）<br>
<input type="text" name="third_amount_name">
<br>施工量（３）<br>
<input type="number" name="third_amount">
<br>施工量名（４）<br>
<input type="text" name="forth_amount_name">
<br>施工量（４）<br>
<input type="number" name="forth_amount">




<br>簡易数量計算<br>
<input type="text" name="kanni_keisan">
<br>詳細数量計算<br>
<input type="text" name="syousai_keisan">



<br>備考<br>
<input type="text" name="meomo">

<button type="submit" class="btn btn-primary">
    登録
</button>
</form>


</div>


