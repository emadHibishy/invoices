<?php

namespace App\Http\Controllers;

use App\Http\Requests\StoreWarehouseRequest;
use App\Models\Warehouse;
use Illuminate\Http\Request;

class WarehouseController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $warehouses = Warehouse::all();
        return view('backend.warehouses.index', compact('warehouses'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('backend.warehouses.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(StoreWarehouseRequest $request)
    {
        try{
            Warehouse::create([
                'code' => $request->code,
                'name' => ['en' => $request->en_warehouse_name , 'ar' => $request->ar_warehouse_name],
                'description' => ['en' => $request->en_description , 'ar' => $request->ar_description]
            ]);
            session()->flash('add', __('backend/warehouses.warehouse_added'));
            return redirect(route('warehouses.index'));
        }
        catch (\Exception $err)
        {
            return redirect()->back()->withErrors(['error' => $err->getMessage()]);
        }
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Warehouse  $warehouse
     * @return \Illuminate\Http\Response
     */
    public function show(Warehouse $warehouse)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Warehouse  $warehouse
     * @return \Illuminate\Http\Response
     */
    public function edit(Warehouse $warehouse)
    {
        return view('backend.warehouses.edit', compact('warehouse'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Warehouse  $warehouse
     * @return \Illuminate\Http\Response
     */
    public function update(StoreWarehouseRequest $request, Warehouse $warehouse)
    {
        try {
            $warehouse->update([
                'code' => $request->code,
                'name' => ['en' => $request->en_warehouse_name , 'ar' => $request->ar_warehouse_name],
                'description' => ['en' => $request->en_description , 'ar' => $request->ar_description]
            ]);
            session()->flash('edit', __('backend/warehouses.warehouse_edited'));
            return redirect()->route('warehouses.index');
        }
        catch (\Exception $err)
        {
            return redirect()->back()->withErrors(['error' => $err->getMessage()]);
        }
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Warehouse  $warehouse
     * @return \Illuminate\Http\Response
     */
    public function destroy(Request $request)
    {
        try{
            Warehouse::destroy($request->warehouse_id);
            session()->flash('delete', __('backend/warehouses.warehouse_deleted'));
            return redirect()->route('warehouses.index');
        }
        catch (\Exception $err)
        {
            return redirect()->back()->withErrors(['error' => $err->getMessage()]);
        }
    }
}
