<!DOCTYPE HTML PUBLIC "-//W3C//DTD HTML 4.01 Transitional//EN">
<html>
	<head>
		<meta http-equiv="Content-Type" content="text/html; charset=UTF-8">
		<title>PHP基礎</title>
	</head>
	
	<body>
		<?php
			$nickname=$_POST['nickname'];
			$email=$_POST['email'];
			$goiken=$_POST['goiken'];
			// 変数 aにbを代入 変数の頭には$をつける ブランケットで対象を囲うこと

			$nickname=htmlspecialchars($nickname); 
			// ($nickname)は($_POST['nickname'])でも可能
			$email=htmlspecialchars($email);
			$goiken=htmlspecialchars($goiken);
			// XSS(クロスサイトスクリプティング)でのいたずら防止
			// 入力されたhtmlを無毒化し、ただの文字として出力させる。
			// htmlspecialcharsは関数(処理をまとめておいて呼び出し、処理結果を返す)

			if($nickname==''){
				echo 'ニックネームが入力されていません。<br />';
			}else{
				echo 'Hello,World!  ';
				echo 'Welcom! ';
				echo $nickname; // 変数
				echo '様';
				echo '<br />';
			}

			if($email==''){
				echo 'メールアドレスが入力されていません。<br />';
			}else{
				echo 'メールアドレス：';
				echo $email; // 変数
				echo '<br />';
			}

			if($goiken==''){
				echo 'ご意見が入力されていません。<br />';
			}else{
				echo 'ご意見『';
				echo $goiken; // 変数
				echo '』<br />';
			}

			// echo '<a href="index.html"><br />戻る</a>';　戻っても入力文が消える
			// クリックしてもページを新しく開いてしまうため、当然フォームも真っ白になる
			if($nickname=='' || $email=='' || $goiken=='')
			{
				echo'<br />';
				echo'<form>';
				echo'<input type="button" onclick="history.back()" value="戻る">';
				echo'</form>';
			}
			else
			{
				echo'<br />';
				echo'<form method="post" action="thanks.php">';
				echo'<input name="nickname" type="hidden" value="'.$nickname.'">';
				echo'<input name="email" type="hidden" value="'.$email.'">';
				echo'<input name="goiken" type="hidden" value="'.$goiken.'">';
				echo'<input type="button" onclick="history.back()" value="戻る">';
				echo'<input type="submit" value="OK">';
				echo'</form>';
			}
			// onclick="history.back()はjavascriptであり、ブラウザの戻るボタンを
			// 押したのと同じ動作をさせる機能である
		?>
		<!-- echoとechoでは、echoの方がほんの少し載せられる情報が多い程度でほぼ同じ
			基本echoで入力 echoの方が良い場合もあるが -->
		<!-- ;は終わりのマークとして必ずつける -->
		<!--  ' と ” ではあまり違いがないが、同じクウォーテーションで囲うこと -->
		<!-- =は代入するという意味だが、==は左辺と右辺が同じことを示す(if文) -->
		<!-- ''という風に並べることで間が空だという表示になる -->

		<!-- if文をうまく使うことで、事前入力内容による表示機能の制限ができる -->

		<!-- <form>
			<input type="button" onclick="history.back()" value="戻る">
		</form> -->
		<!-- php領域外では、htmlと同じ入力で同様の指令ができる。(例：ボタン表示) -->
	</body>
</html>