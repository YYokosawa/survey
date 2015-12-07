<html>
<head>
	<meta http-equiv="Content-Type" content="text/html; charset=UTF-8">
	<title>PHP基礎</title>
</head>
<body>
	<?php
		$dsn ='mysql:dbname=phpkiso;host=localhost';
		//mysqlに接続命令：どのデータベースに接続？；データベースのあるサーバーの場所
		$user ='root';
		$password ='';
		//xamppでは、指定がない場合は上記になる
		$dbh = new PDO($dsn,$user,$password);
		//$dbhによって接続
		$dbh->query('SET NAMES utf8');
		//
		//SQL文による、アンケート自動保存機能の追加（上）

		$nickname=$_POST['nickname'];
		$email=$_POST['email'];
		$goiken=$_POST['goiken'];

		$nickname=htmlspecialchars($nickname);
		$email=htmlspecialchars($email);
		$goiken=htmlspecialchars($goiken);
		// XSS(クロスサイトスクリプティング)でのいたずら防止


		echo $nickname;
		echo '様<br />';
		echo 'ご意見ありがとうございました！<br />';
		echo '頂いたご意見『';
		echo $goiken;
		echo '』<br />';
		echo $email;
		echo 'にメールを送りましたのでご確認下さい。';

		$sql ='INSERT INTO `survey`(`nickname`,`email`,`goiken`)VALUES("'.$nickname.'","'.$email.'","'.$goiken.'")';
		var_dump($sql);
		//テーブル名とフィールド名を``で囲うのが正解（ないと、場合によってはエラーが出る可能性もある）
		$stmt =$dbh->prepare($sql);
		//insert文を実行
		$stmt->execute();

		//データベースから切断
		$dbh = null;
		//SQL文による、アンケート自動保存機能の追加（下）
	?>
</body>
</html>