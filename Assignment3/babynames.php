<?php
$gender = $_GET["gender"];
$year = $_GET["year"];
$con = mysqli_connect("localhost", "root", "root", "HW3");

if($gender == "" && $year == ""){
    $sql = "SELECT * FROM babynames";
    $result = mysqli_query($con, $sql);
}
else if($gender == ""){
    $sql = "SELECT * FROM babynames WHERE year = '$year'";
    $result = mysqli_query($con, $sql);
}
else if($year == ""){
    $sql = "SELECT * FROM babynames WHERE gender = '$gender'";
    $result = mysqli_query($con, $sql);
}
else{
    $sql = "SELECT * FROM babynames WHERE year = '$year' AND gender = '$gender'";
    $result = mysqli_query($con, $sql);
}
echo "<tr><th>Name</th><th>Year</th><th>Ranking</th><th>Gender</th></tr>";
while($row = mysqli_fetch_array($result)){
    echo "<tr><td>" . $row["name"] . "</td><td>" . $row["year"] . "</td><td>" . $row["ranking"] . "</td><td>" . $row["gender"] . "</td></tr>";
}
?>