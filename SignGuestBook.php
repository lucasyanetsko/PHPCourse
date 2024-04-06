<!DOCTYPE html>
<html lang="en">

<head>
  <title>Sign Guest Book</title>
</head>

<body>
  <?php
  // Confirms the form has been submitted and the required fields are not empty
  if ($_SERVER["REQUEST_METHOD"] == "POST") {
    if (empty($_POST['first_name']) || empty($_POST['last_name'])) {
      echo "<p>You must enter your first and last name! Click your browser's Back button to return to the Guest Book form.</p>";
    } else {

      // Connect to the database
      $DBHost = "localhost";
      $DBUser = "Lucas";
      $DBPassword = "Lucas1";
      $DBName = "GuestBook";
      $TableName = "visitors";
      $DBConnect = mysqli_connect($DBHost, $DBUser, $DBPassword, $DBName);


      // Confirms the connection to the database server
      if ($DBConnect === FALSE) {
        echo "<p>Unable to connect to the database server.</p>" . "<p>Error code " . mysqli_connect_errno() . ": " . mysqli_connect_error() . "</p>";
      } else {
        $SQLstring = "SHOW TABLES LIKE '$TableName'";
        $QueryResult = mysqli_query($DBConnect, $SQLstring);
        if (mysqli_num_rows($QueryResult) == 0) {
          $SQLstring = "CREATE TABLE $TableName (
                    countID SMALLINT NOT NULL AUTO_INCREMENT PRIMARY KEY, 
                    last_name VARCHAR(40), 
                    first_name VARCHAR(40))";
          $QueryResult = mysqli_query($DBConnect, $SQLstring);
          if ($QueryResult === FALSE) {
            echo "<p>Unable to create the table.</p>" . "<p>Error code " . mysqli_errno($DBConnect) . ": " . mysqli_error($DBConnect) . "</p>";
          }
        }
        // Inserts the user's name into the database
        $LastName = mysqli_real_escape_string($DBConnect, $_POST['last_name']);
        $FirstName = mysqli_real_escape_string($DBConnect, $_POST['first_name']);
        $SQLstring = "INSERT INTO $TableName (last_name, first_name) VALUES ('$LastName', '$FirstName')";
        $QueryResult = mysqli_query($DBConnect, $SQLstring);
        if ($QueryResult === FALSE) {
          echo "<p>Unable to execute the query.</p>" . "<p>Error code " . mysqli_errno($DBConnect) . ": " . mysqli_error($DBConnect) . "</p>";
        } else {
          echo "<h1>Thank you for signing our guest book!</h1>";
          // Add a link to view the guestbook entries
          echo '<p>View the <a href="ShowGuestBook.php">current guestbook</a>.</p>';
        }

        mysqli_close($DBConnect);
      }
    }
  } else {
    // Message when form not submitted
    echo "<p>Please fill out the form to sign the guest book.</p>";
  }
  ?>
</body>

</html>