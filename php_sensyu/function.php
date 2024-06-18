<?php
//XSS対応（ echoする場所で使用！それ以外はNG ）
function h($str)
{
    return htmlspecialchars($str, ENT_QUOTES);
}

//2.　データベース接続
//Password:MAMP='root',XAMPP=''
function db_conn()
{
    try {
        //xammpここから
        $db_name = "kadai"; //DB名
        $db_host = "localhost";
        $db_id   = "root"; //アカウント名
        $db_pw   = ""; //パスワード：XAMPPはパスワード無し
        //xammpここまで

        //さくらここから
        // $db_name = "maryongg_kadai";
        // $db_host = "mysql57.maryongg.sakura.ne.jp";
        // $db_id   = "maryongg";
        // $db_pw   = "Maru-2020";
        //さくらここまで

        //変数を外に出したい時にはreturn
        return new PDO('mysql:dbname=' . $db_name . ';charset=utf8;host=' . $db_host, $db_id, $db_pw);
    } catch (PDOException $e) {
        exit('DB_ConnectError!!:' . $e->getMessage()); //サーバーエラー時のテキスト
    }
}


//SQLエラー関数：sql_error($stmt)
function sql_error($stmt)
{
    $error = $stmt->errorInfo();
    exit("SQLError!!:" . $error[2]);
}


//リダイレクト関数: redirect($file_name)
function redirect($file_name)
{
    header("Location: $file_name");
    exit();
}

function sschk()
{
    if (!isset($_SESSION["chk_ssid"]) || $_SESSION["chk_ssid"] != session_id()) {
        redirect('login.php');
    } else {
        session_regenerate_id(true);
        $_SESSION["chk_ssid"] = session_id();
    }
}
