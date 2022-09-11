<?php

namespace App\Http\Controllers;

use App\Http\Requests\StoreTransactionRequest;
use App\Models\Helper\UOM;
use App\Models\Product;
use App\Models\TransactionsTypes;
use App\Models\Warehouse;
use App\Models\WarehouseTrnsactions;
use Illuminate\Http\Request;

class WarehouseTrnsactionsController extends Controller
{

    private $counter = 1;
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $transactions = WarehouseTrnsactions::all();
        return view('backend.transactions.index', compact('transactions'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $warehouses = Warehouse::all();
        $products = Product::all();
//        $uoms = UOM::all();
        $transaction_types = TransactionsTypes::all();

        return view('backend.transactions.create', compact(['warehouses', 'products', 'transaction_types']));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(StoreTransactionRequest $request)
    {
        try{
            $onhandQty = $this->getWarehouseQty($request->warehouse_id, $request->product_id);
            if($request->transaction_type_id == 1 && $request->qty < $onhandQty)
                return redirect()->back()->withErrors(['error' => __('backend/transactions.qty_notfound1') . $onhandQty . __('backend/transactions.qty_notfound2')]);
            $transaction_number = $this->makeTransactionNumber($request->transaction_type_id);
            $uom_id = Product::find($request->product_id)->uom_id;

            WarehouseTrnsactions::create([
                'transaction_number' => $transaction_number,
                'transaction_type_id' => $request->transaction_type_id,
                'warehouse_id' => $request->warehouse_id,
                'product_id' => $request->product_id,
                'qty' => $request->qty,
                'uom_id' => $uom_id,
                'created_by' => auth()->user()->id,
                'updated_by' => auth()->user()->id,
                'notes' => ['ar' => $request->ar_notes , 'en' => $request->en_notes]
            ]);
            session()->flash('add' , __('backend/transactions.transaction_added'));
            $this->counter++;
            return redirect()->back();
        } catch (\Exception $err)
        {
            return redirect()->back()->withErrors(['error' => $err->getMessage()]);
        }
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\WarehouseTrnsactions  $warehouseTrnsactions
     * @return \Illuminate\Http\Response
     */
    public function show(WarehouseTrnsactions $warehouseTrnsactions)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\WarehouseTrnsactions  $warehouseTrnsactions
     * @return \Illuminate\Http\Response
     */
    public function edit(WarehouseTrnsactions $warehouseTrnsactions)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\WarehouseTrnsactions  $warehouseTrnsactions
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, WarehouseTrnsactions $warehouseTrnsactions)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\WarehouseTrnsactions  $warehouseTrnsactions
     * @return \Illuminate\Http\Response
     */
    public function destroy(WarehouseTrnsactions $warehouseTrnsactions)
    {
        //
    }


    private function getWarehouseQty($warehouse_id, $product_id)
    {
        return WarehouseTrnsactions::where('warehouse_id', $warehouse_id)
            ->where('product_id', $product_id)
            ->where('status', 1)
            ->sum('qty');
    }

    private function makeTransactionNumber($transaction_type_id)
    {
        $prefix = $transaction_type_id == 1 ? 'ISS' : 'ADD';
        return $prefix . str_repeat(0, 20 - (strlen($prefix . $this->counter))) . $this->counter;
    }
}
