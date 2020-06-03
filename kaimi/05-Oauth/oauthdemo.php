<?php 
header("content-type:text/html;charset=utf-8");
?>
<!DOCTYPE html>
<html>
	<head>
		<meta name="viewport" content="width=device-width,initial-scale=1,minimum-scale=1,maximum-scale=1,user-scalable=no" />
		<meta charset="utf-8">
		<title></title>
	</head>
	<body>
		<p>昵称:<?php echo $nickname; ?></p>
		<p>头像<img src="<?php echo $headimgurl; ?>"></p>
	</body>
</html>
<script>
	var p = document.getElementsByTagName("p")[0];
	console.log(p.innerHTML)
</script>