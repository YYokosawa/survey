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

		$sql ='SELECT * FROM `survey` WHERE 1';

		$stmt =$dbh->prepare($sql);
		// insert文を実行
		$stmt->execute();
		// データを全部くれというSQL文

		while (1) 
		{
			$rec = $stmt->fetch(PDO::FETCH_ASSOC);
			// fetch・・・データを一行取り出し、カーソルを次の行に移動する
			//次の行が何もない時はfalseが返され、break(終了)となる
			//fetch()の中は、どのようにfetchするかを示しており、決まり文句として覚えておく

			if($rec==false)
			{
				break;
			}
			echo $rec['code'];
			echo ' ';
			echo '&nbsp;';
			//上記のどちらかの文を入れることで半角スペースを空けることができる
			echo $rec['nickname'];
			echo $rec['email'];
			echo $rec['goiken'];
			echo '<br />';
		}


		// データベースから切断
		$dbh = null;
		// SQL文による、アンケート自動保存機能の追加（下）
		//githubテスト
	
	?>
</body>
</html>