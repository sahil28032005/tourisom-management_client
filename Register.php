<?php
session_start();
if (!isset($_SESSION['userName'])) {
  return;
}

// }
?>
<!DOCTYPE html>
<!---Coding By CodingLab | www.codinglabweb.com--->
<html lang="en">

<head>
  <!-- <link rel="stylesheet" href="//cdn.datatables.net/1.13.4/css/jquery.dataTables.min.css"> -->
  <!-- <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/css/bootstrap.rtl.min.css"
    integrity="sha384-WJUUqfoMmnfkBLne5uxXj+na/c7sesSJ32gI7GfCk4zO4GthUKhSEGyvQ839BC51" crossorigin="anonymous"> -->
  <meta charset="UTF-8" />
  <meta name="viewport" content="width=device-width, initial-scale=1.0" />
  <meta http-equiv="X-UA-Compatible" content="ie=edge" />
  <title>Registration Form in HTML CSS</title>

  <!---Custom CSS File--->
  <link rel="stylesheet" href="Register.css" />
  <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.0.0/dist/css/bootstrap.min.css"
    integrity="sha384-Gn5384xqQ1aoWXA+058RXPxPg6fy4IWvTNh0E263XmFcJlSAwiGgFAW/dAiS6JXm" crossorigin="anonymous">
  <script src="https://code.jquery.com/jquery-2.2.4.js" integrity="sha256-iT6Q9iMJYuQiMWNd9lDyBUStIq/8PuOW33aOqmvFpqI="
    crossorigin="anonymous"></script>
  <style>
    #pCont {
      background-color: grey;
    }

    .form-group {
      width: 900px;
      margin: auto;
    }
  </style>
</head>

<body id="pCont">
  <?php
  include "navbar.php";
  ?>

  <?php
  @$sessionUser = $_SESSION['userName'];

  @$dest_id = $_GET['catid'];


  include 'db_connection.php';

  if ($con) {

    @$query = "SELECT * FROM `places` WHERE no='$dest_id';";
    $result = mysqli_query($con, $query);
    // echo $dest_id;
    if ($result) {
      while ($row = mysqli_fetch_assoc($result)) {
        $place_name = $row['name'];
        $place_desc = $row['description'];
        echo '<div class="card mCard">
   <div class="card-header">
     Welcome ' . $sessionUser . '
   </div>
   <div class="card-body">
     <h5 class="card-title">' . $place_name . '</h5>
     <p class="card-text">' . $place_desc . '</p>
     
   </div>
 </div>';

      }
    }
  } else {

  }
  $method = $_SERVER['REQUEST_METHOD'];
  echo $method;
  if ($method == 'POST') {
    echo "post meth";

    foreach ($_POST['cars'] as $value) {
      $package = $value;
    }
    foreach ($_POST['persons'] as $value) {
      $pCount = $value;
    }
    $schedule = $_POST['scDAte'];
    $status = "Pending";
    $basePrice = 1000*$pCount;
    $disCountRates = [1 => 0, 2 => 0.05, 3 => 0.10, 4 => 0.15];

    function calculatePrice($basePrice, $pCount, $disCountRates)
    {
      if ($pCount <= 0) {
        return 0; //this case not allowed in this case tourist base package is not allowed mazimum 4 and atleast 1 is allpwed
      } else if ($pCount == count($disCountRates)) {
        $discount = end($disCountRates);
      } else {
        $discount = $disCountRates[$pCount];
      }
      $discountedPrice = $basePrice * (1 - $discount);
      return $discountedPrice;
    }
    $payableAmt = calculatePrice($basePrice, $pCount, $disCountRates);
    $email;
    $sql = "SELECT `email`FROM `sign_up_details` WHERE username='$sessionUser'";
    if ($res = mysqli_query($con, $sql)) {
      while ($row = mysqli_fetch_assoc($res)) {
        $email = $row['email'];
      }
    }
    echo $email;
    $sql = "INSERT INTO `userdetails`( `user`, `package`, `schedule`, `status`, `email`,`persons`,`payable amount`) VALUES ('$sessionUser','$package','$schedule','$status','$email','$pCount','$payableAmt')";
    if (isset($_SESSION['userName'])) {
      $res = mysqli_query($con, $sql);
    } else {
      echo "enable to insert";
    }

    if (@$res) {
      echo "data inserted";

    }
  } else {
    echo "failed to insert";
  }

  ?>

  <form action="<?php echo $_SERVER['REQUEST_URI']; ?>" method="post">
    <div class="form-group">
      <!-- <label for="exampleInputEmail1">UserName</label>
    <input name="uName" type="text" class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp" placeholder=""> -->
      <small type="email" id="emailHelp" class="form-text text-muted">We'll never share your details with anyone
        else.</small>
    </div>
    <div class="form-group">

      <!-- <input name="uEmail" type="email" class="form-control" value="<?php echo $email ?>" id="exampleInputPassword1" placeholder="email"> -->
      <label for="exampleInputPassword1">Select Package</label>
      <select id="cars" name="cars[]" class="form-control">
        <option value="Mumbai">Mumbai</option>
        <option value="Singapur">Singapur</option>
        <option value="Agra">Agra</option>
        <option value="England">England</option>
        <option value="South Korea">South Korea</option>
        <option value="Paris">Paris</option>
        <option value="Europe">Europe</option>
        <option value="Germany">Germany</option>
        <option value="Naigara">Naigara</option>
      </select>
      <label class="" for="exampleInputPassword1">Select No Of Persons</label>
      <select id="count" name="persons[]" class="form-control ">
        <option value="1">1</option>
        <option value="2">2</option>
        <option value="3">3</option>
        <option value="4">4</option>
      </select>
      <label for="exampleInputPassword1">Select Scheduling Date</label>
      <input name="scDAte" type="date" id="birthday" class="form-control" name="birthday">

      <button name="sButton" type="submit" class="btn btn-primary my-3">Submit</button>
    </div>

  </form>





  <script src="https://code.jquery.com/jquery-3.2.1.slim.min.js"
    integrity="sha384-KJ3o2DKtIkvYIK3UENzmM7KCkRr/rE9/Qpg6aAZGJwFDMVNA/GpGFF93hXpG5KkN"
    crossorigin="anonymous"></script>
  <script src="https://cdn.jsdelivr.net/npm/popper.js@1.12.9/dist/umd/popper.min.js"
    integrity="sha384-ApNbgh9B+Y1QKtv3Rn7W3mgPxhU9K/ScQsAP7hUibX39j7fakFPskvXusvfa0b4Q"
    crossorigin="anonymous"></script>
  <script src="https://cdn.jsdelivr.net/npm/bootstrap@4.0.0/dist/js/bootstrap.min.js"
    integrity="sha384-JZR6Spejh4U02d8jOt6vLEHfe/JQGiRRSQQxSfFWpi1MquVdAyjUar5+76PVCmYl"
    crossorigin="anonymous"></script>
</body>

</html>