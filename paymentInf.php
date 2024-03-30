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
                if ($result) {
                    echo "payment details added successfully";
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