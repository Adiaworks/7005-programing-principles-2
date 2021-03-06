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
    delete_booking($id);
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
    //get the information users input and then validate the input and display the details updated
    $rego = request('rego');
    $model = request('model');
    $year = request('year');
    $odometer = request('odometer');
    if (empty($rego || $model || $year || $odometer)) {
        echo $error = "Missing value";
    }
        else if ($rego != ctype_alnum($rego) || strlen($rego) != 6) {
        echo $error = "A rego must be an alphanumeric string of 6 characters 
                      (sorry, we don???t cater for personalised number plate).";
      } 
        else if ($model != ctype_alnum($model) || strlen($model) > 20) {
        echo $error = "A model must be an alphanumeric string and no more than 20 characters";
      } 
        else if (!is_numeric($year) || strlen($year) != 4 ||  intval(date("Y")) < $year || $year < 1900 ) {
        echo $error = "A year should be a numeric number between 1900 and the current year in 4 characters.";
      }
        else if (!is_numeric($odometer) || $odometer < 0 || $odometer>999999)  {
        echo $error = "Odometer should be a numeric number, no negative numbers, no more than 999,999.";
      } 
        else {  
            if ($id && empty($error)){
                update_vehicle($id, $rego, $model, $year, $odometer);
                $vehicle = get_vehicle($id);
                return view('items.vehicle_detail')->with('vehicle', $vehicle);
            } else {
                $error = "Vehicle update failed.";
                echo $error;
            }
        }
});


Route::get('create_a_vehicle/{id}', function($id){
    //get a new id and display the form for creating a new vehicle
    $vehicle = get_vehicle($id);
    return view('items.create_a_vehicle')->with('vehicle', $vehicle);
});

Route::post('create_vehicle_action', function(){
    //get the information users typed in and then validate the input
    //and add to the vehicle database and display the vehicle list
    $rego = request('rego');
    $model = request('model');
    $year = request('year');
    $odometer = request('odometer');
    $error = "";
    if (empty($rego || $model || $year || $odometer)) {
        echo $error = "Missing value";
    }
        else if ($rego != ctype_alnum($rego) || strlen($rego) != 6) {
        echo $error = "A rego must be an alphanumeric string of 6 characters 
                      (sorry, we don???t cater for personalised number plate).";
      } 
        else if ($model != ctype_alnum($model) || strlen($model) > 20) {
        echo $error = "A model must be an alphanumeric string and no more than 20 characters";
      } 
        else if (!is_numeric($year) || strlen($year) != 4 ||  intval(date("Y")) < $year || $year < 1900 ) {
        echo $error = "A year should be a numeric number between 1900 and the current year in 4 characters.";
      }
        else if (!is_numeric($odometer) || $odometer < 0 || $odometer>999999)  {
        echo $error = "Odometer should be a numeric number, no negative numbers, no more than 999,999.";
      } 
        else {
        $id = add_vehicle($rego, $model, $year, $odometer);
            if ($id && empty($error)){
                $sql = "select * from vehicle";
                $vehicles = DB::select($sql);
                return view('items.vehicle_list')->with('vehicles', $vehicles);
            } else {
                $error = "Vehicle creation failed.";
                echo $error;
            }
        }
});
/*
Route::post('create_vehicle_action', function(){
    //get the information users typed in and add to the vehicle database 
    //and display the vehicle list
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
    $id = add_booking($user_id, $user_name, $user_license_number, $vehicle_id, 
                     $starting_date, $starting_time, $returning_date, $returning_time);
    if ($id){
        $sql = "select * from booking where id='$id'";
        $booking = DB::select($sql);
        return view('items.booking_detail')->with('booking', $booking[0]); 
    } 
    else {
        die("Error while adding a booking.");
    }
});

*/
Route::get('list_users', function(){
    //list all the users
    $sql = "select * from user";
    $users = DB::select($sql);
    return view('items.user_detail')->with('users', $users);
});

Route::get('user_delete/{id}', function($id){
    //delete the user according to its id and display a delete message
    delete_user($id);
    delete_users_booking($id);
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

    if (empty($name || $age || $license_number|| $license_type)) {
        echo $error = "Missing value";
    }
        else if (!ctype_alnum($name) || strlen($name) > 20) {
        echo $error = "A name must be an alphanumeric string and no more than 20 characters";
      } 
        else if (!is_numeric($age) || $age < 17 || $age > 98) {
        echo $error = "Age must be a numeric number which must be greater than
                       17 and less than 99";
      } 
      else if (!is_numeric($license_number) || strlen($license_number) > 11 || strlen($license_number) < 8) {
        echo $error = "A license number should be a numeric number and its length must be greater than 7 
                       and less than 12.";
      }
        else if (strlen($license_type) > 20 || strlen($license_type) < 1 )  {
        echo $error = "The length of a license type should be greater than 0 and less than 21.";
      } 
        else {
            if ($id && empty($error)){
                update_user($id, $name, $age, $license_number, $license_type);
                $sql = "select * from user";
                $users = DB::select($sql);
                return view('items.user_detail')->with('users', $users);
            } else {
                $error = "User update failed.";
                echo $error;
            }
        }
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

    if (empty($name || $age || $license_number|| $license_type)) {
        echo $error = "Missing value";
    }
        else if (!ctype_alnum($name) || strlen($name) > 20) {
        echo $error = "A name must be an alphanumeric string and no more than 20 characters";
      } 
        else if (!is_numeric($age) || $age < 17 || $age > 98) {
        echo $error = "Age must be a numeric number which must be greater than 17 and less than 99";
      } 
        else if (!is_numeric($license_number) || strlen($license_number) > 11 || strlen($license_number) < 8) {
        echo $error = "A license number should be a numeric number and its length must be greater than 7 and less than 12.";
      }
        else if (strlen($license_type) > 20 || strlen($license_type) < 1 )  {
        echo $error = "The length of a license type should be greater than 0 and less than 21.";
      } 
        else {
            $id = add_user($name, $age, $license_number, $license_type);
            if ($id && empty($error)){
                $sql = "select * from user";
                $users = DB::select($sql);
                return view('items.user_detail')->with('users', $users);
            } else {
                $error = "User creation failed.";
                echo $error;
            }
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
    $tomorrow = strtotime(date_format(new DateTime('tomorrow'), "Y/m/d H:i:s"));
    $combined_starting_dt = strtotime(date('Y-m-d H:i:s', strtotime("$starting_date $starting_time")));
    $combined_returning_dt = strtotime(date('Y-m-d H:i:s', strtotime("$returning_date $returning_time")));
    //var_dump($tomorrow);
    $error = "";
    if (empty($starting_date || $starting_time || $returning_date|| $returning_time)) {
        echo $error = "Missing value";
    }
        //Booking validation 1:
        else if ( $combined_starting_dt < $tomorrow || $combined_returning_dt < $combined_starting_dt) {
            echo $error = "A starting date and time should start from tomorrow and a returning date and time
                       must be later than the starting date and time.";
        }  
        else {
            $id = add_booking($user_id, $user_name, $user_license_number, $vehicle_id, 
                              $starting_date, $starting_time, $returning_date, $returning_time);
            if ($id){
                $sql = "select * from booking where id='$id'";
                $booking = DB::select($sql);
                return view('items.booking_detail')->with('booking', $booking[0]); 
            } 
            else {
                $error = "Error while adding a booking.";
                echo $error;
            }
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
    //This Route update the odometer of a vehicle and delete the booking record 
    //from the database
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
    //this Route links to the page of vehicles that listed by booking numbers in 
    //descending order
    $sql = "select vehicle_id, count(*) as frequency from booking group by vehicle_id 
            order by count(*) DESC";
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
   //this route links to a page which lists the total amount of booking time of every vehicle
    $sql = "select vehicle_id, 
            sum(julianday(datetime(date(returning_date) || ' ' || time(returning_time))) - 
            julianday(datetime(date(starting_date) || ' ' || time(starting_time)))) as booking_sum 
            from booking group by vehicle_id order by booking_sum DESC";
    //this sql query grouped by the vehicle id and calculated the total amount of booking time 
    //of each group and ordered in DESC 
    $bookings = DB::select($sql);
    //dd($bookings);
    if ($bookings){    
        return view('items.booking_time_list')->with('bookings', $bookings);
      } 
      else {
        die("There's no booking at present.");
      }
});

/*
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

//Functions below

function add_booking($user_id, $user_name, $user_license_number, $vehicle_id, $starting_date, 
                     $starting_time, $returning_date, $returning_time){
    //add a new booking and return its booking id
    $sql = "insert into booking (user_id, user_name, user_license_number, vehicle_id, starting_date, 
            starting_time, returning_date, returning_time) values (?, ?, ?, ?, ?, ?, ?, ?)";
    DB::insert($sql, array($user_id, $user_name, $user_license_number, $vehicle_id, $starting_date, 
                           $starting_time, $returning_date, $returning_time));
    $id = DB::getPdo()->lastinsertId();
    return ($id);
 }

function delete_booking($id) {
    //delete the all the booking information according to the vehicle id
    $sql = "delete from booking where vehicle_id = ?";
    DB::delete($sql, array($id));
    } 

function delete_users_booking($id) {
    //delete the all the booking information according to the user id
    $sql = "delete from booking where user_id = ?";
    DB::delete($sql, array($id));
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