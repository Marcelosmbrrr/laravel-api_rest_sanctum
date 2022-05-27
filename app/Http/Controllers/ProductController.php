<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
// Form Requests
use App\Http\Requests\Product\StoreProductRequest;
use App\Http\Requests\Product\UpdateProductRequest;
// Models
use App\Models\ProductModel;

class ProductController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index() : \Illuminate\Http\Response
    {
        try{

            $products = ProductModel::all();

            return response($products, 200);

        }catch(\Exception $e){

            return response(["error" => $e->getMessage()], 500);

        }
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(StoreProductRequest $request) : \Illuminate\Http\Response
    {
        try{

            ProductModel::create($request->only(["name", "slug", "description", "price"]));

            return response(["message" => "Product successfully created!"], 201);

        }catch(\Exception $e){

            return response(["error" => $e->getMessage()], 500);

        }
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id) : \Illuminate\Http\Response
    {
        try{

            $product = ProductModel::findOrFail($id);

            return response($product, 200);

        }catch(\Exception $e){

            return response(["error" => $e->getMessage()], 500);
            
        }
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(UpdateProductRequest $request, $id) : \Illuminate\Http\Response
    {
        try{

            ProductModel::where("id", $id)->update($request->only(["name", "slug", "description", "price"]));

            return response(["message" => "Product successfully updated!"]);

        }catch(\Exception $e){

            return response(["error" => $e->getMessage()], 500);

        }
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id) : \Illuminate\Http\Response
    {
        try{

            ProductModel::where("id", $id)->delete();

            return response(["message" => "Product successfully deleted!"], 200);

        }catch(\Exception $e){

            return response(["error" => $e->getMessage()], 500);

        }
    }
}
