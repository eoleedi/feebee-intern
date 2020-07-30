<?php
    session_start();
    if ($_SESSION["account"] != TRUE){
        header("location:index.php"); 
    }
?>
<!doctype html>
<html>

    <head>
        <style>
            #header {
            background-color:black;
            color:white;
            text-align:center;
            padding:5px;
            }
            .sbs_user{
                width: 25%;
            }
            .sbs_title{
                width: 25%;
            }
            .sbs_cat{
                width: 25%;
            }
            .sbs_time{
                width: 25%;
            }
        </style>
        <meta charset="UTF-8">
        <title>記錄</title>
        <link rel=stylesheet type="text/css" href="bootstrap.css">
    </head>

    <body>

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
        
        <!--
        <div class="dropdown">

            <button class="btn btn-secondary dropdown-toggle" type="button" id="dropdownMenuButton" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                Select User
            </button>

            
            <div class="dropdown-menu" aria-labelledby="dropdownMenuButton">
                <a class="dropdown-item" href="#">ALL</a>
                <a class="dropdown-item" href="#">user1</a>
                <a class="dropdown-item" href="#">user2</a>
                <a class="dropdown-item" href="#">user3</a>
            </div>
            

            <br><br>
        </div>
        -->

        <div>
            <h3 align="center">編輯記錄</h3>
            <br>
            <div style="background-color:white" align="center">
                <form method="post">
                    <div style="width: 630px;">
                        <div class="form-group row">
                            <button id="search_btn" class="btn btn-outline-info my-2 my-sm-0" type="submit" name="search_btn" value="1">搜尋</button>
                            <div class="col-sm-10">
                                <input type="test" class="form-control" id="search_user" placeholder="搜尋使用者" name="search_user" value="ALL">
                            </div>
                        </div>
                    </div>
                </form>
            </div>
            <br>

            <table class="table">
                <thead class="thead-light">
                    <tr>
                        <th scope="col" class="sbs_user">USER</th>
                        <th scope="col" class="sbs_title">TITLE</th>
                        <th scope="col" class="sbs_cat">CATEGORY</th>
                        <th scope="col" class="sbs_time">TIME</th>
                    </tr>
                </thead>
                <tbody>
                    <?php
                        
                        $search_user = 0;
                        
                        if(isset($_POST['search_btn'])){
                            $search_user = $_POST['search_user'];
                            if($search_user == 'all' or $search_user == 'ALL' or $search_user == 'All'){
                                $link = mysqli_connect(
                                    'localhost',
                                    'root',
                                    '',
                                    'sbs_distribution'
                                );
                                    
        
                                $sql = "SELECT * FROM product WHERE product_status = 2";
                                $result = mysqli_query($link, $sql);
                                $data = mysqli_fetch_all($result);
        
                                for($i=0; $i < count($data); $i++){
                                    echo'<tr id='.'tr_id_'.$i.'>
                                            <th scope="col">'.$data[$i][3].'</th>
                                            <th scope="col">'.$data[$i][0].'</th>
                                            <th scope="col">'.$data[$i][1].'</th>
                                            <th scope="col">'.date("Y-m-d H:i:s", strtotime(gmdate($data[$i][4]).' +8 hours')).'</th>  
                                    </tr>';
                                }
        
                                mysqli_close($link);
                            }
                            else{
                                $link = mysqli_connect(
                                    'localhost',
                                    'root',
                                    '',
                                    'sbs_distribution'
                                );
                                    
        
                                $sql = "SELECT * FROM product WHERE product_status = 2 AND product_editor = \"$search_user\"";
                                $result = mysqli_query($link, $sql);
                                $data = mysqli_fetch_all($result);
            
                                for($i=0; $i < count($data); $i++){
                                    echo'<tr id='.'tr_id_'.$i.'>
                                            <th scope="col">'.$data[$i][3].'</th>
                                            <th scope="col">'.$data[$i][0].'</th>
                                            <th scope="col">'.$data[$i][1].'</th>
                                            <th scope="col">'.date("Y-m-d H:i:s", strtotime(gmdate($data[$i][4]).' +8 hours')).'</th>  
                                    </tr>';
                                }
                                
                                mysqli_close($link);
                            }
                        }

                    ?>
                </tbody>
            </table>

        </div>

        <!--Script區-->
        <script src="https://code.jquery.com/jquery-3.5.1.js" integrity="sha256-QWo7LDvxbWT2tbbQ97B53yJnYU3WhH/C8ycbRAkjPDc=" crossorigin="anonymous"></script>
        <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.6/umd/popper.min.js" integrity="sha384-wHAiFfRlMFy6i5SRaxvfOCifBUQy1xHdJ/yoi7FRNXMRBu5WHdZYu1hA6ZOblgut" crossorigin="anonymous"></script>
        <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.2.1/js/bootstrap.min.js" integrity="sha384-B0UglyR+jN6CkvvICOB2joaf5I4l3gm9GU6Hc1og6Ls7i6U/mkkaduKaBhlAXv9k" crossorigin="anonymous"></script>
        <script type="text/javascript" src="js.js?v=114" charset="UTF-8"></script>
    </body>

</html>