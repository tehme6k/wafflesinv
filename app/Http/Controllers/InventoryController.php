<?php

namespace App\Http\Controllers;

use App\Models\Inventory;
use App\Models\Product;
use App\Models\Bottle;
use Illuminate\Http\Request;

class InventoryController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $inventories = Inventory::latest()->paginate(5);

        return view('inventories.index',compact('inventories'))
                    ->with('i', (request()->input('page', 1) - 1) * 5);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        $products = Product::all();
        return view('inventories.create', compact('products'));
    }

    public function remove()
    {
        $products = Product::all();
        return view('inventories.remove', compact('products'));
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $request->validate([
            'product_id' => 'required',

        ]);

        $product = Product::where('id', $request->product_id)->first();
        $label_cost = $product->bottle->label_cost;
        $total_labels = $request->labels_per_roll * $request->number_of_rolls;

        $total_cost = $total_labels * $label_cost;


        Inventory::create([
            'product_id' => $request->product_id,
            'labels_per_roll' => $request->labels_per_roll,
            'number_of_rolls' => $request->number_of_rolls,
            'total_labels' => $total_labels,
            'total_cost' => $total_cost
        ]);

        return redirect()->route('inventories.index')
                        ->with('success','Inventory created successfully.');


    }

    /**
     * Display the specified resource.
     */
    public function show(Inventory $inventory)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Inventory $inventory)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Inventory $inventory)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Inventory $inventory)
    {
        //
    }
}
