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
  <h3>Have You Forgotten Password!</h3>
  <p>
  <?php
    if(isset($_SESSION['error']) && !empty($_SESSION['error'])){
      echo $_SESSION['error'];

      session_unset();
    }
  ?>
  </p>

  <form action="resetprocess.php" method="POST">
    <label for="email">Please enter your email to reset password!</label><br>
    <input type="text" name="email" placeholder="Email" ><br>
    
    <button style="background-color:#dbf6e9;" type="submit" name="reset">Reset</button>

    <p>
      Don't have account? <a href="registration.php">Sign Up!</a><br>
      <h4>
      Already have account? 
      <a href="login.php">Login Here!</a>
      
      </h4>
    </p>

  </form>

</body>

</html>