<!doctype html>
<html>

<head>
    <meta charset="UTF-8">
    <title>派發系統</title>
    <link rel=stylesheet type="text/css" href="bootstrap.css">
    <link rel=stylesheet type="text/css" href="css.css">
</head>

<body>

    <!--上標-->
    <nav class="navbar navbar-expand-sm navbar-dark">
        <a class="navbar-brand" href="派發系統.html">派發系統</a>
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
                    <a class="nav-link" href="#">使用者:迪奧·布蘭度</a>
                </li>
            </ul>
            <form class="form-inline my-2 my-lg-0">
                <button class="btn btn-outline-success my-2 my-sm-0" type="submit">登出</button>
            </form>
        </div>
    </nav>
    
    <br>
    <!--派發系統-->
    <div style="background-color:white" align="center">
        <h3 align="center">資料派發系統</h3>
        <br>
        <div style="width: 630px;">

            <form action="receive_cat.php">
                <div class="form-group row">
                    <button class="btn btn-outline-info my-2 my-sm-0" type="submit">接收</button>
                    <div class="col-sm-10">
                        <input type="test" class="form-control" id="inputPassword" placeholder="上限一次100筆" name="receive_cat">
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


            <?php
                if (isset($_GET['post'])) {
                    echo $_GET['abc'];
                }
                $receive_cat = $_GET['receive_cat'];
                for($i=0; $i < $receive_cat; $i++){
                    echo '<tr>
                            <th scope="col">'.$i.'</th>
                            <th scope="col">wjfekjfkwefknwekfjfhwehfwehfowiehfoiwhefoihweoifhiowehfoiwheifohweiofhwioehfionwkenfwneflkwnefklneklf</th>
                            <th scope="col"><button class="btn btn-outline-info my-2 my-sm-0" type="submit" onclick="showModal()">選擇分類</button></th>
                            <th scope="col">no</th>  
                        </tr>';
                };
                

            ?>

            <tbody id="cat_select">

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
                    <button type="button" class="btn btn-outline-secondary" id="btn_width">手機與智慧穿戴</button>
                    <button type="button" class="btn btn-outline-secondary" id="btn_width">手錶與飾品</button>
                    <button type="button" class="btn btn-outline-secondary" id="btn_width">交通與旅遊</button>
                    <button type="button" class="btn btn-outline-secondary" id="btn_width">居家與家具</button>
                </div>
                <div class="btn-group">
                    <button type="button" class="btn btn-outline-secondary" id="btn_width">服裝與鞋包</button>
                    <button type="button" class="btn btn-outline-secondary" id="btn_width">保健與護理</button>
                    <button type="button" class="btn btn-outline-secondary" id="btn_width">相機與攝影</button>
                    <button type="button" class="btn btn-outline-secondary" id="btn_width">美妝與保養</button>
                </div>
                <div class="btn-group">
                    <button type="button" class="btn btn-outline-secondary" id="btn_width">食品與特產</button>
                    <button type="button" class="btn btn-outline-secondary" id="btn_width">視聽與家電</button>     
                    <button type="button" class="btn btn-outline-secondary" id="btn_width">運動與休閒</button>
                    <button type="button" class="btn btn-outline-secondary" id="btn_width">電腦與周邊</button>
                </div>
                <div class="btn-group">
                    <button type="button" class="btn btn-outline-secondary" id="btn_width">圖書與文具</button>
                    <button type="button" class="btn btn-outline-secondary" id="btn_width">嬰幼與孕婦</button>
                    <button type="button" class="btn btn-outline-secondary" id="btn_width">寵物與園藝</button>            
                    <button type="button" class="btn btn-outline-secondary" id="btn_width">情趣用品</button>
                </div>
                <div class="btn-group">
                    <button type="button" class="btn btn-outline-secondary" id="btn_width">無法分類</button>
                    <button type="button" class="btn btn-outline-secondary" id="btn_width">清除</button>
                </div>

            </div>      
        </div>
    </div>
    
    <!--Scrip區-->
    <script src="https://code.jquery.com/jquery-3.3.1.slim.min.js" integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo" crossorigin="anonymous"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.6/umd/popper.min.js" integrity="sha384-wHAiFfRlMFy6i5SRaxvfOCifBUQy1xHdJ/yoi7FRNXMRBu5WHdZYu1hA6ZOblgut" crossorigin="anonymous"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.2.1/js/bootstrap.min.js" integrity="sha384-B0UglyR+jN6CkvvICOB2joaf5I4l3gm9GU6Hc1og6Ls7i6U/mkkaduKaBhlAXv9k" crossorigin="anonymous"></script>
    <script type="text/javascript" src="js.js" charset="UTF-8"></script>
</body>

</html>