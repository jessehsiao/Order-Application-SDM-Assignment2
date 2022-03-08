<?php

// 資料庫連線訊息
$DBhost = "localhost"; 	//主機
$DBname = "order_application";	//資料庫
$DBuser = "root";	//帳號
$DBpw = "secure1234";		//密碼

// 連線至主機
$conn = mysqli_connect( $DBhost, $DBuser, $DBpw);
if (empty($conn)){
  print mysqli_error($conn);
  echo "Connected fail";
  die ("主機無法連線");
  exit;
}

// 選擇資料庫
if( !mysqli_select_db($conn, $DBname)) {
  echo "Connected fail";
  die ("資料庫無法選擇");
}

// 設定連線編碼
mysqli_query( $conn, "SET NAMES 'utf8'");
?>
