<?php
session_start();
if(empty($_SESSION['username'])){
 header("Location: login.php?errno=3");
 exit();
}
echo "你是管理員，你現在擁有後臺管理許可權";
?>