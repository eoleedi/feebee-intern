<!doctype html>
<html>
    <head>
       <meta charset="utf-8">
        <style>
            #header {
                background-color: black;
                color: white;
                text-align: center;
                padding: 5px;
                }

        </style>
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.2.1/css/bootstrap.min.css" integrity="sha384-GJzZqFGwb1QTTN6wy59ffF1BuGJpLSa9DkKMp0DgiMDm4iYMj70gZWKYbI706tWS" crossorigin="anonymous">
</head>
<title>
    LoginPage
</title>

<body>
    <div id="header">
        <h1>Log In</h1><br>
        <form method="post" action="loginProcess.php">
            <div class="form-group">
                <label for="USER">USER</label><br>
                <input type="text" id="USER" name="username">
            </div>
            <div class="form-group">
                <label for="PASSWORD">Password</label><br>
                <input type="text" name="pwd" id="PASSWORD">
            </div>
            <div class="form-group form-check">
                <input type="checkbox" class="form-check-input" id="exampleCheck1">
                <label class="form-check-label" for="exampleCheck1">Check me out</label>
            </div>
            <button type="submit" value="Submit" class="btn btn-outline-primary" name="sub">Submit</button>
            <button type="reset" value="Reset" class="btn btn-outline-secondary">Reset</button>
        </form>
    </div>


    <!--新增php-->

    <?php
    if(!empty($_GET['errno'])){
    if($_GET['errno']==1){
    echo "使用者名稱或密碼錯誤";
    }else if($_GET['errno']==2){
    echo "請輸入使用者名稱密碼";
    }else if($_GET['errno']==3){
    echo "非法訪問，請輸入使用者名稱和密碼";
    }
    }

    ?>





    <!--phpEnd-->

    <!--script-->

    <script src="https://code.jquery.com/jquery-3.3.1.slim.min.js" integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo" crossorigin="anonymous"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.6/umd/popper.min.js" integrity="sha384-wHAiFfRlMFy6i5SRaxvfOCifBUQy1xHdJ/yoi7FRNXMRBu5WHdZYu1hA6ZOblgut" crossorigin="anonymous"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.2.1/js/bootstrap.min.js" integrity="sha384-B0UglyR+jN6CkvvICOB2joaf5I4l3gm9GU6Hc1og6Ls7i6U/mkkaduKaBhlAXv9k" crossorigin="anonymous"></script>

    <!--scriptEnd-->
</body>
