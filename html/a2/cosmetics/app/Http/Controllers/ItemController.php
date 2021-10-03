<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Item;
use App\Models\Review;
use App\Models\User;

class ItemController extends Controller
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
        return view('items.index')->with('items', $items)->with('reviews', $reviews);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('items.create_form');
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
            'name' => 'required|max:255|unique:items, field',
            'price' => 'required|numeric|min:1',
            'manufacture_name' => 'required|max:255',
            'description' => 'required|max:255',//blank notice
            'URL' => 'nullable|url',
            'user_id' => 'required|integer',
            'image' => 'nullable|image'
            
            ]);
            $image_store = request()->file('image')->store('item_images', 'public');
            $item = new Item();
            $item->name = $request->name;
            $item->price = $request->price;
            $item->manufacture_name = $request->manufacture_name;
            $item->description = $request->description;
            $item->URL = $request->URL;
            $item->user_id = $request->user_id;
            $item->image = $image_store;
            $item->save();
            return redirect("item/$item->id");
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $item = Item::find($id);
        $reviews = Review::where('item_id', '=', $id)->paginate(5);

        //$user_ids = Review::where('item_id', '=', $id)->get() ; 
        //dd($user_ids);  
        return view('items.show')->with('item', $item)->with('reviews', $reviews);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $item = Item::find($id);
        return view('items.edit_form')->with('item', $item)->with('reviews', Review::all());
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
        $this->validate($request, [
            'name' => 'required|max:255|unique:items, field',
            'price' => 'required|numeric|min:1',
            'manufacture_name' => 'required|max:255',
            'description' => 'required|max:255',
            'URL' => 'nullable|url',
            'user_id' => 'required',
            'image' => 'nullable|image'
        ]);
        $image_store = request()->file('image')->store('item_images', 'public');
        $item = Item::find($id);
        $item->name = $request->name;
        $item->price = $request->price;
        $item->manufacture_name = $request->manufacture_name;
        $item->description = $request->description;
        $item->URL = $request->URL;
        $item->user_id = $request->user_id;
        $item->image = $image_store;
        $item->save();
        $reviews = Review::where('item_id', '=', $id)->paginate(5);
        return view('items.show')->with('item', $item)->with('reviews', $reviews);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //find out the item and delete its releted reviews
        $item = Item::find($id);
        $reviews = Review::where('item_id', '=', $id);
        $reviews->delete();//need to be tested
        $item->delete();
        $items = Item::all();
        return view('items.index')->with('items', $items);
    }
}
