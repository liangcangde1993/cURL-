<?php 
/*
由个人信息跳转到---

*/
header("Content-type: text/html; charset=utf-8"); 
ini_set('display_errors', 'on');
error_reporting(E_ALL);
$yanzhengma = $_GET['vcode'];

$cookie_jar = dirname(__FILE__)."/cookie.txt"; 
$ch = curl_init();
$url = 'http://account.dzp.wjybk.com:16906/SelfOpenAccount/firmController.fir?funcflg=eidtFirm';
$data = array(
	'name' => '黄敏', 
	'attach' =>new CURLFile('C:\wamp\www/0.jpg'),
	'attachhou' =>new CURLFile('C:\wamp\www/0.jpg'),
	'picyin' =>new CURLFile('C:\wamp\www/0.jpg'),
	'registeredPhoneNo' => '13693600123',
	'cardType' => '1',
	'cardNumber' => '341182199407227603',
	'recommendBankCode' => '10',
	'bankAccount' => '2344 5464 5654 1234',
	'brokerId' => '7200',
	'selectp' => '北京',
	'address1' => '北京',
	'address' => '北京',
	'contactMan' => 'Tom',
	'selectp' => '北京',
	'type' => '3',
	'sex' => '1',
	'ContacterPhoneNo' => '13693600123',
	'ReFreeAccount' => '23423434324230',
	'ck' => 'on',
	'yanzhengma' => $yanzhengma
);
curl_setopt($ch, CURLOPT_URL, $url);
curl_setopt($ch, CURLOPT_RETURNTRANSFER, 1);//执行结果是否被返回，0是返回，1是不返回
curl_setopt($ch, CURLOPT_HEADER, 0);//参数设置，是否显示头部信息，1为显示，0为不显示

curl_setopt($ch, CURLOPT_COOKIEFILE, $cookie_jar);
curl_setopt($ch, CURLOPT_REFERER,'http://www.wjybk.com');
//表单数据，是正规的表单设置值为非0
curl_setopt($ch, CURLOPT_POST, 1);
curl_setopt($ch, CURLOPT_POSTFIELDS, $data);
//执行并获取结果
$add = curl_exec($ch);
if($add === FALSE)
{
    echo "<br/>","cUrl Error:".curl_error($ch);
}
// var_dump($data);

// echo $add;
//    释放cURL句柄
curl_close($ch);
// var_dump($_POST);
// die;
// 




/*
	注册成功页

*/

$ch = curl_init();
$url = 'http://account.dzp.wjybk.com:16906/SelfOpenAccount/firmController.fir?funcflg=addFirm';
            $cookie_jar = C('upload_dir')."/flt_cookie/cookie.txt";

$data = array(
	'name' => '黄敏', 
	'firmID' =>'',
	'registeredPhoneNo' => '13693600123',
	'cardType' => '1',
	'cardNumber' => '341182199407227603',
	'recommendBankCode' => '10',
	'bankAccount' => '2344 5464 5654 1234',
	'brokerId' => '7200',
	'selectp' => '北京',
	'address1' => '北京',
	'address' => '北京',
	'contactMan' => 'Tom',
	'selectp' => '北京',
	'type' => '3',
	'email'	=>'',
    'firmId' =>'',
	'ContacterPhoneNo' => '13693600123',
	'ReFreeAccount' => '23423434324230',
	'ck' => 'on',
	'postCode' => ''
);
            $cookie_jar = C('upload_dir')."/flt_cookie/cookie.txt";

curl_setopt($ch, CURLOPT_URL, $url);
curl_setopt($ch, CURLOPT_RETURNTRANSFER, 1);//执行结果是否被返回，0是返回，1是不返回
curl_setopt($ch, CURLOPT_HEADER, 0);//参数设置，是否显示头部信息，1为显示，0为不显示
curl_setopt($ch, CURLOPT_COOKIEFILE, $cookie_jar);
curl_setopt($ch, CURLOPT_REFERER,'http://www.wjybk.com');
curl_setopt($ch, CURLOPT_POST, 1);
curl_setopt($ch, CURLOPT_POSTFIELDS, $data);
$content7 = curl_exec($ch);
if($content7 === FALSE)
{
    echo "<br/>","cUrl Error:".curl_error($ch);
}
echo $content7;
var_dump($content7);
curl_close($ch);



 ?>