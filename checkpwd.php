
<?php

$link = mysqli_connect('localhost','root','','sbs_distribution');
$account = $_POST["account"];
$sql = "SELECT * FROM User WHERE user_id = '$account'";
$result = mysqli_query($link, $sql);
$row = mysqli_fetch_array($result, MYSQLI_NUM);

 
if($_POST['password']==$row[1]){
    $id = mysqli_fetch_object($result)->id;
    mysqli_free_result($result);
    mysqli_close($link);
    
    setcookie("id",$id);
    setcookie("passed","True");
    header("location:main.php");    
 }


else{
 mysqli_free_result($result);
        mysqli_close($link);
        header("location:index.php?errno=1"); 
        
 }
?>
