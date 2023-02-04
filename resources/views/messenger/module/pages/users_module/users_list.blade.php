<div class="user__list js__user__list">
{{--    <div class="user__search__header">--}}
{{--        <span class="user__search__user">Users</span>--}}

{{--    </div>--}}
{{--    <hr>--}}
    <ul class="user__ul__list">
        @foreach($users as $key=>$user)

            <li class="user__li__list js__user__li__list">

                <div class="user__pr__name">
                    @if(!is_null($user->avatar_path))
                        <img class="user__profile" src="{{asset('img/profile/').'/'.$user->avatar_path}}" alt="">
                    @else
                        <span class="user__profile__letter" style="background-color: {{$user->avatar_color}}">
                        {{strtoupper(substr(explode(" ", $user->name)[0],0,1).strtoupper(substr(explode(" ", $user->name)[1],0,1)))}}
                    </span>
                    @endif
                    <div style="height: 45px;">
                        <input class="js__user__id" type="text" hidden value="{{$user->user_id}}">
                        <div class="column user__name__text" >
                    <span class="user__name">
                        @if(\Auth()->user()->id === $user->id)
                            Saved Messages
                        @else
                            {{$user->name}}
                        @endif
                    </span>
                            <span class="user__last__text">{{$user->last_msg->text}}</span>
                        </div>
                        <div class="column user__msg__time__notif">
                            <span class="user__msg__time">Wed</span>
                            @if($user->notif_count != 0)
                                <span class="user__msg__notif">{{$user->notif_count}}</span>
                            @endif
                        </div>
                    </div>
                </div>
            </li>
        @endforeach
    </ul>
</div>

<div class="search__list js__search__list">
    <div class="user__search__header">
        <span class="user__search__user">Users</span>

    </div>
    <hr>
    <ul class="user__ul__list" style="height: 89vh; ">

        @foreach($users as $key=>$user)
            <li class="user__li__list js__user__li__list">
                <div class="user__pr__name">
                    @if(!is_null($user->avatar_path))
                        <img class="user__profile" src="{{asset('img/profile/').'/'.$user->avatar_path}}" alt="">
                    @else
                        <span class="user__profile__letter" style="background-color: {{$user->avatar_color}}">
                        {{strtoupper(substr(explode(" ", $user->name)[0],0,1).strtoupper(substr(explode(" ", $user->name)[1],0,1)))}}
                    </span>
                    @endif
                    <div style="height: 45px;">
                        <input class="js__user__id" type="text" hidden value="{{$user->user_id}}">
                        <div class="column user__name__text" >
                    <span class="user__name">
                        @if(\Auth()->user()->id === $user->id)
                            Saved Messages
                        @else
                            {{$user->name}}
                        @endif
                    </span>
                            <span class="user__last__text">{{$user->last_msg->text}}</span>
                        </div>
                        <div class="column user__msg__time__notif">
                            <span class="user__msg__time">Wed</span>
                            @if($user->notif_count != 0)
                                <span class="user__msg__notif">{{$user->notif_count}}</span>
                            @endif
                        </div>
                    </div>
                </div>
            </li>
        @endforeach
    </ul>
</div>
