<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Announcement;
use App\Models\Members;

class MemberSideController extends Controller
{
    public function memo_announcements(){
        $data = Announcement::all()->reverse();
        return view('member.memo_announcements', ['data' => $data]);
    }

    public function event(){
        return view('member.event');
    }

    public function proposal(){
        return view('member.proposal');
    }
    
    public function registration() {
        return view('member.registration');
    }

    public function submit(Request $request) {

        $filename = '';

        if ($request->hasFile('photo')) {

            $filename = $request->getSchemeAndHttpHost() . '/assets/img/' . time() . '.' . $request->photo->extension();

            $request->photo->move(public_path('/assets/img/'), $filename);
        }

        $request->validate([            
            'first_name' => 'required',          
            'last_name' =>  'required', 
            'age' => 'required', 
            'email' =>  'required', 
            'address' => 'required', 
            'mobile' =>  'required', 
            'date_of_birth' => 'required', 
            'gender' =>  'required', 
            'fee' =>  'required', 
            'status' =>  'required'
        ]);
        
        $data = [   
            'photo' => $filename,         
            'first_name' => $request -> first_name,            
            'last_name' =>  $request -> last_name,
            'age' => $request -> age,
            'email' =>  $request -> email,
            'address' => $request -> address,
            'mobile' =>  $request -> mobile,
            'date_of_birth' => $request -> date_of_birth,
            'gender' =>  $request -> gender,
            'fee' =>  $request -> fee,
            'status' =>  $request -> status,
        ];
        
        $newMembers = Members::create($data);

        return redirect()->route('events')->with('success', 'Registration Complete!');
    }
}

