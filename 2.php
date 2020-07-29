<?php
    $aaa = 0;
    if (isset($_POST['aaa'])) {
        $aaa = $_POST['temp2'];
        echo $aaa;
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
<form method="post">
    <input type="text" name="temp2" id="temp1" value="123"><br>
    <button type="submit" name="aaa">qwe</button>
</form>
<form method="post">

</form>
</body>
</html>


