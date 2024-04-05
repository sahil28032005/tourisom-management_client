<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <style>
        body {
            background-image: url('images/aboutUsbg.jpg');
            background-size: cover;
            background-position: center;
        }

        .containerAbtMain {
            width: 80%;
            height: 80vh;
            background-color: #251f1f;
            background-color: rgba(255, 255, 255, 0);

            z-index: 2;
            margin: 50px auto;
            position: static;
        }

        .top {
            color: white;
            margin: auto;
            width: fit-content;
            padding: 20px;
        }

        .line {
            background-color: white;
            width: 90%;
            height: 2px;
            margin: auto;
        }

        .half1,
        .half2 {
            width: 40%;
            /* border: 2px solid white; */
            height: 400px;
            color: white;
        }

        .content {
            display: flex;
            justify-content: center;
            margin: 20px;
        }

        .headCont {
            margin: auto;
            width: fit-content;
        }

        .para1,
        .para2 {
            margin: 20px;

        }

        .imgPlane {
            width: 100%;
            height: 100%;
            object-fit: cover;
            margin: 20px;
            margin-left: 20px;
            border-radius: 50%;
            border: 2px solid white;
        }

        .navCont {
            width: 100%;
            ;
            height: 100px;
        }

        .contentVast {
            color: white;
        }

        .common {
            margin: 20px;
        }

        .footCont {
            width: 100%;
            height: 350px;
            bottom: 0;
        }
    </style>
</head>

<body>
    <div class="navCont">
        <?php
        include 'navBar.php';
        ?>
    </div>

    <div class="containerAbtMain">
        <div class="top">
            <h1>ABOUT US</h1>
        </div>
        <div class="line">

        </div>
        <div class="content">
            <div class="half1">
                <h3 class="headCont">Our Story</h3>
                <p class="para1">
                    At Sahil Tours, we are passionate about creating unforgettable travel experiences for our clients.
                    Whether you're dreaming of a relaxing beach vacation, an adventurous trek through the mountains, or
                    an immersive cultural journey, we're here to turn your travel dreams into reality.
                </p>
                <p class="para2">
                    <strong>Our Mission:</strong><br>
                    Our mission is to provide exceptional travel services with a personal touch. We believe that every
                    journey should be memorable, and we strive to exceed our clients' expectations by offering tailored
                    itineraries, expert advice, and attentive customer service.
                </p>
            </div>
            <div class="half2">
                <img class="imgPlane" src="images/about_Us_content.jpg" alt="">
            </div>
        </div>
        <div class="contentVast">
            <p>
            <h3>Why Choose Sahil Tours?</h3>

            <li class="common"><strong>Personalized Service:</strong> Our experienced travel experts work closely with
                each client
                to understand
                their preferences and create customized travel plans.</li>
            <li class="common"><strong>Expert Advice:</strong> From destination recommendations to travel tips, our team
                provides
                expert advice to
                ensure a smooth and enjoyable travel experience.</li>
            <li class="common"><strong>Seamless Planning:</strong> We take care of all the details, including flight
                bookings,
                accommodation
                reservations, transportation, and tour arrangements, so you can relax and focus on making memories.
            </li>
            <li class="common"><strong>24/7 Support:<strong> Our dedicated support team is available around the clock to
                        assist you
                        during your
                        travels and address any concerns or questions you may have.</li>

            </p>
            <p>
            <h3>Our Values</h3>
            <li class="common"><strong>Customer Satisfaction:</strong> We prioritize the satisfaction and happiness of
                our clients,
                striving to exceed their expectations at every step of their journey.</li>
            <li class="common" <strong>Integrity:<strong> We operate with honesty, transparency, and integrity, ensuring
                    that our
                    clients receive accurate information and reliable services.</li>
            <li class="common"><strong>Passion for Travel:</strong> Our team shares a passion for travel and adventure,
                and we are
                committed to sharing that passion with our clients by creating unforgettable travel experiences.</li>
            <li class="common"><strong>Community Engagement:</strong> We are dedicated to supporting local communities
                and promoting
                sustainable tourism practices that benefit both travelers and destinations.</li>
            </p>
        </div>
    </div>
    <!-- <div class="footCont">
        <?php
        include 'footer.php';
        ?>
    </div> -->
</body>

</html>