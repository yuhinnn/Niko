<?php

  // DBに接続
  $dsn = 'mysql:dbname=nico_board;host=localhost';
  $username = 'root';
  $passwd = 'Hutagawa7109!';
  $pdo = new PDO($dsn, $username, $passwd);


  // 掲示板より値が送信されたときの処理
  if( isset($_POST['honbun']) ) {
    // DBのTable名boardへ値messageを挿入する命令のセット
    $stmt = $pdo->prepare('INSERT INTO board (honbun) VALUES (:honbun)');
    // VALUESと値の紐づけ
    $stmt->bindValue(':honbun', $_POST['honbun'], PDO::PARAM_STR);
    // 命令の実行
    $result = $stmt->execute();
  }

  // DBよりTable名boardの値一覧を取得する処理
  $stmt = $pdo->prepare('SELECT * FROM board');
  // 命令の実行
  $stmt->execute();
  // 取得した値を変数に格納
  $posts = $stmt->fetchAll();

?>
<html>

<head>
<title>投稿掲示板</title>
</head>
<body>
<?php
print $_POST['onamae']."さんの投稿です";
print"<BR><BR>";
print"本文:<BR>";
print$_POST['honbun'];
   foreach($posts as $post) echo "<p>".$post['honbun']."</p>"; ?>


</body>
</html>
