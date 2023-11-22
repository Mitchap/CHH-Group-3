<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Announcement;

class MemberSideController extends Controller
{
    function memo_announcements(){
        $data = Announcement::all()->reverse();
        return view('member.memo_announcements', ['data' => $data]);
    }

    function event(){
        return view('member.event');
    }

    function proposal(){
        return view('member.proposal');
    }
}

