<?php
//ajax.php
session_start();
include("../funcs.php");
$pdo = db_conn();

//２．データ登録SQL作成
$sql = "SELECT * FROM gs_an_table";
$stmt = $pdo->prepare($sql);
$status = $stmt->execute();

//３．データ表示
$values = "";
if($status==false) {
  sql_error($stmt);
}else{
  //全データ取得
  $values =  $stmt->fetchAll(PDO::FETCH_ASSOC); //PDO::FETCH_ASSOC[カラム名のみで取得できるモード]
  echo $json = json_encode($values,JSON_UNESCAPED_UNICODE);  //JSに渡したいとき
}
