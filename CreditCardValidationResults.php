<!DOCTYPE html>
<html>

<head>
  <title>Credit Card Validation Results</title>
  <meta name="author" content="Lucas Yanetsko" />
</head>

<body>
  <h1>Credit Card Validation Results</h1>

  <?php
  // This code checks to see if the user has submitted the form
  if ($_SERVER["REQUEST_METHOD"] == "POST") {
    // This code retrieves the user input from the credit card form
    $creditCardNumber = $_POST["inputField"];

    // This checks to see if the user input is an empty string
    if (empty($creditCardNumber)) {
      echo "<p>This Credit Card Number is invalid because it contains an empty string.</p>";
    } else {
      // This code removes any dashes or spaces from the user input on the form
      $creditCardNumber = str_replace("-", "", $creditCardNumber);
      $creditCardNumber = str_replace(" ", "", $creditCardNumber);

      // This code checks to see if the user input included any non-numeric characters i.e. a letter or a symbol
      if (!is_numeric($creditCardNumber)) {
        echo "<p>Credit Card Number $creditCardNumber is not a valid credit card number because it contains a non-numeric character.</p>";
      } else {
        echo "<p>Credit Card Number $creditCardNumber is a valid credit card number.</p>";
      }
    }
  } else {
    // This error message will be displayed if the user does not add a credit card number
    echo "<p>Error: No Credit Card Number was added.</p>";
  }
  ?>

  <!-- This takes the user back to the form to check the validity of their credit card number -->
  <p><a href="CreditCardValidationForm.html">Go back to Credit Card Form</a></p>

</body>

</html>