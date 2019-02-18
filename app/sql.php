<?php
$dsn='pgsql:dbname=TEST;host=pgsql;port=5432' ;
$user='postgres';
$pass='example';

try {
  //DB接続
  $dbh=new PDO($dsn,$user,$pass);

  //ここでクエリ実行
  $query_result=$dbh->query('SELECT * FROM test_comments');
  //prepareメソッド(insert)
  $sth=$dbh->prepare('INSERT INTO test_comments(name,text) VALUES(?,?)');
  //prepareメソッド(select)
  $sth_select=$dbh->prepare('SELECT * FROM test_comments WHERE name =?');

 //DB接続
  $dbh=null;
} catch (PDOException $e) {
  //接続にエラー発生した場合ここに入る
  print "DB ERROR: " . $e->getMessage() . "<br/>";
  die();
}
?>

<?php
foreach($query_result as $row) {
  print $row["name"] . ":" . $row["text"] . "<br/>";
}
$name="John";
$text="Power to the People";
$sth->execute(array($name,$text));
?>

<?php
$name="John";
$sth_select->execute(array($name));
$prepare_result=$sth_select->fetchALL();
foreach($prepare_result as $row) {
  print $row["name"] . ":" . $row["text"] . "<br/>";
}
$sth_select->execute(array($name));
?>
