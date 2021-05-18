<?php 

    require_once("connect.php");


    $image = $imagePath = $firstname = $lastname = $position = $salary = "";
    $firstnameerr = $lastnameerr = $positionerr = $salaryerr = "";

    // echo "<pre>";
    // var_dump($_FILES);
    // echo "</pre>";

    if (!is_dir('images')) {
      mkdir('images');
    }

    // echo "<pre>";
    //   var_dump($_FILES);
    //   echo "</pre>";
    //   exit;


      


    if ($_SERVER["REQUEST_METHOD"] == "POST") {




      $input_firstname = trim($_POST["firstname"]);
      if (empty($input_firstname)) {
        $firstnameerr = "Please enter your firstname";
      } else {
        $firstname = $input_firstname;
      }


      $input_lastname = trim($_POST["lastname"]);
    if (empty($input_lastname)) {
      $lastnameerr = "Please enter your lastname";
    } else {
      $lastname = $input_lastname;
    }

    $input_position = trim($_POST["position"]);
    if (empty($input_position)) {
      $positionerr = "Please enter your position";
    } else {
      $position = $input_position;
    }

    $input_salary = trim($_POST["salary"]);
    if (empty($input_salary)) {
      $salaryerr = "Please enter your salary";
    } else {
      $salary = $input_salary;
    }

    }






    //////////////////////////////////
    if (!empty($firstname) && !empty($lastname) && !empty($position) && !empty($salary)) {
      $image = $_FILES["image"] ?? null;

      if ($image && $image['tmp_name']) {

        $imagePath = 'images/'.randomString(8).'/'.$image['name'];
        mkdir(dirname($imagePath));

        move_uploaded_file($image["tmp_name"], $imagePath);
      }
      
      $sql = "INSERT INTO developers (image, firstname, lastname, position, salary) VALUES ('$imagePath', '$firstname', '$lastname', '$position', '$salary')";

      
      // echo "<pre>Debug: $sql</pre>\m";

$result = mysqli_query($link, $sql);

      if ($result) {
        // printf("error: %s\n", mysqli_error($link));
        header("location: index.php");
          exit;
      } else {
        // echo "done";
      }

    }

    function randomString($n) {
      $characters = '0123456789abcdefghijklmnopqrstuvwxyzABCDEFGHIJKLMNOPQRSTUVWXYZ';

      $str = '';

      for ($i = 0; $i < $n; $i++) { 
        $index = rand(0, strlen($characters) - 1);

        $str .= $characters[$index];
      }

      return $str;
    }



    ?>

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
    </style>

    <title>FireSwitch DB</title>
  </head>
  <body class="container">




    <h1>FireSwitch DB</h1>

    <a href="index.php">Back home</a>
<form action="" method="post" enctype="multipart/form-data">
  <div class="mb-3">
    <label>Image</label>
    <input type="file" name="image">
    <div id="emailHelp" class="form-text"></div>
  </div>

  <div class="mb-3">
    <label>Firstname</label>
    <input type="text" class="form-control" name="firstname" value="<?= $firstname; ?>">
    <div id="emailHelp" class="form-text"><?= $firstnameerr; ?></div>
  </div>

  <div class="mb-3">
    <label>Lastname</label>
    <input type="text" class="form-control" name="lastname" value="<?= $lastname; ?>">
    <div id="emailHelp" class="form-text"><?= $lastnameerr; ?></div>
  </div>

  <div class="mb-3">
    <label>Position</label>
    <input type="text" class="form-control" name="position" value="<?= $position; ?>">
    <div id="emailHelp" class="form-text"><?php echo $positionerr; ?></div>
  </div>

  <div class="mb-3">
    <label>Salary</label>
    <input type="number" class="form-control" name="salary" value="<?= $salary; ?>">
    <div id="emailHelp" class="form-text"><?= $salaryerr; ?></div>
  </div>
  
  <input type="submit" class="btn btn-primary" value="submit">
</form>

  
  </body>
</html>