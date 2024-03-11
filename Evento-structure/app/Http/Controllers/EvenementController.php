<?php

namespace App\Http\Controllers;

use App\Http\Requests\EVENTSREQUEST;
use App\Models\evenement;
use App\Models\images;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;

class EvenementController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $events = evenement::with('category')->get();
        return view('admin.events' , compact('events'));
    }


    public function methodchanger(request $request) {

        $event = evenement::findOrFail($request->input('event_id'));

        if($request->input('method') == 'auto'){
        $event->method = 'manuel';
        }
        else {
        $event->method = 'auto';
        }

        $event->save();

        return redirect()->back();
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        


    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
{
    // Validate the request data first
    $validatedData = $request->validate([
        'title' => 'required|string|max:255',
        'description' => 'required|string',
        'date' => 'required|date',
        'lieu' => 'required|string',
        'Number_places' => 'required|integer',
        'category_id' => 'required|exists:categories,id',
    ]);

    // Process the image only if it exists
    if ($request->hasFile('image')) {
        $image = $request->file('image');
        $imageData = file_get_contents($image->getRealPath());

        $validatedData['organisateur_id'] = Auth::id();
        $validatedData['image'] = $imageData;
        $event = evenement::create($validatedData);
    }

    return redirect()->back()->with('success', 'Event created successfully.');
}

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Request $request , string $id)
    {
        $event = evenement::findOrFail($id);

        if($request->input('status') === 'forbiden'){
            $event->status = 'public';  
        }
        else {
            $event->status = 'forbiden';
        }

        $event->save();

        return redirect()->back();
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
{

    $event = evenement::findOrFail($id);

    $event->title = $request->title;
    $event->description = $request->description;
    $event->date = $request->date;
    $event->lieu = $request->lieu;
    $event->Number_places = $request->Number_places;
    $event->category_id = $request->category_id;

    $event->save();

   
    return redirect()->back()->with('success', 'Event updated successfully');
}

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        evenement::destroy('id' , $id);
        return redirect()->back();
    }
}
