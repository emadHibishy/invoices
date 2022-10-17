<?php

namespace App\Http\Controllers;

use App\Http\Requests\StorePaymentTermRequest;
use App\Models\PaymentTerm;
use Illuminate\Http\Request;
use Illuminate\View\View;

class PaymentTermController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $terms = PaymentTerm::all();
        return view('backend.terms.index', compact('terms'));
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
    public function store(StorePaymentTermRequest $request)
    {
        try{
            PaymentTerm::create([
                'name' => [ 'ar' => $request->ar_term_name , 'en' => $request->en_term_name ],
                'description' => [ 'ar' => $request->ar_description , 'en' => $request->en_description ],
                'days' => $request->days
            ]);
            session()->flash('add' , __('backend/terms.term_added'));
            return redirect()->back();
        }
        catch (\Exception $err)
        {
            return redirect()->back(['error'=> $err->getMessage()]);
        }
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\PaymentTerm  $paymentTerm
     * @return \Illuminate\Http\Response
     */
    public function show(PaymentTerm $paymentTerm)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\PaymentTerm  $paymentTerm
     * @return \Illuminate\Http\Response
     */
    public function edit(PaymentTerm $paymentTerm)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\PaymentTerm  $paymentTerm
     * @return \Illuminate\Http\Response
     */
    public function update(StorePaymentTermRequest $request)
    {
        try{
            $PaymentTerm = PaymentTerm::findorfail($request->id);
//            dd($PaymentTerm);
            $PaymentTerm->update([
                'name' => [ 'ar' => $request->ar_term_name , 'en' => $request->en_term_name ],
                'description' => [ 'ar' => $request->ar_description , 'en' => $request->en_description ],
                'days' => $request->days
            ]);
            session()->flash('edit' , __('backend/terms.term_updeated'));
            return redirect()->back();
        }
        catch (\Exception $err)
        {
            return redirect()->back()->withErrors(['error'=> $err->getMessage()]);
        }
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\PaymentTerm  $paymentTerm
     * @return \Illuminate\Http\Response
     */
    public function destroy(Request $request)
    {
        try{
            PaymentTerm::destroy($request->term_id);
            session()->flash('delete', __('backend/terms.deleted'));
            return redirect()->back();
        }
        catch (\Exception $err)
        {
            return redirect()->back()->withErrors(['error' => $err->getMessage()]);
        }
    }
}
