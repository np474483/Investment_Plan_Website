<?php
    session_start();

    include("db.php");

    if($_SERVER['REQUEST_METHOD'] == "POST")
    {
      $fullname=$_POST['fname'];
      $birthdate=$_POST['bdate'];
      $gender=$_POST['gender'];
      $email=$_POST['email'];
      $address=$_POST['address'];
      $phone=$_POST['pnumber'];
      $create=$_POST['crpass'];
    }

    if(!empty($email) && !empty($create) && !is_numeric($email))
    {
      $check_query = "SELECT * FROM registration_form WHERE email='$email'";
      $result = mysqli_query($con, $check_query);

      if(mysqli_num_rows($result) > 0)
      {
        echo "Email is already exists.";
      }
      else
      {
        $query = "INSERT INTO registration_form (fname, bdate, gender, email, address, pnumber, crpass) VALUES ('$fullname', '$birthdate', '$gender', '$email', '$address', '$phone', '$create')";
        mysqli_query($con, $query);
        echo "Successfully Registered";
      }
    }
    else
    {
      echo "Failure";
    }
?>
