<!DOCTYPE html>
<html lang="en" dir="ltr">
  <head>
    <meta charset="utf-8">
    <title>my List</title>
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/css/bootstrap.min.css">
  </head>
  <body>


    <?php
            $dbc = mysqli_connect('localhost','root','','todo');
            $query = "SELECT * FROM list";
             if($x=mysqli_query($dbc, $query)){



               while($row = mysqli_fetch_array($x)){
                 echo"
                 <div class=\"container\">
                 <table class=\"table\">
                     <tr class=\"info\">
                       <td>".$row['activity']."</td>
                       <td class=\"text-end\"><a href='myList.php?myid=$row[id]'>Delete</a></td>
                     </tr>

                   </table>
                   </div>


                   " ;
                   }
                 }



             else {
              print '<p>Could not retrieve the data because:<br>' . mysqli_error($dbc) . '.</p><p>The query being run was: ' . $query . '</p>';
             }


// Deleting a task ---------------------------------------------------------------------------------------------
             if(isset($_GET['myid'])){

               $id=$_GET['myid'];
               $query = "DELETE FROM list WHERE id=$id LIMIT 1";
               $r = mysqli_query($dbc, $query);
               header('location: index.php');}
//------------------------------------------------------------------------------------------------------------

             ?>



  </body>
</html>
