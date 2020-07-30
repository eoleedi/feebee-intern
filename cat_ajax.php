<?php
    session_start();
    $user = $_SESSION["account"];

    $product_title = 0;
    $product_cat_change = 0;

    $link = mysqli_connect(
        'localhost',
        'root',
        '',
        'sbs_distribution'
    );

    $product_title = $_POST['cat_title_id'];
    $product_cat_change = $_POST['cat_btn_id'];
    $sql_change_status = "UPDATE product SET product_title = \"".$product_title."\"
                                            ,product_cat = \"".$product_cat_change."\"
                                            , product_status = 2, product_editor = \"".$user."\"
                                            , product_edit_time = \"".date('Y-m-d H:i:s',strtotime(gmdate('Y-m-d H:i:s').' +8 hours'))."\" 
                                            WHERE product_title = \"".$product_title."\"";
    $result = mysqli_query($link, $sql_change_status);
    mysqli_commit($link);
    mysqli_close($link);

    //$result['rcode'] = 0 ;
    //header('Content-Type: application/json');
    //echo json_encode($result);   
?>  