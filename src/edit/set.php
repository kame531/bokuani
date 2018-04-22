<?php
include ('../inc/connect.php');

session_start();

if(!isset($_SESSION["user_name"])) {
	$no_login_url = "index.php";
	header("Location: {$no_login_url}");
	exit;
}

if($_SERVER['REQUEST_METHOD'] === 'POST'){

  $id = $_POST['id'];
	$name = $_POST['name'];
	$job = $_POST['job'];
  $credit = $_POST['credit'];
	$vio = $_POST['vio'];

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


<div class="container">
	<div class="set_text">
	<h2>編集確認画面</h2>
	<p>こちらで大丈夫だったら[OK]を押してください。</p>
	<p>ダメならば[戻る]を押してください。</p>
	</div>
    <div class="set_box">
			<table class="set_table">
	      <tr><th>ID</th><td><?php echo $id; ?></td></tr>
	      <tr><th>名前</th><td><?php echo $name; ?></td></tr>
	      <tr><th>DJ/VJ/STAFF/etc</th><td><?php echo $job; ?></td></tr>
	      <tr><th>クレジット</th><td><?php echo $credit; ?></td></tr>
	      <tr><th>プロフィール</th><td><?php echo nl2br($vio,false); ?></td></tr>
	    </table>
			<div class="set_btn">
				<p><a class="set_btn_btn set_btn_back" href="member.php">戻る</a></p>
		    <form class="" action="reflect.php" method="post">
		      <input type="hidden" name="id" value="<?php echo $id; ?>">
					<input type="hidden" name="name" value="<?php echo $name; ?>">
					<input type="hidden" name="job" value="<?php echo $job; ?>">
		      <input type="hidden" name="credit" value="<?php echo $credit; ?>">
		      <textarea name="vio" rows="8" cols="80" style="display:none;"><?php echo $vio; ?></textarea>
		      <input class="set_btn_btn set_btn_ok" type="submit" name="" value="OK">
		    </form>
		</div>
  </div>

</div>

<!-- footer -->
<?php include ('../inc/footer.php'); ?>
</body>

</html>
