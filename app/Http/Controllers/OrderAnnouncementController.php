<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;

use App\Models\OrderAnnouncement;

class OrderAnnouncementController extends Controller
{
    public function showForm(){
        return view('upload_order');
    }

    public function uploadFile(Request $request)
    {
        $request->validate([
            'file' => 'required|mimes:pdf',
        ]);

        $data = new OrderAnnouncement();

        if ($request->hasFile('file')) {
            $file = $request->file('file');
            $fileName =  $file->getClientOriginalName();
            $file->storeAs('order', $fileName);
            $data->file = $fileName;
        }

        $data->save();

        return redirect()->back()->with('success', 'File uploaded successfully!');
    }


    public function announcement()
    {
        $data = OrderAnnouncement::all()->reverse();
        
        return view('admin.order_announcement', ['data' => $data]);
    }
    
    public function download_order(Request $request,$file)
    {
    return response()->download(storage_path('app/order/'.$file));
    }

    public function delete($id)
    {
    $announcement = OrderAnnouncement::find($id);

    if ($announcement) {
        $file = $announcement->file;

        // Delete file from storage
        Storage::delete('order/' . $file);

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
            $data = OrderAnnouncement::all()->reverse();
        } else {
            // Filter search query based on column name. in this case "file" is column name
            $data = OrderAnnouncement::where('file', 'like', '%' . $query . '%')->get();
        }
    
        return view('admin.order_announcement', ['data' => $data]);
    }
    
}
