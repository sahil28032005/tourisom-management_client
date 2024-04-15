<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.0.0/dist/css/bootstrap.min.css"
        integrity="sha384-Gn5384xqQ1aoWXA+058RXPxPg6fy4IWvTNh0E263XmFcJlSAwiGgFAW/dAiS6JXm" crossorigin="anonymous">
    <script src="https://code.jquery.com/jquery-3.2.1.slim.min.js"
        integrity="sha384-KJ3o2DKtIkvYIK3UENzmM7KCkRr/rE9/Qpg6aAZGJwFDMVNA/GpGFF93hXpG5KkN"
        crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/popper.js@1.12.9/dist/umd/popper.min.js"
        integrity="sha384-ApNbgh9B+Y1QKtv3Rn7W3mgPxhU9K/ScQsAP7hUibX39j7fakFPskvXusvfa0b4Q"
        crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@4.0.0/dist/js/bootstrap.min.js"
        integrity="sha384-JZR6Spejh4U02d8jOt6vLEHfe/JQGiRRSQQxSfFWpi1MquVdAyjUar5+76PVCmYl"
        crossorigin="anonymous"></script>
    <style>
        * {
            margin: 0;
            padding: 0;
        }

        body {
            /* background: url('images/ct_Us.jpg'); */
            background-repeat: no-repeat;
            background-size: cover;
            background-position: center;
            height: 100vh;
            /* width: 100%; */
        }



        .cont {
            /* color: white; */
            position: absolute;
            top: 0;
            margin-top: 200px;
        }

        .sect1,
        .sect2 {
            width: 40%;
            /* border: 2px solid white; */
            height: 90%;

        }

        .section {
            width: 90%;
            height: 80vh;
            margin: 20px;
            /* border: 2px solid green; */
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
            /* border: 2px sollid red; */
            margin: 30px 20px;
            height: 100%;
        }

        .header2 {
            margin-left: 20px;
        }

        .formCt {
            /* border: 2px solid blue; */
            width: 90%;
            margin: auto auto;
            ;
        }

        .logoCt img {
            width: 100px;
            height: 100px;
            margin: 10px auto;
            border-radius: 50%;
        }

        .logoCt {
            width: 100%;
            display: flex;
            flex-direction: row;
            align-items: center;
            justify-content: center;
        }

        .mapCont {
            width: 70%;
            margin: 20px auto;
        }

        .pF {
            width: 100%;
            background-color: gray;
            padding: 30px;
        }

        .textArea {
            width: 450px;
            height: 50px;
        }

        .form-group {
            margin: 20px;
        }

        #video-bg {
            /* position: fixed; */
            top: 0;
            left: 0;
            width: 100%;
            min-height: 100%;

            z-index: -1;
            /* Place the video behind other content */
        }

        @media only screen and (max-width: 400px) {
            .cont {
                position: relative;
            }

            .section {
                flex-direction: column;
                height: max-content;
            }
            .sect1{
                width: fit-content;
            }
            .sect2{
                width: fit-content;
            }
            .textArea{
                width: 182px;
            }
        }
    </style>
</head>

<body class="root">
    <?php
    include 'navBar.php';
    ?>
    <!-- MainCont -->
    <div class="vidCon">
        <video autoplay muted loop id="video-bg">
            <source src="images/13240569-hd_1920_1080_24fps.mp4" type="video/mp4">
        </video>
    </div>

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
                <form class="formCt" action="redirect.php" method="POST">
                    <div class="logoCt form-group">
                        <img src="images/ctUslogo.avif" alt="">
                    </div>
                    <div class="form-group">
                        <!-- <label for="name">Enter Name</label> -->
                        <input name="name" type="text" class="form-control" id="exampleInputEmail1"
                            aria-describedby="emailHelp" placeholder="Enter Name">
                    </div>
                    <div class="form-group">
                        <!-- <label for="exampleInputEmail1">Email address</label> -->
                        <input name="email" type="email" class="form-control" id="exampleInputEmail1"
                            aria-describedby="emailHelp" placeholder="Enter email">
                    </div>
                    <div class="form-group">
                        <!-- <label for="subject">Subject</label> -->
                        <input name="subject" type="text" class="form-control" id="exampleInputPassword1"
                            placeholder="Subject">
                    </div>
                    <div class="">
                        <!-- <label for="subject">Message</label> -->

                        <textarea name="message" placeholder="Enter Your Message...." name="message"
                            class="form-group textArea" id="textArea" cols="50" rows="4"></textarea>
                    </div>
                    <button type="submit" name="contact" class="btn btn-primary">Submit</button>
                </form>
            </div>
        </div>
    </Div>
    <div class="pF">
        <div class="mapCont">
            <div id="googleMap" style="width:100%;height:400px;"></div>
        </div>
    </div>
    <div class="footer">
        <?php
        include 'footer.html';
        ?>
    </div>
    <script>
        function myMap() {
            var mapProp = {
                center: new google.maps.LatLng(51.508742, -0.120850),
                zoom: 5,
            };
            var map = new google.maps.Map(document.getElementById("googleMap"), mapProp);
        }
    </script>
    <script
        src="https://maps.googleapis.com/maps/api/js?key=AIzaSyBkvqEa_ByQVCfVBo1V-783vMxyt4loQcY&callback=myMap"></script>
</body>

</html>