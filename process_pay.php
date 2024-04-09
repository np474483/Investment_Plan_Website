<?php
session_start();
include("db.php");

// Get the form data
$sr_no = $_POST['sr_no'];
$application_no = $_POST['application_no'];
$plan = $_POST['plan'];

$query_id = "SELECT id FROM login_details ORDER BY date_time DESC LIMIT 1";
      $result_id = mysqli_query($con, $query_id);
      $row_id = mysqli_fetch_assoc($result_id);
      $latest_id = $row_id['id'];

// Insert the data into the monthly_pay table
$query = "INSERT INTO monthly_pay (id,sr_no, application_no, plan,date_time) VALUES ('$latest_id','$sr_no', '$application_no', '$plan', NOW())";
$result = mysqli_query($con, $query);

 


// Check if the query was successful
if (!$result) {
    echo "Error: " . mysqli_error($con);
} else {
    // Redirect the user back to the dashboard
    header("Location: payment.php");
}

// Close the database connection
mysqli_close($con);
?>