<?php

namespace App\Http\Controllers;

use App\Models\Inventory;
use App\Models\Product;
use App\Models\Bottle;
use App\Models\Reason;
use App\Models\Production;
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
        $reasons = Reason::all();
        return view('inventories.create', compact('products', 'reasons'));
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
            'labels_per_roll_a' => 'required',
            'number_of_rolls_a' => 'required',
            'reason_id' => 'required',


        ]);

        $product = Product::where('id', $request->product_id)->first();
        $reason = Reason::where('id', $request->reason_id)->first();

        if($reason->action === 'remove'){
            $number_of_rolls_a = $request->number_of_rolls_a * -1;
        } else {
            $number_of_rolls_a = $request->number_of_rolls_a;
        }


        $label_cost_a = $product->bottle->label_cost;
        $total_labels_a = $request->labels_per_roll_a * $number_of_rolls_a;
        $total_cost_a = $total_labels_a * $label_cost_a;

        // Main inventory create
        Inventory::create([
            'product_id' => $request->product_id,
            'labels_per_roll' => $request->labels_per_roll_a,
            'number_of_rolls' => $number_of_rolls_a,
            'total_labels' => $total_labels_a,
            'total_cost' => $total_cost_a,
            'reason_id' => $request->reason_id,
            'description' => $request->description,
            'created_by' => auth()->user()->id
        ]);
        // Main inventory create end

        // Row B inventory create
        if($request->labels_per_roll_b){
            if($reason->action === 'remove'){
                $number_of_rolls_b = $request->number_of_rolls_b * -1;
            } else {
                $number_of_rolls_b = $request->number_of_rolls_b;
            }

            $label_cost_b = $product->bottle->label_cost;
            $total_labels_b = $request->labels_per_roll_b * $number_of_rolls_b;
            $total_cost_b = $total_labels_b * $label_cost_b;
            $total_labels_all = $total_labels_a + $total_labels_b;

            Inventory::create([
                'product_id' => $request->product_id,
                'labels_per_roll' => $request->labels_per_roll_b,
                'number_of_rolls' => $number_of_rolls_b,
                'total_labels' => $total_labels_b,
                'total_cost' => $total_cost_b,
                'reason_id' => $request->reason_id,
                'description' => $request->description,
                'created_by' => auth()->user()->id
            ]);
        }
        // Row B inventory create end


        // Row C inventory create
        if($request->labels_per_roll_c){
            if($reason->action === 'remove'){
                $number_of_rolls_c = $request->number_of_rolls_c * -1;
            } else {
                $number_of_rolls_c = $request->number_of_rolls_c;
            }

            $label_cost_c = $product->bottle->label_cost;
            $total_labels_c = $request->labels_per_roll_c * $number_of_rolls_c;
            $total_cost_c = $total_labels_c * $label_cost_c;
            $total_labels_all = $total_labels_a + $total_labels_b + $total_labels_c;

            Inventory::create([
                'product_id' => $request->product_id,
                'labels_per_roll' => $request->labels_per_roll_c,
                'number_of_rolls' => $number_of_rolls_c,
                'total_labels' => $total_labels_c,
                'total_cost' => $total_cost_c,
                'reason_id' => $request->reason_id,
                'description' => $request->description,
                'created_by' => auth()->user()->id
            ]);
        }
        // Row C inventory create end


        // Row D inventory create
        if($request->labels_per_roll_d){
            if($reason->action === 'remove'){
                $number_of_rolls_d = $request->number_of_rolls_d * -1;
            } else {
                $number_of_rolls_d = $request->number_of_rolls_d;
            }

            $label_cost_d = $product->bottle->label_cost;
            $total_labels_d = $request->labels_per_roll_d * $number_of_rolls_d;
            $total_cost_d = $total_labels_d * $label_cost_d;
            $total_labels_all = $total_labels_a + $total_labels_b + $total_labels_c + $total_labels_d;

            Inventory::create([
                'product_id' => $request->product_id,
                'labels_per_roll' => $request->labels_per_roll_d,
                'number_of_rolls' => $number_of_rolls_d,
                'total_labels' => $total_labels_d,
                'total_cost' => $total_cost_d,
                'reason_id' => $request->reason_id,
                'description' => $request->description,
                'created_by' => auth()->user()->id
            ]);
        }
        // Row D inventory create end


        // Row E inventory create
        if($request->labels_per_roll_e){
            if($reason->action === 'remove'){
                $number_of_rolls_e = $request->number_of_rolls_e * -1;
            } else {
                $number_of_rolls_e = $request->number_of_rolls_e;
            }

            $label_cost_e = $product->bottle->label_cost;
            $total_labels_e = $request->labels_per_roll_e * $number_of_rolls_e;
            $total_cost_e = $total_labels_e * $label_cost_e;
            $total_labels_all = $total_labels_a + $total_labels_b + $total_labels_c + $total_labels_d + $total_labels_e;

            Inventory::create([
                'product_id' => $request->product_id,
                'labels_per_roll' => $request->labels_per_roll_e,
                'number_of_rolls' => $number_of_rolls_e,
                'total_labels' => $total_labels_e,
                'total_cost' => $total_cost_e,
                'reason_id' => $request->reason_id,
                'description' => $request->description,
                'created_by' => auth()->user()->id
            ]);
        }
        // Row E inventory create end




        if($reason->reason === 'Sent to production'){
            if(isset($total_labels_all)){
                $amount_issued = $total_labels_all * -1;
            } else {
                $amount_issued = $total_labels_a * -1;
            }

            Production::create([
                'product_id' => $request->product_id,
                'created_by' => auth()->user()->id,
                'amount_issued' => $amount_issued,
                'amount_needed' =>$request->labels_required
            ]);
        }

        return redirect()->route('inventories.index')
                        ->with('success','Inventory created successfully.');


    }

    /**
     * Display the specified resource.
     */
    public function show(Inventory $inventory)
    {
        return view('inventories.show',compact('inventory'));
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
