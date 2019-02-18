<!DOCTYPE html>
<html>
<head>
  <meta charset="UTF-8"/>
  <title>PHPのサンプル</title>
  <link rel="stylesheet" href="indexphp.css">
</head>
<?php
if(isset($_POST["uname"]) &&
isset($_POST["comment"])){
  $uname=htmlspecialchars($_POST["uname"]);
  $comment=htmlspecialchars($_POST["comment"]);
  print("${uname}さんのコメントは「${comment}」です。");
} else {
 ?>
 <h1>少しお話でもどうですか</h1>
 <p>コメントをください。</p>
 <form method="POST" action="index.php">
   お名前：<input name="uname" size="10" /><br>
   コメント：<input name="comment"  />
   <input type="submit" value="送信"/>
 </form>
<?php
}
 ?>
</body>
</html>
