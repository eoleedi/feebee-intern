<?php
if (isset($_GET['abc'])) {
    echo 123;
}
?>

<!DOCTYPE html>
<html>
<head>
</head>
<body>
    <form method="get">
        <input type="submit" name="abc">
    </form>
</body>
</html>