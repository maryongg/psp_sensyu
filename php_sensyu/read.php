<?php
//0. SESSION開始！！
session_start();
// エラーを出力する
ini_set( 'display_errors', 1 );

//2.　データベース接続
include("function.php");// function化
sschk();
$pdo = db_conn();

//２．データ登録SQL作成
$sql = "SELECT * FROM kadai_table";
$stmt = $pdo->prepare($sql);
$status = $stmt->execute();

//３．データ表示
$values = "";
if($status==false) {
sql_error($stmt);
}

//全データ取得
$values =  $stmt->fetchAll(PDO::FETCH_ASSOC); //PDO::FETCH_ASSOC[カラム名のみで取得できるモード]
$json = json_encode($values,JSON_UNESCAPED_UNICODE);

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
<header class="text-gray-600 body-font">
  <div class="container mx-auto flex flex-wrap p-5 flex-col md:flex-row items-center">
    <a class="flex title-font font-medium items-center text-gray-900 mb-4 md:mb-0">
      <!-- <svg xmlns="http://www.w3.org/2000/svg" fill="none" stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2" class="w-10 h-10 text-white p-2 bg-pink-500 rounded-full" viewBox="0 0 24 24">
        <path d="M12 2L2 7l10 5 10-5-10-5zM2 17l10 5 10-5M2 12l10 5 10-5"></path>
      </svg> -->
      <img src="omikiri_logo.png" width=20% alt="">
      <span class="ml-3 text-xl">OMIKIRI</span>
    </a>
    <nav class="md:ml-auto flex flex-wrap items-center text-base justify-center">
      <a href="read.php" class="mr-5 hover:text-gray-900">メンズ一覧</a>
      <a href=class="mr-5 hover:text-gray-900">お見切り一覧</a>
      <a class="mr-5 hover:text-gray-900">Third Link</a>
      <a class="mr-5 hover:text-gray-900">Fourth Link</a>
    </nav>
    <button class="inline-flex items-center bg-gray-100 border-0 py-1 px-3 focus:outline-none hover:bg-gray-200 rounded text-base mt-4 md:mt-0">Button
      <svg fill="none" stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2" class="w-4 h-4 ml-1" viewBox="0 0 24 24">
        <path d="M5 12h14M12 5l7 7-7 7"></path>
      </svg>
    </button>
  </div>
</header>
<body>
<?php include("menu.php"); ?>
<div class="zentai">
<p>登録メンズ一覧</p>

<section class="text-gray-600 body-font">
  <div class="container px-5 py-24 mx-auto">
    <div class="flex flex-col text-center w-full mb-20">
      <h1 class="sm:text-4xl text-3xl font-medium title-font mb-2 text-gray-900">登録メンズ一覧</h1>
      <p class="lg:w-2/3 mx-auto leading-relaxed text-base">さあ、これから楽しいお見切りの時間です。</p>
    </div>
    <div class="lg:w-2/3 w-full mx-auto overflow-auto">
      <table class="table-auto w-full text-left whitespace-no-wrap">
        <thead>
          <tr>
            <th class="px-4 py-3 title-font tracking-wider font-medium text-gray-900 text-sm bg-gray-100 rounded-tl rounded-bl">登録日時</th>
            <th class="px-4 py-3 title-font tracking-wider font-medium text-gray-900 text-sm bg-gray-100">名前</th>
            <th class="px-4 py-3 title-font tracking-wider font-medium text-gray-900 text-sm bg-gray-100">年齢</th>
            <th class="px-4 py-3 title-font tracking-wider font-medium text-gray-900 text-sm bg-gray-100">年収</th>
            <th class="px-4 py-3 title-font tracking-wider font-medium text-gray-900 text-sm bg-gray-100">お仕事</th>
            <th class="px-4 py-3 title-font tracking-wider font-medium text-gray-900 text-sm bg-gray-100">出会いの手段</th>
            <th class="w-10 title-font tracking-wider font-medium text-gray-900 text-sm bg-gray-100 rounded-tr rounded-br"></th>
          </tr>
          <?php foreach($values as $v){ ?>
        <tr>
        <td><a href="detail.php?id=<?=$v["id"]?>"><?=$v["indate"]?></a></td>

        
        <td><?=$v["name"]?></td>
        <td><?=$v["age"]?></td>
        <td><?=$v["income"]?></td>
        <td><?=$v["job"]?></td>
        <td><?=$v["meeting"]?></td>
        
    
        </tr>
    <?php } ?>
        </thead>
        <tbody>
          
        </tbody>
      </table>
    </div>
    <!-- <div class="flex pl-4 mt-4 lg:w-2/3 w-full mx-auto">
    
        <svg fill="none" stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2" class="w-4 h-4 ml-2" viewBox="0 0 24 24">
          <path d="M5 12h14M12 5l7 7-7 7"></path>
        </svg>
      </a>
      <button class="flex ml-auto text-white bg-pink-500 border-0 py-2 px-6 focus:outline-none hover:bg-pink-600 rounded">Button</button>
    </div>
  </div> -->
</section>

<!-- <table>
    <tr>
        <th>登録日時</th>
        <th>名前</th>
        <th>年齢</th>
        <th>年収</th>
        <th>お仕事</th>
        <th>出会いの手段</th>

    </tr>
    <?php foreach($values as $v){ ?>
        <tr>
        <td><a href="detail.php?id=<?=$v["id"]?>"><?=$v["indate"]?></a></td>

        
        <td><?=$v["name"]?></td>
        <td><?=$v["age"]?></td>
        <td><?=$v["income"]?></td>
        <td><?=$v["job"]?></td>
        <td><?=$v["meeting"]?></td>
        
    
        </tr>
    <?php } ?>
</table> -->




</div>
</body>
</html>