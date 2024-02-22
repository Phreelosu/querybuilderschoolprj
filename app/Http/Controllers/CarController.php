<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class CarController extends Controller
{
    public function getCars() {
        $cars = Car::all();
        return view('cars.index', compact('cars'));
    }

    public function addCar() {
        return view('cars.create');
    }

    public function store(Request $request) {
        $request->validate([
            'name' => 'required|string',
            'amount' => 'required|integer',
            'type_id' => 'required|exists:type,id',
            'color_id' => 'required|exists:color,id',
        ]);

        Car::create($request->all());

        return redirect()->route('cars.index')->with('success', 'Car created successfully.');
    }

    public function getOneCar() {
        return view('cars.show', compact('car'));
    }

    public function modifyCar() {
        return view('cars.edit', compact('car'));
    }

    public function update(Request $request, Car $car) {
        $request->validate([
            'name' => 'required|string',
            'amount' => 'required|integer',
            'type_id' => 'required|exists:type,id',
            'color_id' => 'required|exists:color,id',
        ]);
        
        $car->update($request->all());

        return redirect()->route('cars.index')->with('success', 'Car updated successfully.');
    }

    public function destroyCar(Car $car) {
        $car->delete();

        return redirect()->route('cars.index')->with('success', 'Car destroyed successfully.');
    }
}
