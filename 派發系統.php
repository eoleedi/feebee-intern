<?php
//session_start();
//if ($_SESSION["account"] != TRUE){
//    header("location:index.php"); 
//}
?>
<!doctype html>
<html>

<head>
    <meta charset="UTF-8">
    <title>派發系統</title>
    <link rel=stylesheet type="text/css" href="bootstrap.css">
    <link rel=stylesheet type="text/css" href="css.css?v=13">
</head>

<body>

    <!--上標-->
    <nav class="navbar navbar-expand-sm navbar-dark">
        <a class="navbar-brand" href="派發系統.php">派發系統</a>

        <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
            <span class="navbar-toggler-icon"></span>
        </button>

        <div class="collapse navbar-collapse" id="navbarSupportedContent">
            <ul class="navbar-nav mr-auto">
                <li class="nav-item">
                    <a class="nav-link" href="edit_record.html">記錄</a>
                </li>
            </ul>
            <ul class="navbar-nav">
                <li class="nav-item">
                    <h4><a class="nav-link" href="#"><?php
                        echo $_SESSION['account'];
                    ?></a></h4>
                </li>
            </ul>
            <form class="form-inline my-2 my-lg-0" action="logOut.php">
                <button class="btn btn-outline-success my-2 my-sm-0" type="submit" name="user_id">登出</button>
            </form>
        </div>

    </nav>

    <br>
    <!--派發系統-->
    <div style="background-color:white" align="center">
        <h3 align="center">資料派發系統</h3>
        <br>

        <div style="width: 630px;">
            <form method="get">
                <div class="form-group row">
                    <button id="submit_num" class="btn btn-outline-info my-2 my-sm-0" type="submit" name="receive_btn" value="1">接收</button>
                    <div class="col-sm-10">
                        <input type="test" class="form-control" id="inputPassword" placeholder="上限一次100筆" name="receive_num">
                    </div>
                </div>
            </form>
            <br>
        </div>

        <div>
            <table class="table">

                <thead class="thead-light">
                    <tr>
                        <th scope="col" class="sbs_no">筆數</th>
                        <th scope="col" class="sbs_title">標題</th>
                        <th scope="col" class="sbs_judge">判斷</th>
                        <th scope="col" class="sbs_status">狀態</th>
                    </tr>
                </thead>

                <tbody id="cat_select">

                    <!--新增php-->
                    <?php
                        $receive_num = 0;
                        if (isset($_GET['receive_btn'])) {
                            $link = mysqli_connect(
                                'localhost',
                                'root',
                                '',
                                'sbs_distribution'
                            );
                            
                            $sql_status_check = "SELECT * FROM product WHERE product_status = 1 AND  product_cat IS NULL";
                            $result = mysqli_query($link, $sql_status_check);

                            $data = mysqli_fetch_all($result);
                            for($i=0; $i < count($data); $i++){
                                $sql_clean = "UPDATE product SET product_title = \"".$data[$i][0]."\",product_cat = NULL, product_status = 0, product_editor = NULL, product_edit_time = NULL WHERE product_title = \"".$data[$i][0]."\"";
                                $result = mysqli_query($link, $sql_clean);
                                mysqli_commit($link);
                            }
                            
                            $data = 0;
                            $result = 0;

                            $sql = "SELECT * FROM product WHERE product_status = 0";
                            $result = mysqli_query($link, $sql);
                            $data = mysqli_fetch_all($result);

                            $receive_num = $_GET['receive_num'];

                            $receive_max = 100;
                            $data_max = count($data);

                            if($data_max == 0){
                                echo "<script>alert('大家很努力地做完了。');</script>";
                            }
                            if($receive_num > $receive_max){
                                echo "<script>alert('超過上限，請重新輸入。');</script>";
                            }
                            elseif($receive_num > 0 && $receive_num <= 100){
                                if($data_max < 100){
                                    for($i=0; $i < $data_max; $i++){
                                        $sql_change_status = "UPDATE product SET product_title = \"".$data[$i][0]."\",product_cat = NULL, product_status = 1, product_editor = NULL, product_edit_time = NULL WHERE product_title = \"".$data[$i][0]."\"";
                                        $result = mysqli_query($link, $sql_change_status);
                                        mysqli_commit($link);
                                    }

                                    for($i=1; $i < $data_max+1; $i++){
                                        echo '<tr id='.'tr_id_'.$i.'>
                                                <th scope="col" id='.'cat_id_'.$i.'>'.$i.'</th>
                                                <th scope="col" id='.'cat_title_'.$i.'>'.$data[$i][0].'</th>
                                                <th scope="col" id='.'cat_btn_'.$i.' class="cat_btn"><button class="btn btn-outline-info my-2 my-sm-0" type="submit" onclick="showModal()" value='.$i.'>選擇分類</button></th>
                                                <th scope="col" style="color:#FF5151;" id='.'cat_status_'.$i.'>no</th>  
                                            </tr>';
                                    }; 
                                }
                                if($data_max > 100){
                                    for($i=0; $i < $receive_num; $i++){
                                        $sql_change_status = "UPDATE product SET product_title = \"".$data[$i][0]."\",product_cat = NULL, product_status = 1, product_editor = NULL, product_edit_time = NULL WHERE product_title = \"".$data[$i][0]."\"";
                                        $result = mysqli_query($link, $sql_change_status);
                                        mysqli_commit($link);
                                    }

                                    for($i=1; $i < $receive_num+1; $i++){
                                        echo '<tr id='.'tr_id_'.$i.'>
                                                <th scope="col"id='.'cat_id_'.$i.'>'.$i.'</th>
                                                <th scope="col" id='.'cat_title_'.$i.'>'.$data[$i][0].'</th>
                                                <th scope="col" id='.'cat_btn_'.$i.' class="cat_btn"><button class="btn btn-outline-info my-2 my-sm-0" type="submit" onclick="showModal()" value='.$i.'>選擇分類</button></th>
                                                <th scope="col" style="color:#FF5151;" id='.'cat_status_'.$i.'>no</th>  
                                            </tr>';
                                    }; 
                                }
                            }
                            else{
                                echo "<script>alert('別亂打，請重新輸入。');</script>";
                            }
                            
                            $receive_num = 0;
                            mysqli_close($link);
                        }               
                    ?>
                </tbody>
            </table>
        </div>


        <!--選擇分類頁面-->
        <div id="category" class="modal fade bd-example-modal-lg" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
            <div class="modal-dialog modal-lg" role="document">
                <div class="modal-content">

                    <div class="modal-header">
                        <h5 class="modal-title" id="exampleModalLabel">選擇分類</h5>
                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                            <span aria-hidden="true">&times;</span>
                        </button>
                    </div>


                    <div class="btn-group">
                        <button type="button" class="btn btn-outline-secondary" name="button_cat" value="手機與智慧穿戴">手機與智慧穿戴</button>
                        <button type="button" class="btn btn-outline-secondary" name="button_cat" value="手錶與飾品">手錶與飾品</button>
                        <button type="button" class="btn btn-outline-secondary" name="button_cat" value="交通與旅遊">交通與旅遊</button>
                        <button type="button" class="btn btn-outline-secondary" name="button_cat" value="居家與家具">居家與家具</button>
                    </div>
                    <div class="btn-group">
                        <button type="button" class="btn btn-outline-secondary" name="button_cat" value="服裝與鞋包">服裝與鞋包</button>
                        <button type="button" class="btn btn-outline-secondary" name="button_cat" value="保健與護理">保健與護理</button>
                        <button type="button" class="btn btn-outline-secondary" name="button_cat" value="相機與攝影">相機與攝影</button>
                        <button type="button" class="btn btn-outline-secondary" name="button_cat" value="美妝與保養">美妝與保養</button>
                    </div>
                    <div class="btn-group">
                        <button type="button" class="btn btn-outline-secondary" name="button_cat" value="食品與特產">食品與特產</button>
                        <button type="button" class="btn btn-outline-secondary" name="button_cat" value="視聽與家電">視聽與家電</button>
                        <button type="button" class="btn btn-outline-secondary" name="button_cat" value="運動與休閒">運動與休閒</button>
                        <button type="button" class="btn btn-outline-secondary" name="button_cat" value="電腦與周邊">電腦與周邊</button>
                    </div>
                    <div class="btn-group">
                        <button type="button" class="btn btn-outline-secondary" name="button_cat" value="圖書與文具">圖書與文具</button>
                        <button type="button" class="btn btn-outline-secondary" name="button_cat" value="嬰幼與孕婦">嬰幼與孕婦</button>
                        <button type="button" class="btn btn-outline-secondary" name="button_cat" value="寵物與園藝">寵物與園藝</button>
                        <button type="button" class="btn btn-outline-secondary" name="button_cat" value="情趣用品">情趣用品</button>
                    </div>
                    <div class="btn-group">
                        <button type="button" class="btn btn-outline-secondary" name="button_cat" value="無法分類">無法分類</button>
                        <button type="button" class="btn btn-outline-secondary" name="button_cat" value="選擇分類">清除</button>
                    </div>

                </div>
            </div>
        </div>                    

    </div>

    <!--Script區-->
    <script src="https://code.jquery.com/jquery-3.5.1.js" integrity="sha256-QWo7LDvxbWT2tbbQ97B53yJnYU3WhH/C8ycbRAkjPDc=" crossorigin="anonymous"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.6/umd/popper.min.js" integrity="sha384-wHAiFfRlMFy6i5SRaxvfOCifBUQy1xHdJ/yoi7FRNXMRBu5WHdZYu1hA6ZOblgut" crossorigin="anonymous"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.2.1/js/bootstrap.min.js" integrity="sha384-B0UglyR+jN6CkvvICOB2joaf5I4l3gm9GU6Hc1og6Ls7i6U/mkkaduKaBhlAXv9k" crossorigin="anonymous"></script>
    <script type="text/javascript" src="js.js?v=113" charset="UTF-8"></script>
</body>

</html>
