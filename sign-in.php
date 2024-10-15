<?php
include('auth.php');
$message = "";
if (isset($_POST["sign-in"])) {
  $_SESSION["usernameOrEmail"] = mysqli_escape_string($ecw->link, $_POST['usernameOrEmail']);
  $_SESSION["password"] = mysqli_escape_string($ecw->link, $_POST['password']);

  $loggedIn = json_decode($ecw->logIn($_SESSION["usernameOrEmail"], "users_info_table"));
 
  if ($loggedIn) {
    $message = "LogIn Successful!!";
    header("location: index.php");
  } else {
    $message = "Invalid Email/Password";
  }
}
?>



<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Sign-In</title>
  <link rel="stylesheet" href="auth/sign-up-in.css">
  <link rel="stylesheet" href="assests/css/style.css">
  <link rel="stylesheet" href="auth/sign-in.css">
</head>

<body>

  <section id="create">
    <!-- <header >  </header> -->
    <div> <img src="assests/images/logo-main.png" alt="logo" id="logo-acct"></div>


    <main>

      <form action="" method="post">
        <h2>Log In</h2><span style="color: green;"><?php echo $message; ?></span>
        <div class="form-group">
          <input type="text" id="email" name="usernameOrEmail" placeholder="Enter your Email/Username" required />
        </div>

        <div class="form-group">
          <input type="password" id="ps" name="password" placeholder="Enter your password" required />
        </div>

        <button type="submit" name="sign-in">Sign In</button>
      </form>
      <h4>Don't have an account? <a href="sign-up.php">Register</a></h4>
  </section>
  </main>

  <footer>
    <p>Copyright &copy; 2023 <a href="index.php"> Easy Shop </a></p>
  </footer>

</body>

</html>