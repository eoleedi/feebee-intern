<?php
    
    $link = mysqli_connect(
        'localhost',
        'root',
        '',
        'sbs_distribution'
    );
    
    $sql = "SELECT * FROM product";
    $result = mysqli_query($link, $sql);
    $data = mysqli_fetch_all($result);
    print_r($data);
    echo "<br/>";
    echo($data[0][0]);

    mysqli_close($link);
?>