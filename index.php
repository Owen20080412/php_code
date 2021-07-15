<!DOCTYPE html>
<html>
  <head>
    <meta charset="utf-8">
    <title>留言板</title>
    <script type="text/javascript">
    function  check_data()
    {
      if(document.myForm.author.value.length==0)
      {
        alert("作者欄位不可空白");
      }
      else if(document.myForm.subject.value.length==0)
      {
        alert("主題欄位不可空白");
      }
      else if(document.myForm.content.value.length==0)
      {
        alert("留言內容欄位不可空白");
      }
      else
      {
        myForm.submit();
      }
    }
    </script>
  </head>
  <body>
    <p align='center'>
     <img src='fig.jpg'>
    </p>
    <?php
    require_once("dbtools.inc.php");
    $link=create_connect();
    $sql= "SELECT * FROM message ORDER BY date DESC ";
     $result=execute_sql($link,"guestbook",$sql);
     $records_per_page=5;
     if(isset($_GET["page"]))
     {
         $page=$_GET["page"];
         //echo "$page";
     }
     else
     {
         $page=1;
         //echo "$page";
     }
     //欄位數
     //$total_fields=mysqli_num_fields($result);

     //記錄數
     $total_records=mysqli_num_rows($result);

     //計算總頁數
     $total_pages=ceil($total_records/$records_per_page);

     //紀錄那一頁第一筆資料的序號
     $started_record=$records_per_page*($page-1);

     //紀錄那一頁第一筆資料的序號的「指標」
     mysqli_data_seek($result,$started_record);

     //背景顏色
     $bg[0]="#D9006C";
     $bg[1]="#00CACA";
     $bg[2]="#9F4D95";
     $bg[3]="#02C874";
     $bg[4]="#005AB5";
     //顯示欄位
     echo "<table border='1' align='center' width='800' cellspacing='3'>";
     // echo "<tr align='center'>";
     
     //echo "</tr>";
     
     //顯示紀錄/資料
     $j=1;
     while($row=mysqli_fetch_assoc($result) and $j<=$records_per_page)
     {
         echo "<tr bgcolor='" . $bg [$j-1] . "'>";
         echo "<td width='120' align='center'>
               <img src='" . mt_rand(0,9).".gif'></td>";

         echo "<td>作者:". $row["author"]. "<br>";
         echo "主題:". $row["subject"]. "<br>";
         echo "時間:". $row["date"]. "<hr>";
         echo  $row["content"]. "</td></tr>";
         $j++;   
     }
     echo "</table>";
     
     //產生導覽列
     echo "<p align='center'>";
     if($page>1)
     {
         echo "<a href='index.php?page=".($page-1)."'>上一頁</a>";
     }
     
     for($i=1;$i<=$total_pages;$i++)
     {
         if($i==$page)
         {
             echo "$i ";
         }
         else
         {
             echo "<a href='index.php?page=$i'> $i </a>";
         }
     }

     if($page<$total_pages)
     {
         echo "<a href='index.php?page=".($page+1)."'>下一頁</a>";
     }
     echo "</p>";
     
     mysqli_free_result($result);
     mysqli_close($link);
    
    
    ?>
    <form name="myForm" method="post" action="post.php">
      <table border='1' width='800' align='center' cellspacing='0'>
        <tr bgcolor='#00CACA' alidn='center'>
          <td colspan="2">
          <font color='#ffffff'>請輸入留言</font>
          
          </td>
        </tr>
        <tr bgcolor='#5A5AAD'>
          <td width='15%'>
            作者
          </td>
          <td width='85%'>
          <input name='author' type="text" size='50'>
          </td>
        </tr>
        <tr bgcolor='#5A5AAD'>
          <td width='15%'>
            主題
          </td>
          <td width='85%'>
          <input name='subject' type="text" size='50'>
          </td>
        </tr>
        <tr bgcolor='#5A5AAD'>
          <td width='15%'>
            內容
          </td>
          <td width='85%'>
          <textarea name='content' cols="50" rows='5'></textarea>
          </td>
        </tr>
        <tr>
          <td colspan="2" align="center">
            <input type="button" value="張貼留言" onclick="check_data()">
            <input type='reset' value='重新輸入'>
          </td>
        </tr>
      </table>
    </form>
  </body>
</html>