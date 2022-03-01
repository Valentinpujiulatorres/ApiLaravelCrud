<?php

namespace App\Http\Controllers;

use App\Models\Products;
use Illuminate\Http\Request;

class ProductsController extends Controller
{

    public function index(){
        

        $products = Products::all();
        return response()->json(['products'=>$products], 200);
    }

    public function show($id){

        $products = Products::find($id);
        if($products){

            return response()->json(['products'=>$products], 200);

        }else{
            return response()->json(['products'=>'No record finded'], 404);
        }
        
    }

    public function store(Request $request){

        $request->validate([
            'name'=>'required',
            'description'=>'required',
            'price'=>'required',
            'qty'=>'required',
        ]);

        $product = new Products();
        $product->name = $request->name;
        $product->description = $request->description;
        $product->price = $request->price;
        $product->qty = $request->qty;
        $product->save();

        return response()->json(['message'=>'Element Added Succesfully'], 200);

    }
    public function update(Request $request, $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
        $product = Products::find($id);

        if($product){

           $product->delete();
           return response()->json(['Item Deleted Successfully'],200);

        }else{
            return response()->json(['Cant find that ***'], 404);
        }
    }
}
