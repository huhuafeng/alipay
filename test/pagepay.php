<?php 
include('./vendor/autoload.php');
use huhuafeng\alipay\service\AlipayTradeService;
use huhuafeng\alipay\buildermodel\AlipayTradePagePayContentBuilder;

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

    //商户订单号，商户网站订单系统中唯一订单号，必填
    $out_trade_no = time();

    //订单名称，必填
    $subject = 'subject';

    //付款金额，必填
    $total_amount = '0.01';

    //商品描述，可空
    $body = 'body';

    $payRequestBuilder = new AlipayTradePagePayContentBuilder();
    $payRequestBuilder->setBody($body);
    $payRequestBuilder->setSubject($subject);
    $payRequestBuilder->setOutTradeNo($out_trade_no);
    $payRequestBuilder->setTotalAmount($total_amount);

    $payResponse = new AlipayTradeService($config);
    $result = $payResponse->pagePay($payRequestBuilder, 'get');

	echo $result;


?>