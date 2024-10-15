<?php
include('auth.php');
$message = "";
if (isset($_POST["register"])) {
    $_SESSION["username"] = mysqli_escape_string($ecw->link, $_POST['un']);
    $_SESSION["email"] = mysqli_escape_string($ecw->link, $_POST['email']);
    $_SESSION["password"] = mysqli_escape_string($ecw->link, $_POST['password']);
    $_SESSION["mobile_num"] = mysqli_escape_string($ecw->link, $_POST['number']);

    // Use the verifyRecord function to check if the username or email already exists
    $verifyResult = json_decode($ecw->verifyRecord($_SESSION["username"], $_SESSION["email"], 'users_info_table'), true);

    // Check if the user already exists
    if ($verifyResult) {
        $message = $verifyResult['message'];  // Output the message from the verifyRecord function
    } else {

    // INSERT THE USERS INFO INTO THE TABLE
    $query = "INSERT INTO users_info_table(username, email, password, mobile_number)";
    $query .= "VALUES('" . $_SESSION["username"] . "', '" . $_SESSION["email"] . "', '" . $_SESSION["password"] . "',
     '" . $_SESSION["mobile_num"] . "')";
    $user = mysqli_query($ecw->link, $query);
     if ($user) {
        $message = "Registration Successful!!";
     } else {
        $message = "An Error Occurred!!";
     }
    }
}
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Sign-Up</title>
    <link rel="stylesheet" href="auth/sign-up-in.css">
    <link rel="stylesheet" href="assests/css/style.css">
</head>

<body>

    <section id="create">
        <!-- <header >   </header> -->
        <div> <img src="assests/images/logo-main.png" alt="logo" id="logo-acct"></div>

        <main>
            <form action="" method="post">
                <h2>Create an account</h2> <span style="color: green;"><?php echo $message; ?></span>
                <div class="form-group">
                    <input type="text" id="username" name="un" placeholder="UserName" required />
                </div>

                <div class="form-group">
                    <input type="email" id="mail" name="email" placeholder="Email" required />
                </div>

                <div class="form-group">
                    <input type="password" id="pw" name="password" placeholder="Password" required />
                </div>

                <div class="form-group">
                    <input type="text" id="no" name="number" placeholder="Mobile Number" required />
                </div>

                <button type="submit" name="register"> Register </button>
            </form>
           
            <h4>Already have an account? <a href="sign-in.php">Login</a></h4>
    </section>
    </main>

    <footer>
        <p>Copyright &copy; 2023 <a href="index.php"> Easy Shop </a></p>
    </footer>

</body>

</html>