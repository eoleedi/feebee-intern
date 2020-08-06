<?php
    session_start();
    if ($_SESSION["account"] != TRUE){
        header("location:index.php"); 
    }
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
                    <a class="nav-link" href="edit_record.php">記錄</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="search.php">搜尋</a>
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
            <form method="post">
                <div class="form-group row">
                    <button id="search_btn" class="btn btn-outline-info my-2 my-sm-0" type="submit" name="search_btn" value="1">搜尋</button>
                    <div class="col-sm-10">
                        <input type="text" class="form-control" id="search_text" placeholder="請輸入關鍵字" name="search_text">
                    </div>
                </div>
            </form>
            <br>
        </div>

        <div>
            <table class="table">

                <thead class="thead-light">
                    <tr>
                        <th scope="col" class="">關鍵字</th>
                        <th scope="col" class="">分類</th>
                    </tr>
                </thead>

                <tbody>
                    <!--新增php-->
                    <?php
                        $search = 0;

                        if (isset($_POST['search_btn'])) {

                            $link = mysqli_connect(
                                'localhost',
                                'root',
                                'root',
                                'sbs_distribution'
                            );

                            $search = $_POST['search_text'];
                            
                            $sql = "SELECT * FROM product WHERE product_status = 2 AND product_title = \"".$search."\"";
                            $result = mysqli_query($link, $sql);
                            $search_result = mysqli_fetch_all($result);

                            if($search_result == []){
                                echo "<script>alert('查無結果');</script>";
                            }
                            else{
                                echo'<tr>
                                        <th scope="col" id="search_title">'.$search_result[0][0].'</th>
                                        <th scope="col"><button id="search_change_cat_btn" class="btn btn-outline-info my-2 my-sm-0" type="submit" onclick="showModal()">'.$search_result[0][1].'</button></th>
                                    </tr>';
                            }



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
    <script type="text/javascript" src="js.js?v=1122" charset="UTF-8"></script>
</body>

</html>
