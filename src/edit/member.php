<?php include ('../inc/connect.php');
session_start();

if(!isset($_SESSION["user_name"])) {
	$no_login_url = "index.php";
	header("Location: {$no_login_url}");
	exit;
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
  <div class="choice_box">
    <?php foreach($data as $row): ?>
      <button class="choice_btn" id="choice_btn_<?php echo $row['id'];?>" type="button" name="button" onclick="edit_select(<?php echo $row['id'];?>);"><?php echo $row['name'];?></button>
    <?php endforeach; ?>
    <p>* 一人ずつしか編集できません。一人編集したら確認を押してください。</p>
  </div>
  <div class="edit_area">
  <?php foreach($data as $row): ?>
    <div class="edit_box" id="edit_box_<?php echo $row['id'];?>">
      <h3 class="edit_box_name"><?php echo $row['name'];?></h3>
    <form class="" action="set.php" method="post">
      <input type="hidden" name="id" value="<?php echo $row['id'];?>">
      <div class="edit_inner"><label>名前</label>
      <p><input type="text" name="name" value="<?php echo $row['name'];?>"></p></div>
      <div class="edit_inner"><label>DJ/VJ/STAFF/etc</label>
      <p><select name="job">
        <option value="<?php echo $row['job'];?>"><?php echo $row['job'];?></option>
        <option value="DJ">DJ</option>
        <option value="VJ">VJ</option>
        <option value="STAFF">STAFF</option>
      </select></p></div>
      <div class="edit_inner"><label>クレジット</label>
      <p><input type="text" name="credit" value="<?php echo $row['credit'];?>"></p></div>
      <div class="edit_inner"><label>プロフィール</label>
      <p><textarea name="vio" rows="8" cols="80"><?php echo $row['vio'];?></textarea></p></div>
      <input type="submit" name="" value="確認">
    </form>
  </div>
  <?php endforeach; ?>
</div>
</div>

<!-- footer -->
<?php include ('../inc/footer.php'); ?>

<!-- 各自エディタの表情 -->
<script>
function edit_select(e) {
  var id = 'edit_box_'+ e;
  var disp = document.getElementById(id);
  disp.classList.toggle('active');
  var btnId = 'choice_btn_'+ e;
  var dispId = document.getElementById(btnId);
  dispId.classList.toggle('active');
}
</script>
</body>

</html>
