<!-- This is the corresponding PHP code for the BoxArray.html file for Exercise 6-2
Lucas Yanetsko IT 4400 -->

<?php

// Step 4 from the text, declare and initialize an associative array
$boxes = array(
  'Small' => array(
    'Length' => 12,
    'Width' => 10,
    'Depth' => 2.5
  ),
  'Medium' => array(
    'Length' => 30,
    'Width' => 20,
    'Depth' => 4
  ),
  'Large' => array(
    'Length' => 60,
    'Width' => 40,
    'Depth' => 11.5
  )
);

// This checkts to see if the form was successfully submitted
if ($_SERVER['REQUEST_METHOD'] === 'POST') {
  // This checks to see if the 'boxSize' POST parameter is set
  if (isset($_POST['boxSize'])) {
    // Retrieve the selected box size
    $boxSize = $_POST['boxSize'];

    // Check if the selected box size exists in the $boxes array
    if (array_key_exists($boxSize, $boxes)) {
      // This retrieves the measurements of the selected box (Small, Medium, or Large)
      $measurements = $boxes[$boxSize];

      // Step 5 from the text, calculate the volume
      $volume = $measurements['Length'] * $measurements['Width'] * $measurements['Depth'];

      // This echo statement displays the volume of the selected box
      echo "The volume of the $boxSize box is: " . $volume . " cubic inches.";
    } else {
      // This Displays an error message if the selected box size doesn't exist or the user somehow
      // ends up on this page without submitting the form
      echo "Invalid box size.";
    }
  } else {
    // Display an error message if the 'boxSize' POST parameter is not set if the user ends up on
    // the BoxArray.php page without submitting the form
    echo "Please select a box size.";
  }
} else {
  // This echo statement displays an error message if the form was not submitted
  echo "The form was not submitted.";
} ?>
<!--This takes the user back to the original page to input their hours + hourly rate. -->
<p><a href="BoxArray.html">Go back to box selection page.</a></p>