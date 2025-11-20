<?php

namespace App\Http\Controllers;

use App\Models\Pet;
use Illuminate\Http\Request;

class PetController extends Controller
{
    // Show all pets with Search Function
    public function index(Request $request)
    {
        $search = $request->input('key');

        if ($search) {
            $pets = Pet::where('name', 'like', "%$search%")
                ->orWhere('species', 'like', "%$search%")
                ->orWhere('age', 'like', "%$search%")
                ->orWhere('status', 'like', "%$search%")
                ->get();
        } else {
            $pets = Pet::latest()->get(); //Get latest input from table
        }

        return view('display_pets', compact('pets', 'search'));
    }

    // Redirect form to add_pets.blade.php to Create new pet
    public function create()
    {
        return view('add_pets');
    }

    // Stores data from add_pet.blade.php in DB
    public function store(Request $request)
    {
        $request->validate([
            'name' => 'required|string|max:100',
            'species' => 'required|string|max:100',
            'age' => 'required|integer',
            'status' => 'required|string|max:100',
        ]);

        Pet::create([
            'name' => $request->name,
            'species' => $request->species,
            'age' => $request->age,
            'status' => $request->status,
        ]);

        return redirect()->route('pets.index')->with('success', 'Pet added successfully!');
    }
    
    // Edit pet
    public function edit(Pet $pet)
    {
        return view('edit_pet', compact('pet'));
    }

    // Update pet data from edit_pet.blade.php
    public function update(Request $request, Pet $pet)
    {
        $request->validate([
            'name' => 'required|string|max:100',
            'species' => 'required|string|max:100',
            'age' => 'required|integer',
            'status' => 'required|string|max:100',
        ]);

        $pet->update($request->all());

        return redirect()->route('pets.index')->with('success', 'Pet updated successfully!');
    }

    // Delete pet
    public function destroy(Pet $pet)
    {
        $pet->delete();
        return redirect()->route('pets.index')->with('success', 'Pet deleted successfully!');
    }
}
