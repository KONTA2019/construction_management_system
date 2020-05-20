<body>
<link rel="stylesheet" href="{{ asset('css/operation-create2.css') }}">
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
    

<div class="thirdregistration__title">
    数量総括表プレビュー(並べ替えはExcelシート出力時)
</div>

<div class="soukatsu">
    <div class="soukatsu__kousyu__title">
    工種&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
    </div>
    <div class="soukatsu__keisan__title">
        計算式
    </div>
    <div class="soukatsu__tanni__title">
        単位
    </div>
    <div class="soukatsu__sekouryou__title">
        施工量
    </div>
    <div class="soukatsu__memo__title">
        備考
    </div>
</div>

@foreach ($operations ?? '' as $operation)
<div class="soukatsu">
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
    <div class="soukatsu__keisan">
        <pre>{{ $operation->kanni_keisan }}</pre>
    </div>
    <div class="soukatsu__tanni">
        {{ $operation->tanni }}
    </div>
    <div class="soukatsu__sekouryou">
        <div class="soukatsu__sekouryou__detail">
            <ul>
                <li>{{ $operation->first_amount_name }}</li>
                <li>{{ $operation->second_amount_name }}</li>
                <li>{{ $operation->third_amount_name }}</li>
                <li>{{ $operation->forth_amount_name }}</li>
            </ul>
        </div>
        <div class="soukatsu__sekouryou__detail">
        <ul>
                <li>{{ $operation->first_amount }}</li>
                <li>{{ $operation->second_amount }}</li>
                <li>{{ $operation->third_amount }}</li>
                <li>{{ $operation->forth_amount }}</li>
            </ul>
        </div>
    </div>
    <div class="soukatsu__memo">
        <pre>{{ $operation->meomo }}</pre>
    </div>
</div>

        <!-- {{ $operation->reason_title }}  {{ $operation->reason_text }}  {{ $operation->syousai_keisan }} -->
@endforeach

<div class="thirdregistration__title">
    <br>作業内容の登録
</div>

<form method="POST"  action="{{route('operation.store')}}">
@csrf

<Input  type= "hidden"  name= "record_timing_id" value = {{ $record_timing }} >


<div class="thirdregistration__body">

<div class="hidari">
<div class="kousyu">
<br>第一工種<br>
<input type="text" name="first_operation_class" placeholder="例）道路改良">
<br>第二工種<br>
<input type="text" name="second_operation_class" placeholder="例）道路改良工">
<br>第三工種<br>
<input type="text" name="third_operation_class" placeholder="例）道路土工">
<br>第四工種<br>
<input type="text" name="forth_operation_class" placeholder="例）掘削工">
<br>第五工種<br>
<input type="text" name="fifth_operation_class" placeholder="例）掘削（軟岩）">
<br>第六工種<br>
<input type="text" name="sixth_operation_class" placeholder="注）手作りの場合使用">
</div>

<br>単位<br>
<input type="text" name="tanni" placeholder="例）m3">

<div class="henkou">
<br>変更内容<br>
<textarea name="reason_title" row="10" cols=”50″ wrap=”hard” class="reason" placeholder="例）軟岩の掘削量を100m3増量する。"></textarea>
<br>変更理由<br>
<textarea name="reason_text" row="10" cols=”50″ wrap=”hard” class="reason" placeholder="例）現場測量の結果当初設計と差異があったため。"></textarea>
</div>
</div>


<div class="migi">

<div class = "sekouryou">
<div class = "sekouryou1">
<br>施工量名（１）<br>
<input type="text" name="first_amount_name" placeholder="例）設計数量">
<br>施工量（１）<br>
<input type="number" name="first_amount" >
</div>
<div class = "sekouryou2">
<br>施工量名（２）<br>
<input type="text" name="second_amount_name" placeholder="例）地山量">
<br>施工量（２）<br>
<input type="number" name="second_amount">
</div>
<div class = "sekouryou3">
<br>施工量名（３）<br>
<input type="text" name="third_amount_name" placeholder="例）ほぐし量">
<br>施工量（３）<br>
<input type="number" name="third_amount">
</div>
<div class = "sekouryou4">
<br>施工量名（４）<br>
<input type="text" name="forth_amount_name" placeholder="例）締固め量">
<br>施工量（４）<br>
<input type="number" name="forth_amount">
</div>
</div>



<br>簡易数量計算(500文字以下)<br>
<textarea name="kanni_keisan" row="10" cols=”50″ wrap=”hard” class="keisansiki" placeholder="（使用方法）数量総括表にいれる数式を記述してください。"></textarea>
<br>詳細数量計算(5,000文字以下)<br>
<textarea name="ksyousai_keisan" row="100" cols=”50″ wrap=”hard” class="keisansiki" placeholder="（使用方法）数量計算書にいれる数式を記述してください。簡易数量計算と同じでも可です。"></textarea>



<br>備考(1,000文字以下)<br>
<textarea name="memo" row="20" cols=”50″ wrap=”hard” class="memo" placeholder="（使用方法）必要に応じて自由に記述してください。"></textarea>

<button type="submit" class="btn btn-primary" >
    登録
</button>
<a href="btn btn-primary"  action="{{route('home')}}"> 
    <br>トップページにもどる
</a>
</form>


</div>


