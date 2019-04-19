<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Product;
use App\Review;
use Illuminate\Support\Facades\Auth;


class ProductController extends Controller
{

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $review = Review::orderBy('id','asc')->get();
        $products = Product::orderBy('name','asc')->get();
        return view('products.index')->with('products',$products);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $products = Product::orderBy('name','asc')->get();
        
        if (Auth::user()->admin){
            return view('products.create',['products' => $products]);
        }
        return redirect('/');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //GET FILE
        if($request->file('image')){
            $file = $request->file('image');
            $filename = $file->getClientOriginalName(); 

            //GET FULL PATH AND FILE
            $path = storage_path('images/');
            $image = $path.$filename;
            
            //STORE FILE
            //$file->storeAs('images', $filename);    
        }

        // dd($request->input('price'));
        $products = new Product;
        $products->name = $request->input('name');
        $products->desc = $request->input('desc');
        $products->price = $request->input('price');
        $products->price = $request->input('image');
        
        $products->save();

        return redirect('/products/create');

    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
       $products = Product::find($id);
       $review = Review::orderBy('id','asc')->get();;
       
       $data = array(
           'products' => $products, 'reviews' => $review
        );
        return view('products.show')->with($data);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
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
        // delete
        $product = Product::find($id);
        $product->delete();

        // redirect
        return redirect('/products/create');
    }
}
