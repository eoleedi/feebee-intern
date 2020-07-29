<?php
    $temp2 = 0;
    if (isset($_GET['aaa'])) {
        $temp2 = $_GET['temp2'];
        echo $temp2;
    }
    else{
        echo 123;
    }
    

?>

<!DOCTYPE html>
<html>
<head>
</head>
<body>
<form method="get">
    <input type="test" name="temp2" id="temp1" value="1232132"><br>
    <button type="submit" name="aaa">qwe</button>
</form>
</body>
</html>


