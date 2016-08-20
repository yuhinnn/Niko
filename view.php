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
?>

</body>
</html>
