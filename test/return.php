<?php 
include('./vendor/autoload.php');
use huhuafeng\alipay\AopClient;
use huhuafeng\alipay\service\AlipayTradeService;

header("Content-type:text/html;charset=utf-8");
$config = array (	
	//应用ID,您的APPID。
	'app_id' => "",
	//商户私钥，您的原始格式RSA私钥
	'merchant_private_key' => "",
	//异步通知地址
	'notify_url' => "http://www.xxxxxxx.com/notify.php",
	//同步跳转
	'return_url' => "http://www.xxxxxxx.com/return.php",
	//编码格式
	'charset' => "UTF-8",
	//签名方式
	'sign_type'=>"RSA",
	//支付宝网关
	'gatewayUrl' => "https://openapi.alipay.com/gateway.do",
	//支付宝公钥,查看地址：https://openhome.alipay.com/platform/keyManage.htm 对应APPID下的支付宝公钥。
	'alipay_public_key' => "",
	//是否开启日志
	'open_log' => true,
);

$arr=$_GET;
$alipaySevice = new AlipayTradeService($config); 
$result = $alipaySevice->check($arr);

/* 实际验证过程建议商户添加以下校验。
1、商户需要验证该通知数据中的out_trade_no是否为商户系统中创建的订单号，
2、判断total_amount是否确实为该订单的实际金额（即商户订单创建时的金额），
3、校验通知中的seller_id（或者seller_email) 是否为out_trade_no这笔单据的对应的操作方（有的时候，一个商户可能有多个seller_id/seller_email）
4、验证app_id是否为该商户本身。
*/
if($result) {//验证成功
	/////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////
	//请在这里加上商户的业务逻辑程序代码
	
	//——请根据您的业务逻辑来编写程序（以下代码仅作参考）——
    //获取支付宝的通知返回参数，可参考技术文档中页面跳转同步通知参数列表

	//商户订单号
	$out_trade_no = htmlspecialchars($_GET['out_trade_no']);

	//支付宝交易号
	$trade_no = htmlspecialchars($_GET['trade_no']);
		
	echo "验证成功<br />支付宝交易号：".$trade_no;

	//——请根据您的业务逻辑来编写程序（以上代码仅作参考）——
	
	/////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////
}
else {
    //验证失败
    echo "验证失败";
}
?>