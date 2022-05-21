@foreach($users as $key=>$user)
    <li class="user__li__list js__user__li__list">
        <div class="user__pr__name">
            <img class="user__profile" src="{{asset('img/profile/anton.jpg')}}" alt=""/>

            <div style="height: 45px;">
                <input class="js__user__id" type="text" hidden value="{{$user->id}}">
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
