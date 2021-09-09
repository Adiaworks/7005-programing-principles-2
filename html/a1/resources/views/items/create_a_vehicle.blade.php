@extends('layouts.master')
<?php
/*
 * Script to print the prime factors of a single positive integer
 * sent from a form.
 * BAD STYLE: Does not use templates.
 */
include "includes/defs.php";

# Set $number to the value entered in the form.
$odometer = $_GET['odometer'];
$error = "";

# Check $number is nonempty, numeric and between 2 and PHP_MAX_INT = 2^31-1.
# (PHP makes it difficult to do this naturally; see the manual.)
if (empty($odometer)) {
  $error = "Error: Missing value";
} else if (!is_numeric($number)) {
  $error = "Error: Nonnumeric value: $number";
} else if ($number < 0 || $number > 999999) {
  $error = "Error: Invalid number: $number";
} else {
  # Set $factors to the array of factors of $number.
  $factors = factors($number);
  # Set $factors to a single dot-separated string of numbers in the array.
  $factors = join(" . ", $factors);
}
?>

@section('content')
  <h1>Create a vehicle</h1>

  <form method="post" action="{{url("create_vehicle_action")}}">
    {{csrf_field()}}
    <div class="mb-3">
      <label for="rego" class="form-label">Rego:</label>
      <input type="text" class="form-control" id="rego" name="rego" >
    </div>
    <div class="mb-3">
      <label for="model" class="form-label">Model:</label>
      <input type="text" class="form-control" id="model" name="model" >
    </div>
    <div class="mb-3">
      <label for="year" class="form-label">Year:</label>
      <input type="text" class="form-control" id="year" name="year" >
    </div>
    <div class="mb-3">
      <label for="odometer" class="form-label">Odometer:</label>
      <input type="text" class="form-control" id="odometer" name="odometer" >
    </div>
    <input type="submit" class="btn btn-primary" value="Create">
  </form>
  @endsection