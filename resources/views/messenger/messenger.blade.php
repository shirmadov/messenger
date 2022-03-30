<!doctype html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport"
          content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Document</title>
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Josefin+Sans:wght@300;400;500&display=swap" rel="stylesheet">

    <link rel="stylesheet" href="/css/main.css?v={{ Config::get('app.media_files_version') }}">
</head>
<body>

<div class="main">
    <div class="container">

            <div class="left__card">

                <div class="search__main">
                    <div class="search__icon">
                        <svg xmlns="http://www.w3.org/2000/svg" width="22" height="16" viewBox="0 0 22 16" fill="none">
                            <path d="M1 1H21" stroke="#F5F5DC" stroke-width="1" stroke-linecap="round"/>
                            <path d="M1 8H21" stroke="#F5F5DC" stroke-width="1" stroke-linecap="round"/>
                            <path d="M1 15H21" stroke="#F5F5DC" stroke-width="1" stroke-linecap="round"/>
                        </svg>
                    </div>
                    <input class="search__stick" type="text" placeholder="Search">
                </div>
                <div class="user__list">

                    <ul class="user__ul__list">

                        @for($i=0;$i<10;$i++)
                        <li class="user__li__list">
                            <div class="user__pr__name">
                                <img class="user__profile" src="{{asset('img/profile/anton.jpg')}}" alt=""/>
{{--                                <div class="user__name__text">--}}
                                    <span class="user__name">Anton Ptushkin</span>
                                    <span class="user__last__text">Hello! Sapa. How are you?</span>
{{--                                </div>--}}

                            </div>
                        </li>
                        <li class="user__li__list">
                            <div class="user__pr__name">
                            <img class="user__profile" src="{{asset('img/profile/benzema2.jpg')}}" alt="">
                            <span class="user__name">Karim Benzema</span>
                            </div>
                        </li>
                        <li class="user__li__list">
                            <div class="user__pr__name">
                            <img class="user__profile" src="{{asset('img/profile/sergio.jpg')}}" alt="">
                            <span class="user__name">Sergio Ramos</span>
                            </div>
                        </li>

                            @endfor




                    </ul>

                </div>


            </div>
            <div class="right__card">
sas
            </div>
    </div>
</div>

</body>
</html>
