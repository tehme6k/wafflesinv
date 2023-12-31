<?php

namespace App\Http\Controllers;

use App\Models\Product;
use App\Models\Bottle;
use App\Models\Inventory;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class ProductController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $products = Product::orderBy('part_number')->paginate(10);
        $inventory = Inventory::all();
        // $inventory = Inventory::whereDate('created_at', '<=', '2023-06-18')->get();


        $total_labels = $inventory->sum('total_labels');
        $total_cost = $inventory->sum('total_cost');

        return view('products.index',compact('products','total_labels', 'total_cost'))
                    ->with('i', (request()->input('page', 1) - 1) * 10);
    }



    /**
     * Display a listing of the resource by date.
     */
    public function indexByDate()
    {

        $products = DB::table('products')
        ->join('inventories', 'products.id', '=', 'inventories.product_id')
        ->select('products.*', 'inventories.total_labels', 'inventories.created_at')
        ->where('inventories.created_at', '<=', '2023-06-18')
        ->get();


        // $products = Product::whereDate('created_at', '<=', '2023-06-18')->orderBy('part_number')->paginate(10);
        // $products = Product::all();
        // $inventory = Inventory::all();
        // $inventory = Inventory::whereDate('created_at', '<=', '2023-06-18')->get();


        // $total_labels = $inventory->sum('total_labels');
        // $total_cost = $inventory->sum('total_cost');

        return view('products.indexbydate', compact('products'));

        // return view('products.indexbydate',compact('products'))
        //             ->with('i', (request()->input('page', 1) - 1) * 10);
    }



    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        $bottles = Bottle::all();
        return view('products.create', compact('bottles'));
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $request->validate([
            'bottle_id' => 'required',
            'part_number' => 'required',
            'name' => 'required',
            'flavor' => 'required',
            'location' => 'required',
        ]);

        // dd($request->all);

        Product::create([
            'bottle_id' => $request->bottle_id,
            'part_number' => $request->part_number,
            'name' => $request->name,
            'flavor' => $request->flavor,
            'location' => $request->location,
            'created_by' => auth()->user()->id
        ]);

        return redirect()->route('products.index')
                        ->with('success','Product created successfully.');
    }

    /**
     * Display the specified resource.
     */
    public function show(Product $product)
    {
        $inventories = Inventory::where('product_id', $product->id)->paginate(5);
        return view('products.show',compact('product', 'inventories'))
                    ->with('i', (request()->input('page', 1) - 1) * 5);
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Product $product)
    {
        $bottles = Bottle::all();
        return view('products.edit',compact('product', 'bottles'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Product $product)
    {
        $request->validate([

            'location' => 'required',
        ]);

        $product->update([
            'location' => $request->location
        ]);

        return redirect()->route('products.index')
                        ->with('success','Product updated successfully');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Product $product)
    {
        $product->delete();

        return redirect()->route('products.index')
                        ->with('success','Product deleted successfully');
    }
}
