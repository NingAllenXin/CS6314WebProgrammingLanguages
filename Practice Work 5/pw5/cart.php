<html lang="en">
<head>
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css">
</head>
<body>
<?php
session_start();
$username = $_SESSION['username'];
$bookid = $_GET['ids'];

$user = 'root';
$password = 'root';
$db = 'web';
$host = 'localhost';
$port = 8889;

$conn = mysqli_connect(
    $host,
    $user,
    $password,
    $db,
    $port
);

if (!$conn){
    echo "Connection failed!";
    exit;
}



$insert = "INSERT INTO shoppingcart (UserName, BookID)
VALUES ('$username', '$bookid')";

if (mysqli_query($conn, $insert) === TRUE) {

    $sql = "SELECT * FROM Book, shoppingcart WHERE Book.BookID = shoppingcart.BookID";
    $result = mysqli_query($conn, $sql);
    echo "<table class='table table-striped'><tr><td>Book Title</td><td>List Price</td></tr>";
    while($row = mysqli_fetch_array($result)){
        echo "<tr><td>{$row["BookTitle"]}</td><td>{$row["ListPrice"]}</td></tr>";
    }
    echo "</table>";
} else {
    echo "The book is already in the cart <br>";
}


mysqli_close();

?>
<a href="books.php">Continue Shopping</a>
</body>
</html>
