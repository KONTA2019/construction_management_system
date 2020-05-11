<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">

        <title>ConstructionManagementSystem</title>

        <!-- Fonts -->
        <!-- <link href="https://fonts.googleapis.com/css?family=Nunito:200,600" rel="stylesheet"> -->
        <!-- <link rel=”stylesheet” href=”/css/app.css”> -->
        <link rel="stylesheet" href="{{ asset('css/welcom.css') }}">

    </head>
    <body>
        

            <div class="welcome_content">
                <div class="title_m-b-md">
                    Construction&emsp;&emsp;&emsp; <br>
                    Management<br>
                    &emsp;&emsp;&emsp;&emsp;System<br>
                </div>

                <div class="flex-center position-ref full-height">
            @if (Route::has('login'))
                <div class="top-btn">
                    <ul list-style:none>
                    @auth
                        <li>
                        <a href="{{ url('/home') }}">ホーム</a>
                        </li>
                    @else
                        <li>
                        <a href="{{ route('login') }}">ログイン</a>
                        </li>
                        @if (Route::has('register'))
                            <li>
                            <a href="{{ route('register') }}">新規登録</a>
                            </li>
                        @endif
                    @endauth
                        <li>
                            <a href="{{ route('register') }}">音声検索</a>
                        </li>
                    </ul>
                </div>
            @endif
                
            </div>
        </div>
    </body>
</html>
