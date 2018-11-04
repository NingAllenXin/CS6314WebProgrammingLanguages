<?php
session_start();
$username = $_POST['username'];
$password = $_POST['password'];
if ($username == "" || $password == "") {
    header('location: login.html');
} else {
    $con=mysqli_connect("localhost","root","root","web");
    $query = "SELECT password FROM user WHERE username = '$username';";
    $result = mysqli_query ($con,$query);
    if($result->num_rows == 0) // User not found. So, redirect to login_form again.
    {
        header('location: login.html');
        exit();
    }
    $userData = mysqli_fetch_array($result);
    mysqli_close($con);
    if($password != $userData['password']) // Incorrect password. So, redirect to login_form again.
    {
        header('location: login.html');
        exit();
    }else{ // Redirect to home page after successful login.
        session_regenerate_id(); //recommended since the user session is now authenticated
        $_SESSION["username"] = $username;
        session_write_close();
        header("location: books.php");
    }
}
?>