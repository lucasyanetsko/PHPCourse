<!DOCTYPE html>
<html>

<?php
if ($_SERVER["REQUEST_METHOD"] == "POST") {
  // This code retrieves the user input from the paycheck form
  $hoursWorked = $_POST['hoursWorked'];
  $hourlyRate = $_POST['hourlyRate'];

  // This validates the users input to make sure it is a number
  if (!is_numeric($hoursWorked) || !is_numeric($hourlyRate)) {
    echo "Invalid input. Please make sure you are usings numeric values to calculate your gross pay.";
    exit;
  }

  // This calculates the gross salary by multiplying the hours worked input by the hourly rate input
  $grossSalary = $hoursWorked * $hourlyRate;

  // This displays the results of the user's input from the paycheck.html form
  echo "<h1>Employee Gross Salary</h1>";
  echo "<p>Hours Worked: $hoursWorked</p>";
  echo "<p>Hourly Rate: $hourlyRate</p>";
  echo "<p>Gross Salary: $grossSalary</p>";
} else {
  echo "Error: Invalid Request";
}
?>

<!--This takes the user back to the original page to input their hours + hourly rate. -->
<p><a href="paycheck.html">Go back to hours and hourly rate form</a></p>