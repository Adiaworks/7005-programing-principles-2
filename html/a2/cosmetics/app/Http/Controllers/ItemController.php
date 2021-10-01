<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Item;
use App\Models\Review;
use App\Models\User;

class ItemController extends Controller
{
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
        return view('items.create_form')->with('reviews', Review::all());
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
            'URL' => 'nullable|url'
            ]);
            $item = new Item();
            $item->name = $request->name;
            $item->price = $request->price;
            $item->manufacture_name = $request->manufacture_name;
            $item->description = $request->description;
            $item->URL = $request->URL;
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
        return view('items.show')->with('item', $item);
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
            'description' => 'required|max:255',//blank notice
            'URL' => 'nullable|url'
        ]);
        $item = Item::find($id);
        $item->name = $request->name;
        $item->price = $request->price;
        $item->manufacture_name = $request->manufacture_name;
        $item->description = $request->description;
        $item->URL = $request->URL;
        $item->save();
        return view('items.show')->with('item', $item);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $item = Item::find($id);
        $item->delete();
        $items = Item::all();
        return view('items.index')->with('items', $items);
    }
}
