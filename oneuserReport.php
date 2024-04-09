<?php
// Get the user ID from the form submission
$userId = isset($_POST['userId']) ? (int)$_POST['userId'] : 0;

// Database connection settings
$servername = "localhost";
$username = "root";
$password = "";
$dbname = "investment";

// Create connection
$conn = new mysqli($servername, $username, $password, $dbname);

// Check connection
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}
?>


<!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="UTF-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <title>Databse User Information</title>
    <style>
      table {
        width: 100%;
        border-collapse: collapse;
      }
      th,
      td {
        border: 1px solid black;
        padding: 8px;
        text-align: left;
      }
      th {
        background-color: #f2f2f2;
      }
    </style>
  </head>
  <body>
    <h2>User Information</h2>
    <table>
      <tr>
        <th>User Id</th>
        <th>User Name</th>
        <th>Birth Date</th>
        <th>Gender</th>
        <th>Email</th>
        <th>Address</th>
        <th>Phone Number</th>
      </tr>
      <?php
      $sql = "SELECT * FROM registration_form WHERE id=$userId" ;
      $result = $conn->query($sql);

      if ($result->num_rows > 0) {
        // output data of each row
        while($row = $result->fetch_assoc()) {
          echo "<tr><td>" . $row["id"]. "</td><td>" . $row["fname"]. "</td><td>" . $row["bdate"]. "</td><td>" . $row["gender"]. "</td><td>" . $row["email"]. "</td><td>" . $row["address"]. "</td><td>" . $row["pnumber"]. "</td></tr>";
        }
      } else {
        echo "0 results";
      }
      ?>
    </table>

    <h2>Login Details</h2>
    <table>
      <tr>
        <th>User Id</th>
        <th>User Name</th>
        <th>Email</th>
        <th>Date & Time</th>
      </tr>
      <?php
      $sql = "SELECT * FROM login_details WHERE id=$userId";
      $result = $conn->query($sql);

      if ($result->num_rows > 0) {
        // output data of each row
        while($row = $result->fetch_assoc()) {
          echo "<tr><td>" . $row["id"]. "</td><td>" . $row["name"]. "</td><td>" . $row["email"]. "</td><td>" . $row["date_time"]. "</td></tr>";
        }
      } else {
        echo "0 results";
      }
      ?>
    </table>


      <h2>Plan Details</h2>
    <table>
      <tr>
        <th>User Id</th>
        <th>User Name</th>
        <th>Address</th>
        <th>Pincode</th>
        <th>Phone Number</th>
        <th>Age</th>
        <th>Aadhar Number</th>
        <th>Plan Name</th>
        <th>Application Date</th>
        <th>Amount</th>
        <th>Application Number</th>
      </tr>
      <?php
      $sql = "SELECT * FROM planform WHERE id=$userId";
      $result = $conn->query($sql);

      if ($result->num_rows > 0) {
        // output data of each row
        while($row = $result->fetch_assoc()) {
          echo "<tr><td>" . $row["id"]. "</td><td>" . $row["cname"]. "</td><td>" . $row["address"]. "</td><td>" . $row["pincode"]. "</td><td>" . $row["pnumber"]. "</td><td>" . $row["age"]. "</td><td>" . $row["aadhar"]. "</td><td>" . $row["plan"]. "</td><td>" . $row["applicationdate"]. "</td><td>" . $row["amount"]. "</td><td>" . $row["application_no"]. "</td></tr>";
        }
      } else {
        echo "0 results";
      }
      ?>
    </table>

    <h2>Payment Details</h2>
    <table>
      <tr>
        <th>User Id</th>
        <th>Sr_No</th>
        <th>Application Number</th>
        <th>Plan Name</th>
        <th>Paid Amount</th>
        <th>Payment Date</th>
        <th>Card Holder Name</th>
        <th>Card Number</th>
        <th>Card Expiry</th>
        <th>Card CVC</th>



      </tr>
      <?php
      $sql = "SELECT * FROM payment WHERE id=$userId";
      $result = $conn->query($sql);

      if ($result->num_rows > 0) {
        // output data of each row
        while($row = $result->fetch_assoc()) {
          echo "<tr><td>" . $row["id"]. "</td><td>" . $row["sr_no"]. "</td><td>" . $row["application_no"]. "</td><td>" . $row["plan"]. "</td><td>" . $row["amount"]. "</td><td>" . $row["paid_date"]. "</td><td>" . $row["card_name"]. "</td><td>" . $row["card_number"]. "</td><td>" . $row["card_expiry"]. "</td><td>" . $row["card_cvv"]. "</td></tr>";
        }
      } else {
        echo "0 results";
      }
      ?>
    </table>
  </body>
</html>