<?php

namespace App\Http\Controllers;

use App\Models\Animal;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Illuminate\Http\Response;
use App\Http\Requests\Post\StoreRequest;
use App\Http\Requests\Post\UpdateRequest;
use Illuminate\Support\Facades\Storage;
class AnimalController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index():Response
    {
        return response()->view('animals.index', [
            'animals' => Animal::orderBy('updated_at', 'desc')->get(),
        ]);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create():Response
    {
        return response()->view('animals.form');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request):RedirectResponse
    {

        $validated = $request->validate([
            'name' => 'required|string|max:255',
        ]);
        if ($request->hasFile('featured_image')) {
            // put image in the public storage
            $filePath = Storage::disk('public')->put('images/posts/featured-images', request()->file('featured_image'));
            $validated['featured_image'] = $filePath;
        }
        $request->user()->animals()->create($validated);
        return redirect()->route('animals.index');
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id):Response
    {
        //
        return response()->view('animals.show', [
            'animal' => Animal::findOrFail($id),
        ]);
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id):Response
    {
        return response()->view('animals.form', [
            'animal' => Animal::findOrFail($id),
        ]);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(UpdateRequest $request, string $id):RedirectResponse
    {
        $animal = Animal::findOrFail($id);
        $validated = $request->validated();

        if ($request->hasFile('featured_image')) {
            // delete image
            Storage::disk('public')->delete($animal->featured_image);

            $filePath = Storage::disk('public')->put('images/posts/featured-images', request()->file('featured_image'), 'public');
            $validated['featured_image'] = $filePath;
        }

        $update = $animal->update($validated);

        if($update) {
            session()->flash('notif.success', 'Animal updated successfully!');
            return redirect()->route('animals.index');
        }

        return abort(500);
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id):RedirectResponse
    {

        $animal = Animal::findOrFail($id);
        Storage::disk('public')->delete($animal->featured_image);
        $delete = $animal->delete($id);
        if($delete) {
            session()->flash('notif.success', 'Animal deleted successfully!');
            return redirect()->route('animals.index');
        }
        return abort(500);
    }
}
