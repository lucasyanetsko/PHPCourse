<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8">
  <title>Guest Book Posts</title>
</head>

<body>
  <?php
  // Connect to the database
  $DBHost = "localhost";
  $DBUser = "Lucas";
  $DBPassword = "Lucas1";
  $DBName = "GuestBook";
  $TableName = "visitors";

  // This enables error reporting for debugging
  error_reporting(E_ALL);
  ini_set('display_errors', 1);

  // This creates the connection
  $DBConnect = mysqli_connect($DBHost, $DBUser, $DBPassword, $DBName);

  // Check if the connection is successful
  if ($DBConnect === FALSE) {
    echo "<p>Unable to connect to the database server.</p><p>Error code " . mysqli_connect_error() . "</p>";
  } else {
    // Set the character set to utf8mb4
    mysqli_set_charset($DBConnect, "utf8mb4");

    $SQLstring = "SELECT * FROM `$TableName`";
    $QueryResult = mysqli_query($DBConnect, $SQLstring);

    // Check to see if the query was successful
    if (!$QueryResult) {
      echo "<p>Error executing query: " . mysqli_error($DBConnect) . "</p>";
    } elseif (mysqli_num_rows($QueryResult) == 0) {
      echo "<p>There are no entries in the guest book!</p>";
    } else {
      // Display the guest book entries updated the size of table and border from the book code.
      echo "<h1>Guest Book Entries</h1>";
      echo "<p>The following visitors have signed our guest book:</p>";
      echo "<table width='30%' border='10'>";
      echo "<tr><th>First Name</th><th>Last Name</th></tr>";

      while ($Row = mysqli_fetch_assoc($QueryResult)) {
        echo "<tr><td>{$Row['first_name']}</td>";
        echo "<td>{$Row['last_name']}</td></tr>";
      }
      echo "</table>";
    }
    mysqli_free_result($QueryResult);
    mysqli_close($DBConnect);
  }

  // Added a link to go back to the entry form.
  echo '<p> Go back to <a href="GuestBook.html">add more entries.</a></p>';
  ?>
</body>

</html>