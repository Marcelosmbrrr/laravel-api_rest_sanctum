<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
// Model
use App\Models\UserHasProductModel;
use App\Models\UserModel;

class CustomerController extends Controller
{

    /**
     * Get all customer products.
     *
     * @return \Illuminate\Http\Response
     */
    public function customerProducts(Request $request)
    {

        try{

            $user = UserModel::find($request->user()->id);

            $counter = 0;
            $products_collection = collect([]);
            while($counter < count($user->user_has_product)){

                $products_collection->push($user->user_has_product[$counter]->product);
                $counter++;

            }
    
            return response($products_collection, 200);

        }catch(\Exception $e){

            return response(["error" => $e->getMessage()], 500);

        }

    }

    /**
     * Add product to the cart.
     *
     * @return \Illuminate\Http\Response
     */
    public function addProduct(Request $request, $product_id) : \Illuminate\Http\Response
    {
        try{

            UserHasProductModel::create([
                "user_id" => $request->user()->id,
                "product_id" => $product_id
            ]);
    
            return response(["message" => "Product successfully added!"], 201);

        }catch(\Exception $e){

            return response(["error" => $e->getMessage()], 500);

        }

    }

    /**
     * Remove product from the cart.
     *
     * @return \Illuminate\Http\Response
     */
    public function removeProduct(Request $request, $product_id) : \Illuminate\Http\Response
    {
        try{

            UserHasProductModel::where("user_id", $request->user()->id)
            ->where("product_id", $product_id)
            ->delete();

            return response(["message" => "Product successfully removed!"], 200);

        }catch(\Exception $e){

            return response(["error" => $e->getMessage()], 500);

        }

    }
}
