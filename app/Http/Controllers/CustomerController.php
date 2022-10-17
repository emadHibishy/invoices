<?php

namespace App\Http\Controllers;

use App\Helpers\Helper;
use App\Http\Requests\StoreCustomerRequest;
use App\Models\Customer;
use App\Models\Helper\City;
use App\Models\Territory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class CustomerController extends Controller
{

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $cities = City::all();
        $territories = Territory::all();
        $customers = Customer::with('territory')->with('city')->get();
        return view('backend/customers.index', compact('customers', 'cities', 'territories'));
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
    public function store(StoreCustomerRequest $request)
    {
        try{
            Customer::create([
                'name' => ['ar' => $request->ar_customer_name , 'en' => $request->en_customer_name],
                'number' => Helper::serializa(Customer::PREFIX , Customer::class, Customer::LENGTH),
                'territory_id' => $request->territory_id,
                'city_id' => $request->city_id,
                'address' => $request->address
            ]);
            session()->flash('add', __('backend/customers.customer_added'));
            return redirect()->back();
        }
        catch(\Exception $err)
        {
            return redirect()->back()->withErrors(['error' => $err->getMessage()]);
        }
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Customer  $customer
     * @return \Illuminate\Http\Response
     */
    public function show(Customer $customer)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Customer  $customer
     * @return \Illuminate\Http\Response
     */
    public function edit(Customer $customer)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Customer  $customer
     * @return \Illuminate\Http\Response
     */
    public function update(StoreCustomerRequest $request)
    {
        try {
            $customer = Customer::findorfail($request->id);
            $customer->update([
                'name' => ['ar' => $request->ar_customer_name , 'en' => $request->en_customer_name],
                'territory_id' => $request->territory_id,
                'city_id' => $request->city_id,
                'address' => $request->address,
                'status' => $request->status ? 1 : 0
            ]);
            session()->flash('edit', __('backend/customers.customer_updated'));
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
     * @param  \App\Models\Customer  $customer
     * @return \Illuminate\Http\Response
     */
    public function destroy(Request $request)
    {
        try {
            Customer::destroy($request->customer_id);
            session()->flash('delete', __('backend/customers.deleted'));
            return redirect()->back();
        }
        catch (\Exception $err)
        {
            return redirect()->back()->withErrors(['error'=> $err->getMessage()]);
        }
    }

//    public function makeCustomerNumber()
//    {
//        $prefix = 'CUST-';
//        $last_customer = DB::table('customers')->orderByDesc('id')->first();
//        $last_id = is_null($last_customer) ? 0 : $last_customer->id;
//        return $prefix . str_repeat('0', 10 - strlen($prefix . $last_id++)) . $last_id++;
//    }
}
