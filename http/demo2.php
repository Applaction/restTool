<?php
include 'HttpClient.class.php';
//抓取页面的内容
$contents = HttpClient::quickGet('http://www.baidu.com/');
var_dump($contents);

//post请求某一个接口，返回的信息赋值给$res
$res = HttpClient::quickPost('http://example.com/sms.php', array(
  'name'  => 'kevin.liu',
  'phone' => '18201042042'
));

//可能有一些请求访问会出问题，则需要加一个userAgent
$client = new HttpClient('example.com');
$client->setDebug(true);
$client->setUserAgent('Mozilla/5.0 (Windows; U; Windows NT 5.1; en-US; rv:1.3a) Gecko/20021207');
if (!$client->get('/')) {
   die('An error occurred: '.$client->getError());
}
$contents = $client->getContent();

//还有一些情况是：在采集数据的时候必须先登陆，则可以先模拟登陆
$client = new HttpClient('example.com');
$client->post('/login.php', array(      //登陆地址
'username' => 'kevin',
'password' => '123456'
));
if (!$client->get('/private.php')) {    //采集数据的目标地址
die('An error occurred: '.$client->getError());
}
$pageContents = $client->getContent();
