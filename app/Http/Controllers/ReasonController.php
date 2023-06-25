<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Reason;

class ReasonController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $reasons = Reason::latest()->paginate(15);

        return view('reasons.index',compact('reasons'))
                    ->with('i', (request()->input('page', 1) - 1) * 15);
    }
    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('reasons.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $request->validate([
            'reason' => 'required',
            'action' => 'required',

        ]);

        Reason::create([
            'reason' => $request->reason,
            'action' => $request->action,
            'created_by' => auth()->user()->id
        ]);

        return redirect()->route('reasons.index')
                        ->with('success','Reason created successfully.');
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
    public function destroy(string $id)
    {
        //
    }
}
