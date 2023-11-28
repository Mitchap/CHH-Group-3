<?php

namespace App\Http\Controllers;
use App\Models\Event;
use Illuminate\Http\Request;

class EventController extends Controller
{
    public function proposal_manager(){
        return view('admin.proposal_manager');
    }
    
    // public function event(Request $request)
    // {
    //     if ($request->ajax()) {
    //         $data = Event::whereDate('event_date', '=', $request->start)
    //             ->get();

    //         return response()->json($data);
    //     }
    //     return view('admin.event');
    // }

    // public function action(Request $request)
    // {
    //     if ($request->ajax()) {
    //         if ($request->type == 'add') {
    //             $event = Event::create([
    //                 'title'        =>    $request->title,
    //                 'start'        =>    $request->start,
    //                 'end'        =>    $request->end
    //             ]);

    //             return response()->json($event);
    //         }

    //         if ($request->type == 'update') {
    //             $event = Event::find($request->id)->update([
    //                 'title'        =>    $request->title,
    //                 'start'        =>    $request->start,
    //                 'end'        =>    $request->end
    //             ]);

    //             return response()->json($event);
    //         }

    //         if ($request->type == 'delete') {
    //             $event = Event::find($request->id)->delete();

    //             return response()->json($event);
    //         }
    //     }
    // }
}
