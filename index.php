<!doctype html>
<html>

<head>
    <meta charset="UTF-8">
    <title>員工登入系統</title>
    <script>
        function check_data() {
            if (document.myForm.account.value.length == 0) {
                alert("帳號欄位不可以空白！");
            } else if (document.myForm.password.value.length == 0) {
                alert("密碼欄位不可以空白！");
            } else {
                myForm.submit();
            }
        }
    </script>
</head>

<body bgcolor="#AAAAAA">
    <div class="container-fluid">
        <br><br>
    </div>
    <div class="container">
        <h2 align="center"><img src="logo.png"></h2><br>
        <p align="center">歡迎進入飛比派發系統，您必須先擁有權限才可以使用此系統的功能，若您已經有權限請輸入您的帳號及密碼，若向未設定過權限請按設定權限!</p>
    </div>
    <br>
    <form action="checkpwd.php" method="post" name="myForm">
        <table width="40%" align="center">
            <tr>
                <td align="center">
                    <font color="#000000">帳號:</font>
                    <input name="account" id="account" type="text" size="20">
                </td>
            </tr>
            <tr>
                <td align="center">
                    <font color="#000000">密碼:</font>
                    <input name="password" type="password" size="20">
                </td>
            </tr>
            <tr>
                <td align="center">
                    <input type="button" value="登入" onClick="check_data()">
                    <a href="join.html">設定權限</a>
                </td>
            </tr>
        </table>
    </form>
</body>
<?php
    if(!empty($_GET['errno'])){
    if($_GET['errno']==1){
    echo "使用者名稱或密碼錯誤";
        }
    }
?>

</html>
