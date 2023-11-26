<!-- To print all the contents of the table: -->

<?php
    include "config.php";

    $sql = "SELECT * FROM user";
    $result = mysqli_query($conn, $sql);

    if (mysqli_num_rows($result) > 0) {

        echo "<table>";
        echo "<tr> <th> Name </th> <th> Email </th> <th> Password </th> </tr>";
        while ($row = mysqli_fetch_assoc($result)) {
            echo "<tr> <td>" .$row["name"]. "</td> <td>" .$row["email"]. "</td> <td>" .$row["password"]. "</td> </tr>";
        }

        echo "</table>";
    }
    else {
        echo "No data found.";
    }
?>