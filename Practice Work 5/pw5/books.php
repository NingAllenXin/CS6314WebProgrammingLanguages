<html lang="en">
<head>
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css">
</head>
<body>

<?php

$search = $_GET["search"];
?>


<form action="books.php" method="GET">
    <input type="text" name="search" value="">
    <input type="submit" value="Search">
</form>


<?php

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

$sql = "CREATE TABLE shoppingcart (
BookID int PRIMARY KEY, 
UserName VARCHAR(30) NOT NULL
)";

if ($conn->query($sql) === TRUE) {

} else {
    echo "Error creating table: " . $conn->error;
}

$sql = "SELECT * FROM Book";

if ($search){
    $sql .= " WHERE BookTitle LIKE '%$search%' ";

}


$result = mysqli_query($conn, $sql);

echo "<table class='table table-striped'><tr><td>Book Title</td><td>List Price</td></tr>";

while($row = mysqli_fetch_array($result)){

    echo "<tr><td>{$row["BookTitle"]}</td><td>{$row["ListPrice"]}</td><td><a href='cart.php?ids={$row["BookID"]}' methods='post'>add to cart</a></td></tr>";

}


echo "</table>";
mysqli_close();

?>
<a href="logout.php">Logout</a>
</body>
</html>