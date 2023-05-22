<?php

namespace App\Http\Controllers;

use App\Models\Checkouts;
use Illuminate\Http\Request;
use App\Models\Camp;
use Illuminate\Support\Facades\Auth;

class CheckoutController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        //
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create(Camp $camp)
    {
        
        return view('checkout',[
            "element" => $camp
        ]);
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request, Camp $camp)
    {   
        $data= $request->all();
        $data['user_id'] = Auth::id();
        $data['camp_id'] = $camp->id;

        $user = Auth::user();
        $user->email = $data['email'];
        $user->name = $data['name'];
        $user->occupation = $data['occupation'];
        $user->save();

        $checkout = Checkouts::create($data);

        return redirect(route('checkout-success'));
    }

    /**
     * Display the specified resource.
     */
    public function show(Checkouts $checkouts)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Checkouts $checkouts)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Checkouts $checkouts)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Checkouts $checkouts)
    {
        //
    }

    public function success (){
        return view('success');
    }
}
