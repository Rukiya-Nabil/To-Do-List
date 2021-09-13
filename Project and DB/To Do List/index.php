<!DOCTYPE html>
<html lang="en" dir="ltr">
  <head>
    <meta charset="utf-8">
    <title>To Do List</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.1/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-F3w7mX95PdgyTmZZMECAngseQB83DfGTowi0iMjiWaeVhAn4FJkqJByhZMI3AhiU" crossorigin="anonymous">
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.1/dist/js/bootstrap.bundle.min.js" integrity="sha384-/bQdsTh/da6pkI1MST/rWKFNjaCP5gBSY4sEBT38Q/9RBh9AH40zEOg7Hlq2THRZ" crossorigin="anonymous"></script>
  </head>
  <body>


<?php

    if ($_SERVER['REQUEST_METHOD'] == 'POST') {
      $problem=FALSE;

        if (!empty($_POST['activity']))
        {
  	      $activity = trim(strip_tags($_POST['activity']));
        }

        else{ // if the field is empty
   	      print ' <div  class="alert alert-warning">
                  <div>
                  <p> Please make sure you entered the task that you want to do !</p>
                  </div>
                </div>';
          $problem=TRUE;
       }

         if(!$problem)
         {

           $dbc = mysqli_connect('localhost','root','','todo');
           $query = "INSERT INTO list (activity,date_entered) VALUES ('$activity',NOW())";
           if (@mysqli_query($dbc, $query)) {}
            else { print '<p>Could not add the entry because:<br>' . mysqli_error($dbc) . '.</p><p>The query being run was: ' . $query . '</p>';}

            mysqli_close($dbc);
        }
       }

   ?>

 <form class="form-inline"action="index.php"method="post" enctype="multipart/form-data">
 <div class="jumbotron text-center">
     <div class="form-group">

       <h2 style="font-style: italic;">To Do List</h2>
       <p style="  font-size: 16px;  font-style: italic;">plan your work and work your plan</p>
     <label>Task : </label>

     <input class="form-control input-lg" type="text" name="activity" size="80" value="<?php if (isset($_POST['activity']))?>">
     <input  class="btn btn-info" type="submit" name="submit" value="Add">

     </div>
 </div>

</form>


<?php include'myList.php';

 ?>


  </body>
</html>
