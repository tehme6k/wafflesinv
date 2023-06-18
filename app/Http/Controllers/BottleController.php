<?php

namespace App\Http\Controllers;

use App\Models\Bottle;
use Illuminate\Http\Request;

class BottleController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $bottles = Bottle::latest()->paginate(15);

        return view('bottles.index',compact('bottles'))
                    ->with('i', (request()->input('page', 1) - 1) * 15);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('bottles.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $request->validate([
            'bottle_size' => 'required',
            'label_cost' => 'required',

        ]);

        Bottle::create($request->all());

        return redirect()->route('bottles.index')
                        ->with('success','Bottle created successfully.');
    }

    /**
     * Display the specified resource.
     */
    public function show(Bottle $bottle)
    {
        return view('bottles.show',compact('bottle'));
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Bottle $bottle)
    {
        return view('bottles.edit',compact('bottle'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Bottle $bottle)
    {
        $request->validate([
            'bottle_size' => 'required',
            'label_cost' => 'required',
        ]);

        $bottle->update($request->all());

        return redirect()->route('bottles.index')
                        ->with('success','Bottle updated successfully');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Bottle $bottle)
    {
        $bottle->delete();

        return redirect()->route('bottles.index')
                        ->with('success','Bottle deleted successfully');
    }
}
