<?php 
ini_set("display_errors", "On");

error_reporting(E_ALL | E_STRICT);

/*
由7200跳转到开户流程


*/
$cookie_jar = dirname(__FILE__)."/cookie.txt"; 
$step2 = 'http://account.dzp.wjybk.com:16906/SelfOpenAccount/firmController.fir?funcflg=getBrokers&brokerId=7200';

$ch = curl_init($step2); 
curl_setopt($ch,CURLOPT_HEADER,0);
curl_setopt($ch, CURLOPT_RETURNTRANSFER, 1); 
curl_setopt($ch, CURLOPT_COOKIEJAR, $cookie_jar);
$contents = curl_exec($ch);
// dump($contents);
curl_close($ch);



/*
由开户流程跳转到申请开户

*/
$step3 = 'http://account.dzp.wjybk.com:16906/SelfOpenAccount/firmController.fir?funcflg=checkTime&brokerId=7200';

$ch = curl_init($step3); 
curl_setopt($ch,CURLOPT_HEADER,0);
curl_setopt($ch, CURLOPT_RETURNTRANSFER, 1); 
curl_setopt($ch, CURLOPT_COOKIEFILE, $cookie_jar);
$contents3 = curl_exec($ch);
// dump($contents3);
// echo "$contents3";
curl_close($ch);
/*
由申请开户跳转到问卷
*/
//初始化
$ch = curl_init();
$post_data =  'ck=on&brokerId=7200';
$url = "http://account.dzp.wjybk.com:16906/SelfOpenAccount/firmController.fir?funcflg=goforward";
curl_setopt($ch, CURLOPT_URL, $url);
curl_setopt($ch, CURLOPT_RETURNTRANSFER, 1);//执行结果是否被返回，0是返回，1是不返回
curl_setopt($ch, CURLOPT_HEADER, 0);//参数设置，是否显示头部信息，1为显示，0为不显示
curl_setopt($ch, CURLOPT_COOKIEFILE, $cookie_jar);
curl_setopt($ch, CURLOPT_POST, 1);
curl_setopt($ch, CURLOPT_POSTFIELDS, $post_data);
$output = curl_exec($ch);
if($output === FALSE)
{
    echo "<br/>","cUrl Error:".curl_error($ch);
}
// echo $output;
curl_close($ch);

//获取cookie

// $cookieInfo = json_encode($_COOKIE);
// var_dump($cookieInfo);

// $file = "C:\wamp\www/cookie.txt";
//  $file_pointer = fopen($file, "a");
//   fwrite($file_pointer,$cookieInfo);
//    fclose($file_pointer);


/*
由问卷跳转到照片实例
填写问卷  跳转地址http://account.dzp.wjybk.com:16906/SelfOpenAccount/photoshili.jsp?brokerId=7200
*/
$cookie_jar = dirname(__FILE__)."/cookie.txt"; 
$ch = curl_init();
$post_data =  
    'one=C&two=C&three=B&four=C&five=D&six=B&severn=A&eight=D&nine=C&ten=C&eleven=A&twelve=A&thirteen=C&fourteen=A&brokerId=7200';
$url = "http://account.dzp.wjybk.com:16906/SelfOpenAccount/photoshili.jsp?brokerId=7200";
curl_setopt($ch, CURLOPT_URL, $url);
curl_setopt($ch, CURLOPT_RETURNTRANSFER, 1);//执行结果是否被返回，0是返回，1是不返回
curl_setopt($ch, CURLOPT_HEADER, 0);//参数设置，是否显示头部信息，1为显示，0为不显示
curl_setopt($ch, CURLOPT_COOKIEFILE, $cookie_jar);
curl_setopt($ch, CURLOPT_POST, 1);
curl_setopt($ch, CURLOPT_POSTFIELDS, $post_data);
$content4 = curl_exec($ch);
if($content4 === FALSE)
{
    echo "<br/>","cUrl Error:".curl_error($ch);
}
// echo $content4;
curl_close($ch);

//获取cookie


// $cookieInfo = json_encode($_COOKIE);
// // var_dump($cookieInfo);

// $file = "C:\wamp\www/cookie.txt";
//  $file_pointer = fopen($file, "a");
//   fwrite($file_pointer,$cookieInfo);
//    fclose($file_pointer);


   
/*
由照片实例跳转到个人信息---http://account.dzp.wjybk.com:16906/SelfOpenAccount/firmController.fir?funcflg=goNotice
*/
$ch = curl_init();
$post_data =  'brokerId=7200';
$url = "http://account.dzp.wjybk.com:16906/SelfOpenAccount/firmController.fir?funcflg=goNotice";
curl_setopt($ch, CURLOPT_URL, $url);
curl_setopt($ch, CURLOPT_RETURNTRANSFER, 1);//执行结果是否被返回，0是返回，1是不返回
curl_setopt($ch, CURLOPT_HEADER, 0);//参数设置，是否显示头部信息，1为显示，0为不显示
curl_setopt($ch, CURLOPT_COOKIEFILE, $cookie_jar);
curl_setopt($ch, CURLOPT_POST, 1);
curl_setopt($ch, CURLOPT_POSTFIELDS, $post_data);
$content5 = curl_exec($ch);
if($content5 === FALSE)
{
    echo "<br/>","cUrl Error:".curl_error($ch);
}
// echo $content5;die;
curl_close($ch);

//取出验证码
$verify_code_url = "http://account.dzp.wjybk.com:16906/SelfOpenAccount/image.jsp";
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
// header();
$link = 'http://localhost/zhuce2.php';
header('location:' . $link);
/*

$ch = curl_init();  
curl_setopt($ch, CURLOPT_URL, $link);  
curl_setopt($ch, CURLOPT_RETURNTRANSFER, 1);   
curl_setopt($ch, CURLOPT_HEADER, 0);  
//函数中加入下面这条语句  
curl_setopt($ch, CURLOPT_FOLLOWLOCATION, 1);          
$links =  curl_exec($ch); 
echo $links;
curl_close($ch);*/

// $cookieInfo = json_encode($_COOKIE);
// // var_dump($cookieInfo);

// $file = "C:\wamp\www/cookie.txt";
//  $file_pointer = fopen($file, "a");
//   fwrite($file_pointer,$cookieInfo);
//    fclose($file_pointer);



 ?>