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

try{

    $dbh = new PDO($dsn, $user, $password);
    $dbh->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
    $sql = "UPDATE performer SET name=:name,job=:job,credit=:credit,vio=:vio WHERE id=:id";

    $stmt = $dbh->prepare($sql);
    $stmt->bindValue(':id', $id, PDO::PARAM_INT);
    $stmt->bindValue(':name', $name, PDO::PARAM_STR);
    $stmt->bindValue(':job', $job, PDO::PARAM_STR);
    $stmt->bindValue(':credit', $credit, PDO::PARAM_STR);
    $stmt->bindValue(':vio', $vio, PDO::PARAM_STR);
    $stmt->execute();

    $fin = '編集が完了しました。';

}catch (PDOException $e){
    echo($e->getMessage());
    die();
}
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

    <div class="set_box">
			<div class="set_table">
        <h2>編集完了</h2>
        <p><?php echo $fin; ?></p>
      	<p>まだ編集する場合は[編集画面へ戻る]を押してください。</p>
			<div class="set_btn">
				<p><a class="set_btn_btn set_btn_back" href="member.php">編集画面へ戻る</a></p>
				<p><a class="set_btn_btn set_btn_ok" href="../">トップへ戻る</a></p>
		</div>
  </div>
  </div>
</div>
<!-- footer -->
<?php include ('../inc/footer.php'); ?>
</body>

</html>
