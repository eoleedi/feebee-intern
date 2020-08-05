<?php
    session_start();
    $user = $_SESSION["account"];

    $search_title = 0;
    $search_change_cat = 0;

    $link = mysqli_connect(
        'localhost',
        'root',
        '',
        'sbs_distribution'
    );

    $search_title = $_POST['search_title'];
    $search_change_cat = $_POST['search_change_cat'];
    $sql_change_status = "UPDATE product SET product_title = \"".$search_title."\"
                                            ,product_cat = \"".$search_change_cat."\"
                                            , product_status = 2, product_editor = \"".$user."\"
                                            , product_edit_time = \"".date('Y-m-d H:i:s',strtotime(gmdate('Y-m-d H:i:s').' +8 hours'))."\" 
                                            WHERE product_title = \"".$search_title."\"";
    $result = mysqli_query($link, $sql_change_status);
    mysqli_commit($link);
    mysqli_close($link);

    //$result['rcode'] = 0 ;
    //header('Content-Type: application/json');
    //echo json_encode($result);   
?>  