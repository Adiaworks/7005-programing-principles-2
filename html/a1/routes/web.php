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

/*Route::get('/', function () {
    return view('welcome');
});
*/

Route::get('list_vehicles', function(){
    $sql = "select * from vehicle";
    $vehicles = DB::select($sql);
    //dd($vehicles);
    //$vehicles = array(), including all the data in the table/database;
    return view('items.vehicle_list')->with('vehicles', $vehicles);
    /*dot or slash can be used to go to the directory of items */
});

Route::get('vehicle_detail/{id}', function($id){
    $vehicle = get_vehicle($id);
    return view('items.vehicle_detail')->with('vehicle', $vehicle);
});

Route::get('list_users', function(){
    $sql = "select * from user";
    $users = DB::select($sql);
    return view('items.user_detail')->with('users', $users);
});

Route::get('user_delete/{id}', function($id){
    delete_user($id);
    $sql = "select * from user";
    $users = DB::select($sql);
    return view('items.user_delete')->with('users', $users);
});

Route::get('user_update/{id}', function($id){
    $user = get_user($id);
    return view('items.user_update')->with('user', $user);
});

Route::post('update_user_action/{id}', function($id){
    $name = request('name');
    $age = request('age');
    $license_number = request('license_number ');
    $license_type = request('license_type');
    update_user($id, $name, $age, $license_number, $license_type);
    $user = get_user($id);
    return view('items.user_detail')->with('user', $user);
});

function get_user($id){
    $sql = "select * from user where id=?";
    $users = DB::select($sql, array($id));
    if (count($users)!=1){
        die("Something has gone wrong, invalid query or result:$sql");
    }
    $user = $users[0];
    return $user;
}

function update_user($id, $name, $age, $license_number, $license_type) {
    $sql = "update user set name = ?, age = ?, license_number = ?, license_type = ? where id = ?";
    DB::update($sql, array($name, $age, $license_number, $license_type, $id));
}

function delete_user($id) {
    //delete the user information by $id
    $sql = "delete from user where id = ?";
    DB::delete($sql, array($id));
    } 

function get_vehicle($id){
    //get the vehicle information by $id
    $sql = "select * from vehicle where id=?";
    $vehicles = DB::select($sql, array($id));
    if (count($vehicles)!=1){
        die("Something has gone wrong, invalid query or result:$sql");
    }
    $vehicle = $vehicles[0];
    return $vehicle;
}

