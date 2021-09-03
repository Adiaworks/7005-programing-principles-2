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
    //$items = array(), including all the data in the table/database;
    return view('items.item_list')->with('items', $items); /*dot or slash can be used to go to the directory of items */
    //dd($item);
});

Route::get('item_detail/{id}', function($id){
    $item = get_item($id);
    return view('items.item_detail')->with('item', $item);
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
});//this route is called by the add_item.blade.php and then add the new item to the database 
//and display the detail page for the new item.

Route::get('item_delete/{id}', function($id){
    delete_item($id);
    $sql = "select * from item";
    $items = DB::select($sql);
    return view('items.item_list')->with('items', $items);
});

Route::get('item_update/{id}', function($id){
    $item = get_item($id);
    return view('items.item_update')->with('item', $item);
});

Route::post('update_item_action/{id}', function($id){
    $summary = request('summary');
    $details = request('details');
    update_item($id, $summary, $details);
    $item = get_item($id);
    // dd($details);
    return view('items.item_detail')->with('item', $item);
});

function update_item($id, $summary, $details) {
    $sql = "update item set summary = ?, details = ? where id = ?";
    DB::update($sql, array($summary, $details, $id));
}
    
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

function delete_item($id) {
    $sql = "delete from item where id = ?";
    DB::delete($sql, array($id));
    } 