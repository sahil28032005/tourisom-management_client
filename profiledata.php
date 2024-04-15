<!DOCTYPE html>
<html lang="en">
<?php
session_start();
if (!isset($_SESSION['userName'])) {
    // User is not logged in, redirect to login page
    header("Location: navbar.php");
    exit(); // Stop further execution
} else {
    include "db_connection.php";
    $username = $_SESSION['userName'];
}
?>


<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <style>
        .profCont {
            border: 2px solid red;
            margin-top: 200px;
            display: flex;
            flex-direction: rows;
            align-items: center;
            justify-content: center;
            padding: 20px;
        }

        .left,
        .right {
            border: 2px solid yellow;
            padding: 20px;
            margin: 20px;
        }
    </style>
</head>

<body>
    <?php
    include 'navbar.php';
    ?>
    <div class="profCont">
        <div class="left">
            <?php

            $sql = "SELECT name, type, data FROM `sign_up_details` where username='" . $username . "'";
            $result = mysqli_query($con, $sql);
            if (mysqli_num_rows($result) > 0) {
                // echo "mew mew";working
                while ($row = mysqli_fetch_assoc($result)) {
                    echo '<img src="data:' . $row["type"] . ';base64,' . base64_encode($row["data"]) . '" />';
                }

            } else {
                "hmmmm";
            }
            ?>
        </div>
        <div class="right">
            <?php
            $sql = "SELECT username,email FROM `sign_up_details` where username='" . $username . "'";
            $result = mysqli_query($con, $sql);
            if ($result) {
               while($res=mysqli_fetch_assoc($result)) {
                $userProf=$res['username'];
                $profemail=$res['email'];
               }
            } else {
                echo "something went wrong";
            }
            ?>
            <h4>UserName:</h4><?php echo $userProf ?>
            <h4>UserName:</h4><?php echo $profemail ?>
        </div>
    </div>
</body>

</html>