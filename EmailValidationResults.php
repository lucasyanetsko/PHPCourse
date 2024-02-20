<!DOCTYPE html>
<html>

<head>
  <title>Email Validation Result</title>
  <meta name="author" content="Lucas Yanetsko" />
</head>

<body>

  <?php
  // This checks to see if the form was submitted via the post method
  if ($_SERVER["REQUEST_METHOD"] == "POST") {

    // This code retrieves the users input on the form
    $inputEmail = $_POST['inputField'];

    // This is the header of the page where the results are displayed
    echo "<h1>Email Validation Result</h1>";
    // This code displays the email address that the user entered
    echo "<p>You entered the email address: $inputEmail</p>";

    // This is the validation code that checks to see if the email address is valid
    if (preg_match("/^(([A-Za-z]+(\.[A-Za-z]+)?)|([A-Za-z]+\d+))@(mail\.)?example\.org$/", $inputEmail)) {

      // If the user successfully input a valid email address this message should display
      echo "<p>This is a valid email address for delivery with the organization for a user at example.org.</p>";
    } else {
      // If the user input an invalid email address this message will display
      echo "<p>This is NOT a valid email address for delivery to a user within the organization at example.org.</p>";
    }

    // This is a button that takes the user back to the email input page.
    echo "<form action='EmailValidationForm.html' method='get'>";
    echo "<input type='submit' value='Go Back to Form'>";
    echo "</form>";
  } else {
    // If the user tries to access this page without submitting the form this message will display
    echo "<h1>Error: Invalid Request</h1>";
    echo "<p>This page can only be accessed through an email input on the form submission page.</p>";
  }
  ?>

</body>

</html>