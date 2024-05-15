<?php
header('Content-type:text/html;charset=utf-8');
setlocale(LC_ALL, 'zh_CN'); // 设置为中文地区信息

function goback(){
	//重定向浏览器   
	header("Location: https://phaten-iot.github.io/zh/goback");   
	//确保重定向后，后续代码不会被执行   
	exit;
}

function writeParam(){
  $fp = fopen('custform.csv', 'a');  
  $time = date('Y-m-d H:i:s',time());
  $com = iconv("UTF-8", "GB2312//IGNORE", $_POST['company']);
  $email = iconv("UTF-8", "GB2312//IGNORE", $_POST['email']);
  $topic = iconv("UTF-8", "GB2312//IGNORE", $_POST['topic']);
  $content = iconv("UTF-8", "GB2312//IGNORE", $_POST['content']);
  fputcsv($fp,array($com,$email,$topic,$content,$time));   
  fclose($fp);

  goback();
}

function writeTxt(){
	$myfile = fopen("outyyyy.txt", "w") or die("Unable to open file!");
	fwrite($myfile,$_POST['company']);
	fclose($myfile);
}

writeParam();