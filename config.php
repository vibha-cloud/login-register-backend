<!-- This file contains the database configurations assuming you are running mysql using user "root" and password "" -->
<?php
    // session_start();
    $db_server = "localhost";
    $db_user = "root";
    $db_password = "";
    $db_name = "loginreg";

    // try connecting to the database
    $conn = mysqli_connect($db_server, $db_user, $db_password, $db_name);

    if (!$conn) {
        die("Failed to connect".mysqli_connect_error());
    }
?>