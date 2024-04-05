<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <style>
        * {
            margin: 0;
            padding: 0;
        }

        body {
            background: url('images/ct_Us.jpg');
            background-repeat: no-repeat;
            background-size: cover;
            background-position: center;
            height: 100vh;
            /* width: 100%; */
        }

        .cont {
            color: white;
            pposition: static;
            margin-top: 200px;
        }

        .sect1,
        .sect2 {
            width: 40%;
            border: 2px solid white;
            height: 90%;

        }

        .section {
            width: 90%;
            height: 80vh;
            margin: 20px;
            border: 2px solid green;
            margin: auto;
            display: flex;
            flex-direction: row;
            align-items: center;
            justify-content: center;
        }

        .header {
            width: fit-content;
            margin: auto;
        }

        .inf {
            border: 2px sollid red;
            margin: 30px 20px;
            height: 100%;
        }

        .header2 {
            margin-left: 20px;
        }
    </style>
</head>

<body>
    <?php
    include 'navBar.php';
    ?>
    <!-- MainCont -->
    <Div class="cont">
        <div class="section">
            <div class="sect1">
                <h1 class="header">
                    CONTACT US
                </h1>
                <div class="inf">
                    <p class="para1">We love hearing from fellow travelers and adventure seekers! Whether you have
                        questions about our
                        services, need assistance with bookings, or simply want to share your travel experiences, feel
                        free to reach out to us. Our dedicated team is here to help and ensure that your journey is
                        smooth and unforgettable.</p>
                    <div class="reachUs">
                        <h3 class="header2">How to Reach Us</h3>
                        <li>
                            <stromg>Email: </strong>sahilsadekar249775@gmail.com
                        </li>
                        <li>
                            <strong>Phone:</strong> 9850190625
                        </li>
                        <li>
                            <stromg>Address: </strong>yet to be defined...
                        </li>

                    </div>
                </div>

            </div>
            <div class="sect2">
               
            </div>
        </div>
    </Div>
</body>

</html>