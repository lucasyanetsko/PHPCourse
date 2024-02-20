<!-- Lucas Yanetsko
IT 4400 Professor Vito
Exercise 2-2
The Purpose of this program is to have a user choose "Odd" or "Even"
and then on the next page render all odd or even numbers 1-100 by using a "while statement" -->


<!DOCTYPE html>
<html lang="en">

<head>
  <title>Display Numbers Result</title>
  <meta name="author" content="Lucas Yanetsko" />

</head>

<body>

  <h1>Display Numbers Result</h1>

  <?php
  // Confirm that the form is submitted
  if ($_SERVER["REQUEST_METHOD"] == "POST") {

    // Confirm which button was clicked by the user either "oddNumbers" or "evenNumbers"
    if (isset($_POST["oddNumbers"])) {
      // Displaying the odd numbers 1-100
      $number = 1;
      echo "<p>Odd Numbers: ";
      while ($number <= 100) {
        echo $number . " ";
        $number += 2;
      }
      echo "</p>";
    } elseif (isset($_POST["evenNumbers"])) {
      // Displaying the even numbers 1-100
      $number = 2;
      echo "<p>Even Numbers: ";
      while ($number <= 100) {
        echo $number . " ";
        $number += 2;
      }
      echo "</p>";
    } else {
      echo "<p>Neither</p>";
    }
  }
  ?>
  <!--takes user back to the selection page-->
  <p>
    <a href="OddOrEven.html">Back To Selection Page</a>
  </p>

</body>

</html>