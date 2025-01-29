<?php

$hostname = "localhost";
$db_username = "root";
$db_password = "";
$databasename = "ddu blog1";

if(isset($_POST['signup'])) {
    if(empty($_POST['firstname']) || empty($_POST['lastname']) || empty($_POST['phone']) || 
        empty($_POST['email']) || empty($_POST['username']) || empty($_POST['password']) || empty($_POST['Confirm'])) 
    {
        header("Location: resignup.html");
        exit;
    } 
    else 
    {
        $firstname = $_POST['firstname'];
        $lastname = $_POST['lastname'];
        $phone = $_POST['phone'];
        $email = $_POST['email'];
        $username = $_POST['username'];
        $password =$_POST['password'];
        $confirm = $_POST['Confirm'];
        
        $conn = mysqli_connect($hostname, $db_username, $db_password, $databasename);
        
        if (!$conn) {
            die("Database Connection failed: " . mysqli_connect_error());
        }
        
        if($password == $confirm && strpos($email, "@ddu.edu.et") !== false) {
            $firstname = mysqli_real_escape_string($conn, $firstname);
            $lastname = mysqli_real_escape_string($conn, $lastname);
            $phone = mysqli_real_escape_string($conn, $phone);
            $email = mysqli_real_escape_string($conn, $email);
            $username = mysqli_real_escape_string($conn, $username);
            $password = mysqli_real_escape_string($conn, $password);
            $query = "INSERT INTO account (first_name, last_name, phone_number, email, user_name, password) VALUES ('$firstname', '$lastname', '$phone', '$email', '$username', '$password')";
            
            if (mysqli_query($conn, $query)) {
                mysqli_close($conn);
                header('Location: welcome.html');
                exit();
            } else {
                echo "Error: " . $query . "<br>" . mysqli_error($conn);
            }
        }
        else {
            header("location: resignup.html");
            exit();
        }
    }
}
?>
