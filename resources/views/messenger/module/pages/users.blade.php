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
        <input class="search__stick" type="text" placeholder="Search">
    </div>
    @include('messenger.module.pages.users_module.menu')
    @include('messenger.module.pages.users_module.users_list')
</div>
