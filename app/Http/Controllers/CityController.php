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
    }

    public function create()
    {
        return view('cities.create');
    }

    public function edit($id)
    {
        $city = City::findOrFail($id);
        return view('cities.edit',compact('city'));
    }


    public function store(Request $request)
    {
        $city = new City();
        $city->name = $request->name;
        $city->save();

        return redirect()->route('cities.index');
    }
}





