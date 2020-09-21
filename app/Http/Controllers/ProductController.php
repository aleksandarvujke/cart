<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Product;

class ProductController extends Controller
{
    public function index()
    {
    	$products = Product::all();

    	return view('product.index', compact('products'));
    }

    public function create()
    {
    	return view('product.create');
    }

    public function store()
    {
    	$this->validate(request(), [

    	"name" => "required",
    	
    	"price"	=> "required"

    	]);

    	Product::create([

    	"name" => request('name'),
    	
    	"price"	=> request('price')	


    	]);


    	return redirect('/');
    }

    
}
