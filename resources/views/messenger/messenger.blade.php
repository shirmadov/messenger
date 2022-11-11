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
{{--    <link rel="stylesheet" href="/css/test.scss?v={{ Config::get('app.media_files_version') }}">--}}

</head>
<body>

<div class="main">
    <div class="container">

            <div class="left__card js__left__card" >
                <div class="pages">
                    <div class="page js__page__user">
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
                    <div class="page js__page__settings">
                        <div class="st__header">
                            <div class="st__header__back js__back__to__menu" onClick="slide('prev')">
                                <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none">
                                    <path d="M4 12L3.29289 11.2929L2.58579 12L3.29289 12.7071L4 12ZM19 13C19.5523 13 20 12.5523 20 12C20 11.4477 19.5523 11 19 11V13ZM9.29289 5.29289L3.29289 11.2929L4.70711 12.7071L10.7071 6.70711L9.29289 5.29289ZM3.29289 12.7071L9.29289 18.7071L10.7071 17.2929L4.70711 11.2929L3.29289 12.7071ZM4 13H19V11H4V13Z" fill="#CCD2E3"/>
                                </svg>
                            </div>
                            <div class="st__header__title">
                                <span class="st__header__name">Settings</span>
                            </div>

                        </div>
                        <div class="page__st">
                            <div class="st__header__edit js__st__header__edit" onclick="editSt()">
                                <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none">
                                    <path fill-rule="evenodd" clip-rule="evenodd" d="M17.204 10.796L19 9C19.5453 8.45475 19.8179 8.18213 19.9636 7.88803C20.2409 7.32848 20.2409 6.67153 19.9636 6.11197C19.8179 5.81788 19.5453 5.54525 19 5C18.4548 4.45475 18.1821 4.18213 17.888 4.03639C17.3285 3.75911 16.6715 3.75911 16.112 4.03639C15.8179 4.18213 15.5453 4.45475 15 5L13.1814 6.81866C14.1452 8.46926 15.5314 9.84482 17.204 10.796ZM11.7269 8.27312L4.8564 15.1436C4.43134 15.5687 4.21881 15.7812 4.07907 16.0423C3.93934 16.3034 3.88039 16.5981 3.7625 17.1876L3.1471 20.2646C3.08058 20.5972 3.04732 20.7635 3.14193 20.8581C3.23654 20.9527 3.40284 20.9194 3.73545 20.8529L6.81243 20.2375C7.40189 20.1196 7.69661 20.0607 7.95771 19.9209C8.21881 19.7812 8.43134 19.5687 8.8564 19.1436L15.7458 12.2542C14.1241 11.2386 12.7524 9.87628 11.7269 8.27312Z" fill="white"/>
                                </svg>
                            </div>
                            <div class="st__header__save js__st__header__save" onclick="saveSt()">
                                <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none">
                                    <path d="M19.5479 7.26651C20.2474 6.41162 20.1214 5.15157 19.2665 4.45212C18.4116 3.75266 17.1515 3.87866 16.4521 4.73355L8.66618 14.2497L6.2 12.4C5.31634 11.7373 4.06274 11.9164 3.4 12.8C2.73726 13.6837 2.91635 14.9373 3.8 15.6L7.03309 18.0248C8.31916 18.9894 10.137 18.7688 11.155 17.5246L19.5479 7.26651Z" stroke="white" stroke-width="2" stroke-linecap="round"/>
                                </svg>
                            </div>

                            <div class="page__st__profile__picture">
                                <div class="profile__picture">
                                    <span class="profile__text">SS</span>
                                </div>
                                <div class="page__camera__icon">
                                    <svg xmlns="http://www.w3.org/2000/svg" width="36" height="41" viewBox="0 0 36 41" fill="none">
                                        <path fill-rule="evenodd" clip-rule="evenodd" d="M3.58579 13.0858C3 13.6716 3 14.6144 3 16.5V29.5C3 31.3856 3 32.3284 3.58579 32.9142C4.17157 33.5 5.11438 33.5 7 33.5H29C30.8856 33.5 31.8284 33.5 32.4142 32.9142C33 32.3284 33 31.3856 33 29.5V16.5C33 14.6144 33 13.6716 32.4142 13.0858C31.8284 12.5 30.8856 12.5 29 12.5H7C5.11438 12.5 4.17157 12.5 3.58579 13.0858ZM7.5 16C6.94772 16 6.5 16.4477 6.5 17C6.5 17.5523 6.94772 18 7.5 18H10.5C11.0523 18 11.5 17.5523 11.5 17C11.5 16.4477 11.0523 16 10.5 16H7.5ZM24.5 29C24.5 28.4477 24.9477 28 25.5 28H28.5C29.0523 28 29.5 28.4477 29.5 29C29.5 29.5523 29.0523 30 28.5 30H25.5C24.9477 30 24.5 29.5523 24.5 29ZM20.5 23C20.5 24.3807 19.3807 25.5 18 25.5C16.6193 25.5 15.5 24.3807 15.5 23C15.5 21.6193 16.6193 20.5 18 20.5C19.3807 20.5 20.5 21.6193 20.5 23ZM22.5 23C22.5 25.4853 20.4853 27.5 18 27.5C15.5147 27.5 13.5 25.4853 13.5 23C13.5 20.5147 15.5147 18.5 18 18.5C20.4853 18.5 22.5 20.5147 22.5 23Z" fill="#ffffff"/>
                                        <line x1="0.999591" y1="6.00408" x2="10.9996" y2="5.99999" stroke="#ffffff" stroke-width="2" stroke-linecap="round"/>
                                        <line x1="6" y1="1" x2="6" y2="11" stroke="#ffffff" stroke-width="2" stroke-linecap="round"/>
                                    </svg>
                                </div>
                            </div>

                            <div class="page__st__profile__form">
                                <div class="profile__form">
                                    <label class="profile__form__label" for="fullname">Full Name</label><br>
                                    <input type="text" name="fullname" readonly class="profile__form__input js__profile__form__input" id="fullname" value="Sapa Shirmadov">
                                    <span class="profile__form__underline js__profile__form__underline"></span>
                                </div>
                                <div class="profile__form">
                                    <label class="profile__form__label" for="username">Username</label><br>
                                    <input type="text" name="username" readonly class="profile__form__input js__profile__form__input" id="username" value="@shirmadov">
                                    <span class="profile__form__underline js__profile__form__underline"></span>
                                </div>
                            </div>
                        </div>

                        <div class="page__st">
                            <ul class="page__st__list__ul">
                                <li class="page__st__list__li">
                                   <div class="page__st__list__icon">
                                       <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" viewBox="0 0 24 24" fill="none">
                                           <path d="M6.50248 6.97519C6.78492 4.15083 9.16156 2 12 2C14.8384 2 17.2151 4.15083 17.4975 6.97519L17.7841 9.84133C17.8016 10.0156 17.8103 10.1028 17.8207 10.1885C17.9649 11.3717 18.3717 12.5077 19.0113 13.5135C19.0576 13.5865 19.1062 13.6593 19.2034 13.8051L20.0645 15.0968C20.8508 16.2763 21.244 16.866 21.0715 17.3412C21.0388 17.4311 20.9935 17.5158 20.9368 17.5928C20.6371 18 19.9283 18 18.5108 18H5.48923C4.07168 18 3.36291 18 3.06318 17.5928C3.00651 17.5158 2.96117 17.4311 2.92854 17.3412C2.75601 16.866 3.14916 16.2763 3.93548 15.0968L4.79661 13.8051C4.89378 13.6593 4.94236 13.5865 4.98873 13.5135C5.62832 12.5077 6.03508 11.3717 6.17927 10.1885C6.18972 10.1028 6.19844 10.0156 6.21587 9.84133L6.50248 6.97519Z" fill="white"/>
                                           <path d="M10.0681 20.6294C10.1821 20.7357 10.4332 20.8297 10.7825 20.8967C11.1318 20.9637 11.5597 21 12 21C12.4403 21 12.8682 20.9637 13.2175 20.8967C13.5668 20.8297 13.8179 20.7357 13.9319 20.6294" stroke="white" stroke-width="2" stroke-linecap="round"/>
                                       </svg>
                                   </div>
                                    <span class="page__st__list__name">Notification</span>
                                </li>
                                <li class="page__st__list__li">
                                    <div class="page__st__list__icon">
                                        <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" viewBox="0 0 24 24" fill="none">
                                            <path fill-rule="evenodd" clip-rule="evenodd" d="M20 9.70443C19.5463 10.0634 19.0503 10.3678 18.5513 10.6173C16.7096 11.5381 14.3521 12 12 12C9.64787 12 7.29044 11.5381 5.44872 10.6173C4.94966 10.3678 4.45372 10.0634 4 9.70443V12C4 13.0575 4.83807 14.0759 6.34315 14.8284C7.84341 15.5786 9.87823 16 12 16C14.1218 16 16.1566 15.5786 17.6569 14.8284C19.1619 14.0759 20 13.0575 20 12V9.70443ZM20 15.7044C19.5463 16.0634 19.0503 16.3678 18.5513 16.6173C16.7096 17.5381 14.3521 18 12 18C9.64787 18 7.29044 17.5381 5.44872 16.6173C4.94966 16.3678 4.45372 16.0634 4 15.7044V18C4 20.2091 7.58172 22 12 22C16.4183 22 20 20.2091 20 18V15.7044ZM20 6C20 3.79086 16.4183 2 12 2C7.58172 2 4 3.79086 4 6C4 7.0575 4.83807 8.07589 6.34315 8.82843C7.84341 9.57856 9.87823 10 12 10C14.1218 10 16.1566 9.57856 17.6569 8.82843C19.1619 8.07589 20 7.0575 20 6Z" fill="white"/>
                                        </svg>
                                    </div>
                                    <span class="page__st__list__name">Data and Storage</span>
                                </li>
                                <li class="page__st__list__li">
                                    <div class="page__st__list__icon">
                                        <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" viewBox="0 0 24 24" fill="none">
                                            <path d="M16 8V7C16 4.79086 14.2091 3 12 3V3C9.79086 3 8 4.79086 8 7V8" stroke="white" stroke-width="2" stroke-linecap="round"/>
                                            <path fill-rule="evenodd" clip-rule="evenodd" d="M3.87868 7.87868C3 8.75736 3 10.1716 3 13V14C3 17.7712 3 19.6569 4.17157 20.8284C5.34315 22 7.22876 22 11 22H13C16.7712 22 18.6569 22 19.8284 20.8284C21 19.6569 21 17.7712 21 14V13C21 10.1716 21 8.75736 20.1213 7.87868C19.2426 7 17.8284 7 15 7H9C6.17157 7 4.75736 7 3.87868 7.87868ZM12 15C12.5523 15 13 14.5523 13 14C13 13.4477 12.5523 13 12 13C11.4477 13 11 13.4477 11 14C11 14.5523 11.4477 15 12 15ZM15 14C15 15.3062 14.1652 16.4175 13 16.8293V19H11V16.8293C9.83481 16.4175 9 15.3062 9 14C9 12.3431 10.3431 11 12 11C13.6569 11 15 12.3431 15 14Z" fill="white"/>
                                        </svg>
                                    </div>
                                    <span class="page__st__list__name">Privacy and Security</span>
                                </li>
                                <li class="page__st__list__li">
                                    <div class="page__st__list__icon">
                                        <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" viewBox="0 0 24 24" fill="none">
                                            <path fill-rule="evenodd" clip-rule="evenodd" d="M13.9838 2.54161C14.0711 2.71093 14.0928 2.92777 14.1361 3.36144C14.2182 4.1823 14.2593 4.59274 14.4311 4.81793C14.649 5.10358 15.0034 5.25038 15.3595 5.20248C15.6402 5.16472 15.9594 4.90352 16.5979 4.38113C16.9352 4.10515 17.1038 3.96716 17.2853 3.90918C17.5158 3.83555 17.7652 3.84798 17.9872 3.94419C18.162 4.01994 18.3161 4.17402 18.6243 4.4822L19.5178 5.37567C19.8259 5.68385 19.98 5.83794 20.0558 6.01275C20.152 6.23478 20.1644 6.48415 20.0908 6.71464C20.0328 6.89612 19.8948 7.06478 19.6188 7.4021C19.0964 8.0406 18.8352 8.35984 18.7975 8.64056C18.7496 8.99662 18.8964 9.35102 19.182 9.56893C19.4072 9.74072 19.8176 9.78176 20.6385 9.86385C21.0722 9.90722 21.2891 9.92891 21.4584 10.0162C21.6734 10.1272 21.841 10.3123 21.9299 10.5373C22 10.7145 22 10.9324 22 11.3682V12.6319C22 13.0676 22 13.2855 21.93 13.4626C21.841 13.6877 21.6734 13.8729 21.4583 13.9838C21.289 14.0711 21.0722 14.0928 20.6386 14.1361L20.6386 14.1361C19.818 14.2182 19.4077 14.2592 19.1825 14.4309C18.8967 14.6489 18.7499 15.0034 18.7979 15.3596C18.8357 15.6402 19.0968 15.9593 19.619 16.5976C19.8949 16.9348 20.0328 17.1034 20.0908 17.2848C20.1645 17.5154 20.152 17.7648 20.0558 17.9869C19.98 18.1617 19.826 18.3157 19.5179 18.6238L18.6243 19.5174C18.3162 19.8255 18.1621 19.9796 17.9873 20.0554C17.7652 20.1516 17.5159 20.164 17.2854 20.0904C17.1039 20.0324 16.9352 19.8944 16.5979 19.6184L16.5979 19.6184C15.9594 19.096 15.6402 18.8348 15.3595 18.7971C15.0034 18.7492 14.649 18.896 14.4311 19.1816C14.2593 19.4068 14.2183 19.8173 14.1362 20.6383C14.0928 21.0722 14.0711 21.2891 13.9837 21.4585C13.8728 21.6735 13.6877 21.8409 13.4628 21.9299C13.2856 22 13.0676 22 12.6316 22H11.3682C10.9324 22 10.7145 22 10.5373 21.9299C10.3123 21.841 10.1272 21.6734 10.0162 21.4584C9.92891 21.2891 9.90722 21.0722 9.86385 20.6385C9.78176 19.8176 9.74072 19.4072 9.56892 19.182C9.35101 18.8964 8.99663 18.7496 8.64057 18.7975C8.35985 18.8352 8.04059 19.0964 7.40208 19.6189L7.40206 19.6189C7.06473 19.8949 6.89607 20.0329 6.71458 20.0908C6.4841 20.1645 6.23474 20.152 6.01272 20.0558C5.8379 19.9801 5.6838 19.826 5.37561 19.5178L4.48217 18.6243C4.17398 18.3162 4.01988 18.1621 3.94414 17.9873C3.84794 17.7652 3.8355 17.5159 3.90913 17.2854C3.96711 17.1039 4.10511 16.9352 4.3811 16.5979C4.90351 15.9594 5.16471 15.6402 5.20247 15.3594C5.25037 15.0034 5.10357 14.649 4.81792 14.4311C4.59273 14.2593 4.1823 14.2182 3.36143 14.1361C2.92776 14.0928 2.71093 14.0711 2.54161 13.9838C2.32656 13.8728 2.15902 13.6877 2.07005 13.4627C2 13.2855 2 13.0676 2 12.6318V11.3683C2 10.9324 2 10.7144 2.07008 10.5372C2.15905 10.3123 2.32654 10.1272 2.54152 10.0163C2.71088 9.92891 2.92777 9.90722 3.36155 9.86384H3.36155H3.36156C4.18264 9.78173 4.59319 9.74068 4.81842 9.56881C5.10395 9.35092 5.2507 8.99664 5.20287 8.64066C5.16514 8.35987 4.90385 8.04052 4.38128 7.40182C4.10516 7.06435 3.96711 6.89561 3.90914 6.71405C3.83557 6.48364 3.848 6.23438 3.94413 6.01243C4.01988 5.83754 4.17403 5.68339 4.48233 5.37509L5.37565 4.48177L5.37566 4.48177C5.68385 4.17357 5.83795 4.01947 6.01277 3.94373C6.23478 3.84753 6.48414 3.8351 6.71463 3.90872C6.89612 3.9667 7.06481 4.10472 7.4022 4.38076C8.04061 4.9031 8.35982 5.16427 8.64044 5.20207C8.99661 5.25003 9.35113 5.10319 9.56907 4.81742C9.74077 4.59227 9.78181 4.18195 9.86387 3.36131C9.90722 2.92776 9.9289 2.71098 10.0162 2.5417C10.1271 2.32658 10.3123 2.15898 10.5374 2.07001C10.7145 2 10.9324 2 11.3681 2H12.6318C13.0676 2 13.2855 2 13.4627 2.07005C13.6877 2.15902 13.8728 2.32656 13.9838 2.54161ZM12 16C14.2091 16 16 14.2091 16 12C16 9.79086 14.2091 8 12 8C9.79086 8 8 9.79086 8 12C8 14.2091 9.79086 16 12 16Z" fill="white"/>
                                        </svg>
                                    </div>
                                   <span class="page__st__list__name">General Settings</span>
                                </li>
                                <li class="page__st__list__li">
                                    <div class="page__st__list__icon">
                                        <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" viewBox="0 0 24 24" fill="none">
                                            <path fill-rule="evenodd" clip-rule="evenodd" d="M3.17157 3.17157C2 4.34314 2 6.22876 2 9.99999V14C2 17.7712 2 19.6568 3.17157 20.8284C4.34315 22 6.22876 22 10 22H14C17.7712 22 19.6569 22 20.8284 20.8284C22 19.6569 22 17.7712 22 14V14V9.99999C22 7.16065 22 5.39017 21.5 4.18855V17C20.5396 17 19.6185 16.6185 18.9393 15.9393L18.1877 15.1877C17.4664 14.4664 17.1057 14.1057 16.6968 13.9537C16.2473 13.7867 15.7527 13.7867 15.3032 13.9537C14.8943 14.1057 14.5336 14.4664 13.8123 15.1877L13.6992 15.3008C13.1138 15.8862 12.8212 16.1788 12.5102 16.2334C12.2685 16.2758 12.0197 16.2279 11.811 16.0988C11.5425 15.9326 11.3795 15.5522 11.0534 14.7913L11 14.6667C10.2504 12.9175 9.87554 12.0429 9.22167 11.7151C8.89249 11.5501 8.52413 11.4792 8.1572 11.5101C7.42836 11.5716 6.75554 12.2445 5.40989 13.5901L3.5 15.5V2.88739C3.3844 2.97349 3.27519 3.06795 3.17157 3.17157Z" fill="white"/>
                                            <path d="M3 10C3 8.08611 3.00212 6.75129 3.13753 5.74416C3.26907 4.76579 3.50966 4.2477 3.87868 3.87868C4.2477 3.50966 4.76579 3.26907 5.74416 3.13753C6.75129 3.00212 8.08611 3 10 3H14C15.9139 3 17.2487 3.00212 18.2558 3.13753C19.2342 3.26907 19.7523 3.50966 20.1213 3.87868C20.4903 4.2477 20.7309 4.76579 20.8625 5.74416C20.9979 6.75129 21 8.08611 21 10V14C21 15.9139 20.9979 17.2487 20.8625 18.2558C20.7309 19.2342 20.4903 19.7523 20.1213 20.1213C19.7523 20.4903 19.2342 20.7309 18.2558 20.8625C17.2487 20.9979 15.9139 21 14 21H10C8.08611 21 6.75129 20.9979 5.74416 20.8625C4.76579 20.7309 4.2477 20.4903 3.87868 20.1213C3.50966 19.7523 3.26907 19.2342 3.13753 18.2558C3.00212 17.2487 3 15.9139 3 14V10Z" stroke="white" stroke-width="2"/>
                                            <circle cx="15" cy="9" r="2" fill="white"/>
                                        </svg>
                                    </div>
                                    <span class="page__st__list__name">Wallpaper Chat</span>
                                    </li>
                            </ul>
                        </div>

{{--                        <fieldset style="border:1px solid #213854; border-radius: 5px;margin:10px">--}}
{{--                            <legend>Profile</legend>--}}
{{--                        </fieldset>--}}


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

    <div class="msg__rm__card js__msg__rm__card">
        <div class="msg__rm__text">Are you sure you want to delete this message</div>
        <div class="msg__rm__chk__card">
            <label class="msg__rm__chk__text">
                <input type="checkbox" class="msg__rm__chk" name="checkbox-checked" checked />
                <span style="margin-top: 0.15em">Also delete for Sapa Shirmadov</span>
            </label>
        </div>
        <div class="msg__rm__btn">
            <span class="msg__rm__cancel__btn" onclick="cancel()">CANCEL</span>
            <span class="msg__rm__delete__btn" onclick="deleteMsgA()">DELETE</span>
        </div>
    </div>



</div>

<script src="{{asset('/js/messenger/messenger.js')}}"></script>
<script src="{{asset('/js/messenger/main.js')}}"></script>
</body>
</html>
