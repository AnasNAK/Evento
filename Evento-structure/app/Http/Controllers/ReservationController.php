<?php

namespace App\Http\Controllers;

use App\Models\evenement;
use App\Models\reservation;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Session;

class ReservationController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $events = Evenement::with('category')->get();
        return view('organisateur.reservation', compact('events'));
    }




    public function statuschanger (Request $request) 
    {
                $reservation = reservation::findOrFail($request->input('status'));
                $reservation->status = 'accepted';
                $reservation->save();

                return redirect()->back();
    }



    /**
     * Show the form for creating a new resource.
     */
    public function create(Request $request)
{
    $event = Evenement::findOrFail($request->input('event'));

    if ($event) {
        $reser = Reservation::where('user_id', Auth::id())->where('event_id', $event->id)->first();
        if(!$reser){
            if($event->method == 'auto'){
                $reservation = Reservation::create([
                    'user_id' => Auth::id(),
                    'event_id' => $event->id,
                    'status' => 'accepted',
                ]);
            }
            else{
                $reservation = Reservation::create([
                    'user_id' => Auth::id(),
                    'event_id' => $event->id,
                    'status' => 'awaiting',
                ]);
            }


            if($reservation){
                $event->Number_places = max(0, $event->Number_places - 1);
                $event->save();

                Session::flash('success', 'Reservation created successfully!');
            }
            else {
            Session::flash('error', 'Reservations are fully booked.');
            }


        }

    } else {
        Session::flash('error', 'Event not found.');
    }

    return redirect()->back()->with('reser', $reser);
}

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        //
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        $events = Evenement::with('category')->get();
            $reservations = Reservation::with('event', 'user')->where('event_id' , $id)->get();
            $evenement = evenement::where('id' , $id)->first();
            return view('organisateur.reservation', compact('events', 'reservations' , 'evenement'));
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        //
    }
}
