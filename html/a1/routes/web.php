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
    //display all the vehicles on the home page
    $sql = "select * from vehicle";
    $vehicles = DB::select($sql);
    return view('items.vehicle_list')->with('vehicles', $vehicles);
    /*dot or slash can be used to go to the directory of items */
});

Route::get('vehicle_detail/{id}', function($id){
    //get the vehicle id and display its information
    $vehicle = get_vehicle($id);
    return view('items.vehicle_detail')->with('vehicle', $vehicle);
});

Route::get('vehicle_delete/{id}', function($id){
    //delete the vehicle according to the id and display the delete message
    delete_vehicle($id);
    $sql = "select * from vehicle";
    $vehicles = DB::select($sql);
    return view('items.vehicle_delete')->with('vehicles', $vehicles);
});

Route::get('vehicle_update/{id}', function($id){
    //get the vehicle id and display the update form with the present info
    $vehicle = get_vehicle($id);
    return view('items.vehicle_update')->with('vehicle', $vehicle);
});

Route::post('update_vehicle_action/{id}', function($id){
    //get the information users input and display the details updated
    $rego = request('rego');
    $model = request('model');
    $year = request('year');
    $odometer = request('odometer');
    update_vehicle($id, $rego, $model, $year, $odometer);
    $vehicle = get_vehicle($id);
    return view('items.vehicle_detail')->with('vehicle', $vehicle);
});

Route::get('create_a_vehicle/{id}', function($id){
    //get a new id and display the form for creating a new vehicle
    $vehicle = get_vehicle($id);
    return view('items.create_a_vehicle')->with('vehicle', $vehicle);
});

Route::post('create_vehicle_action', function(){
    //get the information users typed in and add to the vehicle database and display the vehicle list
    $rego = request('rego');
    $model = request('model');
    $year = request('year');
    $odometer = request('odometer');
    $id = add_vehicle($rego, $model, $year, $odometer);
    if ($id){
        $sql = "select * from vehicle";
        $vehicles = DB::select($sql);
        return view('items.vehicle_list')->with('vehicles', $vehicles);
    } else {
        die("Error while adding a vehicle.");
    }
});

Route::get('list_users', function(){
    //list all the users
    $sql = "select * from user";
    $users = DB::select($sql);
    return view('items.user_detail')->with('users', $users);
});

Route::get('user_delete/{id}', function($id){
    //delete the user according to its id and display a delete message
    delete_user($id);
    $sql = "select * from user";
    $users = DB::select($sql);
    return view('items.user_delete')->with('users', $users);
});

Route::get('user_update/{id}', function($id){
    //get the user id and display a form with user's information
    $user = get_user($id);
    return view('items.user_update')->with('user', $user);
});

Route::post('update_user_action/{id}', function($id){
    //this route get the new information and update for users.
    $name = request('name');
    $age = request('age');
    $license_number = request('license_number');
    $license_type = request('license_type');
    update_user($id, $name, $age, $license_number, $license_type);
    $sql = "select * from user";
    $users = DB::select($sql);
    return view('items.user_detail')->with('users', $users);
});

Route::get('create_a_user/{id}', function($id){
    //get the current user id and display a form for creating a user
    $user = get_user($id);
    return view('items.create_a_user')->with('user', $user);
});

Route::post('create_user_action', function(){
    //this route gets the users' input and display that in a detailed page
    $name= request('name');
    $age = request('age');
    $license_number = request('license_number');
    $license_type = request('license_type');
    $id = add_user($name, $age, $license_number, $license_type);
    if ($id){
        $sql = "select * from user";
        $users = DB::select($sql);
        return view('items.user_detail')->with('users', $users);
    } else {
        die("Error while adding a user.");
    }
});

Route::get('book_a_vehicle', function(){
    //this route call the book_a_vehicle file to display the booking form.
    $sql = "select * from user";
    $users = DB::select($sql);
    $sql = "select * from vehicle";
    $vehicles = DB::select($sql);
    return view('items.book_a_vehicle')->with('users', $users)->with('vehicles', $vehicles);
});

Route::post('booking_action', function(){
    //this route get the booking information from users' input and display that in a detailed page
    $user_id = request('user_id');
    $user_name= request('user_name');
    $user_license_number = request('license_number');
    $vehicle_rego = request('vehicle_rego');
    $sql_1 = "select id from vehicle where rego= '$vehicle_rego'";
    $vehicles = DB::select($sql_1); 
    $vehicle_id = $vehicles[0]->id; 
    $starting_date = request('starting_date');
    $starting_time = request('starting_time');
    $returning_date = request('returning_date');
    $returning_time = request('returning_time');
    $id = add_booking($user_id, $user_name, $user_license_number, $vehicle_id, $starting_date, $starting_time, $returning_date, $returning_time);
    if ($id){
        $sql = "select * from booking where id='$id'";
        $booking = DB::select($sql);
        return view('items.booking_detail')->with('booking', $booking[0]); 
    } 
    else {
        die("Error while adding a booking.");
    }
});

Route::get('documentation', function(){
    //this route links to the documentation page
    return view('items.documentation');
});

Route::get('booking_list', function(){
    //the route lists all the bookings
    $sql = "select * from booking";
    $bookings = DB::select($sql);
    return view('items.booking_list')->with('bookings', $bookings);
});

Route::get('return_a_vehicle', function(){
    //this Route links to the page of return form
    return view('items.return_a_vehicle');
});

Route::post('return_vehicle_action', function(){
    //This Route update the odometer of a vehicle and delete the booking record from the database
    $distance_driven = request('distance');
    $booking_id = request('booking_id');
    $vehicle_id = request('vehicle_id');
    $sql_1 = "select odometer from vehicle where id = ?";
    $distance_current = DB::select($sql_1, array($vehicle_id));  
    $distance = $distance_driven + $distance_current[0]->odometer;
    $sql_2 = "update vehicle set odometer = $distance where id = ?";
    DB::update($sql_2, array($vehicle_id));
    $sql_3 = "delete from booking where id = ?";
    DB::delete($sql_3, array($booking_id));
    $sql_4 = "select * from booking";
    $bookings = DB::select($sql_4);   
    if ($bookings){
      return view('items.booking_list')->with('bookings', $bookings);
    } 
    else {
      die("There's no booking at present.");
    }
});

Route::get('booking_frequency', function(){
    //this Route links to the page of vehicles that listed by booking numbers in descending order
    $sql = "select vehicle_id, count(*) as frequency from booking group by vehicle_id order by count(*) DESC";
    $bookings = DB::select($sql);
    //dd($bookings);    
    if ($bookings){    
      return view('items.booking_frequency')->with('bookings', $bookings);
    } 
    else {
      die("There's no booking at present.");
    }
});

Route::get('booking_information/{id}', function($id){
    //this route links to the booking information of this vehicle
    $sql = "select * from booking where vehicle_id = ?";
    $bookings = DB::select($sql, array($id));
    if ($bookings){    
        return view('items.booking_information')->with('bookings', $bookings);
      } 
      else {
        die("There's no booking at present.");
      }
});

Route::get('booking_time_list', function(){
   //this route links to a page which shows the total amount of booking time 
   //of each vehicle in a descending order

    //$diff = ;
    $sql_1 = "select *, DATEDIFF(hour, returning_date, starting_date)*24 as datefiff, DATEDIFF(hour, returning_time, starting_time), DATEDIFF() as TimeDiff from booking group by vehicle_id";
    $bookings = DB::select($sql_1);
    dd($sql_1);
});
/*
$sql_2 = "select *, (strtotime(returning_date)-strtotime(starting_date))/60/60/24*24+(strtotime(returning_time)-strtotime(starting_time))/60) as difference from booking group by vehicle_id"; 
    $bookings = DB::select($sql);
    if ($bookings){    
        return view('items.booking_time_list')->with('bookings', $bookings);
      } 
      else {
        die("There's no booking at present.");
      }
});


function booking_time_calculation(){
//$sql = "select *,  from booking group by vehicle_id order by ";
$bookings = DB::select($sql);
for 
    
}

Functions


function get_a_booking($id){
    //this function looks up the specific booking information
    $sql = "select * from user where id=?";
    $users = DB::select($sql, array($id));
    if (count($users)!=1){
        die("Something has gone wrong, invalid query or result:$sql");
    }
    $user = $users[0];
    return $user;
} 
*/

function add_booking($user_id, $user_name, $user_license_number, $vehicle_id, $starting_date, $starting_time, $returning_date, $returning_time){
    //add a new booking and return its booking id
    $sql = "insert into booking (user_id, user_name, user_license_number, vehicle_id, starting_date, starting_time, returning_date, returning_time) values (?, ?, ?, ?, ?, ?, ?, ?)";
    DB::insert($sql, array($user_id, $user_name, $user_license_number, $vehicle_id, $starting_date, $starting_time, $returning_date, $returning_time));
    $id = DB::getPdo()->lastinsertId();
    return ($id);
 }


function add_user($name, $age, $license_number, $license_type){
    //add a new user and return her/his id
    $sql = "insert into user (name, age, license_number, license_type) values (?, ?, ?, ?)";
    DB::insert($sql, array($name, $age, $license_number, $license_type));
    $id = DB::getPdo()->lastinsertId();
    return ($id);
 }

function get_user($id){
    //get the user's details according to the id
    $sql = "select * from user where id=?";
    $users = DB::select($sql, array($id));
    if (count($users)!=1){
        die("Something has gone wrong, invalid query or result:$sql");
    }
    $user = $users[0];
    return $user;
}

function update_user($id, $name, $age, $license_number, $license_type) {
    //update user's details
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

function delete_vehicle($id) {
    //delete the user information by $id
    $sql = "delete from vehicle where id = ?";
    DB::delete($sql, array($id));
    } 

function update_vehicle($id, $rego, $model, $year, $odometer) {
    //update details for the vehicle
    $sql = "update vehicle set rego = ?, model = ?, year = ?, odometer = ? where id = ?";
    DB::update($sql, array($rego, $model, $year, $odometer, $id));
}

function add_vehicle($rego, $model, $year, $odometer){
    //adding a vehicle to the databse and return its id
    $sql = "insert into vehicle (rego, model, year, odometer) values (?, ?, ?, ?)";
    DB::insert($sql, array($rego, $model, $year, $odometer));
    $id = DB::getPdo()->lastinsertId();
    return ($id);
 }