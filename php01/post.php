<html>
<head>
<meta charset="utf-8">
<title>POST練習</title>
</head>
<body>
<?php
// $ymd_his = date("Y年m月d日H：i：s");
// echo $ymd_his
?>

<form action="write.php" method="post">
	お名前: <input type="text" name="name">
	EMAIL: <input type="text" name="mail">
	年齢: <input type="text" name="age">
	<input type="submit" value="送信">
</form>
<ul>
<li><a href="index.php">index.php</a></li>
</ul>
</body>
</html>