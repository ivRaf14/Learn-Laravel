<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Models\Checkouts;

class HomeController extends Controller
{
    public function dashboard(){

        $checkouts = Checkouts::with('Camp')->whereUserId(Auth::id())-> get();
        
        return view('dashboard',[
            'item' => $checkouts
        ]);
    }
}
