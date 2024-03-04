<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8">
  <meta name="author" content="Lucas Yanetsko">
  <title>Song Organizer</title>
</head>



<!-- This program uses a script that stores song titles in a text file. 
It has additional functionality that allows users to view the song list and
prevents the same song name from being entered twice.  It also sorts the songs by name and
deletes duplicate entries, and randomizes the song list with the shuffle() function. -->

<body>

  <h1>Song Organizer</h1>

  <?php

  // This section gets the song name from the users input and initializes an empty array to store the existing
  // songs that have been entered.  It also checks to see if the SongOrganizerSongs.txt file exists and it reads 
  // the inputted songs into the $ExistingSongs array  The echo statements give the  user feedback on the status of
  // their inputs.

  if (isset($_POST['submit'])) {
    $SongToAdd = stripslashes($_POST['SongName']) . "\n";
    $ExistingSongs = array();
    if (file_exists("SongOrganizerSongs.txt") && filesize("SongOrganizerSongs.txt") > 0) {
      $ExistingSongs = file("SongOrganizerSongs.txt");
    }
    if (in_array($SongToAdd, $ExistingSongs)) {
      echo "<p>The song you entered already exists!<br>\n";
      echo "Your song was not added to the list.</p>";
    } else {
      $SongFile = fopen("SongOrganizerSongs.txt", "ab");
      if ($SongFile === false) {
        echo "There was an error saving your message!\n";
      } else {
        fwrite($SongFile, $SongToAdd);
        fclose($SongFile);
        echo "Your song has been added to the list.\n";
      }
    }
  }

  if ((!file_exists("SongOrganizerSongs.txt")) || (filesize("SongOrganizerSongs.txt") == 0)) {
    echo "<p>There are no songs in the list.</p>\n";
  } else {
    $SongArray = file("SongOrganizerSongs.txt");

    // this displays the inputted songs in a table format.
    echo "<table border=\"1\" width=\"100%\">\n";
    echo "<tr style=\"background-color:lightgray\">\n";
    foreach ($SongArray as $Song) {
      echo "<tr>\n";
      echo "<td>" . $Song . "</td>";
      echo "</tr>\n";
    }
    echo "</table>\n";
  }
  // These echo statements and links give the user the capability to sort the existing song list
  // remove duplicate songs, as well as randomize the current song list.
  echo "<p>\n";
  echo "<a href=\"SongOrganizer.php?action=Sort%20Ascending\">Sort Song List</a><br>\n";
  echo "<a href=\"SongOrganizer.php?action=Remove%20Duplicates\">Remove Duplicate Songs</a><br>\n";
  echo "<a href=\"SongOrganizer.php?action=Shuffle\">Randomize Song List</a><br>\n";
  echo "</p>\n";

  // This is the form section that allows the user to input a new song name and add it to the existing table list.
  echo "<form action=\"SongOrganizer.php\" method=\"post\">\n";
  echo "<h2>Add a New Song</h2>\n";
  echo "<p>Song Name: <input type=\"text\" name=\"SongName\"></p>\n";
  echo "<p><input type=\"submit\" name=\"submit\" value=\"Add Song to List\"></p>\n";
  echo "<input type=\"reset\" name=\"reset\" value=\"Clear out Song Name Input\">\n";
  echo "</form>\n";

  if (isset($_GET['action'])) {
    // This section checks to see if the user has selected to sort the song list, remove duplicate songs, or randomize the song list.
    if ((file_exists("SongOrganizer/songs.txt")) && (filesize("SongOrganizer/songs.txt") != 0)) {
      $SongArray = file("SongOrganizer/songs.txt");
    }
    switch ($_GET['action']) {
      case 'Remove Duplicates':
        $SongArray = array_unique($SongArray);
        $SongArray = array_values($SongArray);
        break;
      case 'Sort Ascending':
        sort($SongArray);
        break;
      case 'Shuffle':
        shuffle($SongArray);
        break;
    }

    if (count($SongArray) > 0) {
      $NewSongs = implode($SongArray);
      $SongStore = fopen("SongOrganizerSongs.txt", "wb");
      if ($SongStore === false) {
        echo "There was an error updating the song file\n";
      } else {
        fwrite($SongStore, $NewSongs);
        fclose($SongStore);
      }
    } else {
      unlink("SongOrganizer/songs.txt");
    }
  }
  ?>