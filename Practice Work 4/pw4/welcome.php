<?php
session_start();
$counter = intval(file_get_contents("counter.dat"));
if(!$_SESSION['#'])
    {
     $_SESSION['#'] = true;
     $counter++;  //刷新一次+1
     $fp = fopen("counter.dat","w");  //以写入的方式，打开文件，并赋值给变量fp
     fwrite($fp, $counter);   //将变量fp的值+1
     fclose($fp);
    }
if (isset($_SESSION["name"]) && isset($_SESSION["email"])){
    echo "Welcome, ".$_SESSION["name"].", your email is ".$_SESSION["email"].".";
}else {
    header ("location: login.html");
}
?>
<br>
<a href="welcome.php">Reload</a>
<br>
<a href="logout.php">Logout</a>
<p>The times user visited the page: <?php echo "$counter";?></p>
