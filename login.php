<!DOCTYPE html>
<html>
<?php
session_start();
?>

<head>
  <meta charset="UTF-8">
  <title>Recamadas Optical Clinic</title>
  <meta content='width=device-width, initial-scale=1, maximum-scale=1, user-scalable=no' name='viewport'>
  <!-- bootstrap 3.0.2 -->
  <link href="css/bootstrap.min.css" rel="stylesheet" type="text/css" />
  <!-- Theme style -->
  <link href="css/AdminLTE.css" rel="stylesheet" type="text/css" />
  <link rel="icon" href="img/logo1.ico" type="image/x-icon">

</head>

<body class="skin-black">
  <div class="container" style="margin-top:30px">
    <div class="col-md-4 col-md-offset-4">
      <div class="panel panel-default">
        <div class="panel-heading" style="text-align:center;">
          <!-- <img src="img/logo.png" style="height:100px;" /> -->
          <img src="img/logo-recamadas.png" style="height:75px;" />
          <!-- <h3 class="panel-title">
            <strong>
              Recamadas Optical Clinic
            </strong>
          </h3> -->
        </div>
        <div class="panel-body">
          <form role="form" method="post">
            <div class="form-group">
              <label for="txt_username">Username</label>
              <input type="text" class="form-control" style="border-radius:0px" name="txt_username"
                placeholder="Enter Username">
            </div>
            <div class="form-group">
              <label for="txt_password">Password</label>
              <input type="password" class="form-control" style="border-radius:0px" name="txt_password"
                placeholder="Enter Password">
            </div>
            <button type="submit" class="btn btn-sm btn-primary" name="btn_login">Log in</button>
            <label id="error" class="label label-danger pull-right"></label>
          </form>
        </div>
      </div>
    </div>
  </div>

  <?php
  include "pages/connection.php";
  if (isset($_POST['btn_login'])) {
    $username = $_POST['txt_username'];
    $password = $_POST['txt_password'];


    $admin = mysqli_query($con, "SELECT * from tbluser where username = '$username' and password = '$password' and role = 'administrator' ");
    $numrow_admin = mysqli_num_rows($admin);


    if ($numrow_admin > 0) {
      while ($row = mysqli_fetch_array($admin)) {
        $_SESSION['role'] = "Administrator";
        $_SESSION['userid'] = $row['id'];
        $_SESSION['username'] = $row['username'];
      }
      header('location: pages/dashboard/dashboard.php');
    } else {
      echo '<script type="text/javascript">document.getElementById("error").innerHTML = "Invalid Account";</script>';

    }

  }

  ?>

</body>

</html>