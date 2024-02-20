<!-- Lucas Yanetsko
IT 4400 Professor Vito
Exercise 2-1
The Purpose of this program is to take the user input and compare it to 100 -->


<!DOCTYPE html>
<html>


<head>
  <title>A number compared to 100</title>
  <meta name="author" content="Lucas Yanetsko" />
</head>

<body>
  <?php

  // Confirm that the form is submitted

  if ($_SERVER["REQUEST_METHOD"] == "POST") {

    // Retrieve the user input from the User Input form page

    $inputValue = $_POST["inputField"];

    // Convert the input value to an integer

    $IntVariable = intval($inputValue);

    // Check if the input value is greater than 100 or less than or equal to 100

    if ($IntVariable > 100) {
      $Result = "$IntVariable is greater than 100";
    } else {
      $Result = "$IntVariable is less than or equal to 100";
    }

    // Display the result of the comparison

    echo "<h2>The results are in...</h2>";
    echo "<p>$Result</p>";
  } else {
    echo "<h2>There is no input value</h2>";
  }

  ?>

  <p>
    <a href="UserInputNumber.html">
      Back To Input Number Screen</a>
  </p>
</body>

</html>