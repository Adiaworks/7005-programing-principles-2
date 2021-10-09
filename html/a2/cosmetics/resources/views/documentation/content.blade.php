@extends('layouts.master')

@section('content')

<h2>Documentation</h2>
<h4>1.ERD</h4>
<img src="https://s5273584.elf.ict.griffith.edu.au/a2/cosmetics/resources/views/documentation/erd.jpg" alt="ER diagram" style="width:850px;height:600px;">

<h4>2. Describe what you were able to complete, what you were not able to complete.</h4>
<p>
I thought I should be able to structure the user interface of the assignment 2 in a better way. <br>
But I spent too much time on figuring out the logic and coding, therefore, I did not present <br>
the user interface as good as possible.<br>
At the beginning of this assignment, I don’t think I can complete all the tasks of the assignment 2. <br>
But I almost done all the requirements.
</p>
<h4>3. Reflect on the process you have applied to develop your solution.</h4>
<p>
I started the assignment from the ERD. And I thought about the structure of my website.<br> 
I spent a lot of time on working out the relationships between tables.<br>
I tested each route and function repeatedly. I used dd() and var_dump() to test <br> 
my code, which is helpful. When I had problems, I checked the weekly exercises <br>
firstly and I found lecture videos are also helpful. If the lecture video did not solve my problems, <br>
I would do research online. 
</p>
<h4>4. Recommendation feature </h4>
<p>
At first, I inspired by the Eloquent operations of database. So, I filtered the crucial related <br>
information from the followings of a user, for example, items with the largest number of reviews 
and users' likes the most often will be recommended to a user. <br>
</p>
@endsection