<?php
    session_start();

    include("db.php");

    if($_SERVER['REQUEST_METHOD'] == "POST")
    {
      $fullname=$_POST['cname'];
      $birthdate=$_POST['bdate'];
      $address=$_POST['address'];
      $pincode=$_POST['pincode'];
      $phone=$_POST['pnumber'];
      $age=$_POST['age'];
      $aadhar=$_POST['aadhar'];
      $email=$_POST['email'];
      $plan=$_POST['plan'];
      $ApplicationDate=$_POST['applicationdate'];
      $application_number = mt_rand(1000, 9999);
      $Amount=$_POST['amount'];

      // Get the latest id from login_details table
      $query_id = "SELECT id FROM login_details ORDER BY date_time DESC LIMIT 1";
      $result_id = mysqli_query($con, $query_id);
      $row_id = mysqli_fetch_assoc($result_id);
      $latest_id = $row_id['id'];
      

      



      if(!empty($fullname) && !empty($birthdate) && !empty($address) && !empty($pincode) && !empty($phone) && !empty($age) && !empty($aadhar) && !empty($email) && !empty($plan) && !empty($ApplicationDate) && !empty($Amount))
{
    // Insert data into the database
    $query = "INSERT INTO planform (cname, bdate, address, pincode, pnumber, age, aadhar, email, plan, applicationdate, amount, id,application_no) VALUES ('$fullname', '$birthdate', '$address', '$pincode', '$phone', '$age', '$aadhar', '$email', '$plan', '$ApplicationDate', '$Amount', '$latest_id','$application_number')";
    
    mysqli_query($con, $query);

    echo "Successfully Applied";
}

    }
    else
    {
      echo "Failure";
    }

   // Close the database connection
 mysqli_close($con);
?>