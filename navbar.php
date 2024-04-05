<!DOCTYPE html>
<html lang="en">

<head>
    <?php
    @session_start();
    if (isset($_SESSION['userName'])) {
        $sessionUname = $_SESSION['userName'];
    } else {
        $sessionUname = "Please login";
        echo '<script>';
        echo 'document.addEventListener("DOMContentLoaded", function() {';
        echo '    var signInModal = new bootstrap.Modal(document.getElementById("sign_inModal"));';
        echo '    signInModal.show();';
        echo '    var closeButton = document.querySelector("#sign_inModal .btn-close");';
        echo '    if (closeButton) closeButton.style.display = "none";'; // Hide close button if it exists
        echo '});';
        echo '</script>';
    }
    include "subdir/Signupmodal.php";
    include "subdir/sign_inModal.php";
    ?>

    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.3/css/all.min.css">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/css/bootstrap.min.css">
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha3/dist/js/bootstrap.bundle.min.js
    "></script>
    <meta charset="UTF-8">
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <style>
        * {
            margin: 0;
            padding: 0;
        }

        .ulGrp {}

        .containerNav {
            display: flex;
            align-items: center;
            position: fixed;
            top: 0;
            left: 0;
            width: 100%;
            z-index: 2;
        }

        .containerNav ul li {
            list-style: none;
            font-size: 1.3rem;
            z-index: 200;
            font-size: 1.3rem;
        }

        .containerNav ul li a {
            display: block;
            padding: 2px 8px;
            border-radius: 20px;
            text-decoration: none;
            color: white;
            z-index: 200;
            font-size: 1.6rem;


        }

        .containerNav ul li a:hover {
            color: black;
            background-color: white;

        }

        .containerNav::before {

            content: "";
            background-color: black;
            position: absolute;
            height: 100%;
            width: 100%;
            z-index: -1;
            opacity: 0.4;
            /* top:0px; */


        }

        .containerNav ul {
            display: flex;
            margin: 0;
            align-items: center;
            justify-content: center;
        }

        #logo {
            margin: 10px 20px;
            z-index: 200;

        }

        #logo img {
            /* margin: 10px 20px; */
            height: 100px;

        }

        .containerSignupdetails {
            position: absolute;
            right: 30px;
        }

        .uname {
            position: static;
            right: 0;
            color: white;
        }

        .search {
            width: 400px;
            border-radius: 20px;
            margin: 10px;
            /* padding: 8px; */
            text-align: center;
            background-color: rgb(255, 255, 255, 0);
            color: white;
            border: 2px solid white;
        }

        .authenticate {
            height: 40px;
        }
    </style>
</head>

<body>
    <nav class="containerNav">
        <div id="logo" onclick="Home.php">
            <img id="image" src="logo.png" alt="unable to fetch image">
        </div>

        <ul class="ulGrp">
            <li class="item "><input placeholder="search items...." class="search" type="text"></li>
            <li class="item"><a href="Home.php">Home</a></li>
            <li class="item"><a href="aboutUs.php">About Us</a></li>
            <li class="item"><a href="contactUs.php">Contact Us</a></li>
            <li class="item"><a href="Bookings.php">My Packages</a></li>
            <!-- <li class="item"><a href="Register.php">Plan My Tour</a></li> -->
            <!-- <li class="item"><a href="Register.php">Plan my trip</a></li> -->
            <li class="item"><a href="#">Feedback</a></li>
            <li class="item">
                <form class="authenticate" action="redirect.php" method="post">

                    <div class="containerSignupdetails">
                        <button type="button" data-bs-backdrop="static" class="btn btn-primary" data-bs-toggle="modal"
                            data-bs-target="#sign_inModal" data-bs-whatever="@mdo">Log In</button>
                        <button type="button" class="btn btn-primary" data-bs-toggle="modal"
                            data-bs-target="#exampleModal" data-bs-whatever="@fat">Sign Up</button>
                        <form action="redirect.php" method="post"> <button name="log_out" type="submit"
                                class="btn btn-primary" data-bs-toggle="modal" data-bs-target=""
                                data-bs-whatever="@getbootstrap">Log Out</button>
                            <div class="uname">
                                Username:
                                <?php echo $sessionUname; ?>
                            </div>
                    </div>
                </form>
            </li>


        </ul>
    </nav>



    <script>

    </script>
</body>

</html>