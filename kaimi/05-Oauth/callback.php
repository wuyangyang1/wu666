<?php 
header("content-type:text/html;charset=ISO-8859-1");
$code = $_GET['code'];
$appid = "wxc425aadb855f3982";
$appSecret = "48b452b7fb0f06531511ba743bf39eaf";

//code换token
$url = "https://api.weixin.qq.com/sns/oauth2/access_token?appid={$appid}&secret={$appSecret}&code={$code}&grant_type=authorization_code";
$a = file_get_contents($url);
// 吧json转关联数组
$jsonArr = json_decode($a,true);
// 判断下有没有errcode
if( isset($jsonArr['errcode']) ){
	echo "换取token失败 请检查";
}else{
	// 用toke和openid换用户信息
	$token = $jsonArr['access_token'];
	$openid = $jsonArr['openid'];
	$url2="https://api.weixin.qq.com/sns/userinfo?access_token={$token}&openid={$openid}&lang=zh_CN";
	$b = file_get_contents($url2);
	$jsonArr2 = json_decode($b,true);//json转数组
	
	// 拿到用户的openid 可以再此处先查询一下该openid 在本地数据库中有没有对应的记录
	//$sql = "select * form 用户表 where openid=".$jsonArr2['openid'];
	// 获取用户的各种信息,返回给前端
	// 方法一 使用session
	// $_SESSION["nickname"] = $jsonArr2["nickname"];
	// 方法2,先放到变量里,再incluede()
	// $nickname = $jsonArr2["nickname"];
	// $sex = $jsonArr2["sex"];
	// $city = $jsonArr2["city"];
	// $headimgurl = $jsonArr2["headimgurl"];
	// include "oauthdemo.php";
	// 将用户信息openid Nickname 头像等存储到数据库表中.将用户访问应用之后产生的信息(游戏的成绩,购买记录等)也保存到openid对应的字段中
	// 当用户再次登陆应用之后,可以根据openid从数据库中查询该用户的之前访问产生的信息
	// 方法3 将用户信息附加到url上返回给前端页面  前端从url中获取用户信息
	// $kk = strval()
	$url=urlencode($jsonArr2['nickname']);
	header("Refresh:0;url=../register.html?nickname=$url&headimgurl={$jsonArr2['headimgurl']}");
}
?>