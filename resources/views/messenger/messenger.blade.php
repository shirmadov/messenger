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
    <link href="https://fonts.googleapis.com/css2?family=Josefin+Sans:wght@300;400;500&family=Nunito:wght@300;400&display=swap" rel="stylesheet">
    <meta name="csrf-token" content="{{ csrf_token() }}">

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
{{--                    <x-slot name="content">--}}
                        <!-- Authentication -->
                        <form method="POST" action="{{ route('logout') }}">
                            @csrf

                            <x-dropdown-link :href="route('logout')"
                                             onclick="event.preventDefault();
                                                this.closest('form').submit();">
                                {{ __('Log Out') }}
                            </x-dropdown-link>
                        </form>
{{--                    </x-slot>--}}
                </div>
                <div class="user__list">

                    <ul class="user__ul__list">

                        @foreach($users as $key=>$user)
                            <li class="user__li__list">
                                <div class="user__pr__name">
                                    <img class="user__profile" src="{{asset('img/profile/anton.jpg')}}" alt=""/>

                                    <div style="height: 45px;">
                                        <div class="column user__name__text" >
                                            <span class="user__name">{{$user->name}}</span>
                                            <span class="user__last__text">Hello! Sapa. How are you?</span>
                                        </div>
                                        <div class="column user__msg__time__notif">
                                            <span class="user__msg__time">Wed</span>
                                            <span class="user__msg__notif">12</span>
                                        </div>
                                    </div>


                                </div>
                            </li>
                        @endforeach

{{--                        @for($i=0;$i<10;$i++)--}}
{{--                        <li class="user__li__list">--}}
{{--                            <div class="user__pr__name">--}}
{{--                                <img class="user__profile" src="{{asset('img/profile/anton.jpg')}}" alt=""/>--}}

{{--                                <div style="height: 45px;">--}}
{{--                                    <div class="column user__name__text" >--}}
{{--                                        <span class="user__name">Anton Ptushkin</span>--}}
{{--                                        <span class="user__last__text">Hello! Sapa. How are you?</span>--}}
{{--                                    </div>--}}
{{--                                    <div class="column user__msg__time__notif">--}}
{{--                                        <span class="user__msg__time">Wed</span>--}}
{{--                                        <span class="user__msg__notif">12</span>--}}
{{--                                    </div>--}}
{{--                                </div>--}}


{{--                            </div>--}}
{{--                        </li>--}}
{{--                        <li class="user__li__list">--}}
{{--                            <div class="user__pr__name">--}}
{{--                            <img class="user__profile" src="{{asset('img/profile/benzema2.jpg')}}" alt="">--}}
{{--                                <div style="height: 45px;">--}}
{{--                                    <div class="column user__name__text" >--}}
{{--                                        <span class="user__name">Karim Benzema</span>--}}
{{--                                        <span class="user__last__text">Hello, Benz!</span>--}}
{{--                                    </div>--}}
{{--                                    <div class="column user__msg__time__notif">--}}
{{--                                        <span class="user__msg__time">Thu</span>--}}
{{--                                        <span class="user__msg__notif">1</span>--}}
{{--                                    </div>--}}
{{--                                </div>--}}
{{--                            </div>--}}
{{--                        </li>--}}
{{--                        <li class="user__li__list">--}}
{{--                            <div class="user__pr__name">--}}
{{--                            <img class="user__profile" src="{{asset('img/profile/sergio.jpg')}}" alt="">--}}
{{--                                <div style="height: 45px;">--}}
{{--                                    <div class="column user__name__text" >--}}
{{--                                        <span class="user__name">Sergio Ramos</span>--}}
{{--                                        <span class="user__last__text">Vamos Hala Madrid</span>--}}
{{--                                    </div>--}}
{{--                                    <div class="column user__msg__time__notif">--}}
{{--                                        <span class="user__msg__time">12:20 pm</span>--}}
{{--                                        <span class="user__msg__notif">5</span>--}}
{{--                                    </div>--}}
{{--                                </div>--}}
{{--                            </div>--}}
{{--                        </li>--}}

{{--                            @endfor--}}




                    </ul>

                </div>


            </div>
            <div class="right__card">
               <div class="right__card__header">
                asdasd
               </div>
                <div class="right__card__msg__list">
                    <div style="  display: flex; justify-content: center;">
                        <ul class="msg__list__ul">
                            <li class="msg__list__li">
                                <div class="msg__card__left">
{{--                                        <pre class="msg__text">--}}
{{--                                           --}}
{{--                                        </pre>--}}
                                    Hello
                                    <span class="msg__time">
                                        12:30
                                    </span>
                                </div>
                            </li>
                            <li class="msg__list__li">
                                <div class="msg__card__left">
                                        How are you? asdas zsdasdas sdfasdfa
                                    <span class="msg__time">
                                        12:30
                                    </span>
                                </div>
                            </li>
                            <li class="msg__list__li">
                                <div class="msg__card__left">
                                    Lorem Ipsum is simply dummy text of the pri nting and typesetting industry. Lorem Ipsum has been the industry's standard dummy text ever since the 1500s, when an unknown printer took a galley of type and scrambled it to make a type specimen book make a type specimen dfsdfsdfs.
                                    <span class="msg__time">
                                        12:30
                                    </span>

                                </div>
                            </li>

                            <li class="msg__list__li">
                                <div class="msg__card__right">
                                    Lorem Ipsum is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industry's standard dummy text ever since the 1500s, when an unknown printer took a galley of type and scrambled it to make a type specimen book.
                                    <span class="msg__time">
                                        12:30
                                    </span>
                                </div>
                            </li>

                            <li class="msg__list__li">
                                <div class="msg__card__right">
                                    Многие думают, что Lorem Ipsum - взятый с потолка псевдо-латинский набор слов, но это не совсем так.
                                    <span class="msg__time">
                                        12:30
                                    </span>
                                </div>
                            </li>
                            <li class="msg__list__li">
                                <div class="msg__card__right">
                                    Многие думают, что Lorem Ipsum - взятый с потолка псевдо-латинский набор слов, но это не совсем так.
                                    <span class="msg__time">
                                        12:30
                                    </span>
                                </div>
                            </li>
                            <li class="msg__list__li">
                                <div class="msg__card__right">
                                    Многие думают, что Lorem Ipsum - взятый с потолка псевдо-латинский набор слов, но это не совсем так.
                                    <span class="msg__time">
                                        12:30
                                    </span>
                                </div>
                            </li>
                            <li class="msg__list__li">
                                <div class="msg__card__right">
                                    Многие думают, что Lorem Ipsum - взятый с потолка псевдо-латинский набор слов, но это не совсем так.
                                    <span class="msg__time">
                                        12:30
                                    </span>
                                </div>
                            </li>
                            <li class="msg__list__li">
                                <div class="msg__card__right">
                                    Hello
                                    <span class="msg__time">
                                        12:30
                                    </span>
                                </div>
                            </li>
                            <li class="msg__list__li">
                                <div class="msg__card__right">
                                    Hi
                                    <span class="msg__time">
                                        12:30
                                    </span>
                                </div>
                            </li>
{{--                            <li class="msg__list__li">--}}
{{--                                <div class="msg__card__right">--}}
{{--                                    Lorem Ipsum is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industry's standard dummy text ever since the 1500s, when an unknown printer took a galley of type and scrambled it to make a type specimen book.--}}
{{--                                </div>--}}
{{--                            </li>--}}
                        </ul>

                    </div>
                </div>
                <div class="right__card__form">
                    <form id="msg__form" class="msg__form" action="">
                        @csrf
                        <svg xmlns="http://www.w3.org/2000/svg" width="22" height="23" viewBox="0 0 22 23">
                            <path fill="none" fill-rule="evenodd" stroke="#F5F5DC" stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M19.44 10.05l-9.19 9.19a6.003 6.003 0 1 1-8.49-8.49l9.19-9.19a4.002 4.002 0 0 1 5.66 5.66l-9.2 9.19a2.001 2.001 0 0 1-2.83-2.83l8.49-8.48" transform="translate(1 1)"/></svg>
                    <textarea class="msg__textarea js__msg__textarea" name="msg_text" id="js__msg__textarea" rows="1" autofocus autocomplete="off" placeholder="Text message"></textarea>

                        <button type="submit" class="msg__send__btn js__msg__send__btn">
                        <svg xmlns="http://www.w3.org/2000/svg" width="25" height="25" viewBox="0 0 25 25" fill="none">
                            <circle cx="12.5" cy="12.5" r="11.5" stroke="#F5F5DC" stroke-width="2"/>
                            <path d="M13.7071 6.29289C13.3166 5.90237 12.6834 5.90237 12.2929 6.29289L5.92893 12.6569C5.53841 13.0474 5.53841 13.6805 5.92893 14.0711C6.31946 14.4616 6.95262 14.4616 7.34315 14.0711L13 8.41421L18.6569 14.0711C19.0474 14.4616 19.6805 14.4616 20.0711 14.0711C20.4616 13.6805 20.4616 13.0474 20.0711 12.6569L13.7071 6.29289ZM14 19V7H12V19H14Z" fill="#F5F5DC"/>
                        </svg>
                        </button>
                    </form>
                </div>


            </div>
    </div>
</div>

<script src="{{asset('/js/messenger/messenger.js')}}"></script>
</body>
</html>
