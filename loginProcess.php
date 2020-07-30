<?php
    $link = mysqli_connect(
        'localhost',
        'root',
        '',
        'sbs_distribution'
    );

    $acc = $_POST['username'];
    $sql = "SELECT * FROM User WHERE user_id = '$acc'";
    $result = mysqli_query($link, $sql);
    $row = mysqli_fetch_array($result, MYSQLI_NUM);

    if(!empty($_POST['sub'])){
        if($_POST['pwd']==$row[1]){
            echo "登入成功";  
            session_start();//開啟session
            $_SESSION['username'] = $_POST['username'];//將登入名儲存到session中
            header("Location: 派發系統.php");
            exit();
        }
        else{
        $home_url = '配發系統.php';
        header('Location: '.$home_url);
        }
    }
    else{
        header("Location:  login1.php?errno=2");
        exit();
    }
?>
