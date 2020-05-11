<link rel="stylesheet" href="{{ asset('css/operation-create.css') }}">

<div class="header-form">
    <nav>
        <div class="header-form__title">
        <a href="{{route('home')}}" class="header-form__title_chr">
                    ConstructionManagementsystem
        </a>
        <div class="header-form__nav">
            <ul>
                <li class="header-form__nav__login">
                    <a href="http://127.0.0.1:8080/login" class="nav-link">Login</a>
                </li>
                <li class="header-form__nav__register">
                    <a href="http://127.0.0.1:8080/register" class="nav-link">Register</a>
                </li>
            </ul>
        </div>
    </nav>
</div>
    

<div class="registration">
    施工内容の登録
<form method="POST" action="{{route('operation.store')}}">
@csrf
<Input  type="hidden"  name="record_timing_id" value="{{$record_timing->id}}" >

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

<br>簡易数量計算<br>
<input type="text" name="kanni_keisan">
<br>詳細数量計算<br>
<input type="text" name="syousai_keisan">

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

<br>施工内容<br>
<input type="text" name="reason_title">
<br>施工理由<br>
<input type="text" name="reason_text">

<br>備考<br>
<input type="text" name="meomo">


<div class= "add_operation",id = "add_operation">
<br>追加する<br>
</div>

<button type="submit" class="btn btn-primary">
    登録
</button>
</form>


</div>


