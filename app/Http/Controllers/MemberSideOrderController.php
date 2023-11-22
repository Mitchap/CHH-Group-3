<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\OrderAnnouncement;

class MemberSideOrderController extends Controller
{
    function order_announcements(){
        $data = OrderAnnouncement::all()->reverse();
        return view('member.order_announcements', ['data' => $data] );
    }
}
