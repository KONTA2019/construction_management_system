<div id="app">
    <nav class="navbar-expand-md navbar-light bg-white shadow-sm">
        <div class="container">
        <a href="{{route('home')}}" class="navbar-brand">
                    ConstructionManagementsystem
                </a>
            <div id="navbarSupportedContent" class="collapse navbar-collapse">
                <ul class="navbar-nav mr-auto"></ul> 
                <ul class="navbar-nav ml-auto">
                    <li class="nav-item">
                        <a href="http://127.0.0.1:8080/login" class="nav-link">Login</a>
                    </li>
                        <li class="nav-item">
                            <a href="http://127.0.0.1:8080/register" class="nav-link">Register</a>
                    </li>
                </ul>
            </div>
        </nav>
    </div>
</div>
    

<div class="registration">
    当初・変更を登録
<form method="POST" action="{{route('record_timing.store')}}">
@csrf
<br>当初か変更か<br>
<select name="specific">
<option valu="">選択してください</option>
<option value="1">当初</option>
<option value="2">変更（１回目）</option>
<option value="3">変更（２回目）</option>
<option value="4">変更（３回目）</option>
<option value="4">変更（４回目）</option>
<option value="4">変更（５回目）</option>
<option value="4">変更（６回目）</option>
<option value="4">変更（７回目）</option>
<option value="4">変更（８回目）</option>
<option value="4">変更（９回目）</option>
<option value="4">変更（１０回目）</option>
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