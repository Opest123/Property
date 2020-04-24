<?php

namespace App\Http\Controllers;

use App\Property;
use Illuminate\Http\Request;

class PropertyController extends Controller
{
    public function search(Request $request)
    {
        $properties = Property::where('name', 'LIKE', "%{$request->keywords}%")
            ->orWhere('price', 'LIKE', "%{$request->keywords}%")
            ->orWhere('bedrooms', 'LIKE', "%{$request->keywords}%")
            ->orWhere('bathrooms', 'LIKE', "%{$request->keywords}%")
            ->orWhere('storeys', 'LIKE', "%{$request->keywords}%")
            ->orWhere('garages', 'LIKE', "%{$request->keywords}%")
            ->get();

        return response()->json($properties);
    }
}
