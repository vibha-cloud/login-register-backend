<!-- To login: -->
<?php
    include("config.php");

    if(isset($_POST["submit"])) {
        
      // if($_SERVER["REQUEST_METHOD"]=='POST') -->
        $usernameOrEmail = $_POST["usernameOrEmail"];
        $password = $_POST["password"];

        // from all the entities in the table check for the row where the curr sent email matches the entity
        $sql = "SELECT * FROM user WHERE name = '$usernameOrEmail' OR email = '$usernameOrEmail'";
        $result = mysqli_query($conn, $sql);
        // OR $result = $conn->query($sql); // slightly different syntax

        if (mysqli_num_rows($result) > 0) { // OR if($result->num_rows > 0)
           // agar database ke table mein pehle se ye entry h, toh usse $row mein store kr liya
            $row = mysqli_fetch_assoc($result); // OR $row = $result->fetch_assoc()
            // ye func result ko ek array ($row) mein tod deta h 
            // now check if the entered password is correct
            if ($row["password"] === $password) { 
                // $_SESSION["login"] = true;
                echo "<script> alert('Login Successful.'); </script>";
                header("Location: home.html"); // redirect to the home page of the website
            }
            else {
                echo "<script> alert('Incorrect password. Please try again.'); </script>";
            }
        }
        else {
            echo "<script> alert('User not registered.'); </script>";
        }
    }
    // mysqli_close($conn);
?>


<!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="UTF-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <title>Login</title>
    <link
      rel="stylesheet"
      href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.2/css/all.min.css"
    />
    <link rel="stylesheet" href="style.css" />
  </head>
  <body>
    <div class="main-container">
      <h2>Login</h2>
      
      <form action="#" method="post">
        <div class="input-field">
          <!-- <label for="">Username or Email: </label> -->
          <input
            type="text"
            placeholder="Username or Email"
            name="usernameOrEmail"
            value=""
            required
          />
          <span class="icon1"><i class="fa-solid fa-user"></i></span>
        </div>

        <div class="input-field">
          <!-- <label for="">Password: </label> -->
          <input
            type="password"
            placeholder="Password"
            maxlength="12"
            name="password"
            value=""
            required
          />
          <span class="icon1"><i class="fa-solid fa-lock"></i></span>
        </div>

        <div class="check-box">
          <div class="remember-box">
              <input type="checkbox"/>
              <p>Remember me</p>
            </label>
          </div>
          <a href="forget.html">Forgot Password</a>
        </div>

        <button type="submit" name="submit" class="btn">Login</button>

        <div class="login-register-option">
          <p>Don't have an account?</p>
          <a href="register.php">Sign Up</a>
        </div>
      </form>
    </div>
  </body>
</html>
