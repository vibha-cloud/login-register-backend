<!-- To change your current password: -->

<?php
    include("config.php");

    if(isset($_POST["submit"])) {
        $email = $_POST["email"];
        $currentPassword = $_POST["currentPassword"];
        $newPassword = $_POST["newPassword"];

        $sql = "SELECT * FROM user  WHERE email = '$email'";
        $result = mysqli_query($conn, $sql);

        if(mysqli_num_rows($result) > 0){
            $row = mysqli_fetch_assoc($result);
            if($currentPassword === $row['password']){
                $sql = "UPDATE user SET password = '$newPassword' WHERE email = '$email'";
                $result = mysqli_query($conn, $sql);

                if($result){
                    echo "<script> alert('Password changed successfully.'); </script>";
                }
                else{
                    echo "<script> alert('Error in changing password.'); </script>";
                }
            }
            else {
                echo "<script> alert('Incorrect password entered.'); </script>";
            }
        }    
        else {
            echo "<script> alert('User with the entered email not found.'); </script>";
        }
    }
?>

<!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="UTF-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <title>Change Password</title>
    <link
      rel="stylesheet"
      href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.2/css/all.min.css"
    />
    <link rel="stylesheet" href="style.css" />
    <style>
      body {
        background-image: url("green-bg.jpg");
      }
    </style>
  </head>
  <body>
    <div class="main-container">
      <h2>Change Password</h2>
      <a href="login.php"
        ><span class="icon3"><i class="fa-solid fa-xmark"></i></span
      ></a>

      <form action="#" method="post">
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
            placeholder="Current Password"
            name="currentPassword"
            value=""
            required
          />
          <span class="icon2"><i class="fa-solid fa-unlock"></i></span>
        </div>

        <div class="input-field">
          <input
            type="password"
            placeholder="New Password"
            name="newPassword"
            value=""
            required
          />
          <span class="icon2"><i class="fa-solid fa-lock"></i></span>
        </div>

        <button type="submit" name="submit" class="btn">Submit</button>
      </form>
    </div>
  </body>
</html>
