<?php
session_start();
//code for sign in
include 'db_connection.php';
if (isset($_POST["form1"])) {
  $uName = $_POST['signuname'];
  $passWord = $_POST['signpass'];
  $sql = "select * from sign_up_details where username='$uName' AND password='$passWord'";
  $res = mysqli_query($con, $sql);
  //  $rows=mysqli_num_rows($res);
//  echo $rows;
  if ($res) {
    echo "ok";
    $_SESSION['userName'] = $uName;
    header("location:Home.php");
  }

  // header("location:sign_up.php");
  // $uName=$_POST['signuname'];
  // $passWord=$_POST['signpass'];
  // $sql="select * from sign_up_details where username='$uName' AND password='$passWord'";
  // $result=mysqli_query($con,$sql);
  // $numRows=mysqli_num_rows($result);
  // if($numRows==1){
  //   session_start();
  //   $_SESSION["userName"] = $uName;
  //   echo "hey ".$_SESSION["userName"]." you are logged in successfully";
  //   header("location:Home.php");
}

// }
//code for sign up
else if (isset($_POST["form2"])) {
  echo "request arrived";
  if ($_SERVER['REQUEST_METHOD'] == 'POST') {

    $uname = $_POST['username'];

    $pwd = $_POST['password'];
    $mail = $_POST['email'];
    // $sql = "INSERT INTO sign_up_details (username, password, email) 
    // VALUES ( $uname,$pwd,$mail)";

    $sql = "insert into sign_up_details(username,password,email) values('$uname','$pwd','$mail')";
    $res = mysqli_query($con, $sql);
    if ($res) {
      echo "success";
    }

  }

} else if (isset($_POST["log_out"])) {
  session_destroy();
  header("location:Home.php");
} else if (isset($_POST["submitUdata"])) {
  echo "post request arrived";

  include 'db_connection.php';
  if ($con) {
    echo "connected";
    $sessionUName = $_SESSION['userName'];
    $package = $_POST['tpac'];
    $scheduled_date = $_POST['tsch'];
    $eMail = $_POST['tmail'];
    foreach ($_POST['Color'] as $select) {
      $package = $select;
    }
    $sql = "insert into userdetails(user,package,schedule,email,status,action) values('$sessionUName','$package','$scheduled_date','$eMail','pending','@action')";
    $res = mysqli_query($con, $sql);


    header("location:Register.php");
  }
} else if (isset($_POST['contact'])) {
  // echo "arrived...";
  $name = $_POST['name'];
  $email = $_POST['email'];
  $message = $_POST['message'];
  $subject = $_POST['subject'];
  $to = 'sahilsadekar249775@gmail.com';
  $body = "Name: $name\nEmail: $email\nMessage:\n$message";
  if (mail($to, $subject, $body)) {
    // echo 'Message sent successfully!';
    header("Location: contactUs.php");
  } else {
    echo 'Error sending message. Please try again later.';
  }
}


if (isset($_POST["feedback"])) {
  echo "Form 1 have been submitted";
  include 'db_connection.php';

  if (!$con) {
    die("connection failed " . mysqli_connect_error());
  } else {
    echo "connected successfully";
  }

  if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    $name = $_POST['name'];
    $email = $_POST['email'];
    $contact = $_POST['number'];
    $suggestion = $_POST['suggesstion'];
    $sql = "insert into feedbackdata(name,email,contact,suggestion) values('$name','$email','$contact','$suggestion')";
    $res = mysqli_query($con, $sql);

  }



}



// echo "code ends here";
?>