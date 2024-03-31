<?php
include "db_connection.php";

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    if (isset($_POST['identifier']) && isset($_POST['paymentId'])) {
        // echo "$_POST[identifier]";//here we received identifier to send data inside payment table as an relative manner
        //at this point we have come means payment has been done succesfully otherwise we not come here
        $identifier = $_POST['identifier'];
        $paymentId = $_POST['paymentId'];
        $query = "SELECT date, user, package, email, persons,`payable amount` FROM userdetails WHERE no = '$identifier'";
        $result = mysqli_query($con, $query);
        if ($result) {
            // Fetch associative array (key-value pairs) of the first row
            $row = mysqli_fetch_assoc($result);

            // Check if the row exists and extract data into variables
            if ($row) {
                $user = $row['user'];
                $package = $row['package'];
                $email = $row['email'];
                $persons = $row['persons'];
                $amtPaid = $row['payable amount'];
                // Now $name, $value, and $age contain the data from the database
                // You can use these variables as needed in your PHP code
                echo "username: $user, package: $package, email: $email,persons:$persons,payable amount: $amtPaid";
                $sql = "INSERT INTO payment_information(`payment id`, username, `amount paid`,peoples, packagename, email) VALUES ('$paymentId', '$user', '$amtPaid','$persons','$package','$email')";
                $result = mysqli_query($con, $sql);

                //sql to fetch date of payment done
                $paymentDateQuery = "select `date and time` from payment_information where `payment id` = '$paymentId'";
                $dateQueryres = mysqli_query($con, $paymentDateQuery);
                $paymentDate = "";
                if ($dateQueryres) {
                    $dateRes = mysqli_fetch_assoc($dateQueryres);
                    $paymentDate = $dateRes['date and time'];
                    // echo $paymentDate;
                } else {
                    echo "error while fetching payment date";
                }
                if ($result) {
                    echo "payment details added successfully";
                    //send mail code for sending mails to clients who have wasted their money on my website
                    $to = "sahil249775@gmail.com";
                    $subject = "testing mail";
                    $message = "Subject: Payment Confirmation for Your Booking

                    Dear $user,
                    
                    We are pleased to confirm that we have received your payment for the booking made on $paymentDate. Below are the details of your payment:
                    
                    Payment ID: $paymentId
                    Amount Paid: $amtPaid
                    Payment Date and Time: $paymentDate
                    Booking Details:
                    
                    Booking ID: [Booking ID]
                    Booking Summary: $package with $persons persons
                    If you have any questions or need further assistance, please don't hesitate to contact our customer support team at [Customer Support Email/Phone Number]. We are here to help!
                    
                    Thank you for choosing our services. We look forward to welcoming you soon.
                    
                    Best regards,
                    Sahil Tours
                    
                    ";
                    $headers = array(
                        'From' => 'sahilsadekar249775@gmail.com',
                        'Reply-To' => 'sahilsadekar249775@gmail.com',
                        'X-Mailer' => 'PHP/' . phpversion()
                    );
                    if (mail($to, $subject, $message, $headers)) {
                        echo 'email sent successfully';
                    } else {
                        echo 'email not sent';
                    }
                } else {
                    echo "payment details not added successfully...";
                }
            } else {
                echo "No data found in the table.";
            }
        } else {
            echo "Error executing the query: " . mysqli_error($conn);
        }
    } else {
        echo 'Missing form data.';
    }
} else {
    echo 'Invalid request method.';
}
?>