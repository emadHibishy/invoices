<?php

namespace App\Http\Controllers;

use App\Http\Requests\StoreProductRequest;
use App\Models\Category;
use App\Models\Helper\UOM;
use App\Models\Product;
use Illuminate\Http\Request;

class ProductController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $products = Product::all();
//        dd($products);
        return view('backend.products.index', compact('products'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $categories = Category::all();
        $uoms = UOM::all();
        return view('backend.products.create', compact('categories', 'uoms'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(StoreProductRequest $request)
    {
        try {
            Product::create([
               'name' => ['ar'=> $request->name, 'en' => $request->name_en],
                'price' => $request->price,
                'category_id' => $request->category_id,
                'uom_id' => $request->uom_id,
                'notes' => ['ar'=> $request->ar_notes, 'en' => $request->en_notes],
            ]);
            session()->flash('add', __('backend/products.product_added'));
            return redirect(route('products.index'));
        } catch(\Exception $err){
            return redirect()->back()->withErrors(['error' => $err->getMessage()]);
        }
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Product  $product
     * @return \Illuminate\Http\Response
     */
    public function show(Product $product)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Product  $product
     * @return \Illuminate\Http\Response
     */
    public function edit(Product $product)
    {
        $categories = Category::all();
        $uoms = UOM::all();
        return view('backend.products.edit', compact('product', 'categories', 'uoms'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Product  $product
     * @return \Illuminate\Http\Response
     */
    public function update(StoreProductRequest $request, Product $product)
    {
        try {
            $product->update([
                'name' => ['ar' => $request->name, 'en' => $request->name_en],
                'category_id' => $request->category_id,
                'uom_id' => $request->uom_id,
                'price' => $request->price,
                'notes' => ['ar' => $request->ar_notes , 'en' => $request->en_notes]
            ]);
            session()->flash('edit', __('backend/products.product_updeated'));
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
     * @param  \App\Models\Product  $product
     * @return \Illuminate\Http\Response
     */
//    public function destroy(Product $product)
    public function destroy(Request $request)
    {
        try{
            Product::destroy($request->prod_id);
            session()->flash('delete', __('backend/products.deleted'));
            return redirect('products');
        }
        catch (\Exception $err)
        {
            return redirect()->back()->withErrors(['error' => $err->getMessage()]);
        }

    }
}
