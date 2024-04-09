<?php
session_start();

include("db.php");

if ($_SERVER['REQUEST_METHOD'] == "POST") {
    $email = $_POST['email'];
    $password = $_POST['crpass']; // Corrected typo: crpass -> password

    $stmt = $con->prepare("SELECT id, fname, pnumber,bdate,gender,email,address FROM registration_form WHERE email=? AND crpass=?");
    $stmt->bind_param("ss", $email, $password);
    $stmt->execute();
    $result = $stmt->get_result();
    $count = $result->num_rows;

    if ($count == 1) {
        $user_data = $result->fetch_assoc(); // Fetch user data

        // Insert user data into the login_detail table
        $login_query = "INSERT INTO login_details (id,name, phone,birth_date,gender,email,address, date_time) VALUES (?, ?, ?, ?, ?, ?, ?, NOW())";
        $stmt = mysqli_prepare($con, $login_query);
        mysqli_stmt_bind_param($stmt, "issssss", $user_data['id'], $user_data['fname'], $user_data['pnumber'], $user_data['bdate'], $user_data['gender'], $user_data['email'], $user_data['address']);
        mysqli_stmt_execute($stmt);

        echo "Login Successful";
        header("Location: dashboard.php");
    } else {
        echo "Invalid Email or Password";
    }
}
?>