<?php
// エラーを出力する
ini_set( 'display_errors', 1 );

//1.　POSTデータ取得
$name           = $_POST['name'];
$age            = $_POST['age'];
$income         = $_POST['income'];
$job            = $_POST['job'];
$meeting        = $_POST['meeting'];
$date           = date('Y-m-d H:i:s');

//2.　データベース接続
include("function.php");// function化
$pdo = db_conn();

//３．データ登録SQL作成
$sql = "INSERT INTO kadai_table(name,age,income,job,meeting,indate)VALUES(:name,:age,:income,:job,:meeting,sysdate())";
$stmt = $pdo->prepare($sql);
$stmt->bindValue(':name'     ,$name,  PDO::PARAM_STR);  //Integer（数値の場合 PDO::PARAM_INT)
$stmt->bindValue(':age'      ,$age,   PDO::PARAM_INT);
$stmt->bindValue(':income'   ,$income,PDO::PARAM_STR);
$stmt->bindValue(':job'      ,$job,   PDO::PARAM_STR);
$stmt->bindValue(':meeting'  ,$meeting,PDO::PARAM_STR);


$status = $stmt->execute();//SQL実行

//４．データ登録処理後
if($status==false){
    sql_error($stmt);//function化
} else {
    // redirect("index.php");//function化
}
?>


<!DOCTYPE html>
<html lang="ja">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <script src="https://cdn.tailwindcss.com"></script>
    <link rel="stylesheet" href="style.css">
    <title>入力画面</title>
</head>
<body>

<section class="text-gray-600 body-font">
  <div class="container px-5 py-24 mx-auto flex flex-wrap">
    <div class="flex flex-wrap w-full">
      <div class="lg:w-2/5 md:w-1/2 md:pr-10 md:py-6">
        <div class="flex relative pb-12">
          <div class="h-full w-10 absolute inset-0 flex items-center justify-center">
            <div class="h-full w-1 bg-gray-200 pointer-events-none"></div>
          </div>
          <div class="flex-shrink-0 w-10 h-10 rounded-full bg-pink-500 inline-flex items-center justify-center text-white relative z-10">
            <svg fill="none" stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2" class="w-5 h-5" viewBox="0 0 24 24">
              <path d="M12 22s8-4 8-10V5l-8-3-8 3v7c0 6 8 10 8 10z"></path>
            </svg>
          </div>
          <div class="flex-grow pl-4">
            <h2 class="font-medium title-font text-sm text-gray-900 mb-1 tracking-wider">お名前</h2>
            <p class="leading-relaxed"><p><?php echo $name?></p></p>
          </div>
        </div>
        <div class="flex relative pb-12">
          <div class="h-full w-10 absolute inset-0 flex items-center justify-center">
            <div class="h-full w-1 bg-gray-200 pointer-events-none"></div>
          </div>
          <div class="flex-shrink-0 w-10 h-10 rounded-full bg-pink-500 inline-flex items-center justify-center text-white relative z-10">
            <svg fill="none" stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2" class="w-5 h-5" viewBox="0 0 24 24">
              <path d="M22 12h-4l-3 9L9 3l-3 9H2"></path>
            </svg>
          </div>
          <div class="flex-grow pl-4">
            <h2 class="font-medium title-font text-sm text-gray-900 mb-1 tracking-wider">年齢</h2>
            <p class="leading-relaxed"><p><?php echo $age?></p></p>
          </div>
        </div>
        <div class="flex relative pb-12">
          <div class="h-full w-10 absolute inset-0 flex items-center justify-center">
            <div class="h-full w-1 bg-gray-200 pointer-events-none"></div>
          </div>
          <div class="flex-shrink-0 w-10 h-10 rounded-full bg-pink-500 inline-flex items-center justify-center text-white relative z-10">
            <svg fill="none" stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2" class="w-5 h-5" viewBox="0 0 24 24">
              <circle cx="12" cy="5" r="3"></circle>
              <path d="M12 22V8M5 12H2a10 10 0 0020 0h-3"></path>
            </svg>
          </div>
          <div class="flex-grow pl-4">
            <h2 class="font-medium title-font text-sm text-gray-900 mb-1 tracking-wider">年収</h2>
            <p class="leading-relaxed"><p><?php echo $income?></p></p>
          </div>
        </div>
        <div class="flex relative pb-12">
          <div class="h-full w-10 absolute inset-0 flex items-center justify-center">
            <div class="h-full w-1 bg-gray-200 pointer-events-none"></div>
          </div>
          <div class="flex-shrink-0 w-10 h-10 rounded-full bg-pink-500 inline-flex items-center justify-center text-white relative z-10">
            <svg fill="none" stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2" class="w-5 h-5" viewBox="0 0 24 24">
              <path d="M20 21v-2a4 4 0 00-4-4H8a4 4 0 00-4 4v2"></path>
              <circle cx="12" cy="7" r="4"></circle>
            </svg>
          </div>
          <div class="flex-grow pl-4">
            <h2 class="font-medium title-font text-sm text-gray-900 mb-1 tracking-wider">お仕事</h2>
            <p class="leading-relaxed"><p><?php echo $job?></p></p>
          </div>
        </div>
        <div class="flex relative">
          <div class="flex-shrink-0 w-10 h-10 rounded-full bg-pink-500 inline-flex items-center justify-center text-white relative z-10">
            <svg fill="none" stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2" class="w-5 h-5" viewBox="0 0 24 24">
              <path d="M22 11.08V12a10 10 0 11-5.93-9.14"></path>
              <path d="M22 4L12 14.01l-3-3"></path>
            </svg>
          </div>
          <div class="flex-grow pl-4">
            <h2 class="font-medium title-font text-sm text-gray-900 mb-1 tracking-wider">出会いの手段</h2>
            <p class="leading-relaxed"><p><?php echo $meeting?></p></p>
          </div>
        </div>
      </div>
      
    </div>
  </div>
</section>

<!-- <p>登録完了しました！</p>
お名前：<p><?php echo $name?></p><br>
年齢：<p><?php echo $age?></p><br>
年収：<p><?php echo $income?></p>
お仕事：<p><?php echo $job?></p>
出会いの手段：<p><?php echo $meeting?></p>
<br>
<a href="read.php">登録メンズ一覧！</a> -->
<a href="read.php">登録メンズ一覧！</a>
</body>
</html>