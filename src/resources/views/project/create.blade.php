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
    工事（委託）の内容を登録


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

<button type="submit" class="btn btn-primary">
    新規登録
</button>
</form>
</div>