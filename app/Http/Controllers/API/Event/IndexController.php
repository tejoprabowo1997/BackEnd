<?php

namespace App\Http\Controllers\API\Event;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Event;

class IndexController extends Controller
{
    public function saveEvent(Request $request)
    {
        $event = new Event();

        if($request->file('image')){
            $file= $request->file('image');
            $filename= date('YmdHi').$file->getClientOriginalName();
            $file-> move(public_path('image'), $filename);
            $event->image = $filename;
        }

        $event->name = $request->name;
        $event->location = $request->location;
        $event->save();

        return response('Success!', 200);
    }

    public function getEvent()
    {
        $event = Event::all();
        return response($event);
    }

    public function updateEvent(Request $request)
    {
        $event = Event::find($request->id);

        if($request->file('image')){
            $file= $request->file('image');
            $filename= date('YmdHi').$file->getClientOriginalName();
            $file-> move(public_path('image'), $filename);
            $event->image = $filename;
        }

        $event->name = $request->name;
        $event->location = $request->location;
        $event->save();

        return response('Update success!', 200);

    }

    public function deleteEvent(Request $request)
    {
        $event = Event::find($request->id);
        $event->delete();

        return response('Delete success!', 200);
    }
}
