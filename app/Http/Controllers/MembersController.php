<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Members;

class MembersController extends Controller
{
    public function member() {
        $member = Members::all();
        return view('admin.member', ['member' => $member]);
    }

    // Registeration not included in auth
    public function register() {
        return view('member.registration');
    }

    public function edit(Members $member) {
        return view('admin.edit_member', ['member' => $member]);
    }

    public function view(Members $member) {
        return view('admin.view_member',  ['member' => $member]);
    }

    public function update(Members $member, Request $request) {
        // Validate the request data
        $request->validate([
            'first_name' => 'required',
            'last_name' => 'required',
            // Add validation rules for other fields as needed
            'photo' => 'image|mimes:jpeg,png,jpg|max:2048', 
        ]);

        // Handle file upload
        if ($request->hasFile('photo')) {
            $photoPath = $request->file('photo')->store('assets');
            $data['photo'] = $photoPath;
        }

        // Update other form data
        $data = [
            'first_name' => $request->first_name,            
            'last_name' => $request->last_name,
            'age' => $request->age,
            'email' => $request->email,
            'address' => $request->address,
            'mobile' => $request->mobile,            
            'date_of_birth' => $request->date_of_birth,
            'gender' => $request->gender,            
            'fee' => $request->fee,
            'status' => $request->status,
        ];

        // Update member data
        $member->update($data);

        return redirect(route('member'))->with('success', 'Member updated successfully');
    }

    public function delete(Members $member) {
        $member->delete();
        return redirect(route('member'))->with('success', 'Member deleted successfully');
    }
}
