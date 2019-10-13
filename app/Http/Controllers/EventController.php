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
        date_default_timezone_set('Asia/manila');

        $fromDate = date('Y-m-d', strtotime($event->fromDate));
        $toDate   = date('Y-m-d', strtotime($event->toDate));

        $event['month'] = date('F', strtotime($event->fromDate));
        $event['year'] = date('Y', strtotime($event->fromDate));

        $year = (integer)date('Y', strtotime($event->fromDate));
        $month = (integer)date('m', strtotime($event->fromDate));

        $daysInMonth = (integer)date('t', strtotime($event->fromDate));

        $eventDays = json_decode($event->days);

        $events = [];
        for($i = 1;$i <= $daysInMonth; $i++) {
            $date = date('Y-m-d', strtotime($year . '-' . $month . '-' . $i));
            $weekDay = date('w', strtotime($date));
            $isEvent = in_array($weekDay, $eventDays);
            $inEvent = (($date >= $fromDate) && ($date <= $toDate)) ? true : false;
            $events[] = [
                'day'       => $i,
                'date'      => $date,
                'isEvent'   => ($isEvent && $inEvent) ? true : false,
                'label'     => $i . ' ' . date('D', strtotime($date)),
                'title'     => ($isEvent && $inEvent) ? $event->title : ''
            ];
        }

        $event['daysInMonth'] = $daysInMonth;
        $event['events'] = $events;

        return response()->json($event, 200);
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
