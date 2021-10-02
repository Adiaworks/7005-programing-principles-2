<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Review;
use App\Models\User;
use App\Models\Item;

class ReviewController extends Controller
{
    
    function __construct() 
    {
        $this->middleware('auth', ["except"=>['index', 'show']]);
    }//this function authenticate all the fucntion except for the index and show which require no login
    
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $items = Item::all();
        $reviews = Review::all();
        return view('reviews.index')->with('reviews', $reviews)->with('items', $items);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('reviews.create_form')->with('users', User::all())->with('items', Item::all());
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $this->validate($request, [
            'rating' => 'required|integer|max:5|min:1',
            'content' => 'required|string|digits_between: 6, 255',
            'item_id' => 'required|integer',
            'user_id' => 'required|integer'
            ]);
            $review = new Review();
            $review->rating = $request->rating;
            $review->content = $request->content;
            $review->item_id = $request->item_id;
            $review->user_id = $request->user_id;
            $review->save();
            return redirect("review/$review->id");
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $review = Review::paginate(5);
        $users = Review::find($id)->users;
        return view('reviews.show')->with('review', $review)->with('users', $users);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $review = Review::find($id);
        return view('reviews.edit_form')->with('review', $review);
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
        $this->validate($request, [
            //validate the fields
            'rating' => 'required|integer|max:5|min:1',
            'content' => 'required|string|digits_between: 6, 255',
            'item_id' => 'required|integer',
            'user_id' => 'required|integer'
            ]);
            $review = Review::find($id);
            $review->rating = $request->rating;
            $review->content = $request->content;
            $review->item_id = $request->item_id;
            $review->user_id = $request->user_id;
            $review->save();
            return view('reviews.show')->with('review', $review);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //delete releted reviews
        $review = Review::find($id);
        $review->delete();
        $reviews = Review::all();
        return view('reviews.index')->with('reviews', $reviews);
    }
}
