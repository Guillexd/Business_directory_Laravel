<?php

namespace App\Http\Controllers;

use App\Models\TouristPlace;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;

class TouristPlaceController extends Controller
{
    public function index()
    {
        $touristPlace = TouristPlace::all();
        return view('tourist-place.index', compact('touristPlace'))->with('i', '0');
    }

    public function create()
    {
        return view('tourist-place.create');
    }

    public function store(Request $request)
    {
        $request->validate([
            'name' => 'required|string|max:100',
            'city' => 'required|string|max:50',
            'department' => 'required|string|max:50',
            'price' => 'required|numeric|max:500000',
            'review' => 'required|string',
            'image' => 'required|image'
        ]);

        $image = $request->image;
        $imageName = time() . '.' . $image->getClientOriginalExtension();
        $image->storeAs('public/images/', $imageName);

        $touristPlace = new TouristPlace();
        $touristPlace->name = $request->name;
        $touristPlace->city = $request->city;
        $touristPlace->department = $request->department;
        $touristPlace->price = $request->price;
        $touristPlace->review = $request->review;
        $touristPlace->image = $imageName;
        $touristPlace->save();

        return redirect()->route('tourist-places.index');
    }

    public function show(TouristPlace $touristPlace)
    {
        return view('tourist-place.show', compact('touristPlace'));
    }

    public function edit(TouristPlace $touristPlace){
        return view('tourist-place.edit', compact('touristPlace'));
    }

    public function update(Request $request, TouristPlace $touristPlace) {
        $request->validate([
            'name' => 'required|string|max:100',
            'city' => 'required|string|max:50',
            'department' => 'required|string|max:50',
            'price' => 'required|numeric|max:500000',
            'review' => 'required|string',
            'image' => 'image'
        ]);

        $touristPlace->name = $request->name;
        $touristPlace->city = $request->city;
        $touristPlace->department = $request->department;
        $touristPlace->price = $request->price;
        $touristPlace->review = $request->review;

        if ($request->hasFile('image')) {
            // Eliminar la imagen anterior si existe
            Storage::delete('public/images/' . $touristPlace->image);

            // Guardar la nueva imagen
            $image = $request->image;
            $imageName = time() . '-' . $image->getClientOriginalExtension();
            $image->storeAs('public/images', $imageName);
            $touristPlace->image = $imageName;
        }

        $touristPlace->save();

        return redirect()->route('tourist-places.index');
    }

    public function destroy(TouristPlace $touristPlace){
        Storage::delete('public/images/'.$touristPlace->image);
        $touristPlace->delete();
        return redirect()->route('tourist-places.index');
    }
}
