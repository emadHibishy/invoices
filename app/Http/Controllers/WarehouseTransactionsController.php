<?php

namespace App\Http\Controllers;

use App\Helpers\Helper;
use App\Http\Requests\StoreTransactionRequest;
use App\Models\Helper\TransactionsTypes;
use App\Models\Product;
use App\Models\Warehouse;
use App\Models\WarehouseTransactions;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class WarehouseTransactionsController extends Controller
{

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $transactions = WarehouseTransactions::all();
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
//            $transaction_number = $this->makeTransactionNumber($request->transaction_type_id);
            $uom_id = Product::find($request->product_id)->uom_id;

            WarehouseTransactions::create([
                'transaction_number' => Helper::serializa($request->transaction_type_id == 1 ? 'ISS' : 'ADD', WarehouseTransactions::class, WarehouseTransactions::LENGTH),
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
            return redirect()->back();
        } catch (\Exception $err)
        {
            return redirect()->back()->withErrors(['error' => $err->getMessage()]);
        }
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\WarehouseTransactions  $warehouseTransactions
     * @return \Illuminate\Http\Response
     */
    public function show(WarehouseTransactions $warehouseTransactions)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\WarehouseTransactions  $warehouseTransactions
     * @return \Illuminate\Http\Response
     */
    public function edit(WarehouseTransactions $warehouseTransactions)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\WarehouseTransactions  $warehouseTransactions
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, WarehouseTransactions $warehouseTransactions)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\WarehouseTransactions  $warehouseTransactions
     * @return \Illuminate\Http\Response
     */
    public function destroy(WarehouseTransactions $warehouseTransactions)
    {
        //
    }


    public function getWarehouseQty($warehouse_id, $product_id)
    {
        return WarehouseTransactions::where('warehouse_id', $warehouse_id)
            ->where('product_id', $product_id)
            ->where('status', 1)
            ->sum('qty');
    }

//    private function makeTransactionNumber($transaction_type_id)
//    {
//        $prefix = $transaction_type_id == 1 ? 'ISS' : 'ADD';
//        $last_transaction = DB::table('warehouse_transactions')->orderByDesc('id')->first()->id;
//        $last_id = is_null($last_transaction) ? 0 : $last_transaction->id;
//        return $prefix . str_repeat(0, 20 - (strlen($prefix . $last_id++))) . $last_id++;
//    }

}
