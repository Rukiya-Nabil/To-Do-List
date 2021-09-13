<?php

if ($dbc = mysqli_connect('localhost','root','','todo')) {

    $query = 'CREATE TABLE list (
      id INT UNSIGNED NOT NULL AUTO_INCREMENT PRIMARY KEY,
      activity TEXT NOT NULL,
      date_entered DATETIME NOT NULL
    ) CHARACTER SET utf8';


// just to check if the table and database are working correctly

  if (mysqli_query($dbc, $query))
  {
    print '<p>The table has been created.</p>';
  }
  else {
  print '<p>Could not create the table because:<br>'.mysqli_error($dbc).'.</p>';
  }

  print '<p>Successfully➝ connected to the database!➝ </p>';
  mysqli_close($dbc);
                                                        }
else {
  print '<p>➝ Could not connect to the➝ database <br>'.mysqli_connect_error().'</p>';
  }


 ?>
