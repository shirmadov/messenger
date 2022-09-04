
@foreach($messages as $message)
<li class="msg__list__li">

    <div class="@if($message->author_id === \Auth()->user()->id) msg__card__right @else msg__card__left @endif js__msg__card">
        <input class="js__msg__id" type="hidden" value="{{$message->id}}">
        {{--                                        <pre class="msg__text">--}}
        {{--                                           --}}
        {{--                                        </pre>--}}
        {{$message->text}}
        <span class="msg__time">
                                        {{date('H:i',strtotime($message->created_at))}}
                                    </span>
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
