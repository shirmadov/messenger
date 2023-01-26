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
    <link rel="stylesheet" href="/js/cropperjs/cropper.min.css?v={{ Config::get('app.media_files_version') }}">
    <script src="{{asset('/js/cropperjs/cropper.min.js')}}"></script>

</head>
<body>

<div class="main">
    <div class="container">

            <div class="left__card js__left__card" >
                <div class="pages">
                    <div class="layer">
                        @include('messenger.module.pages.users')
                    </div>
                    <div class="layer">
                        @include('messenger.module.pages.settings')
                    </div>
                    <div class="layer">
{{--                        @include('messenger.module.pages.settings_module.main')--}}
                        <div class="page layer3__page1 js__layer3__page" data-layer="1">
                            <div class="notifiction__test">
                                <div class="st__header">
                                    <div class="st__header__back js__back__to__menu" onClick="slide('prev')">
                                        <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none">
                                            <path
                                                d="M4 12L3.29289 11.2929L2.58579 12L3.29289 12.7071L4 12ZM19 13C19.5523 13 20 12.5523 20 12C20 11.4477 19.5523 11 19 11V13ZM9.29289 5.29289L3.29289 11.2929L4.70711 12.7071L10.7071 6.70711L9.29289 5.29289ZM3.29289 12.7071L9.29289 18.7071L10.7071 17.2929L4.70711 11.2929L3.29289 12.7071ZM4 13H19V11H4V13Z"
                                                fill="#CCD2E3"/>
                                        </svg>
                                    </div>
                                    <div class="st__header__title">
                                        <span class="st__header__name">Notification</span>
                                    </div>

                                </div>
                            </div>
                        </div>

                        <div class="page layer3__page2 js__layer3__page" data-layer="2">
                            <div class="st__header">
                                <div class="st__header__back js__back__to__menu" onClick="slide('prev')">
                                    <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none">
                                        <path
                                            d="M4 12L3.29289 11.2929L2.58579 12L3.29289 12.7071L4 12ZM19 13C19.5523 13 20 12.5523 20 12C20 11.4477 19.5523 11 19 11V13ZM9.29289 5.29289L3.29289 11.2929L4.70711 12.7071L10.7071 6.70711L9.29289 5.29289ZM3.29289 12.7071L9.29289 18.7071L10.7071 17.2929L4.70711 11.2929L3.29289 12.7071ZM4 13H19V11H4V13Z"
                                            fill="#CCD2E3"/>
                                    </svg>
                                </div>
                                <div class="st__header__title">
                                    <span class="st__header__name">Data and Storage</span>
                                </div>

                            </div>
                        </div>

                        <div class="page layer3__page3 js__layer3__page" data-layer="3">
                            <div class="st__header">
                                <div class="st__header__back js__back__to__menu" onClick="slide('prev')">
                                    <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none">
                                        <path
                                            d="M4 12L3.29289 11.2929L2.58579 12L3.29289 12.7071L4 12ZM19 13C19.5523 13 20 12.5523 20 12C20 11.4477 19.5523 11 19 11V13ZM9.29289 5.29289L3.29289 11.2929L4.70711 12.7071L10.7071 6.70711L9.29289 5.29289ZM3.29289 12.7071L9.29289 18.7071L10.7071 17.2929L4.70711 11.2929L3.29289 12.7071ZM4 13H19V11H4V13Z"
                                            fill="#CCD2E3"/>
                                    </svg>
                                </div>
                                <div class="st__header__title">
                                    <span class="st__header__name">Privacy and Security</span>
                                </div>

                            </div>
                        </div>

                        <div class="page layer3__page4 js__layer3__page" data-layer="4">
                            <div class="st__header">
                                <div class="st__header__back js__back__to__menu" onClick="slide('prev')">
                                    <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none">
                                        <path
                                            d="M4 12L3.29289 11.2929L2.58579 12L3.29289 12.7071L4 12ZM19 13C19.5523 13 20 12.5523 20 12C20 11.4477 19.5523 11 19 11V13ZM9.29289 5.29289L3.29289 11.2929L4.70711 12.7071L10.7071 6.70711L9.29289 5.29289ZM3.29289 12.7071L9.29289 18.7071L10.7071 17.2929L4.70711 11.2929L3.29289 12.7071ZM4 13H19V11H4V13Z"
                                            fill="#CCD2E3"/>
                                    </svg>
                                </div>
                                <div class="st__header__title">
                                    <span class="st__header__name">General Settings</span>
                                </div>

                            </div>
                        </div>

                        <div class="page layer3__page5 js__layer3__page" data-layer="5">
                            <div class="st__header">
                                <div class="st__header__back js__back__to__menu" onClick="slide('prev')">
                                    <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none">
                                        <path
                                            d="M4 12L3.29289 11.2929L2.58579 12L3.29289 12.7071L4 12ZM19 13C19.5523 13 20 12.5523 20 12C20 11.4477 19.5523 11 19 11V13ZM9.29289 5.29289L3.29289 11.2929L4.70711 12.7071L10.7071 6.70711L9.29289 5.29289ZM3.29289 12.7071L9.29289 18.7071L10.7071 17.2929L4.70711 11.2929L3.29289 12.7071ZM4 13H19V11H4V13Z"
                                            fill="#CCD2E3"/>
                                    </svg>
                                </div>
                                <div class="st__header__title">
                                    <span class="st__header__name">Wallpaper Chat</span>
                                </div>

                            </div>
                        </div>
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
{{--                                @include('messenger.module.messages')--}}
                        </ul>

                    </div>
                </div>
                <div class="right__card__form">
                    <div class="msg__reply js__msg__reply">
                        <div class="msg__reply__border"></div>
                       <div class="msg__reply__inf">
                           <div class="" style="margin-bottom: 3px">
                               <span class="msg__reply__author js__msg__reply__author">Sapa Shirmadov</span>
                           </div>
                           <div>
                               <span class="msg__reply__text js__msg__reply__text">Hello. I am fine. And you?</span>
                           </div>
                       </div>
                        <div class="msg__reply__cros js__msg__reply__cros" onclick="cros()" style="">
                            <svg xmlns="http://www.w3.org/2000/svg" width="20" height="20" viewBox="0 0 24 24" fill="none">
                                <path d="M18 6L6 18" stroke="#778899" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"/>
                                <path d="M6 6L18 18" stroke="#778899" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"/>
                            </svg>
                        </div>

                    </div>
                    <form id="msg__form" class="msg__form" enctype="multipart/form-data">
                        @csrf

                        <input type="file" hidden class="js__msg__file" value="" name="msg_files[]" multiple="multiple" >
                        <span class="msg__file__count js__msg__file__count">25</span>
                        <div class="msg__file__icon js__msg__file__icon" onclick="chooseFile()">
                            <svg style="cursor: pointer" xmlns="http://www.w3.org/2000/svg" width="22" height="22" viewBox="0 0 22 23">
                                <path fill="none" fill-rule="evenodd" stroke="#F5F5DC" stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M19.44 10.05l-9.19 9.19a6.003 6.003 0 1 1-8.49-8.49l9.19-9.19a4.002 4.002 0 0 1 5.66 5.66l-9.2 9.19a2.001 2.001 0 0 1-2.83-2.83l8.49-8.48" transform="translate(1 1)"/></svg>
                        </div>
                        <div contenteditable="true"
                             id="message" class="div__textarea js__msg__textarea" data-placeholder="Type ...">
                        </div>
                        <button type="submit" class="msg__send__btn js__msg__send__btn">
                        <svg style="cursor:pointer;" xmlns="http://www.w3.org/2000/svg" width="22" height="22" viewBox="0 0 25 25" fill="none">
                            <circle cx="12.5" cy="12.5" r="11.5" stroke="#F5F5DC" stroke-width="2"/>
                            <path d="M13.7071 6.29289C13.3166 5.90237 12.6834 5.90237 12.2929 6.29289L5.92893 12.6569C5.53841 13.0474 5.53841 13.6805 5.92893 14.0711C6.31946 14.4616 6.95262 14.4616 7.34315 14.0711L13 8.41421L18.6569 14.0711C19.0474 14.4616 19.6805 14.4616 20.0711 14.0711C20.4616 13.6805 20.4616 13.0474 20.0711 12.6569L13.7071 6.29289ZM14 19V7H12V19H14Z" fill="#F5F5DC"/>
                        </svg>
                        </button>
                    </form>

{{--                    <div contenteditable="true"--}}
{{--                         id="message" class="div__textarea js__msg__textarea" data-placeholder="Type ...">--}}
{{--                        <button>Send</button>--}}
{{--                    </div>--}}
                </div>
            </div>

        <div class="right__card__select js__right__card__select">
            Select a chat to start messaging
        </div>

    </div>

   <div class="modal">
       <div class="msg__rm__card js__msg__rm__card">
           <div class="msg__rm__text">Are you sure you want to delete this message</div>
           <div class="msg__rm__chk__card">
               <label class="msg__rm__chk__text">
                   <input type="checkbox" class="msg__rm__chk" name="checkbox-checked" checked />
                   <span style="margin-top: 0.15em">Also delete for Sapa Shirmadov</span>
               </label>
           </div>
           <div class="msg__rm__btn">
               <span class="msg__rm__cancel__btn" onclick="cancelDelete()">CANCEL</span>
               <span class="msg__rm__delete__btn" onclick="deleteMsg()">DELETE</span>
           </div>
       </div>
   </div>

    <div class="drop__crop">

        <div class="drop__crop__card__main">
            <div class="drop__crop__card">
                <img class="drop__crop__img js__drop__crop__img" id="js__drop__crop__img" src="" alt="Picture">
{{--                https://p1.pxfuel.com/preview/274/652/884/flag-marine-turkey.jpg--}}
{{--                {{asset('img/profile/anton.jpg')}}--}}
                {{--            <div class="preview"></div>--}}
                <div class="drop__crop__done__icon" id="js__drop__crop__done">
                    <svg xmlns="http://www.w3.org/2000/svg" width="50" height="50" viewBox="0 0 24 24" fill="none">
                        <path fill-rule="evenodd" clip-rule="evenodd" d="M12 21C16.9706 21 21 16.9706 21 12C21 7.02944 16.9706 3 12 3C7.02944 3 3 7.02944 3 12C3 16.9706 7.02944 21 12 21ZM16.3841 9.32009C16.5609 9.10795 16.5322 8.79267 16.3201 8.61589C16.108 8.43911 15.7927 8.46777 15.6159 8.67991L12.0179 12.9975C11.6807 13.4022 11.4603 13.6648 11.273 13.8352C11.0964 13.9959 11.0112 14.0155 10.9555 14.0181C10.8997 14.0206 10.8131 14.0087 10.6226 13.8647C10.4207 13.712 10.1774 13.4703 9.80494 13.0978L8.35355 11.6464C8.15829 11.4512 7.84171 11.4512 7.64645 11.6464C7.45118 11.8417 7.45118 12.1583 7.64645 12.3536L9.09784 13.8049L9.1224 13.8295L9.1224 13.8295C9.46343 14.1706 9.75557 14.4627 10.0195 14.6623C10.3012 14.8754 10.6159 15.0345 11.0008 15.017C11.3856 14.9996 11.6846 14.8126 11.9459 14.5749C12.1907 14.3523 12.4552 14.0349 12.7639 13.6643L12.7862 13.6376L16.3841 9.32009Z" fill="#00B2BE"/>
                    </svg>
                </div>
            </div>
        </div>
    </div>


</div>



<script src="{{asset('/js/messenger/messenger.js')}}"></script>
<script src="{{asset('/js/messenger/main.js')}}"></script>
<script src="{{asset('/js/messenger/crop.js')}}"></script>

</body>
</html>
