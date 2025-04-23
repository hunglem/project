<?php
namespace App\Http\Controllers;

use App\Models\ProductBrand;
use Illuminate\Http\Request;

class ProductBrandController extends Controller
{
    public function index()
    {
        $brands = ProductBrand::all();
        return view('product_brands.index', compact('brands'));
    }

    public function create()
    {
        return view('product_brands.create');
    }

    public function store(Request $request)
    {
        $request->validate([
            'name' => 'required|unique:product_brands',
        ]);

        ProductBrand::create($request->all());
        return redirect()->route('product-brands.index')->with('success', 'Brand created successfully.');
    }

    public function show(ProductBrand $productBrand)
    {
        return view('product_brands.show', compact('productBrand'));
    }

    public function edit(ProductBrand $productBrand)
    {
        return view('product_brands.edit', compact('productBrand'));
    }

    public function update(Request $request, ProductBrand $productBrand)
    {
        $request->validate([
            'name' => 'required|unique:product_brands,name,' . $productBrand->id,
        ]);

        $productBrand->update($request->all());
        return redirect()->route('product-brands.index')->with('success', 'Brand updated successfully.');
    }

    public function destroy(ProductBrand $productBrand)
    {
        $productBrand->delete();
        return redirect()->route('product-brands.index')->with('success', 'Brand deleted successfully.');
    }
}