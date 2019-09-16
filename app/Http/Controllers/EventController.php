<?php

namespace App\Http\Controllers;

use App\Event;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Log;
use Validator, Redirect, Response;

class EventController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return Event::all();
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
         $data = request()->validate([
            'title' => 'required',
            "days" => 'required',
            "fromDate" => 'required',
            "toDate" => 'required',
        ]);

         $data['days'] = json_encode($request->days);
         $data['fromDate'] = date('Y-m-d', strtotime($request->fromDate));
         $data['toDate'] = date('Y-m-d', strtotime($request->toDate));

        $event = Event::create($data);

        return response()->json($event, 201);
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Event  $event
     * @return \Illuminate\Http\Response
     */
    public function show(Event $event)
    {
        return $event;
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Event  $event
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Event $event)
    {
         $data = request()->validate([
            'title' => 'required',
            "days" => 'required',
            "fromDate" => 'required',
            "toDate" => 'required',
        ]);

         $data['days'] = json_encode($request->days);
         $data['fromDate'] = date('Y-m-d', strtotime($request->fromDate));
         $data['toDate'] = date('Y-m-d', strtotime($request->toDate));

        $event->update($data);

        return response()->json($event, 200);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Event  $event
     * @return \Illuminate\Http\Response
     */
    public function destroy(Event $event)
    {
        $event->delete();

        return response()->json(null, 204);
    }
}
