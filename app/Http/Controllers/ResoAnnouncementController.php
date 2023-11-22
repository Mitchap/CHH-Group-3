<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;

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

    public function search(Request $request)
    {
        $query = $request->input('query');
    
        if (empty($query)) {
            $data = ResoAnnouncement::all()->reverse();
        } else {
            // Filter search query based on column name. in this case "file" is column name
            $data = ResoAnnouncement::where('file', 'like', '%' . $query . '%')->get();
        }
    
        return view('admin.reso_announcement', ['data' => $data]);
    }
    
}
