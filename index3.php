<?php

  // DBに接続
  $dsn = 'mysql:dbname=nico_board;host=localhost';
  $username = 'root';
  $passwd = 'Hutagawa7109!';
  $pdo = new PDO($dsn, $username, $passwd);


  // 掲示板より値が送信されたときの処理
  if( isset($_POST['message']) ) {
    // DBのTable名boardへ値messageを挿入する命令のセット
    $stmt = $pdo->prepare('INSERT INTO board (message) VALUES (:message)');
    // VALUESと値の紐づけ
    $stmt->bindValue(':message', $_POST['message'], PDO::PARAM_STR);
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


<!DOCTYPE HTML>

<html>
<head>
<meta charset="utf8">
<title>掲示板</title>
</head>
<body>

  <!-- 投稿フォーム -->
<form method="post"> <input type="text" name="message"> <input type="submit"> </form>

  <!-- 投稿一覧の展開 -->
  <?php foreach($posts as $post) echo "<p>".$post['message']."</p>"; ?>

</body>
</html>
