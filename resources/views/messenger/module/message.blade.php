<li class="msg__list__li js__msg__list__li" id="js__msg__list__li" data-context="false">

    <input type="text" class="js__msg__author" hidden value="{{$message->author_name}}">
    <input type="text" class="js__msg__text" hidden value="{{$message->text}}">
    <input type="text" class="js__msg__id" hidden value="{{$message->id}}">
    <div
        class="@if($message->author_id === \Auth()->user()->id) msg__card__right @else msg__card__left @endif js__msg__card">

@if(!is_null($message->reply_msg_id))
    {{--            @dd($message->reply_msg)--}}
    <div class="reply__msg__main" style="padding: 0; margin: 0">
        <div class="reply__msg__border"></div>
        <div class="reply__msg__inf">
            @if(!is_null($message->reply_msg))
            <span class="reply__msg__author">{{$message->reply_msg->author_name}}</span>
            <div class="reply__msg__text">
                {{substr($message->reply_msg->text,0,45)}}
                @if(strlen($message->reply_msg->text)>50)
                    ...
                @endif
            </div>
            @else
                <span class="reply__msg__author">Unknown</span>
                <div class="reply__msg__text" style="font-style: italic; color:#DEDEDE">
                    Deleted message
                </div>
            @endif
        </div>
    </div>

@endif

@if(!is_null($message->msg_files))
    @foreach($message->msg_files as $msg_file)
    <div class="msg__img__card">
{{--        @dd($message->chat_list_id,$msg_file->document_path)--}}
        <img class="msg__img" class="" id="msg_image"
             src="{{route('download.file',[$message->chat_list_id,$msg_file->document_path])}}">
    </div>
        @endforeach
{{--        <div class="msg__img__card">--}}
{{--            <img class="msg__img" class="" id="msg_image"--}}
{{--                 src="{{route('download.file',[1,'636e4ddfd3696.png'])}}">--}}
{{--        </div>--}}
    @endif


<div class="" style="padding: 0; margin: 0">
    {{$message->text}}
</div>
<span class="msg__time">
                                        {{date('H:i',strtotime($message->created_at))}}
                                    </span>
</div>
<div class="msg__right__menu js__msg__right__menu">
    <span class="msg__right__menu__list" onclick="replyMsg()">Reply</span>
    <span class="msg__right__menu__list" onclick="copyMsg()">Copy</span>
    <span class="msg__right__menu__list">Forward</span>
    <span class="msg__right__menu__list">Select</span>
    <span class="msg__right__menu__list" style="color:#F15135;" onclick="deleteMsg()">Delete</span>

</div>
</li>
