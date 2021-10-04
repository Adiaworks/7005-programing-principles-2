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
        //this function authenticate all the fucntion except for the index and show which require no login
        $this->middleware('auth', ["except"=>['index', 'show']]);
    }
    
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
            'description' => 'required|max:255',
            'URL' => 'nullable|url',
            'user_id' => 'required|integer',
            'image' => 'nullable',
            'image.*' => 'mimes:jpeg,jpg,png,gif,csv,txt,pdf'
            ]);

            $images = [];
            if($request->hasfile('images'))
             {
                foreach($request->file('images') as $image)
                {
                    $image_store = $image->store('item_images', 'public');//store the image object to the item_images folder in the public directory
                    $images[] = $image_store;  //add every image into the images array    
                }
             }


            //$image_store = request()->file('image')->store('item_images', 'public');
            $item = new Item();
            $item->name = $request->name;
            $item->price = $request->price;
            $item->manufacture_name = $request->manufacture_name;
            $item->description = $request->description;
            $item->URL = $request->URL;
            $item->user_id = $request->user_id;
            $item->image = implode(",", $images);
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
            'image' => 'nullable',
            'image.*' => 'mimes:jpeg,jpg,png,gif,csv,txt,pdf|max:1280'
        ]);
        $images = [];
        if($request->hasfile('images'))
         {
            foreach($request->file('images') as $image)
            {
                $image_store = $image->store('item_images', 'public');//store the image object to the item_images folder in the public directory
                $images[] = $image_store;  //add every image into the images array
                
            }
         }

        $item = Item::find($id);
        $item->name = $request->name;
        $item->price = $request->price;
        $item->manufacture_name = $request->manufacture_name;
        $item->description = $request->description;
        $item->URL = $request->URL;
        $item->user_id = $request->user_id;
        $item->image = implode(",", $images);
        $item->save();
        $reviews = Review::where('item_id', '=', $id)->paginate(5);
        return view('items.show')->with('item', $item)->with('reviews', $reviews);
    }

    public function upload_images($id)
    {
        $item = Item::find($id);
        return view('items.upload_images')->with('item', $item);
    }

    public function store_images(Request $request, $id)
    {

        $this->validate($request, [

            'image' => 'nullable',
            'image.*' => 'mimes:jpeg,jpg,png,gif,csv,txt,pdf|max:1280'
        ]);

        $images = [];
        if($request->hasfile('images'))
         {
            foreach($request->file('images') as $image)
            {
                $image_store = $image->store('item_images', 'public');//store the image object to the item_images folder in the public directory
                $images[] = $image_store;  //add every image into the images array
                
            }
         }

         $item = Item::find($id);
         $item->image = implode(",", $images);
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
        $reviews->delete();
        $item->delete();
        $items = Item::all();
        return view('items.index')->with('items', $items);
    }
}
