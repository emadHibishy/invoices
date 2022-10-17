<?php

namespace App\Http\Controllers;

use App\Http\Requests\StoreTerritoryRequest;
use App\Models\Territory;
use Illuminate\Http\Request;

class TerritoryController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $territories = Territory::all();
        return view('backend.territories.index', compact('territories'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(StoreTerritoryRequest $request)
    {
        try{
            Territory::create([
                'name' => ['ar' => $request->ar_territory_name , 'en' => $request->en_territory_name],
                'abbreviation' => $request->abbreviation
            ]);
            session()->flash('add', __('backend/territories.territory_added'));
            return redirect()->back();
        }
        catch (\Exception $err)
        {
            return redirect()->back()->withErrors(['error' => $err->getMessage()]);
        }
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Territory  $territory
     * @return \Illuminate\Http\Response
     */
    public function show(Territory $territory)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Territory  $territory
     * @return \Illuminate\Http\Response
     */
    public function edit(Territory $territory)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Territory  $territory
     * @return \Illuminate\Http\Response
     */
    public function update(StoreTerritoryRequest $request)
    {
        try{
            $territory = Territory::findorfail($request->id);
            $territory->update([
                'name' => ['ar' => $request->ar_territory_name , 'en' => $request->en_territory_name],
                'abbreviation' => $request->abbreviation
            ]);
            session()->flash('edit', __('backend/territories.territory_updated'));
            return redirect()->back();
        }
        catch (\Exception $err)
        {
            return redirect()->back()->withErrors(['error' => $err->getMessage()]);
        }
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Territory  $territory
     * @return \Illuminate\Http\Response
     */
    public function destroy(Request $request)
    {
        try {
            Territory::destroy($request->territory_id);
            session()->flash('delete', __('backend/territories.deleted'));
            return redirect()->back();
        }
        catch (\Exception $err)
        {
            return redirect()->back()->withErrors(['error' => $err->getMessage()]);
        }
    }
}
