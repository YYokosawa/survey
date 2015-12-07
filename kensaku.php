<html>
<head>
	<meta http-equiv="Content-Type" content="text/html; charset=UTF-8">
	<title>PHP基礎</title>
</head>
<body>
	<?php
		$code = $_POST['code'];
		//$_POST・・・POST送信された時、送られた情報が格納されているスーパーグローバル変数
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

		//sql文作成
		$sql = 'SELECT * FROM `survey` WHERE `code` =?';
		$date[] = $code;
		
		//sql文実行
		$stmt = $dbh->prepare($sql);
		// insert文を実行
		$stmt->execute($date);
		// データを全部くれというSQL文

		//実行結果として得られたデータを表示
		$rec = $stmt->fetch(PDO::FETCH_ASSOC);

			echo $rec['code'];
			echo ' ';
			echo '&nbsp;';
			//上記のどちらかの文を入れることで半角スペースを空けることができる
			echo $rec['nickname'];
			echo $rec['email'];
			echo $rec['goiken'];
			echo '<br />';
		
		// データベースから切断
		$dbh = null;
		// SQL文による、アンケート自動保存機能の追加（下）
	?>
</body>
</html>