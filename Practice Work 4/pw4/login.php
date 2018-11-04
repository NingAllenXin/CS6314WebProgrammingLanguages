<?php
$password = $_POST["password"];
$pieces = explode("@", $_POST["email"]);
$suffix = explode(".", $pieces[1]);

if ($_POST["email"] == "" || $_POST["name"] == "" || $_POST["password"] == "") {
    header('location: login.html');
} else if (strlen($_POST["password"]) <= '6' || !preg_match("#[0-9]+#",$password) || !preg_match("#[A-Z]+#",$password) || !preg_match("#[a-z]+#",$password)) {
    header('location: login.html');
} else if (!filter_var($_POST["email"], FILTER_VALIDATE_EMAIL) || strlen($suffix[1]) != '3') {
    header('location: login.html');
} else {

      session_start();
      $_SESSION["name"] = $_POST["name"];
      $_SESSION["email"] = $_POST["email"];
      session_write_close();
      header("location: welcome.php");

}

?>
