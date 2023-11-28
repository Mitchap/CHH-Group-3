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
    public function search(Request $request)
    {
        $query = $request->input('query');
    
        if (empty($query)) {
            $data = ResoAnnouncement::all()->reverse();
        } else {
            // Filter search query based on column name. in this case "file" is column name
            $data = ResoAnnouncement::where('file', 'like', '%' . $query . '%')->get();
        }
    
        return view('member.reso_announcements', ['data' => $data]);
    }
}
