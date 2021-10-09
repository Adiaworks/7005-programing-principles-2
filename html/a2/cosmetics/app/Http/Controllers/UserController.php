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

    function __construct()
    {
        $this->middleware('auth', ["except" => ['index']]);
    } //this function authenticate all the fucntion except for the index and show which require no login

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
        //show the specific user's following details

        $user = User::where('id', '=', $id)->first();
        if (($user->following) != NULL) {
            $following_ids = explode(',', $user->following);
            $reviews = new Collection(); //set up a blank Collection
            foreach ($following_ids as $following_id) {
                $temp_result = Review::where('user_id', '=', $following_id)->get();
                $reviews = $reviews->merge($temp_result); //merge two collections together

            }
        } else {
            $reviews = NULL;
        }
        return view('users.show')->with('user', $user)->with('reviews', $reviews);
    }

    public function follow($id)
    {
        //allow the current logged in user to follow others
        $user = Auth::user(); //get current logged in user data

        if ($user->following === NULL) {
            $user->following = $id;
        } elseif ($user->following != NULL) {
            $user->following = $user->following . "," . strval($id);
        }
        $user->save();
        $current_user_id = $user->id;
        return redirect("user/$current_user_id");
    }

    public function unfollow($id)
    {
        //allow the logged in user to unfollow users in the following column
        $user = Auth::user();
        $following_ids = explode(',', $user->following);
        $user->following = implode(',', array_diff($following_ids, explode(',', $id))); //exclude the user id unfollowed
        if ($user->following === "") {
            $user->following = NULL;
        }
        $user->save();
        $current_user_id = $user->id;
        return redirect("user/$current_user_id");
    }

    public function recommendation($id)
    {
        //the logged in user can check personalised recommendation
        $user = Auth::user();
        $items_recomm = [];
        if ($user->following != NULL) {
            $following_ids = explode(',', $user->following);

            $reviews = new Collection();
            foreach ($following_ids as $following_id) {
                $temp_result = Review::where('user_id', '=', $following_id)->get();
                $reviews = $reviews->merge($temp_result); //merge two collections together
            }

            $item_id_summary = [];
            foreach ($reviews as $review) {
                $item_id_summary[] = $review->item_id;
            }
            $item_id_summary = array_count_values($item_id_summary);
            arsort($item_id_summary, SORT_NUMERIC);
            // $items_recomm = array_slice($item_id_summary, 0, 3);
            for ($i = 0; $i < min(3, count($item_id_summary)); $i++) {
                $items_recomm[] = array_keys($item_id_summary)[$i];
            }
        }
        $items = new Collection();
        if ($items_recomm != []) {
            foreach ($items_recomm as $item_id) {
                $temp_result = Item::where('id', '=', $item_id)->get();
                $items = $items->merge($temp_result); //merge two collections together
            }
        }
        $users_recomm = [];
        foreach ($items as $item) {
            $temp_result = Review::where('item_id', '=', $item_id)->get();
            $max_like = -1;
            $user_recomm = "";
            foreach ($temp_result as $review) {
                $user_ids_like = explode(',', $review->like);//convert the string of user ids who like the review to array
                if (count($user_ids_like) > $max_like) {
                    if (!str_contains($user->following, $review->user_id)) {
                        if (!in_array($review->user_id, $users_recomm)) {
                            $user_recomm = $review->user_id;
                        }
                    }
                    
                }
            }
            if ($user_recomm != "") {
                $users_recomm[] = $user_recomm;
            }
        }
        $users = new Collection();
        if ($users_recomm != []) {
            foreach ($users_recomm as $user_id) {
                $temp_result = User::where('id', '=', $user_id)->get();
                $users = $users->merge($temp_result); //merge two collections together
            }
        }
        return view('users.recommendation')->with('items', $items)->with('users', $users);
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
