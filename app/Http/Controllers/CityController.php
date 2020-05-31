<?php

namespace App\Http\Controllers;

use App\City;

use Illuminate\Http\Request;

class CityController extends Controller
{
    public function index()
    {
        $cities =  City::all();
        return view('cities.list', compact('cities'));
    }# code...

    public function create()
    {
        return view('cities.create');# code...
    }

    public function store(Request $request)
    {
        $city = new City();
        $city->name = $request->name;
        $city->save();

        return redirect()->route('customers.index');
    }
}





