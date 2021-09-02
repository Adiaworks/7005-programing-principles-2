<?php

use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/



Route::get('/', function(){
    $sql = "select * from item";
    $items = DB::select($sql);
    //$items = array();
    return view('items.item_list')->with('items', $items); /*dot or slash can be used*/
    //dd($item);
});

Route::get('item_detail/{id}', function($id){
    $item = get_item($id);
    return view('items.item_detail')->with('item', $item);
});

Route::get('item_delete/{id}', function($id){
    $item = get_item($id);
    return view('items.item_delete')->with('item', $item);
});

Route::get('item_update/{id}', function($id){
    $item = get_item($id);
    return view('items.item_update')->with('item', $item);
});

Route::get('add_item', function(){
    return view("items.add_item");
});

Route::get('add_item/{id}', function($id){
    $item = get_item($id);
    return view('items.add_item')->with('item', $item);
});//this route links to the add_item.blade.php file to display the add form.

Route::post('add_item_action', function(){
    $summary = request('summary');
    $details = request('details');
    $id = add_item($summary, $details);
    if ($id){
        return redirect(url("item_detail/$id"));
    } else {
        die("Error while adding item.");
    }
});

function add_item($summary, $details){
   $sql = "insert into item (summary, details) values (?, ?)";
   DB::insert($sql, array($summary, $details));
   $id = DB::getPdo()->lastinsertId();
   return ($id);
}

function get_item($id){
    $sql = "select * from item where id=?";
    $items = DB::select($sql, array($id));
    if (count($items)!=1){
        die("Something has gone wrong, invalid query or result:$sql");
    }
    $item = $items[0];
    return $item;
}