<?php
include 'db_connection.php';
if (isset($_POST["form1"])) {
  $uName = $_POST['signuname'];
  $passWord = $_POST['signpass'];
  //query to get hashedpassword
  $hashedPass = '';
  $sql = "SELECT password from sign_up_details where username = '$uName'";
  $res = mysqli_query($con, $sql);
  if (mysqli_num_rows($res) > 0) {
    $row = mysqli_fetch_assoc($res);
    $hashedPass = $row['password'];
    echo $hashedPass;
  } else {
    echo "not data found for username";
  }
  // $hashedPasswordFromDatabase = '$2y$10$vbhujVaBPgKhNt/OfvrViOx7jD/wABOioewChANzJCrjYekMwg5NS'; // This should be fetched from your database

  if (password_verify($passWord, $hashedPass)) {
    session_start();
    $_SESSION["userName"] = $uName;
    //   echo "hey ".$_SESSION["userName"]." you are logged in successfully";
    header("location:index.php");
  } else {
    header("location:index.php");
  }

  // if (password_verify('tom@123', $2y$12$z5fYW1Im2WHHK)) {
  //   echo "success hash verification";
  //   // $sql = "select * from sign_up_details where username='$uName' AND password='$hashedPass'";
  //   // $res = mysqli_query($con, $sql);
  //   // if (mysqli_num_rows($res) > 0) {
  //   //   echo "ok arrived details " . mysqli_num_rows($res);
  //   //   $_SESSION['userName'] = $uName;
  //   //   header("location:Home.php");
  //   // } else {
  //   //   // echo '<script>';
  //   //   // echo 'alert("Enter valid credentials. Data not found.")';
  //   //   // echo '</script>';
  //   //   // header("location: Home.php");
  //   //   echo "error occured...";
  //   //   // exit(); // It's good practice to exit after header() to prevent further execution
  //   // }
  // } else {
  //   echo "no success for hash verification..";
  //   echo "$passWord";
  // }



  //  $rows=mysqli_num_rows($res);
//  echo $rows;



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
    //cost for hashing password
    $options = [
      'cost' => 12,
    ];

    //getting profile details from user
    $file = $_FILES['fileToUpload']['tmp_name'];
    $fileName = $_FILES['fileToUpload']['name'];
    $fileType = $_FILES['fileToUpload']['type'];

    // Read the file content
    $data = file_get_contents($file);


    $pwd = password_hash($_POST['password'], PASSWORD_DEFAULT);
    $mail = $_POST['email'];
    // $sql = "INSERT INTO sign_up_details (username, password, email) 
    // VALUES ( $uname,$pwd,$mail)";

    $sql = "INSERT INTO sign_up_details (username, password, email, name, type, data) 
    VALUES (?, ?, ?, ?, ?, ?)";

    // Prepare the statement
    $stmt = mysqli_prepare($con, $sql);
    if ($stmt) {
      // Bind parameters to the statement
      mysqli_stmt_bind_param($stmt, "ssssss", $uname, $pwd, $mail, $fileName, $fileType, $data);

      // Execute the statement
      $exec = mysqli_stmt_execute($stmt);

      if ($exec) {
        echo "success";
        header("Location: index.php");
        exit(); // Make sure to exit after redirection
      } else {
        echo "Error executing statement: " . mysqli_stmt_error($stmt);
      }

      // Close the statement
      mysqli_stmt_close($stmt);
    } else {
      echo "Error preparing statement: " . mysqli_error($con);
    }

  }

} else if (isset($_POST["log_out"])) {
  // echo "log out";
  if (!isset($_SESSION)) {
    session_start();
  }
  session_destroy();
  header("location:index.php");
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