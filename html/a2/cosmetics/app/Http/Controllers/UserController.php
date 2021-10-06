<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Collection;
use App\Models\User;
use App\Models\Review;
use App\Models\Item;
use Illuminate\Support\Facades\Auth;


class UserController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $users = User::all();
        $reviews = Review::all();
        return view('users.index')->with('users', $users)->with('reviews', $reviews);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('users.create_form')->with('users', User::all());
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //$user = User::find($id);
        
        $user = User::where('id', '=', $id)->first();
        if (($user->following) != NULL){
            $following_ids = explode(',', $user->following);
            $reviews = new Collection();//set up a blank Collection
            foreach ($following_ids as $following_id) 
            {
                $temp_result = Review::where('user_id', '=', $following_id)->get();
                $reviews = $reviews->merge($temp_result);//merge two collections together
            }
        }
        else {
            $reviews = NULL;
        }
        return view('users.show')->with('user', $user)->with('reviews', $reviews);
    }

    public function unfollow($id)
    {
        $user = Auth::user();
        $following_ids = explode(',', $user->following);
        $user->following = implode(',', array_diff($following_ids, explode(',', $id)));
        $user->save();
        $user = User::find(Auth::user()->id);
        $reviews = Review::where('user_id', '=', Auth::user()->id)->get();
        return redirect("user/Auth::user()->id");
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
