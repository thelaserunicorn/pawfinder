<?php

namespace App\Http\Controllers;

use App\Models\Vet;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Illuminate\Http\Response;

class VetController extends Controller
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
    public function create():Response
    {
        return response()->view('vets.form');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request):RedirectResponse
    {

        $validated = $request->validate([
            'name' => 'required|string|max:255',
            'location' => 'string',
            'phone' => 'integer',
            'animal_id' => 'integer',

        ]);
        //
        $create = Vet::create($validated);

        if($create) {
            // add flash for the success notification
            session()->flash('notif.success', 'Vet Added successfully!');
            return redirect()->route('animals.index');
        }

        return abort(500);
    }


    /**
     * Display the specified resource.
     */
    public function show(Vet $vet)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Vet $vet)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Vet $vet)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Vet $vet)
    {
        //
    }
}
