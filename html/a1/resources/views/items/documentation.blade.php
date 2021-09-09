@extends('layouts.master')

@section('content')
<h1>Documentation</h1>
<p><img src="/a1/views/items/er_diagram.jpg" alt="ER diagram"></p>
<p>2. Describe what you were able to complete, what you were not able to complete.<br>
I thought I should be able to finish all the validation for the assignment. <br>
But I spent too much time on figuring out the logic, therefore, I did not complete <br>
all the validations.<br>
At the beginning of this assignment, I don’t think I can list the total amount <br>
of booking time of each vehicle in a descending order. But I discussed with my <br>
tutor and did some research for the related information and finally I solved the <br>
question.
</p>
<p>3. Reflect on the process you have applied to develop your solution.<br>
I started the assignment from the database. And I thought about the layout of my website.<br> 
I almost tested my code for each route and function. I used dd() and var_dump() to test <br> 
my code. When I came across problems, I checked the weekly exercises firstly and I found<br>
lecture videos are helpful. If the lecture video did not solve my problems, I would do <br>
research online. For the second assignment, I will start it early so that I have enough <br>
time to complete it.
</p>
<p>4. Although I did not complete the booking validation 2, I thought the correct way to <br>
solve that may be to satisfy three conditions: <br>
a. the starting time and date should not in the duration of other existing bookings<br>
b. the returning time and date should not in the duration of other existing bookings<br>
c. the duration of the new booking should not include the other booking durations.<br>
</p>

<a href="{{url("list_vehicles")}}">Home</a>
@endsection