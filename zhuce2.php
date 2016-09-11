<?php
$verify_code_url = "http://account.dzp.wjybk.com:16906/SelfOpenAccount/image.jsp";
$cookie_jar = dirname(__FILE__)."/cookie.txt"; 

$curl = curl_init();
curl_setopt($curl, CURLOPT_URL, $verify_code_url);
curl_setopt($curl, CURLOPT_COOKIEFILE, $cookie_jar);
curl_setopt($curl, CURLOPT_HEADER, 0);
curl_setopt($curl, CURLOPT_RETURNTRANSFER, 1);
$img = curl_exec($curl);

curl_close($curl);
 
$fp = fopen("verifyCode.jpg","w");
fwrite($fp, $img);
fclose($fp); 
?>
<html>
<head>	
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
</head>
<body>
	<form action="zhuce3.php" method="get">
	<img src="http://localhost/verifyCode.jpg" alt=""><br>
	验证码：<input type="text" name="vcode"><br>
	<input type="submit" value="提交">
	</form>
</body>
</html>