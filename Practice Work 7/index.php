<?php
    function echoJSON($andMessage){
        $data = array('message' => $andMessage);
        $jsonstring = json_encode($data);
        header('Content-Type: application/json');
        echo $jsonstring;
    }
    $user = 'root';
    $password = 'root';
    $db = 'PW7';
    $host = 'localhost';
    $link = mysqli_init();
    $success = mysqli_real_connect(
                                   $link,
                                   $host,
                                   $user,
                                   $password,
                                   $db,
                                   );
    if($success){
      $result = mysqli_query($link,"SELECT * FROM `book`");
      while ($row = mysqli_fetch_array($result)){
        $arr[] = array('title' => $row["title"], 'price' => $row["price"], 'category' => $row["category"]);
      }
      $jsonstring = json_encode($arr);
      header('Content-Type: application/json');
      echo $jsonstring;
    }else{
        echoJSON("Connect Error: " . mysqli_connect_error());
    }
    mysqli_close($link);
?>
