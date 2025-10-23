<?php

namespace App\Http\Controllers;

use App\Models\Lamp;
use Illuminate\Http\Request;

class LampController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $lamps = Lamp::all();
        return view('lamps.index', compact('lamps'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('lamps.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $validated = $request->validate([
            'name' => ['required', 'string', 'max:100'],
            'price' => ['required', 'numeric'],
            'image_path' => ['nullable', 'string', 'max:255', 'starts_with:images/'],
        ]);

        if (!empty($validated['image_path']) && !file_exists(public_path($validated['image_path']))) 
        {
            return back()
                ->withErrors(['image_path' => 'Image not found in /public/images.'])
                ->withInput();
        }

        Lamp::create($validated);
        return redirect()
            ->route('lamps.index')
            ->with('success', 'Lamp created successfully!');
    }

    /**
     * Display the specified resource.
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit($id)
    {
        $lamp = Lamp::findOrFail($id);
        return view('lamps.edit', compact('lamp'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, $id)
    {
        $validated = $request->validate([
            'name' => ['required', 'string', 'max:100'],
            'price' => ['required', 'numeric'],
            'image_path' => ['nullable', 'string', 'max:255', 'starts_with:images/'],
        ]);
        
        if (!empty($validated['image_path']) && !file_exists(public_path($validated['image_path']))) 
        {
            return back()
                ->withErrors(['image_path' => 'Image not found in /public/images.'])
                ->withInput();
        }

        $lampToEdit = Lamp::findOrFail($id);
        $lampToEdit->update($validated);

        return redirect()
            ->route('lamps.index')
            ->with('success', 'Lamp edited successfully!');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy($id)
    {
        $lamp = Lamp::findOrFail($id);
        $lamp->delete();

        return redirect()
            ->route('lamps.index')
            ->with('success', 'Lamp deleted successfully!');
    }
}
