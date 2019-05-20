<?php

namespace App\Http\Controllers;

use App\Event;
use Illuminate\Http\Request;
use App\Http\Resources\Event as EventResource;

class EventController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return EventResource::collection(Event::all());
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $this->validate($request,[
            'event' => 'required',
            'day'   => 'required'
        ]);
        $data = $request->all();
        $data['user_id'] = auth('api')->id();
        // return response()->json($data);
        $event = $this->getJson(Event::create($data));

        return response()->json($event);
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $event = Event::with('user')->find($id);
        return response()->json(['event' => $event]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        $event = Event::findOrFail($id);
        if ($event->update($request->all())) {
            return response()->json(['updated' => true]);
        } else {
            return response()->json(['updated' => false]);
        }
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $event = Event::FindOrFail($id);

        if ($event->destroy($id)) {
            return response()->json(['deleted' => true]);
        } else {
            return response()->json(['deleted' => false]);
        }
        
    }

    private function getJson(Event $event)
    {
        return [  
            'title'       => $event->event,
            'description' => $event->description,
            'color'       => $event->color,
            'start'       => $event->day,
            'end'         => $event->day 
        ];
    }
}
