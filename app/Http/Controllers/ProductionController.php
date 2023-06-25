<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Production;

class ProductionController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $productions = Production::latest()->paginate(15);

        return view('productions.index',compact('productions'))
                    ->with('i', (request()->input('page', 1) - 1) * 15);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        //
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Production $production)
    {
        $production->delete();

        return redirect()->route('productions.index')
                        ->with('success','Production deleted successfully');
    }
}
