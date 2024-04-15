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

        .hamBurger {
            margin: 10px;
            display: none;
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

        @media only screen and (max-width: 1501px) {
            .containerNav {
                /* background-color: green; */
                /* flex-wrap: wrap; */
            }

            .containerNav ul li a {
                font-size: 22px;
            }
        }

        @media only screen and (max-width: 1418px) {
            .containerNav {
                /* background-color: red; */
                /* flex-wrap: wrap; */
            }

            .containerNav ul li a {
                font-size: 15px;
            }
        }

        @media only screen and (max-width: 1270px) {
            .containerNav {
                /* background-color: blue; */
            }

            .containerNav ul li a {
                font-size: 15px;
            }

            .search {
                width: 329px;
            }
        }

        @media only screen and (max-width: 1187px) {
            .containerNav {
                /* background-color: pink; */
                /* flex-wrap: wrap; */
            }

            .containerNav ul li a {
                font-size: 15px;
            }

            .search {
                width: 200px;
            }
        }

        @media only screen and (max-width: 1057px) {
            .containerNav {
                /* background-color: blueviolet; */
                /* flex-wrap: wrap; */
            }

            .containerNav ul li a {
                font-size: 15px;
            }

            .search {
                width: 150px;
            }

            #logo img {
                height: 72px;
            }
        }

        @media only screen and (max-width: 1001px) {
            .containerNav {
                /* background-color: yellow; */
                /* flex-wrap: wrap; */
                height: 80px;
            }

            .containerNav ul li a {
                font-size: 9px;
            }

            .search {
                width: 79px;
                font-size: 13px;
            }

            #logo img {
                height: 72px;
            }

            .btn-primary {
                height: 34px;
                width: 51px;
                font-size: 9px;
            }

            .uname {
                font-size: 15px;
            }
        }


        @media only screen and (max-width: 1001px) {
            .containerNav {
                display: none;
            }

            .hamBurger {
                display: block;
            }


        }

        /* sidenav css */
        /* The side navigation menu */


        .sidenav {
            display: flex;
            flex-direction: column;
            align-items: center;
            justify-content: center;
            height: 100%;
            /* 100% Full-height */
            width: 0;
            /* 0 width - change this with JavaScript */
            position: fixed;
            /* Stay in place */
            z-index: 2;
            /* Stay on top */
            top: 0;
            /* Stay at the top */
            left: 0;
            background-color: #111;
            /* Black*/
            overflow-x: hidden;
            /* Disable horizontal scroll */
            padding-top: 60px;
            /* Place content 60px from the top */
            transition: 0.5s;

            /* 0.5 second transition effect to slide in the sidenav */
        }

        /* The navigation menu links */
        .sidenav a {
            padding: 8px 8px 8px 32px;
            text-decoration: none;
            font-size: 25px;
            color: #818181;
            display: block;
            transition: 0.3s;
        }

        /* When you mouse over the navigation links, change their color */
        .sidenav a:hover {
            color: #f1f1f1;
        }

        /* Position and style the close button (top right corner) */
        .sidenav .closebtn {
            position: absolute;
            top: 0;
            right: 25px;
            font-size: 36px;
            margin-left: 50px;
        }

        /* Style page content - use this if you want to push the page content to the right when you open the side navigation */
        #main {
            transition: margin-left .5s;
            padding: 20px;
        }

        /* On smaller screens, where height is less than 450px, change the style of the sidenav (less padding and a smaller font size) */
        @media screen and (max-height: 450px) {
            .sidenav {
                padding-top: 15px;
            }

            .sidenav a {
                font-size: 18px;
            }
        }
    </style>
</head>

<body>
    <!-- sidenav starts here -->
    <div id="mySidenav" class="sidenav">
        <a href="javascript:void(0)" class="closebtn" onclick="closeNav()">&times;</a>
        <a href="index.php">Home</a>
        <a href="aboutUs.php">About</a>
        <a href="contactUs.php">Contact Us</a>
        <a href="Bookings.php">Packages</a>
        <a href="#">Feedback</a>
    </div>

    <!-- Use any element to open the sidenav -->
    <span class="hamBurger" onclick="openNav()">&#9776;</span>

    <!-- Add all page content inside this div if you want the side nav to push page content to the right (not used if you only want the sidenav to sit on top of the page -->

    <!-- sidenav ends here -->
    <nav class="containerNav">
        <div id="logo" onclick="index.php">
            <img id="image" src="logo.png" alt="unable to fetch image">
        </div>

        <ul class="ulGrp">
            <li class="item "><input placeholder="search items...." class="search" type="text"></li>
            <li class="item"><a href="index.php">Home</a></li>
            <li class="item"><a href="aboutUs.php">About Us</a></li>
            <li class="item"><a href="contactUs.php">Contact Us</a></li>
            <li class="item"><a href="Bookings.php">My Packages</a></li>
            <!-- <li class="item"><a href="Register.php">Plan My Tour</a></li> -->
            <!-- <li class="item"><a href="Register.php">Plan my trip</a></li> -->
            <li class="item"><a href="#">Feedback</a></li>



        </ul>
        <div class="item">
            <form class="authenticate" action="redirect.php" method="post">

                <div class="containerSignupdetails">
                    <button type="button" data-bs-backdrop="static" class="btn btn-primary" data-bs-toggle="modal"
                        data-bs-target="#sign_inModal" data-bs-whatever="@mdo">Log In</button>
                    <button type="button" class="btn btn-primary" data-bs-toggle="modal" data-bs-target="#exampleModal"
                        data-bs-whatever="@fat">Sign Up</button>
                    <form action="redirect.php" method="post"> <button name="log_out" type="submit"
                            class="btn btn-primary" data-bs-toggle="modal" data-bs-target=""
                            data-bs-whatever="@getbootstrap">Log Out</button>
                        <div class="uname">
                            Username:
                            <select id="profileDropdown">
                                <option value="username"><?php echo $sessionUname; ?></option>
                                <option value="profile" id="viewProfileOption">View Profile</option>
                            </select>
                        </div>
                </div>
            </form>
        </div>
    </nav>



    <script>
        document.getElementById("profileDropdown").addEventListener("change", function () {
            var selectedOption = this.options[this.selectedIndex].value;
            if (selectedOption === "profile") {
                window.location.href = "profiledata.php";
            }
        });
        function openNav() {
            document.getElementById("mySidenav").style.width = "416px";
            document.getElementById("main").style.marginLeft = "250px";
            document.body.style.backgroundColor = "rgba(0,0,0,0.4)";
        }

        /* Set the width of the side navigation to 0 and the left margin of the page content to 0, and the background color of body to white */
        function closeNav() {
            document.getElementById("mySidenav").style.width = "0";
            document.getElementById("mySidenav").style.height = "100%";
            document.getElementById("main").style.marginLeft = "0";
            document.body.style.backgroundColor = "white";
        }

    </script>
</body>

</html>