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
    <link href="https://fonts.googleapis.com/css2?family=Josefin+Sans:wght@300;400;500&family=Nunito:wght@300;400&family=Kanit:wght@300;400&display=swap" rel="stylesheet">

    <meta name="csrf-token" content="{{ csrf_token() }}">

    <link rel="stylesheet" href="/css/main.css?v={{ Config::get('app.media_files_version') }}">
    <link rel="stylesheet" href="/css/menu.css?v={{ Config::get('app.media_files_version') }}">
</head>
<body>

<div class="main">
    <div class="container">

{{--        <div class="left__card">--}}
{{--            <div class="pages">--}}
{{--                <div class="page one active">--}}
{{--                    <h1>PAGE 1</h1>--}}
{{--                    <div>--}}
{{--                        <button onClick="slide('next')">Next</button>--}}
{{--                    </div>--}}
{{--                </div>--}}
{{--                <div class="page two">--}}
{{--                    <h1>PAGE 2</h1>--}}
{{--                    <div>--}}
{{--                        <button onClick="slide('prev')">Previous</button>--}}
{{--                        <button onClick="slide('next')">Next</button>--}}
{{--                    </div>--}}
{{--                </div>--}}
{{--            </div>--}}
{{--        </div>--}}


            <div class="left__card js__left__card" >
                <div class="pages">
                    <div class="page page__user js__page__user">
                        <div class="search__main">
                            <div class="hamburger__menu js__hamburger__menu">
                                <svg class="icon__hamburg" xmlns="http://www.w3.org/2000/svg" width="22" height="16" viewBox="0 0 22 16" fill="none">
                                    <path d="M1 1H21" stroke="#F5F5DC" stroke-width="1" stroke-linecap="round"/>
                                    <path d="M1 8H21" stroke="#F5F5DC" stroke-width="1" stroke-linecap="round"/>
                                    <path d="M1 15H21" stroke="#F5F5DC" stroke-width="1" stroke-linecap="round"/>
                                </svg>
                            </div>
                            <input class="search__stick" type="text" placeholder="Search">
                        </div>

                        @include('messenger.module.menu')
                        @include('messenger.module.users')
                    </div>
                    <div class="page page__settings js__page__settings">
                        <div class="st__header">
                            <div class="back__to__menu js__back__to__menu" onClick="slide('prev')">
                                <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none">
                                    <path d="M4 12L3.29289 11.2929L2.58579 12L3.29289 12.7071L4 12ZM19 13C19.5523 13 20 12.5523 20 12C20 11.4477 19.5523 11 19 11V13ZM9.29289 5.29289L3.29289 11.2929L4.70711 12.7071L10.7071 6.70711L9.29289 5.29289ZM3.29289 12.7071L9.29289 18.7071L10.7071 17.2929L4.70711 11.2929L3.29289 12.7071ZM4 13H19V11H4V13Z" fill="#CCD2E3"/>
                                </svg>
                            </div>
                            <span class="st__header__name">Settings</span>
                        </div>
                        Text mext next
                    </div>
                </div>

            </div>



        <input class="js__hash_user" type="hidden" value="{{\Auth()->user()->hash_login_token}}">
            <div class="right__card js__right__card">
               <div class="right__card__header">
                asdasd
               </div>
                <div class="right__card__msg__list js__right__card__msg__list" id="js__card_msg__list">
                    <div class="msg__main__card js__msg__main__card" style="  display: flex; justify-content: center;" id="js__msg__card">
                        <ul class="msg__list__ul js__msg__list__ul">
                            @if(isset($messages))
                            @include('messenger.module.messages')
                            @endif
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
        <div class="right__card__select js__right__card__select">
            Select a chat to start messaging
        </div>
    </div>
</div>

<script src="{{asset('/js/messenger/messenger.js')}}"></script>
<script src="{{asset('/js/messenger/main.js')}}"></script>
</body>
</html>
