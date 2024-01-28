<?php

namespace App\Http\Controllers;

use App\Models\Event;
use Illuminate\Http\Request;

class EventController extends Controller
{
    public function index(){
        $event = Event::all();
        return view('event')->with('events', $event);
    }

    function save_events(Request $request){
        $validateData = $request->validate([
            'Id' => 'integerIncrements',
            'EventName' => 'required|string|max:100',
            'Date' => 'required|string|max:100',
            'Location' => 'required|string|max:100',
            'Attendees' => 'required|string|max:100',
        ]);

        Event::create($validateData);

        return back();
    }

    function delete_events($id){
        $event = Event::find($id);
        $event->delete();
        return back();
    }

    public function update_events($id){
        $event = Event::find($id);
        return view('update_events', compact('event'));
    }

    public function save_updated_events(Request $request, $id){
        $event = Event::find($id);
        $event->EventName = $request->update_event_name;
        $event->Date = $request->update_date;
        $event->Location = $request->update_location;
        $event->Attendees = $request->update_attendees;
        $event->save();

        return redirect()->route('event');
    }
}
