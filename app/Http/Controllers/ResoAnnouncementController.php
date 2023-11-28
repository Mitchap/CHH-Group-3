<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Facades\Mail;
use App\Mail\AnnouncementMail;
use App\Models\ResoAnnouncement;

class ResoAnnouncementController extends Controller
{
    public function showForm(){
        return view('upload_reso');
    }

    public function uploadFile(Request $request)
    {
        $request->validate([
            'file' => 'required|mimes:pdf',
        ]);

        $data = new ResoAnnouncement();

        if ($request->hasFile('file')) {
            $file = $request->file('file');
            $fileName =$file->getClientOriginalName();


            $file->storeAs('reso', $fileName);
            $data->file = $fileName;

            // Send email notification
           $userEmail = 'mitchbarcenilla4@gmail.com'; // Change this to the recipient's email
           Mail::to($userEmail)->send(new AnnouncementMail());

           // You can pass additional data to your mail template if needed
           // Mail::to($userEmail)->send(new AnnouncementMail($data));
        }

        $data->save();

        return redirect()->back()->with('success', 'File uploaded successfully!');
    }


    public function announcement()
    {
        $data = ResoAnnouncement::all()->reverse();
        
        return view('admin.reso_announcement', ['data' => $data]);
    }
    
    public function download_reso(Request $request,$file)
    {
    return response()->download(storage_path('app/reso/'.$file));
    }

    public function delete($id)
    {
    $announcement = ResoAnnouncement::find($id);

    if ($announcement) {
        $file = $announcement->file;

        // Delete file from storage
        Storage::delete('reso/' . $file);

        // Delete record from the database
        $announcement->delete();

        return redirect()->back()->with('delete_success', 'File deleted successfully!');
    }

    return redirect()->back()->with('error', 'File not found!');
    }
}
