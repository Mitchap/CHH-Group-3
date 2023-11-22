<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\ResoAnnouncement;

class MemberSideResoController extends Controller
{
    function reso_announcements(){
        $data = ResoAnnouncement::all()->reverse();
        return view('member.reso_announcements', ['data' => $data] );
    }
}
