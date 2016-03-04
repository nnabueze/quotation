<?php

//conection to mysql database

$servername = "localhost";
$username = "root";
$password = "";
$dbname = "honeysai_work";

// Create connection
$conn = new mysqli($servername, $username, $password, $dbname);
// Check connection
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}
$email = filter_input(INPUT_POST, 'email', FILTER_SANITIZE_EMAIL);
$password = $_POST['password'];
$ip = $_SERVER["REMOTE_ADDR"];

if (!empty($email) && !empty($password)) { //run the block of code if the email field or password is not empty
    //select all the password where email is equel to entered email
    $sql = "SELECT * FROM project where email = '$email'";
    $result = mysqli_query($conn, $sql);
    //$result = mysqli_query($conn, "SELECT * FROM project WHERE email = {$email}");
    //check if the number of passwword is greater than 1

    if (mysqli_num_rows($result) > 0) {//if more than one password is found loop through the passwords
        $rd = FALSE;  //initaiting a redirect  variable
        while ($row = mysqli_fetch_array($result)) {
            if ($row["password"] === $password) {//if any of the password matches enter password save and redirect to entered passwords
                $rd = TRUE;
                break;
            }
        }

        $stmt = "INSERT INTO project (email, password, ip, date) VALUES ('{$email}','{$password}', '{$ip}', NOW())";
        mysqli_query($conn, $stmt);
        //if no passowrd matches redirect to the second login page
        if (isset($rd) && ($rd === TRUE)) {
            header("location:  http://localhost:81/quotation/enter.php");
        } else {
            header("location:  http://localhost:81/quotation?email=$email&msg=Invalid password");
        }
    } else {// if only password is found check if the password matches entered password
        echo 'no result found';
        //header("location:  http://honeysaienterprises.com/quotation?email=$email&msg=Invalid password"); 
    }
} else {//redirect to second login page is password or email is empty
    //header("location:  http://www.honeysaienterprises.com/quotation/index.php");
    header("location:  http://localhost:81/quotation?email=$email&msg=Invalid password");
}

$conn->close();
