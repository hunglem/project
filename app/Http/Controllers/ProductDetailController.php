<?php

namespace App\Http\Controllers;

use App\Models\ProductDetail;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class ProductDetailController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $productDetails = ProductDetail::all();
        return view('product_details.index', compact('productDetails'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('product_details.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $request->validate([
            'product_id' => 'required|exists:products,id',
            'product_category_id' => 'required|exists:product_categories,id',
            'product_brand_id' => 'required|exists:product_brands,id',
            'price' => 'required|numeric',
            'quality' => 'required|numeric',
        ]);

        ProductDetail::create($request->all());
        return redirect()->route('product_details.index')->with('success', 'Product detail created successfully.');
    }

    /**
     * Display the specified resource.
     */
    public function show(ProductDetail $productDetail)
    {
        return view('product_details.show', compact('productDetail'));
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(ProductDetail $productDetail)
    {
        return view('product_details.edit', compact('productDetail'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, ProductDetail $productDetail)
    {
        $request->validate([
            'product_id' => 'required|exists:products,id',
            'product_category_id' => 'required|exists:product_categories,id',
            'product_brand_id' => 'required|exists:product_brands,id',
            'price' => 'required|numeric',
            'quality' => 'required|numeric',
        ]);

        $productDetail->update($request->all());
        return redirect()->route('product_details.index')->with('success', 'Product detail updated successfully.');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(ProductDetail $productDetail)
    {
        //
    }
}
