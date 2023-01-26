<div class="page js__page__user">
    <div class="search__main">
        <div class="hamburger__menu js__hamburger__menu">
            <svg class="icon__hamburg" xmlns="http://www.w3.org/2000/svg" width="22" height="16" viewBox="0 0 22 16"
                 fill="none">
                <path d="M1 1H21" stroke="#F5F5DC" stroke-width="1" stroke-linecap="round"/>
                <path d="M1 8H21" stroke="#F5F5DC" stroke-width="1" stroke-linecap="round"/>
                <path d="M1 15H21" stroke="#F5F5DC" stroke-width="1" stroke-linecap="round"/>
            </svg>
        </div>

{{--        <div class="st__header__back js__back__to__menu" onClick="slide('prev')">--}}
{{--            <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none">--}}
{{--                <path d="M4 12L3.29289 11.2929L2.58579 12L3.29289 12.7071L4 12ZM19 13C19.5523 13 20 12.5523 20 12C20 11.4477 19.5523 11 19 11V13ZM9.29289 5.29289L3.29289 11.2929L4.70711 12.7071L10.7071 6.70711L9.29289 5.29289ZM3.29289 12.7071L9.29289 18.7071L10.7071 17.2929L4.70711 11.2929L3.29289 12.7071ZM4 13H19V11H4V13Z" fill="#CCD2E3"/>--}}
{{--            </svg>--}}
{{--        </div>--}}
{{--        <div class="search__stick__card" style="">--}}
            <input class="search__stick" type="text" placeholder="Search">
{{--        </div>--}}

    </div>
    @include('messenger.module.pages.users_module.menu')
    @include('messenger.module.pages.users_module.users_list')
</div>
