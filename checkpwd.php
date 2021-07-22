<?php
echo "收到";
//取得表單資料
$acount=$_POST["acount"];
$password=$_POST["password"];

echo "$acount";
echo "$password";
$passsword = '123456';
var_dump(password_hash($passsword, PASSWORD_DEFAULT));
?>