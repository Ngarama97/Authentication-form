<?php
  session_start();

?>

<!DOCTYPE html>
<html>

<head>
  <meta charset="UTF-8">
  <title>title</title>
</head>

<body>
  <h1>Welcome at Mohamed's Login page</h1>

  <h3>login for More!</h3>

  <p>
  <?php
    if(isset($_SESSION['error']) && !empty($_SESSION['error'])){
      echo $_SESSION['error'];

      session_unset();
    }
  ?>
  </p>

  <form action="loginprocess.php" method="POST">
    <input type="text" name="email" placeholder="Email" ><br>
    <input type="password" name="password" placeholder="password"><br>

    <button style="background-color:#dbf6e9;" type="submit" name="register">Login</button>

    <p>
      Don't have account? <a href="registerpage.php">Sign Up!</a><br>
      <h4 style="color: blue;">
      Forgot Password?
      <a href="reset.php">Reset Password</a>
      
      </h4>
    </p>

  </form>

</body>

</html>