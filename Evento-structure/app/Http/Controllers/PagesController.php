<?php

namespace App\Http\Controllers;

use App\Models\category;
use App\Models\evenement;
use App\Models\reservation;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class PagesController extends Controller
{
    public function index (request $request) {
        if ($request->has('category') && $request->input('category') != 'ALL') {
            $events = Evenement::with('category')
                ->where('category_id', $request->input('category'))
                ->where('status', 'public')
                ->paginate(8);
            $selectedCategory = $request->input('category');
        } elseif ($request->has('search')) {
            $events = Evenement::where('title', 'like', '%'.$request->input('search').'%')
                ->where('status', 'public')
                ->paginate(8);
            $selectedCategory = null; 
        } else {
            $events = Evenement::where('status', 'public')->paginate(8);
            $selectedCategory = 'ALL'; 
        }


        $categorys = category::get();
        return view('user.index' , compact('categorys' , 'events' , 'selectedCategory'));
    }

    public function page($id) {
        $event = evenement::with('category')->where('id' , $id)->first();
        $reser = reservation::where('user_id', Auth::id())->where('event_id', $event->id)->first();
        return view ('user.page' , compact('event'  , 'reser'));
    }



    public function organisateur_index() {
        $eventscount = evenement::count();
        $events = evenement::with('category')->get();
        $categorys = category::get();
        return view('organisateur.index' , compact('eventscount' , 'events' , 'categorys'));
    }

    

    public function admin_index() {
        $usercount = User::count();
        $categorycount = category::count();
        $eventscount = evenement::count();
        $users = User::get();
        return view('admin.index' , compact('usercount' , 'categorycount' , 'eventscount' , 'users'));
    }
}
