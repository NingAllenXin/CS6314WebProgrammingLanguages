<?php
$request = substr($_SERVER["REQUEST_URI"], strrpos($_SERVER["REQUEST_URI"], "/") + 1);
function echoJSON($andMessage){
    $data = array('message' => $andMessage);
    $jsonstring = json_encode($data);
    header('Content-Type: application/json');
    echo $jsonstring;
}
$user = 'root';
$password = 'root';
$db = 'HW4';
$host = 'localhost';
$link = mysqli_init();
$success = mysqli_real_connect(
    $link,
    $host,
    $user,
    $password,
    $db);

if($success){

    if(is_numeric($request)){

        $result = mysqli_query($link,"SELECT Title, Year, Price, Category FROM Book WHERE Book.Book_id=$request");
        $row = mysqli_fetch_array($result);
        $array = array('title' => $row[0], 'year' => $row["Year"], 'price' => $row["Price"], 'category' => $row["Category"]);
        $result = mysqli_query($link,"SELECT Author_Name FROM Book_Authors JOIN Book ON Book.Book_id = Book_Authors.Book_id JOIN Authors ON Authors.Author_id = Book_Authors.Author_id WHERE Book.Book_id=$request");
        while ($row = mysqli_fetch_array($result)){
            $arr[] = $row["Author_Name"];
        }

        $array['authors']=$arr;
        $jsonstring = json_encode($array);
        header('Content-Type: application/json');
        echo $jsonstring;
    } else {
        $result = mysqli_query($link,"SELECT * FROM `book`");
        while ($row = mysqli_fetch_array($result)){
            $arr[] = array('title' => $row["Title"], 'price' => $row["Price"], 'category' => $row["Category"]);
        }
        $jsonstring = json_encode($arr);
        header('Content-Type: application/json');
        echo $jsonstring;
    }
}else{
    echoJSON("Connect Error: " . mysqli_connect_error());
}
mysqli_close($link);
?>
