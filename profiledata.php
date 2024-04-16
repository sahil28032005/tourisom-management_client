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
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet"
        integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">
    <style>
        /* Resetting default margin and padding */
        * {
            margin: 0;
            padding: 0;
            box-sizing: border-box;
        }

        body {
            font-family: Arial, sans-serif;
            background-color: #f5f5f5;
            color: #333;
        }

        .container {
            max-width: 800px;
            margin: 200px auto;
            background-color: #fff;
            border-radius: 8px;
            box-shadow: 0 2px 5px rgba(0, 0, 0, 0.1);
            padding: 20px;
        }

        .profile-header {
            display: flex;
            align-items: center;
            margin-bottom: 20px;
        }

        .profile-header img {
            width: 100px;
            height: 100px;
            border-radius: 50%;
            object-fit: cover;
            margin-right: 20px;
        }

        .profile-header h1 {
            font-size: 24px;
            margin-bottom: 5px;
        }

        .profile-header p {
            font-size: 14px;
            color: #666;
            margin-bottom: 10px;
        }

        .profile-nav {
            display: flex;
            justify-content: space-between;
            margin-bottom: 20px;
        }

        .profile-nav a {
            text-decoration: none;
            color: #333;
            padding: 10px 20px;
            border-radius: 5px;
            transition: background-color 0.3s ease;
        }

        .profile-nav a:hover {
            background-color: #eee;
        }

        .profile-content {
            padding: 20px;
            background-color: #f9f9f9;
            border-radius: 8px;
        }

        .commonInf {
            margin-bottom: 10px;
            width: 100%;
            /* font-weight: bold; */
        }

        /* Responsive styles */
        @media (max-width: 768px) {
            .profile-header {
                flex-direction: column;
                text-align: center;
            }

            .profile-header img {
                margin-right: 0;
                margin-bottom: 10px;
            }

            .profile-nav {
                flex-direction: column;
            }

            .profile-nav a {
                margin-bottom: 10px;
            }
        }

        .popup-form {
            display: none;
            position: fixed;
            top: 50%;
            left: 50%;
            transform: translate(-50%, -50%);
            background-color: #fff;
            padding: 20px;
            border: 1px solid #ccc;
            box-shadow: 0px 0px 10px rgba(0, 0, 0, 0.2);
            z-index: 1000;
        }

        .overlay {
            display: none;
            position: fixed;
            top: 0;
            left: 0;
            width: 100%;
            height: 100%;
            background-color: rgba(0, 0, 0, 0.5);
            z-index: 900;
        }
    </style>
</head>

<body>
    <?php
    include 'navbar.php';
    ?>
    <div class="container">
        <div class="profile-header">

            <?php
            $sql = "SELECT * FROM sign_up_details
           WHERE username = '$username'";
            $result = mysqli_query($con, $sql);
            if ($result && mysqli_num_rows($result) > 0) {
                // Fetch the first row from the result set
                // echo "success";until done further proceed
                $row = mysqli_fetch_assoc($result);
                $userName=$row['username'];
                $useremail=$row['email'];
                $dataReg=$row['date'];
                // echo "$userName $useremail $dataReg";

            } else {
                echo "No records found.";
            }
            ?>

            <img src="data:<?php echo $row['type']; ?>;base64,<?php echo base64_encode($row['data']); ?>"
                alt="Profile Image">
            <div>
                <h1></h1>
                <p>Welcome User</p>
                <button type="button" class="btn btn-success btnUpdate">Update Profile</button>
            </div>
            <div>
                <form method="post" action="redirect.php">
                    <button type="submit" name="log_out" class="btn btn-danger mx-3">Log Out</button>
                </form>

            </div>

        </div>

        <div class="profile-nav">
            <a href="#">Overview</a>
            <a href="#">Posts</a>
            <a href="#">Projects</a>
            <a href="#">Settings</a>
        </div>

        <div class="profile-content">
            <h4 style="color:red;">Profile Information:</h4>
            <h5 class="commonInf"><strong>Username:</strong> <?php echo $userName; ?></p>
                <p class="commonInf"><strong>User Email:</strong> <?php echo $useremail; ?></p>
                <p class="commonInf"><strong>Registration Date:</strong> <?php echo $dataReg; ?></p>
                <!-- <p class="commonInf">Email: <?php echo $email; ?></p>
                <p class="commonInf">Contact No: <?php echo $contactNo; ?></p> -->
        </div>
    </div>
    <div id="popupForm" class="popup-form">
        <form action="redirect.php" method="post" enctype="multipart/form-data">
            <div class="form-group">
                <label for="name">Firstname:</label>
                <input name="firstname" type="text" class="form-control" id="name" placeholder="Enter your name">
            </div>
            
            <div class="form-group">
                <label for="name">Gender:</label>
                <input name="gender" type="radio" name="gender" value="m" checked>Male<br>
                <input name="gender" type="radio" name="gender" value="f">Female<br>
            </div>
            <div class="form-group">
                <label for="email">Email:</label>
                <input name="email" type=" email" class="form-control" id="email" placeholder="Enter your email">
            </div>
            <div class="form-group">
                <label for="name">Contact:</label>
                <input name="contact" type="text" class="form-control" id="name" placeholder="Enter your name">
            </div>
            <div class="form-group">
                <label for="name">Profile Picture:</label>
                <input type="file" name="fileToUpload" id="fileToUpload">
            </div>
            <button type="submit" name="profileUpdate" class="btn btn-primary">Submit</button>
        </form>
    </div>
    </div>

    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.11.8/dist/umd/popper.min.js"
        integrity="sha384-I7E8VVD/ismYTF4hNIPjVp/Zjvgyol6VFvRkX/vR+Vc4jQkC+hVqc2pM8ODewa9r"
        crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.min.js"
        integrity="sha384-0pUGZvbkm6XF6gxjEnlmuGrJXVbNuzT9qBBavbLwCsOGabYfZo0T0to5eqruptLy"
        crossorigin="anonymous"></script>
    <script>
        document.addEventListener("DOMContentLoaded", function () {
            const btnUpdate = document.querySelector(".btnUpdate");
            const popupForm = document.getElementById("popupForm");
            const overlay = document.createElement("div");
            overlay.classList.add("overlay");

            btnUpdate.addEventListener("click", function () {
                popupForm.style.display = "block";
                document.body.appendChild(overlay);
                overlay.style.display = "block";
            });

            overlay.addEventListener("click", function () {
                popupForm.style.display = "none";
                overlay.style.display = "none";
            });
        });

    </script>
    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.11.8/dist/umd/popper.min.js"
        integrity="sha384-I7E8VVD/ismYTF4hNIPjVp/Zjvgyol6VFvRkX/vR+Vc4jQkC+hVqc2pM8ODewa9r"
        crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.min.js"
        integrity="sha384-0pUGZvbkm6XF6gxjEnlmuGrJXVbNuzT9qBBavbLwCsOGabYfZo0T0to5eqruptLy"
        crossorigin="anonymous"></script>
</body>

</html>