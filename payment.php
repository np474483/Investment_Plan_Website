<?php
// Start the session and include the database connection file
session_start();
include("db.php");

// Query the database for the newest data from the login_details table
$query = "SELECT * FROM login_details WHERE date_time = (SELECT MAX(date_time) FROM login_details)";
$result = mysqli_query($con, $query);

// Check if the query was successful
if (!$result) {
    echo "Error: " . mysqli_error($con);
} else {
    // Fetch the result and display the name
    $user = mysqli_fetch_assoc($result); // Fetch the user details
    $user_id = $user["id"]; // Get the user ID
}
// Store the user_id in the session variable
$_SESSION['id'] = $user_id;

$sql = "SELECT plan, amount,application_no FROM planform WHERE id = ?"; 

$login = $_SESSION['id'];
// Prepare the statement
$stmt = $con->prepare($sql);

// Bind the parameter
$stmt->bind_param("i", $user_id); // Assuming user_id is an integer

// Execute the statement
$stmt->execute();

// Get the result
$result = $stmt->get_result();

$row = $result->fetch_assoc();
$plan_name = $row["plan"];
$investing_amount = $row["amount"];
$application_no = $row["application_no"];

// Store the plan name and investing amount in the session variables
$_SESSION['plan_name'] = $plan_name;
$_SESSION['investing_amount'] = $investing_amount;
// Close the database connection
// mysqli_close($con);
?>



<!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="UTF-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <title>Payment Form</title>
    <link
      rel="stylesheet"
      href="https://use.fontawesome.com/releases/v5.4.2/css/all.css"
    />
    <link rel="stylesheet" href="payment.css" />
  </head>
  <body>
    <style>
      .loader-container {
  display: none;
  position: absolute;
  top: 0;
  left: 0;
  width: 100%;
  height: 100%;
  background: rgba(255, 255, 255, 0.8);
  z-index: 100;
}

.loader {
  width: 60px;
  height: 60px;
  margin: 100px auto;
  border-radius: 50%;
  border: 5px solid #ddd;
  border-top: 5px solid #007bff;
  animation: spin 1s linear infinite;
}

.loader-inner {
  width: 100%;
  height: 100%;
  border-radius: 50%;
  animation: loader-inner 4s linear infinite;
}

@keyframes spin {
  100% {
    transform: rotate(360deg);
  }
}

@keyframes loader-inner {
  100% {
    transform: rotate(0deg);
  }
}
    </style>

    <div class="wrapper">
      <div class="payment">
        <div class="payment-logo">
          <p>p</p>
        </div>

        <h2>Payment Gateway</h2>
        <h4>Plan Name:<?php echo "$plan_name" ?></h4>
        <br />
        <h4>Investing Amount:<?php echo "$investing_amount" ?></h4>
        <br>
        <h4>Application No:<?php echo "$application_no" ?></h4>
        <br />
        <div class="form">
          <div class="card space icon-relative">
            <label class="label">Card holder:</label>
            <input
              type="text"
              class="input"
              placeholder="Card holder name"
              oninput="this.value = this.value.toUpperCase();"
              required
            />
            <i class="fas fa-user"></i>
          </div>
          <div class="card space icon-relative">
            <label class="label">Card number:</label>
            <input
              type="text"
              class="input"
              data-mask="0000 0000 0000 0000"
              placeholder="Card Number"
              required
            />
            <i class="far fa-credit-card"></i>
          </div>
          <div id="loader-container" class="loader-container">
  <div class="loader">
    <div class="loader-inner"></div>
  </div>
</div>
          <div class="card-grp space">
            <div class="card-item icon-relative">
              <label class="label">Expiry date:</label>
              <input
                type="text"
                name="expiry-data"
                class="input"
                placeholder="00 / 00"
                data-mask="00 / 00"
                required
              />
              <i class="far fa-calendar-alt"></i>
            </div>
            <div class="card-item icon-relative">
              <label class="label">CVC:</label>
              <input
                type="text"
                class="input"
                data-mask="000"
                placeholder="000"
                required
              />
              <i class="fas fa-lock"></i>
            </div>
          </div>

          <div class="btn" onclick="showLoader()">Pay</div>
          <script>
  function showLoader() {
    document.getElementById("loader-container").style.display = "flex";
    setTimeout(function() {
      window.location.href = "done.html";
    }, 4000);
  }
</script>

        </div>
      </div>
    </div>
    <script>
      $("input[name='expiry-data']").mask("00 / 00");
    </script>
    <script src="https://code.jquery.com/jquery-3.3.1.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery.mask/1.14.15/jquery.mask.min.js"></script>
  </body>
</html>
