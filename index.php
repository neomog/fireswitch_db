<!doctype html>
<html lang="en">
  <head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- Bootstrap CSS -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.1/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-+0n0xVW2eSR5OomGNYDnhzAbDsOXxcvSN1TPprVMTNDbiYZCxYbOOl7+AMvyTG2x" crossorigin="anonymous">

    <style type="text/css">
      .container {
        width: 80%;
        margin: 0 auto;
      }

      .dev-img {
        width: 50px;
        height: 50px;
        border-radius: 50%;
      }

      .del-btn {
        display: inline-block;
      }
    </style>

    <title>FireSwitch DB</title>
  </head>
  <body class="container">

    

    <h1>FireSwitch DB</h1>

    <a href="new.php" class="btn btn-success">Add Developer</a>
    <table class="table">
  <thead>
    <tr>
      <th scope="col">#</th>
      <th scope="col">Image</th>
      <th scope="col">Firstname</th>
      <th scope="col">Lastname</th>
      <th scope="col">Position</th>
      <th scope="col">Salary</th>
      <th scope="col">Action</th>
    </tr>
  </thead>
  <tbody>

    <?php

    //connection to the database
    require_once("connect.php");

    //fetch items from the database
    $sql = "SELECT * FROM developers";

    

    if ($result = mysqli_query($link, $sql)) {
      if (mysqli_num_rows($result) > 0) {


        
          // var_dump($person);
        
       // echo "Hello world";

       // while ($row = mysqli_fetch_array($result)) {

       foreach ($result as $key => $person) { ?>

          <tr>
      <th scope="row"><?php echo $key + 1 ?></th>
      <td>
        <img src="<?php echo $person['image'] ?>" class="dev-img">
      </td>
      <td><?php echo $person['firstname'] ?></td>
      <td><?php echo $person['lastname'] ?></td>
      <td><?php echo $person['position'] ?></td>
      <td>$<?php echo $person['salary'] ?></td>
      <td>
        <a href="edit.php?id=<?php echo $person['id'] ?>" class="btn btn-sm btn-outline-primary" type="button">Edit</a>
        <form class="del-btn" action="delete.php" method="post">
          <input type="hidden" name="id" value="<?php echo $person['id'] ?>">
          <button type="submit" class="btn btn-sm btn-outline-danger">Delete</button>
        </form>
        
      </td>
    </tr>

        <?php
         
       }
      } else { ?>
      <tr>
              <td colspan="7">No Data Found</td>
        </tr>
       <?php }  } ?>
     
         
      

    
    
  </tbody>
</table>

  
  </body>
</html>