<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Redirect;
use Illuminate\Support\Facades\Session;
use Illuminate\Support\Facades\Auth;

use App\Review;

class ReviewController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        if (Auth::check())
        {
            // The user is logged in...
            $id = $request->input('prod_id');
            $review = new Review;
            $review->comment = $request->input('comment');
            $review->score = $request->input('score');
            $review->prod_id = $request->input('prod_id');
            $review->prod_name = $request->input('prod_name');
            $review->user_id = Auth::user()->id;
            $review->user_name = Auth::user()->name;
            $review->save();  
            
            Session::flash('logged_in', 'Thank you for your review!');
            return Redirect::to('/products/'.$id);
        }
    else
        {
            $id = $request->input('prod_id');
            // Session::flash('not_loggedin', 'You have to login to be able to write a review');
            $request->session()->flash('not_loggedin', 'You have to login to be able to write a review');
            return Redirect::to('/products/'.$id);
        }
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $review = Review::orderBy('name','desc')->get();;
        return view('products.show')->with('review',$review);
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
        //
    }
}
