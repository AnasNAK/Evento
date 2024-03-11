<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;

class UserController extends Controller
{
    public function access(Request $request) {
        $accetype = $request->input('access');
        $userId = $request->input('user_id');
        
        $user = User::findOrfail($userId);
        if($accetype === 'Accessible'){
            $user->access = "Blocked";
        }
        else {
            $user->access = "Accessible";
        }

        $user->save();


        return redirect()->back();

    }
}
