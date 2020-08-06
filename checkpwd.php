
<?php
    session_start();
    $link = mysqli_connect('localhost','root','root','sbs_distribution');
    $account = $_POST["account"];
    $sql = "SELECT * FROM User WHERE user_id = '$account'";
    $result = mysqli_query($link, $sql);
    $row = mysqli_fetch_array($result, MYSQLI_NUM);

if($_POST['password']==$row[1]){
    $id = mysqli_fetch_object($result)->id;
    mysqli_free_result($result);
    mysqli_close($link);
    
    
    $_SESSION['account'] = $_POST['account'];
    header("location:派發系統.php");  
    exit();
}
else{
    mysqli_free_result($result);
    mysqli_close($link);
    header("location:index.php?errno=1"); 
        
}
?>
