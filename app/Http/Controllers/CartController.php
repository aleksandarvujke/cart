<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use App\Product;
use App\Cart;

class CartController extends Controller
{

    public function index()
    {
        
        $items = Cart::all();

        return view('cart.index', compact('items')); 

    }



    public function addToCart(Request $request, Cart $cart)
    {
    	

    	//$checkProductId = DB::table('carts')
    	//->select(DB::raw('count(*) as num_of_rows'))
    	//->groupBy('unique_cart_id', 'product_id')
    	//->get()
        //->toArray();


    	

        //dd($checkProductId);
    

    	

    	$id = $request->id;


        $session_id = session()->get('session_id');


        if (empty($session_id)) {
            $session_id = str_random(20);
            $session_id = session()->put('session_id', $session_id);
        }

    	
        //checking if exitst productid in database
        

        
        $checkProductId = DB::table('carts')
        ->select(DB::raw('product_id'))
        ->where('unique_cart_id', '=', $session_id)
        ->where('product_id', '=', $id)
        ->get()
        ;

        //dd($checkProductId);
        //
        $countProduct = $checkProductId->count();
        
        if ($countProduct >= 1) {

            session()->put('alert', 'Proizvod je već dodat');
            return redirect()->back();
            exit();
        }
       
        

    	if ($id == null) {
    		$products = null;
    	}

    
    	
    	$products = DB::table('products')->where('id', $id)->get();

    	


    	foreach ($products as $product => $details) {

    		$data = [

    			"id" => $details->id,

    			"name" => $details->name,

    			"price" => $details->price,
 

    		];

    		//dd($data);
    	}

    	$cart = new Cart();

 		  	$cart->product_name = $data['name'];
 		  	$cart->product_id = $data['id'];
 		  	$cart->unique_cart_id = $session_id;
 		  	$cart->quantity = 1;
 		  	$cart->price = $data['price'];

 		  	$cart->save();

            return redirect()->back();

    	
 		 // checking if exists product id in database
 		 
 		  //	$checkProductId = Db::table('carts')->select('product_id')->get();


    	//dd($products);
 
 		
		 

    	
	}
}