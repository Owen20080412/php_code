<!DOCTYPE html>
<html>
  <head>
    <meta charset="utf-8">
    <title>會員管理系統</title>
    <script type="text/javascript">
     function check_data()
     {
       if(document.myForm.acount.value.length==0)
         {alert("帳號欄位不可空白.");}         
       else if(document.myForm.password.value.length==0)
         {alert("密碼欄位不可空白.");}  
       else
         {
           alert("已送出");
           myForm.submit();
         }
     }

    </script>
  </head>
  <body>
    <p align="center"><img src="member.jpg"></p>  
    <p>歡迎來到本站，您必須加入成為本站的會員，才有權限使用本站的功能。
       若您已經擁有帳號，請輸入您的帳號及密碼，然後按 [登入] 鈕；
       若尚未成為本站會員，請點按 [加入會員] 超連結；若您忘記自己的帳
       號及密碼，請點按 [查詢密碼] 超連結。</p>
    
    <form action="checkpwd.php" method="post" name="myForm">
      <table width="40%" align="center">
      <tr>
      <td align="center">
          <font color="#00FF0D">帳號</font>
          <input name="acount" type="text" size="15"> 
      </td>
      </tr> 
      <tr>
      <td align="center">
          <font color="#00FF0D">密碼</font>
          <input name="password" type="password" size="15"> 
      </td>
      </tr>    
      <tr>
      <td align="center">
          <input type="button" value="登入" onclick="check_data()">
          <input type="reset"  value="清空"> 
      </td>
      </tr>
      </table>
    </form>
    <p align="center">
      <a href="join.html">加入會員</a>
      <a href="search_pwd.html">查詢密碼</a>
    </p> 
  </body>
</html>