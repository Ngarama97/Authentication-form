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
  <h1>Welcome at Mohamed's First Page</h1>

  <h3>Please register or login for More!</h3>

  <p>
  <?php
    if(isset($_SESSION['error']) && !empty($_SESSION['error'])){
      echo $_SESSION['error'];

      session_unset();
    }
  ?>
  </p>

  <form action="info.php" method="POST">
    <input type="text" name="email" placeholder="Email" ><br>
    <input type="password" name="password" placeholder="password"><br>

    <button style="background-color:#dbf6e9;" type="submit" name="register">Register</button>

    <p>
      Already a member? <a href="loginpage.php">Login</a>
    </p>

  </form>

</body>

</html>