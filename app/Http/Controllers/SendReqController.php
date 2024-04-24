<?php

namespace App\Http\Controllers;

use App\Models\SendReq;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Illuminate\Http\Response;
use Illuminate\View\View;

class SendReqController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index():View
    {
        //
        return view('sendreqs.index');
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create():Response
    {
        return response()->view('sendreqs.form');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request):RedirectResponse
    {
        $validated = $request->validate([
            'name' => 'required|string|max:255',
            'animal_id' => 'integer',
            'animal_name' => 'string',
            'email' => 'string',

        ]);
        //
        $create = SendReq::create($validated);

        if($create) {
            // add flash for the success notification
            session()->flash('notif.success', 'Request Sent successfully!');
            return redirect()->route('animals.index');
        }

        return abort(500);
    }

    /**
     * Display the specified resource.
     */
    public function show(SendReq $sendReq)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(SendReq $sendReq)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, SendReq $sendReq)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(SendReq $sendReq)
    {
        //
    }
}
