<?php
// Start the session and include the database connection file
session_start();
include("db.php");

// Query the database for the newest data from the login_details table
$query = $query = "SELECT * FROM login_details WHERE date_time = (SELECT MAX(date_time) FROM login_details)";
$result = mysqli_query($con, $query);

// Check if the query was successful
if (!$result) {
    echo "Error: " . mysqli_error($con);
} else {
    // Fetch the result and display the name
    $user = mysqli_fetch_assoc($result);
    $name = $user["name"];
    $email=$user["email"] ;
    $phone=$user["phone"] ;
    $address=$user["address"] ;
    $gender=$user["gender"] ;
    $bdate=$user["birth_date"];
    $user_id=$user["id"];
   
}

// Close the database connection
// mysqli_close($con);
// ?>







<span style="font-family: verdana, geneva, sans-serif" ><!DOCTYPE html>
  <html lang="en">
    <head>
      <meta charset="UTF-8" />
      <title>User Dashboard </title>
      <link rel="stylesheet" href="dashboard.CSS" />
      <!-- Font Awesome Cdn Link -->
      <link
        rel="stylesheet"
        href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.1/css/all.min.css"
      />
    </head>
    <body>
    
      <div class="container">
        <nav class="navbar" style="position:fixed;width:350px; z-index: 1;">
          <ul>
            <li>
              <a href="" class="logo"> 
                <span class="nav-item"><?php echo $name; ?></span>
              </a>
            </li><br>
            <br>
            <li>
              <a href="dashboard.php?page=home">
                <i class="fas fa-home"></i>
                <span class="nav-item">Home</span>
              </a>
            </li>
            <li>
              <a href="dashboard.php?page=profile" class="profile-link">
                <i class="fas fa-user"></i>
                <span class="nav-item">Profile</span>
              </a>
            </li>
            <li>
               <a href="dashboard.php?page=myplans">
                <i class="fas fa-usd"></i>
                <span class="nav-item">My Plan</span>
              </a>
            </li> 
            </li>
            
            <li>
              <a href="logout.php" class="logout">
                <i class="fas fa-sign-out-alt"></i>
                <span class="nav-item">Log out</span>
              </a>
            </li>
          </ul>
        </nav>

        <style>
        .profile-container {
    border: 1px solid #ccc;
    border-radius: 5px;
    padding: 20px;
    width: 300px;
    margin: 0 auto;
}

.profile-header {
    text-align: center;
}

.profile-header img {
    width: 100px;
    height: 100px;
    border-radius: 50%;
    margin-bottom: 10px;
}

.profile-details {
    margin-top: 20px;
}

.edit-button {
    background-color: #007bff;
    color: white;
    border: none;
    padding: 5px 10px;
    border-radius: 3px;
    cursor: pointer;
}
.profile-container {
  height: 750px;
  width: 1200px;
  margin: 0 auto;
  background-color: #fff;
  padding: 20px;
  border-radius: 5px;
  box-shadow: 0px 0px 10px rgba(0, 0, 0, 0.1);
  text-align: center;
}

.profile-container table {
  width: 100%;
  border-collapse: collapse;
  margin-top: 30px;
}

.profile-container table td {
  padding: 5px;
  vertical-align: top;
}

.edit-button {
  display: block;
  margin: 0 auto;
  margin-top: 30px;
  padding: 10px 20px;
  background-color: #4CAF50;
  color: #fff;
  border: none;
  border-radius: 5px;
  cursor: pointer;
}
.my-plans-container {
  height: 750px;
  width: 1200px;
  margin: 0 auto;
  background-color: #fff;
  padding: 20px;
  border-radius: 5px;
  box-shadow: 0px 0px 10px rgba(0, 0, 0, 0.1);
  text-align: center;
}

.my-plans-container h2 {
    text-align: center;
    color: #333;
}

.my-plans-container p {
    margin: 5px 0;
}


</style>

        <?php if (isset($_GET['page']) && $_GET['page'] == 'home'): ?>
        <section class="main" style="padding-left:400px;">
          <div class="main-top" >
            <h1>Services</h1>
          </div>
          <div class="main-skills">
            <div class="card">
              <!-- <i class="fas fa-laptop-code"></i> -->
              <h3>Annual-Plan Investment</h3><br>
              <p>Join Over 1 million Customers</p>
              <a href="PlanForm.html">
              <button>Get Started</button>
              </a>
            </div>
            <!-- <div class="card">
              <h3>Short-Term Investment</h3>
              <p>Join Over 3 million Students.</p>
              <button>Get Started</button>
            </div> -->
            <div class="card">
              <!-- <i class="fas fa-palette"></i> -->
              <h3>Short-Term Investment</h3><br>
              <p>Join Over 2 million Students.</p>
              <a href="PlanForm.html">
              <button>Get Started</button>
              </a>
            </div>
            <div class="card">
              <h3>Long-Term Investment</h3><br>
              <p>Join Over 1 million Students.</p>
              <a href="PlanForm.html">
              <button>Get Started</button>
              </a>
            </div>
          </div>

          <section class="Payment">
            <h1>Monthly Payments</h1>

            <?php
// Connect to the database
$con = mysqli_connect("localhost", "root", "", "investment");

// Check connection
if (mysqli_connect_errno()) {
  echo "Failed to connect to MySQL: " . mysqli_connect_error();
}

// Query the planform table to get the user's plans
$query = "SELECT application_no, plan,applicationdate FROM planform WHERE id = $user_id";
$result = mysqli_query($con, $query);




 // Loop through the result set and display each row in the table
 if ($result) {
  
  while ($row = mysqli_fetch_assoc($result)) {
    // Set the start date and end date based on the selected plan
    $start_date = date('Y-m-d', strtotime($row['applicationdate']));
    $duration=0;
    $plan = $row['plan'];

   

    if ($plan == 'Annual Plan') {
      $sr_no = 1;
      $duration = 12;
      echo "<h2>Annual Plan</h2>";
      echo "<table id='my-plan-table'>";
      echo "<tr>";
      echo "<th>SR.No</th>" ;
      echo "<th>Application No.</th>" ;
      echo "<th>Application Date</th>" ;
      echo "<th>Invested Plan Name</th>" ;
      echo "<th>Monthly Investment Amount</th>" ;
      echo "<th>Start Date</th>" ;
      echo "<th>Due Date</th>" ;
      echo "<th>Payment</th>" ;
      echo "<th>Status</th>" ;
      echo "</tr>" ;

    
    $monthly_investment = 2000; // You need to modify this to display the actual monthly investment amount

// Insert the data into the monthly_pay table if the "Pay Now" button is clicked
if (isset($_POST['sr_no']) && isset($_POST['application_no']) && isset($_POST['plan'])) {
  $sr_no = $_POST['sr_no'];
  $application_no = $_POST['application_no'];
  $plan = $_POST['plan'];

  // Insert the data into the monthly_pay table
  $query = "INSERT INTO monthly_pay (sr_no, application_no, plan) VALUES ('$sr_no', '$application_no', '$plan')";
  mysqli_query($con, $query);
}

// Check if the sr_no, application_no, and plan from the monthly payment table are in the monthly_pay database table
$query = "SELECT COUNT(*) as count FROM monthly_pay WHERE sr_no = $sr_no AND application_no = '{$row['application_no']}' AND plan = '$plan'";
$result2 = mysqli_query($con, $query);
$row2 = mysqli_fetch_assoc($result2);
$count = $row2['count'];

// Display the Status column based on whether the data is found in the monthly_pay table
if ($count == $sr_no) {
  $status = "success";
} else {
  $status = "pending";
}

      for ($i = 0; $i < $duration; $i++) {

      
        echo "<tr class='my-plan-row'>" ;
        echo "<td>  $sr_no  </td>"; // You need to modify this to generate the SR.No dynamically
        
        echo "<td>" . $row['application_no'] . "</td>" ;
        echo "<td>" . $row['applicationdate'] . "</td>" ;
        echo "<td>" . $row['plan'] . "</td>" ;
        echo "<td>" . $monthly_investment . "</td>" ;
        echo "<td>" . $start_date . "</td>" ;
        $start_date = date('Y-m-d', strtotime($start_date . " +1 month"));
        $due_date=$start_date;
        echo "<td>" . $due_date . "</td>" ;
        echo "<td><a href='payment.php' style='width:10px;' class='pay-button-link'>
        <form action='process_pay.php' method='post'>
      <input type='hidden' name='sr_no' value='$sr_no'>
      <input type='hidden' name='application_no' value='$row[application_no]'>
      <input type='hidden' name='plan' value='$row[plan]'>
      <button type='submit' class='pay-button'>Pay Now</button>
    </form>
      </a></td>" ;
       
       echo"<td>".$status. "</td>";
        $sr_no++;
        
        echo "</tr>" ;
      }
  
      // Close the table for the current plan
      echo "</table>";
      echo "<br>";


    } elseif ($plan == 'Short-Term Plan') {
      $sr_no = 1;
      $duration = 6 * 12;
      echo "<h2>Short-Term Plan</h2>";
      echo "<table id='my-plan-table'>";
      echo "<tr>";
      echo "<th>SR.No</th>" ;
      echo "<th>Application No.</th>" ;
      echo "<th>Application Date</th>" ;
      echo "<th>Invested Plan Name</th>" ;
      echo "<th>Monthly Investment Amount</th>" ;
      echo "<th>Start Date</th>" ;
      echo "<th>Due Date</th>" ;
      echo "<th>Payment</th>" ;
      echo "<th>Status</th>" ;

      echo "</tr>" ;

      $end_date = date('Y-m-d', strtotime($start_date . " +$duration months"));
    
    $monthly_investment = 2000; // You need to modify this to display the actual monthly investment amount

// Insert the data into the monthly_pay table if the "Pay Now" button is clicked
if (isset($_POST['sr_no']) && isset($_POST['application_no']) && isset($_POST['plan'])) {
  $sr_no = $_POST['sr_no'];
  $application_no = $_POST['application_no'];
  $plan = $_POST['plan'];

  // Insert the data into the monthly_pay table
  $query = "INSERT INTO monthly_pay (sr_no, application_no, plan) VALUES ('$sr_no', '$application_no', '$plan')";
  mysqli_query($con, $query);
}

// Check if the sr_no, application_no, and plan from the monthly payment table are in the monthly_pay database table
$query = "SELECT COUNT(*) as count FROM monthly_pay WHERE sr_no = $sr_no AND application_no = '{$row['application_no']}' AND plan = '$plan'";
$result2 = mysqli_query($con, $query);
$row2 = mysqli_fetch_assoc($result2);
$count = $row2['count'];

// Display the Status column based on whether the data is found in the monthly_pay table
if ($count == $sr_no) {
  $status = "success";
} else {
  $status = "pending";
}
      for ($i = 0; $i < $duration; $i++) {

      
    
        echo "<tr class='my-plan-row'>" ;
        echo "<td>  $sr_no  </td>"; // You need to modify this to generate the SR.No dynamically
        
        echo "<td>" . $row['application_no'] . "</td>" ;
        echo "<td>" . $row['applicationdate'] . "</td>" ;
        echo "<td>" . $row['plan'] . "</td>" ;
        echo "<td>" . $monthly_investment . "</td>" ;
        echo "<td>" . $start_date . "</td>" ;
        $start_date = date('Y-m-d', strtotime($start_date . " +1 month"));
        $due_date=$start_date;
        echo "<td>" . $due_date . "</td>" ;
        echo "<td><a href='payment.php' style='width:10px;' class='pay-button-link'>
        <form action='process_pay.php' method='post'>
      <input type='hidden' name='sr_no' value='$sr_no'>
      <input type='hidden' name='application_no' value='$row[application_no]'>
      <input type='hidden' name='plan' value='$row[plan]'>
      <button type='submit' class='pay-button'>Pay Now</button>
    </form>
      </a></td>" ; 
       echo"<td>". $status.  "</td>";
        $sr_no++;
        
        echo "</tr>" ;
      }
  
      // Close the table for the current plan
      echo "</table>";
      echo "<br>";

    } elseif ($plan == 'Long-Term Plan') {
      $sr_no = 1;
      $duration = 12 * 12;
      echo "<h2>Long-Term Plan</h2>";
      echo "<table id='my-plan-table'>";
      echo "<tr>";
      echo "<th>SR.No</th>" ;
      echo "<th>Application No.</th>" ;
      echo "<th>Application Date</th>" ;
      echo "<th>Invested Plan Name</th>" ;
      echo "<th>Monthly Investment Amount</th>" ;
      echo "<th>Start Date</th>" ;
      echo "<th>Due Date</th>" ;
      echo "<th>Payment</th>" ;
      echo "<th>Status</th>" ;

      echo "</tr>" ;

      $end_date = date('Y-m-d', strtotime($start_date . " +$duration months"));
    
    $monthly_investment = 2000; // You need to modify this to display the actual monthly investment amount

    if (isset($_POST['sr_no']) && isset($_POST['application_no']) && isset($_POST['plan'])) {
      $sr_no = $_POST['sr_no'];
      $application_no = $_POST['application_no'];
      $plan = $_POST['plan'];
    
      // Insert the data into the monthly_pay table
      $query = "INSERT INTO monthly_pay (sr_no, application_no, plan) VALUES ('$sr_no', '$application_no', '$plan')";
      mysqli_query($con, $query);
    }
    
    // Check if the sr_no, application_no, and plan from the monthly payment table are in the monthly_pay database table
    $query = "SELECT COUNT(*) as count FROM monthly_pay WHERE sr_no = $sr_no AND application_no = '{$row['application_no']}' AND plan = '$plan'";
    $result2 = mysqli_query($con, $query);
    $row2 = mysqli_fetch_assoc($result2);
    $count = $row2['count'];
    
    // Display the Status column based on whether the data is found in the monthly_pay table
    if ($count == $sr_no) {
      $status = "success";
    } else {
      $status = "pending";
    }

      for ($i = 0; $i < $duration; $i++) {

      
    
        echo "<tr class='my-plan-row'>" ;
        echo "<td>  $sr_no  </td>"; // You need to modify this to generate the SR.No dynamically
        
        echo "<td>" . $row['application_no'] . "</td>" ;
        echo "<td>" . $row['applicationdate'] . "</td>" ;
        echo "<td>" . $row['plan'] . "</td>" ;
        echo "<td>" . $monthly_investment . "</td>" ;
        echo "<td>" . $start_date . "</td>" ;
        $start_date = date('Y-m-d', strtotime($start_date . " +1 month"));
        $due_date=$start_date;
        echo "<td>" . $due_date . "</td>" ;
        echo "<td><a href='payment.php' style='width:10px;' class='pay-button-link'>
        <form action='process_pay.php' method='post'>
        <input type='hidden' name='sr_no' value='$sr_no'>
        <input type='hidden' name='application_no' value='$row[application_no]'>
        <input type='hidden' name='plan' value='$row[plan]'>
        <button type='submit' class='pay-button'>Pay Now</button>
      </form>      </a></td>" ; 
       echo"<td>". $status.  "</td>";
        $sr_no++;
        
        echo "</tr>" ;
      }
  
      // Close the table for the current plan
      echo "</table>";
      echo "<br>";

    } else {
      // If the plan is not predefined, use the duration from the planform table
      $duration = $row['duration'];
      echo "<h2>Custom Plan</h2>";
      echo "<table>";
      echo "<tr>";
      echo "<th>SR.No</th>" ;
      echo "<th>Application No.</th>" ;
      echo "<th>Application Date</th>" ;
      echo "<th>Invested Plan Name</th>" ;
      echo "<th>Monthly Investment Amount</th>" ;
      echo "<th>Start Date</th>" ;
      echo "<th>Due Date</th>" ;
      
      // echo "<th>Fine Amount</th>" ;
      echo "<th>Payment</th>" ;
      echo "<th>Status</th>" ;

      echo "</tr>" ;

      $end_date = date('Y-m-d', strtotime($start_date . " +$duration months"));
    
    $monthly_investment = 2000; // You need to modify this to display the actual monthly investment amount

    if (isset($_POST['sr_no']) && isset($_POST['application_no']) && isset($_POST['plan'])) {
      $sr_no = $_POST['sr_no'];
      $application_no = $_POST['application_no'];
      $plan = $_POST['plan'];
    
      // Insert the data into the monthly_pay table
      $query = "INSERT INTO monthly_pay (sr_no, application_no, plan) VALUES ('$sr_no', '$application_no', '$plan')";
      mysqli_query($con, $query);
    }
    
    // Check if the sr_no, application_no, and plan from the monthly payment table are in the monthly_pay database table
    $query = "SELECT COUNT(*) as count FROM monthly_pay WHERE sr_no = $sr_no AND application_no = '{$row['application_no']}' AND plan = '$plan'";
    $result2 = mysqli_query($con, $query);
    $row2 = mysqli_fetch_assoc($result2);
    $count = $row2['count'];
    
    // Display the Status column based on whether the data is found in the monthly_pay table
    if ($count == $sr_no) {
      $status = "success";
    } else {
      $status = "pending";
    }

      for ($i = 0; $i < $duration; $i++) {

      
    
        echo "<tr class='my-plan-row'>" ;
        echo "<td>  $sr_no  </td>"; // You need to modify this to generate the SR.No dynamically
        
        echo "<td>" . $row['application_no'] . "</td>" ;
        echo "<td>" . $row['applicationdate'] . "</td>" ;
        echo "<td>" . $row['plan'] . "</td>" ;
        echo "<td>" . $monthly_investment . "</td>" ;
        echo "<td>" . $start_date . "</td>" ;
        $start_date = date('Y-m-d', strtotime($start_date . " +1 month"));
        $due_date=$start_date;
        echo "<td>" . $due_date . "</td>" ;
        echo "<td><a href='payment.php' style='width:10px;' class='pay-button-link'>
        <form action='process_pay.php' method='post'>
        <input type='hidden' name='sr_no' value='$sr_no'>
        <input type='hidden' name='application_no' value='$row[application_no]'>
        <input type='hidden' name='plan' value='$row[plan]'>
        <button type='submit' class='pay-button'>Pay Now</button>
      </form>      </a></td>" ; 
       echo"<td>".$status.   "</td>";
        $sr_no++;
        
        echo "</tr>" ;
      }
  
      // Close the table for the current plan
      echo "</table>";
      echo "<br>";

    }
    
  }
} 
 else {
  echo "Error: " . mysqli_error($con);
}


// Close the database connection
mysqli_close($con);
?>
            
          </section>
        </section>
        <?php endif; ?>


        <?php if (isset($_GET['page']) && $_GET['page'] == 'profile'): ?>
        <div class="profile-container" id="profile" style="padding-left:200px;margin-left:19%;">
        <div class="profile-header">
    <img src="./dashimg/profile.png" alt="Profile Image" />
    <h2><?php echo $name; ?></h2>
  </div>
  <table>
    <tbody>
      <tr>
        <td><strong>Email:</strong></td>
        <td style="font-size: 1.2em; text-align: center;"><?php echo $email; ?></td>
      </tr>
      <tr>
        <td><strong>Phone:</strong></td>
        <td style="font-size: 1.2em; text-align: center;"><?php echo $phone; ?></td>
      </tr>
      <tr>
        <td><strong>Address:</strong></td>
        <td style="font-size: 1.2em; text-align: center;"><?php echo $address; ?></td>
      </tr>
      <tr>
        <td><strong>Birth Date:</strong></td>
        <td style="font-size: 1.2em; text-align: center;"><?php echo $bdate; ?></td>
      </tr>
      <tr>
        <td><strong>Gender:</strong></td>
        <td style="font-size: 1.2em; text-align: center;"><?php echo $gender; ?></td>
      </tr>
    </tbody>
  </table>
  <button class="edit-button">Edit</button>
</div>
<?php endif; ?>

<?php if (isset($_GET['page']) && $_GET['page'] == 'myplans'): ?>
<div class="my-plans-container" id="myplans" style="padding-left:100px;margin-left:19%;">
<div class="my-plan-header">
    <h2>My Plan</h2>
  </div>
  <table class="my-plan-table">
    <tbody>
      <tr>
        <th>Plan Name</th>
        <th>Application Number</th>
        <th>Application Date</th>
        <th>Duration</th>
        <th>Start Date</th>
        <th>End Date</th>
        <th>Payment Type</th>
        <th>Interest Rate</th>
        <th>Amount Invested</th>
        <th>Expected Return</th>
        <th>Status</th>
      </tr>
      <tr>
      <?php
      // Access the ID of the user who has logged in to the dashboard
      $query = $query = "SELECT * FROM login_details WHERE date_time = (SELECT MAX(date_time) FROM login_details)";
$result = mysqli_query($con, $query);

// Check if the query was successful
if (!$result) {
    echo "Error: " . mysqli_error($con);
} else {
    // Fetch the result and display the name
    $user = mysqli_fetch_assoc($result);
    $user_id=$user["id"];
   
}

      // Select the data from the planform table for the user
      $query = "SELECT * FROM planform WHERE id = $user_id";
      $result = mysqli_query($con, $query);

      // Check if the query was successful before attempting to access the result
      if ($result) {
        // Loop through the result and display each row in the "My Plan" table section
        while ($row = mysqli_fetch_assoc($result)) {
          echo "<tr>";
          echo "<td>" . $row['plan'] . "</td>";
          echo "<td>" . $row['application_no'] . "</td>";
          echo "<td>" . $row['applicationdate'] . "</td>";
 // Check if the plan name is one of the predefined plans
if ($row['plan'] == 'Annual Plan' || $row['plan'] == 'Short-Term Plan' || $row['plan'] == 'Long-Term Plan') {
  // Calculate the duration, end date, interest rate, and amount invested based on the plan name
  if ($row['plan'] == 'Annual Plan') {
    $duration = '1 year';
    $end_date = date('Y-m-d', strtotime('+1 year', strtotime($row['applicationdate'])));
    $amount_invested = 24000;
    $interest_rate = 0.47;
  } elseif ($row['plan'] == 'Short-Term Plan') {
    $duration = '6 years';
    $end_date = date('Y-m-d', strtotime('+6 years', strtotime($row['applicationdate'])));
    $amount_invested = 144000;
    $interest_rate = 0.52;
  } elseif ($row['plan'] == 'Long-Term Plan') {
    $duration = '12 years';
    $end_date = date('Y-m-d', strtotime('+12 years', strtotime($row['applicationdate'])));
    $amount_invested = 288000;
    $interest_rate = 1;
  }
} else {
  // Set default values for the duration, end date, interest rate, and amount invested if the plan name is not one of the predefined plans
  $duration = $row['duration'];
  $end_date = $row['end_date'];
  $amount_invested = $row['amount_invested'];
  $interest_rate = $row['interest_rate'];
}

// Display the duration, start date, end date, payment type, interest rate, amount invested, and expected return
echo "<td>" . $duration . "</td>";
echo "<td>" . $row['applicationdate'] . "</td>";
echo "<td>" . $end_date . "</td>";
echo "<td>" . (isset($row['payment_type']) ? $row['payment_type'] : 'Monthly') . "</td>";
echo "<td>" . (isset($interest_rate) ? $interest_rate : 'N/A') . "</td>";
echo "<td>" . (isset($amount_invested) ? $amount_invested : 'N/A') . "</td>";

// Calculate the expected return based on the interest rate and amount invested
$expected_return = (isset($interest_rate) && isset($amount_invested)) ? $amount_invested * (1 + $interest_rate) : 'N/A';
echo "<td>" . $expected_return . "</td>";

// Write the PHP code for the status column
if ($end_date == 'completed') {
  echo "<td>Completed</td>";
} else {
  echo "<td>Active</td>";
}
          echo "</tr>";
          
        }
      }
      // Close the database connection
      mysqli_close($con);
      ?>
    </tbody>
  </table>
</div>
<?php endif; ?>



      </div>
      <script>
 window.onload = function(){
  var table = document.getElementById("my-plan-table")
  var rows = table.getElementsByClassName("my-plan-row")

  for (var i = 0; i < rows.length; i++){
    var startDateStr = rows[i].getElementsByTagName("td")[5].innerText
    var endDateStr = rows[i].getElementsByTagName("td")[6].innerText
    var startDate = new Date(Date.parse(startDateStr))
    var endDate = new Date(Date.parse(endDateStr))
    var now = new Date()

    if (now >= startDate && now < endDate) {
      rows[i].style.display = "table-row"
      if(i > 0) {
        rows[i-1].style.display = "table-row"
      }
    } else {
      rows[i].style.display = "none"
      if(i < rows.length - 1) {
        rows[i+1].style.display = "none"
      }
    }
  }
 }
</script>



    </body>
    
    </html
></span>
