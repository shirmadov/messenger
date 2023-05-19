<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class SupportChatController extends Controller
{
    public function index(){
        return view('support_chat.index');
    }
}
