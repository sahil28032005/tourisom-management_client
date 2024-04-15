<?php
session_start();
if (!isset($_SESSION['userName'])) {
    // User is not logged in, redirect to login page
    header("Location: navbar.php");
    exit(); // Stop further execution
} else {
    // User is logged in, display HTML content
    include 'db_connection.php';
    ?>
    <!DOCTYPE html>
    <html lang="en">

    <head>
        <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.3/css/all.min.css">
        <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/css/bootstrap.min.css">
        <meta charset="UTF-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <title>Become A Tourist</title>
        <link rel="stylesheet" href="Home.css">
        <link rel="stylesheet" href="phone.css" media="screen and (max-width:1396px)">
        <style>
            @media only screen and (max-width: 400px) {
                .places {
                    /* background: green; */
                }

                .auto-type {
                    display: none;
                    font-size: 20px;
                }

                .typed-cursor {
                    display: none;
                }

                .card {
                    margin: 10px;
                }

            }
        </style>
    </head>

    <body>
        <?php include "navbar.php"; ?>

        <section id="home">

            <span class="auto-type"></span>
        </section>

        <section class="popular-dest">
            <h1 id="secpop">Popular Destinations</h1>

            <div class="places">
                <?php

                if ($con) {
                    $sql = "SELECT * FROM `places`";
                    $result = mysqli_query($con, $sql);
                    while ($row = mysqli_fetch_assoc($result)) {
                        $dest_name = $row["name"];
                        $desc = $row["description"];
                        $uniqueId = $row["no"];
                        ?>
                        <div class="card myProp bCard" style="width: 18rem;">
                            <img src="https://source.unsplash.com/random/1500x900/?<?= $dest_name ?>" class="card-img-top"
                                alt="...">
                            <div class="card-body">
                                <h5 class="card-title">
                                    <a style="list-style:none" href="Register.php?catid=<?= $uniqueId ?>">
                                        <?= $dest_name ?>
                                    </a>
                                </h5>
                                <p class="card-text">
                                    <?= substr($desc, 0, 70) ?>
                                </p>
                                <a href="Register.php?catid=<?= $uniqueId ?>" class="btn btn-primary">Explore Now</a>
                            </div>
                        </div>
                        <?php
                    }
                }
                ?>
            </div>
        </section>

        <script src="https://cdn.jsdelivr.net/npm/typed.js@2.0.12"></script>
        <script src="logic.js"></script>
        <?php
        include 'footer.html';
        ?>
    </body>

    </html>
    <?php
}
?>