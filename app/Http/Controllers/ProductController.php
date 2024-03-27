<?php

namespace App\Http\Controllers;

use App\Models\Product;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class ProductController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $products = Product::all();
        return view('product_entry', ['products' => $products]);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('product_entry');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        // try {
        //     $data = [
        //         'product_name' => $request->product_name,
        //         'price'        => $request->price,
        //     ];
        //     DB::table('products')->insert($data);
        //     DB::commit();
        //     $this->message = ['msg' => 'Data Saved Successfully', 'title' => 'Success',];
        // } catch (\Throwable $th) {
        //     $this->message = ['msg' => $th->getMessage(), 'title' => 'Error'];
        // }
        // $data = [
        //     'product_name' => $request->product_name,
        //     'price'        => $request->price,
        // ];
        $data = $request->validate([
            'product_name' => 'required|string|max:150',
            'price'        => 'required|numeric'
        ]);
        try {
            Product::create($data);
            return redirect('products');
        } catch (\Throwable $th) {
            return redirect()->back()->withErrors(['error' => 'Failed to create product.']);
        }
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        //
    }
}
