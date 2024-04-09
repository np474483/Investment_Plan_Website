<?php
// Establish a connection with the database
$servername = "localhost";
$username = "root";
$password = "";
$dbname = "investment";

$conn = new mysqli($servername, $username, $password, $dbname);

if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}

// Check if the form is submitted
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    // Get the admin information from the form
    $user_name = $_POST['user_name'];
    $password = $_POST['password'];

    // Query the database to check if the admin information is correct
    $sql = "SELECT * FROM admin WHERE user_name = '$user_name' AND password = '$password'";
    $result = $conn->query($sql);

    // Check if the admin information is correct
    if ($result->num_rows > 0) {
        // Information is correct, so login successfully
        echo "Successfully logged in!";
    } else {
        // Information is incorrect, so display an error message
        echo "Invalid admin information. Please try again.";
    }
} else {
    // Form is not submitted, so display an empty response
    echo "";
}

// Close the database connection
$conn->close();
?>




<!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="UTF-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <title>Admin Login</title>
    
    <link
      rel="stylesheet"
      href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.3/css/all.min.css"
    />
    <script
      type="module"
      src="https://unpkg.com/ionicons@5.5.2/dist/ionicons/ionicons.esm.js"
    ></script>
  </head>

  <style>
    * {
  margin: 0;
  padding: 0;
  box-sizing: border-box;
  font-family: "Poppins", sans-serif;
}

body {
  min-height: 100vh;
  display: flex;
  align-items: center;
  justify-content: center;
  background: #7d2ae8;
  padding: 30px;
}

.container {
  position: relative;
  margin: 0 auto;
  width: 30%;
  background: #fff;
  padding: 40px 30px;
  box-shadow: 0 5px 10px rgba(0, 0, 0, 0.2);
}

.container .form-content {
  display: flex;
  flex-direction: column;
}

.container .form-content .title {
  position: relative;
  font-size: 22px;
  font-weight: 500;
  color: #0d0d0d;
  margin-bottom: 20px;
}

.container .form-content .title:before {
  content: "";
  position: absolute;
  left: 0;
  bottom: -5px;
  height: 2px;
  width: 100%;
  background: #ebb619;
}

.container .form-content .input-boxes {
  margin-top: 30px;
  
}

.container .form-content .input-box {
  display: flex;
  align-items: center;
  height: 50px;
  margin: 10px 0;

}

.container .form-content .input-box input {
  flex: 1;
  height: 100%;
  outline: none;
  border: none;
  padding: 0 30px;
  font-size: 16px;
  font-weight: 500;
  border-bottom: 2px solid rgba(0, 0, 0, 0.2);
  transition: all 0.3s ease;
}

.container .form-content .input-box input:focus,
.container .form-content .input-box input:valid {
  border-color: #7d2ae8;
}

.container .form-content .input-box i {
  color: #7d2ae8;
  font-size: 17px;
}

.container .form-content .text {
  font-size: 14px;
  font-weight: 500;
  color: #333;
}

.container .form-content .text a {
  text-decoration: none;
}

.container .form-content .text a:hover {
  text-decoration: underline;
}

.container .form-content .button {
  margin-top: 40px;
  padding-left: 120px;
  
}

.container .form-content .button input {
  color: #fff;
  width: 100%;
  background: #7d2ae8;
  border-radius: 6px;
  padding: 10px 20px;
  cursor: pointer;
  transition: all 0.4s ease;
}

.container .form-content .button input:hover {
  background: #5b13b9;
}

.container .form-content label {
  color: #5b13b9;
  cursor: pointer;
}
  </style>
  <body>
    <div class="container">
      <div class="forms">
        <div class="form-content">
          <div class="plan1-form">
            <div class="title">Admin Login</div>
            <form action="" method="POST">
             </div>
                <div class="input-box">
                  <i class="fas fa-id-card"></i>
                  <input
                    type="user_name"
                    name="user_name" title="Please enter user name"
                    placeholder="Enter Your User Name"
                    required />
                </div>

                <div class="input-box">
                    <i class="fas fa-lock"></i>
                    <input
                      type="password"
                      name="password" title="Please enter password"
                      placeholder="Enter Your Password"
                      required />
                  </div>
                
                <div class="button input-box">
                  <a href="finduser.html"><input type="button" value="Submit" /></a>
                </div>
               
                </div>
              </div>
            </form>
          </div>
        </div>
</body>
</html>
