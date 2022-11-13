<?php

namespace App\Http\Controllers;
use App\Models\Product;
use Illuminate\Http\Request;

class ExampleController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    /* public function __construct()
    {
        //
    } */

    function index(){
        return Product::paginate();
    }

    function store(Request $request){
        $product = new Product();
        $r = $product->fill($request->all())->save();//insert
        if (!$r) {
            return response()->json(["message" => "failed"], 404);
        }
        return $product;
    }

    public function update(Request $request, $id) {
        $product = product::find($id);
        if (!$product) {
            return response()->json(["mesagge"=>"failed"], 404);
        }
        $r = $product->fill($request->all())->save();
        if (!$r) {
            return response()->json(["mesagge"=>"failed"], 404);
        }
        return $product;
    }

    public function destroy($id) {
        $product = product::find($id);
        if (!$product) {
            return response()->json(["message"=>"failed"], 404);
        }
        $product->delete();
        return response()->json(["message"=>"success"]);
    }
}