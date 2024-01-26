<?php

namespace App\Http\Controllers;

use App\Models\Attendee;
use App\Models\Event;
use Illuminate\Http\Request;

class AttendeeController extends Controller
{
    public function index($id)
    {
        $events = Event::find($id);
        $event = Event::all();
        foreach($event as $events){
            $eventId = $events->id;
        }

        // dd($eventId);
        return view('attendee.create',compact('events','eventId'));
    }

    public function create()
    {   
        
        // return redirect('/events/show');
    }

    public function store(Request $request)
    {
        
        Attendee::create($request->all());
        return back();
    }

    public function show(Attendee $member)
    {
        //
    }

    public function edit($id)
    {
        $event = Event::all();
        $attendee = Attendee::find($id);
        return view('attendee.edit',compact('attendee'));
    }

    public function update(Request $request, $id)
    {
        $attendee = Attendee::find($id);
        if ($attendee) {
            $attendee->update($request->all());
        }
        $event = Event::find($request->event_id);
        $attend = $event->attendees;
        if (!$event) {
            abort(404);
        }
        $attendees = Attendee::where('event_id',$request->event_id)->get();
        return view('events.show',[$request->event_id])->with(compact('attendee','event','attend'));

    }

    public function destroy($id)
    {
        $list = Attendee::find($id)->delete();
        return back();
    }
}
