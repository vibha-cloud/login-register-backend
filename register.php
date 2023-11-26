<!-- To register: -->

<?php
    include("config.php");

    if($_SERVER["REQUEST_METHOD"] == "POST") {
        if (isset($_POST["submit"])) {

            $name = $_POST["name"];
            $email = $_POST["email"];
            $password = $_POST["password"];
            $confirmPassword = $_POST["confirmPassword"];

            $sql = "SELECT * FROM user WHERE email = '$email'";
            $duplicate = mysqli_query($conn, $sql);
            if (mysqli_num_rows($duplicate) > 0) {
              echo "<script> alert('This email has already been registered.'); </script>";
            }
            else {
                if ($password != $confirmPassword) {
                    echo "<script> alert('Password does not match.'); </script>";
                }
                
                else {
                    $query = "INSERT INTO user (name, email, password) VALUES ('$name', '$email', '$password')";
                    $result = mysqli_query($conn, $query);
                    
                    if ($result) {
                        echo "<script> alert('Registration Successful.'); </script>";
                        header("Location: home.html");
                    }
                    else {
                        echo "Error";
                    }
                }
            }
        }
    }
?>


<!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="UTF-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <title>Register</title>
    <link
      rel="stylesheet"
      href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.2/css/all.min.css"
    />
    <link rel="stylesheet" href="style.css" />
  </head>
  <body>
    <div class="main-container">
      <h2>Register</h2>
      
      <form action="#" method="post">
        <div class="input-field">
          <input
            type="text"
            placeholder="Full name"
            name="name"
            value=""
            required
          />
          <span class="icon2"><i class="fa-solid fa-user"></i></span>
        </div>

        <div class="input-field">
          <input
            type="email"
            placeholder="Email"
            name="email"
            value=""
            required
          />
          <span class="icon2"><i class="fa-solid fa-envelope"></i></span>
        </div>

        <div class="input-field">
          <input
            type="password"
            placeholder="Create password"
            maxlength="12"
            name="password"
            value=""
            required
          />
          <span class="icon2"><i class="fa-solid fa-unlock"></i></span>
        </div>

        <div class="input-field">
          <input
            type="password"
            placeholder="Confirm password"
            maxlength="12"
            name="confirmPassword"
            value=""
            required
          />
          <span class="icon2"><i class="fa-solid fa-lock"></i></span>
        </div>

        <div class="terms-box">
          <input type="checkbox" required />
          <p>I agree to the terms & conditions</p>
        </div>

        <button type="submit" class="btn" name="submit">Register</button>

        <div class="login-register-option">
          <p>Already have an account?</p>
          <a href="index.php">Sign In</a>
        </div>
      </form>
    </div>
  </body>
</html>
