<!-- this is simple text for testing github Client -->
<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Document</title>
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.7.1/jquery.min.js"></script>
  <link rel="stylesheet" href="//cdn.datatables.net/1.13.4/css/jquery.dataTables.min.css">
  <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/css/bootstrap.rtl.min.css"
    integrity="sha384-WJUUqfoMmnfkBLne5uxXj+na/c7sesSJ32gI7GfCk4zO4GthUKhSEGyvQ839BC51" crossorigin="anonymous">
  <script src="https://code.jquery.com/jquery-2.2.4.js" integrity="sha256-iT6Q9iMJYuQiMWNd9lDyBUStIq/8PuOW33aOqmvFpqI="
    crossorigin="anonymous"></script>
  <style>
    #Parent {
      background: grey;
    }

    #table {
      /* width: 1000px; */
      position: relative;
      margin: 40px 40px;
      border: 3px solid black;
      padding: 20px 20px;
    }

    .headt {
      margin: auto;
      text-align: center;
    }

    .navCont {
      width: 100%;
      ;
      height: 150px;
    }
    
  </style>
</head>

<body id="Parent">
  <?php
  session_start();
  if (isset($_SESSION['userName'])) {
    $uName = $_SESSION['userName'];
  } else {
    header("Location:Home.php");
  }

  include "db_connection.php";
  // include 'razorpay-php-2.9.0\razorpay-php-2.9.0\Razorpay.php';
  echo '<div class="navCont">';
  include 'navBar.php';
  echo '</div>';


  if (isset($_GET['idnt'])) {
    $ident = $_GET['idnt'];

    $sql = "DELETE FROM `userdetails` WHERE no=$ident;
      ";
    $res = mysqli_query($con, $sql);
  }

  //connection to another table in same database
  
  $query = "SELECT * FROM `userdetails` WHERE user='$uName';";
  // $query="SELECT * FROM `userdetails` ";
  $result = mysqli_query($con, $query);


  ?>
  <h3 class="headt">Booked Packages</h3>
  <div id="table">
    <table id="myTable" class="display">
      <thead>
        <tr>
          <th>DateTime</th>
          <th>User</th>
          <th>Package</th>
          <th>Schedule</th>
          <th>Status</th>
          <th>Action</th>
          <th>Email</th>
          <th>Payable Amount</th>
          <th>Payment</th>
        </tr>
      </thead>
      <tbody>
        <?php
        while ($row = mysqli_fetch_assoc($result)) {
          $identifier = $row['no'];
          echo '<tr>
    <td>' . $row['date'] . '</td>
    <td>' . $row['user'] . '</td>
    <td>' . $row['package'] . '</td>
    <td>' . $row['schedule'] . '</td>
    <td>' . $row['status'] . '</td>
    <td><form><button type="button" class="btn btn-danger"><a href="Bookings.php? idnt=' . $identifier . '">Delete</a></button></td>
    <td>' . $row['email'] . '</td>
    <td>' . $row['payable amount'] . '</td>
    <td>' . ($row['status'] == "Confirm" ? '<button value="' . $identifier . '" type="button" class="payBtn btn btn-success">Proceed Payment</button>' : '<button disabled type="button" class="btn btn-primary">Proceed Payment</button>') . '</td>
    </tr>
 </tbody>';

        }


        ?>
  </div>

  </table>
 
  <script src="https://checkout.razorpay.com/v1/checkout.js"></script>
  <script src="//cdn.datatables.net/1.13.4/js/jquery.dataTables.min.js"></script>
  <script>
    let table = new DataTable('#myTable');

  </script>
  <script>

    document.querySelectorAll('.payBtn').forEach(function (button) {
      button.addEventListener('click', function (e) {
        // alert("selected");
        var options = {
          "key": "rzp_test_s6sEhumLGh8SuH", // Enter the Key ID generated from the Dashboard
          "amount": "5000", // Amount is in currency subunits. Default currency is INR. Hence, 50000 refers to 50000 paise
          "currency": "INR",
          "name": "Sahil Services",
          "description": "Test Transaction",
          "image": "https://example.com/your_logo",
          //This is a sample Order ID. Pass the `id` obtained in the response of Step 1
          "handler": function (response) {
            // alert(response.razorpay_payment_id);
            // alert(response.razorpay_order_id);
            // alert(response.razorpay_signature);
            console.log("payment successful with id " + response.razorpay_payment_id);
            button.innerHTML = "Payment Done";
            button.setAttribute('disabled', 'disabled');
            let identifier = button.value;
            let paymentId = response.razorpay_payment_id;
            var requestData = new FormData();
            requestData.append('identifier', identifier);
            requestData.append('paymentId', paymentId);
            fetch('paymentInf.php', {
              method: 'POST',
              body: requestData
            })
              .then(response => {
                if (!response.ok) {
                  throw new Error('Network response was not ok');
                }
                return response.text(); // Get the text response
              })
              .then(result => {
                console.log(result); // Log the text response
              })
              .catch(error => {
                console.error('Fetch Error:', error);
              });
          },

          "theme": {
            "color": "#3399cc"
          }
        };
        var rzp1 = new Razorpay(options);
        rzp1.on('payment.failed', function (response) {
          alert(response.error.code);
          alert(response.error.description);
          alert(response.error.source);
          alert(response.error.step);
          alert(response.error.reason);
          alert(response.error.metadata.order_id);
          alert(response.error.metadata.payment_id);
        });

        rzp1.open();
        e.preventDefault();
      });
    });


  </script>
</body>

</html>