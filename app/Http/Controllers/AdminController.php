<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Announcement;

class AdminController extends Controller
{
    function announcement(){
        $data = Announcement::all();
        return view('admin.announcement', ['data' => $data]);
    }

    function reso_announcement(){
        return view('admin.reso_announcement');
    }

    function order_announcement(){
        return view('admin.order_announcement');
    }

    function member(){
        return view('admin.member');
    }

    function report(){
        return view('admin.report');
    }
}
