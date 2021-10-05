<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
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
        $reviews = Review::paginate(6);
        return view('reviews.index')->with('reviews', $reviews)->with('items', $items);
    }

    public function like($id)
    {
        $this->validate($request, [
            'item_id' => 'required|integer',
            'user_id' => 'required|integer|unique:reviews,user_id,NULL,id,item_id,'.$request->item_id
        ]);

        $review = Review::find($id);//find out the review based on its id
        $user_ids_like = explode(',', $review->like);//convert the string of user ids who like the review to array
        $user_ids_dislike = explode(',', $review->dislike);//convert the string of user ids who dislike the review to array
        $current_user_id = Auth::user()->id;//get current user id
        dd($current_user_id);
        if (!in_array($current_user_id, $user_ids_like && !in_array($current_user_id, $user_ids_dislike))//check whether the user id exists in like or dislkie or not 
         {
            $user_ids_like = array_push($user_ids_like, $current_user_id);
            $total_likes = count($user_ids_like);

         }

        
        $review = Review::find($id);
        $item_id = $review->item_id;
        return view('items.edit_form')->with('review', $review)->with('item_id', $item_id);
    }

    public function dislike($id)
    {
        $review = Review::find($id);
        $item_id = $review->item_id;
        return view('reviews.edit_form')->with('review', $review)->with('item_id', $item_id);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create_a_review($item_id)
    {
        return view('reviews.create_form')->with('users', User::all())->with('item_id', $item_id);
    }

    public function create()
    {
        return view('reviews.create_form')->with('users', User::all());
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
            'content' => 'required|min:6|max:255',
            'item_id' => 'required|integer',
            'user_id' => 'required|integer|unique:reviews,user_id,NULL,id,item_id,'.$request->item_id
            ]);
            $review = new Review();
            $review->rating = $request->rating;
            $review->content = $request->content;
            $review->item_id = $request->item_id;
            $review->user_id = $request->user_id;
            $review->save();
            $item_id = $request->item_id;
            return redirect("item/$item_id");
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
        $item_id = $review->item_id;
        return view('reviews.edit_form')->with('review', $review)->with('item_id', $item_id);
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
            'content' => 'required|min:6|max:255',
            'item_id' => 'required|integer',
            'user_id' => 'required|integer|unique:reviews,user_id,NULL,id,item_id,'.$request->item_id
            ]);
            $review = Review::find($id);
            $review->rating = $request->rating;
            $review->content = $request->content;
            $review->item_id = $request->item_id;
            $review->user_id = $request->user_id;
            $like_number = count(explode(',', $request->like));
            if ($like_number > 0){//判断此处like的数量为空或非空，决定显不显示
                $review-> = $like_number;
            }
            
            $review->save();
            $item_id = $review->item_id;
            $reviews = Review::where('item_id', '=', $item_id)->paginate(5);
            $item = Item::find($item_id);
            return view('items.show')->with('reviews', $reviews)->with('item',$item);
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
        
        $item_id = $review->item_id;
        $reviews = Review::where('item_id', '=', $item_id)->paginate(5);

        $user_ids = Review::where('item_id', '=', $id)->get() ; 
        $item = Item::find($item_id);
        
        return view('items.show')->with('item', $item)->with('reviews', $reviews)->with('user_ids', $user_ids);
    }
}
