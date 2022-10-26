
@foreach($messages as $message)
<li class="msg__list__li js__msg__list__li" id="js__msg__list__li" data-context="false" data-msg-id="{{$message->id}}">

    <input type="text" class="js__msg__author" hidden value="{{$message->author_name}}">
    <input type="text" class="js__msg__text" hidden value="{{$message->text}}">
    <input type="text" class="js__msg__id" hidden value="{{$message->id}}">
    <div
        class="@if($message->author_id === \Auth()->user()->id) msg__card__right @else msg__card__left @endif js__msg__card">

        {{$message->text}}
        <span class="msg__time">
                                        {{date('H:i',strtotime($message->created_at))}}
                                    </span>
    </div>
    <div class="msg__right__menu js__msg__right__menu" data-msg-id="{{$message->id}}">
        <span class="msg__right__menu__list" onclick="reply()">Reply</span>
        <span class="msg__right__menu__list">Copy</span>
        <span class="msg__right__menu__list">Forward</span>
        <span class="msg__right__menu__list">Select</span>
        <span class="msg__right__menu__list" style="color:#F15135;">Delete</span>

    </div>
</li>
@endforeach



{{--<li class="msg__list__li">--}}
{{--    <div class="msg__card__left">--}}
{{--        How are you? asdas zsdasdas sdfasdfa--}}
{{--        <span class="msg__time">--}}
{{--                                        12:30--}}
{{--                                    </span>--}}
{{--    </div>--}}
{{--</li>--}}
{{--<li class="msg__list__li">--}}
{{--    <div class="msg__card__left">--}}
{{--        Lorem Ipsum is simply dummy text of the pri nting and typesetting industry. Lorem Ipsum has been the industry's--}}
{{--        standard dummy text ever since the 1500s, when an unknown printer took a galley of type and scrambled it to make--}}
{{--        a type specimen book make a type specimen dfsdfsdfs.--}}
{{--        <span class="msg__time">--}}
{{--                                        12:30--}}
{{--                                    </span>--}}

{{--    </div>--}}
{{--</li>--}}

{{--<li class="msg__list__li">--}}
{{--    <div class="msg__card__right">--}}
{{--        Lorem Ipsum is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industry's--}}
{{--        standard dummy text ever since the 1500s, when an unknown printer took a galley of type and scrambled it to make--}}
{{--        a type specimen book.--}}
{{--        <span class="msg__time">--}}
{{--                                        12:30--}}
{{--                                    </span>--}}
{{--    </div>--}}
{{--</li>--}}

{{--<li class="msg__list__li">--}}
{{--    <div class="msg__card__right">--}}
{{--        Многие думают, что Lorem Ipsum - взятый с потолка псевдо-латинский набор слов, но это не совсем так.--}}
{{--        <span class="msg__time">--}}
{{--                                        12:30--}}
{{--                                    </span>--}}
{{--    </div>--}}
{{--</li>--}}
{{--<li class="msg__list__li">--}}
{{--    <div class="msg__card__right">--}}
{{--        Многие думают, что Lorem Ipsum - взятый с потолка псевдо-латинский набор слов, но это не совсем так.--}}
{{--        <span class="msg__time">--}}
{{--                                        12:30--}}
{{--                                    </span>--}}
{{--    </div>--}}
{{--</li>--}}
{{--<li class="msg__list__li">--}}
{{--    <div class="msg__card__right">--}}
{{--        Многие думают, что Lorem Ipsum - взятый с потолка псевдо-латинский набор слов, но это не совсем так.--}}
{{--        <span class="msg__time">--}}
{{--                                        12:30--}}
{{--                                    </span>--}}
{{--    </div>--}}
{{--</li>--}}
{{--<li class="msg__list__li">--}}
{{--    <div class="msg__card__right">--}}
{{--        Многие думают, что Lorem Ipsum - взятый с потолка псевдо-латинский набор слов, но это не совсем так.--}}
{{--        <span class="msg__time">--}}
{{--                                        12:30--}}
{{--                                    </span>--}}
{{--    </div>--}}
{{--</li>--}}
{{--<li class="msg__list__li">--}}
{{--    <div class="msg__card__right">--}}
{{--        Hello--}}
{{--        <span class="msg__time">--}}
{{--                                        12:30--}}
{{--                                    </span>--}}
{{--    </div>--}}
{{--</li>--}}
{{--<li class="msg__list__li">--}}
{{--    <div class="msg__card__right">--}}
{{--        Hi--}}
{{--        <span class="msg__time">--}}
{{--                                        12:30--}}
{{--                                    </span>--}}
{{--    </div>--}}
{{--</li>--}}
