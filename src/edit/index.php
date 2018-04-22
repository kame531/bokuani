<?php
include ('../inc/connect.php');

session_start();

$error_message = "";

if(isset($_POST["login"])) {

	if($_POST["user_name"] == "bokuani" && $_POST["password"] == "hirunenokai") {
		$_SESSION["user_name"] = $_POST["user_name"];
		$login_success_url = "member.php";
		header("Location: {$login_success_url}");
		exit;
	}
$error_message = "※ログインネーム、もしくはパスワードが間違っています。<br>　もう一度入力して下さい。";
}
?>
<!DOCTYPE html>
<html lang="ja">

<head>
  <meta charset="UTF-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <meta name="description" content="日曜お昼開催の原曲中心アニソンクラブイベント。アットホームな雰囲気が特徴です。ぼくアニもついに３周年を迎えました。会場はバナナボンゴ！ぼくたちと一緒に楽しみましょう！">
  <title>ぼくアニ | 池袋で開催のアニソンクラブイベント</title>
  <link href="http://maxcdn.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css" rel="stylesheet">
  <link rel="stylesheet" href="../css/style.css">
</head>

<body class="login_body">
  <!-- header -->
  <?php $Path = "../"; include ('../inc/header.php'); ?>

<div class="err_box">
<p class="err_text">
<?php
if($error_message) {
	echo $error_message;
}
?>
</p>
</div>

<div class="container">
  <div class="login_box">
  <div class="login_form">
    <h2 class="login_title">ぼくアニ制作委員会</h2>
<form action="./" method="POST">
	<p class="login_name"><span>ログインネーム：</span><input class="login_input" type="text" name="user_name"></p>
	<p class="login_pass"><span>パスワード：</span><input class="login_input" type="password" name="password"></p>
	<input class="login_btn" type="submit" name="login" value="ログイン">
</form>
</div>
</div>
</div>

<!-- footer -->
<?php include ('../inc/footer.php'); ?>
<script>
  $('.modal').modaal();
</script>
</body>

</html>
