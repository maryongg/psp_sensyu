<?PHP 
// エラーを出力する
ini_set( 'display_errors', 1 );

$id = $_GET["id"];

//1.　データベース接続
include("function.php");// function化
$pdo = db_conn();

//２．データ登録SQL作成
$sql = "SELECT * FROM kadai_table WHERE id=:id";
$stmt = $pdo->prepare($sql);
$stmt->bindValue(':id', $id, PDO::PARAM_INT);  //Integer（数値の場合 PDO::PARAM_INT)
$status = $stmt->execute();

//３．データ表示
$values = "";
if($status==false) {
  sql_error($stmt);
}

//全データ取得
$row = $stmt -> fetch();
// $values =  $stmt->fetchAll(PDO::FETCH_ASSOC); //PDO::FETCH_ASSOC[カラム名のみで取得できるモード]
// $json = json_encode($values,JSON_UNESCAPED_UNICODE);

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
<div class="zentai">
<p>出会ったお相手を検討！</p>


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

<section class="text-gray-600 body-font relative">
  <div class="container px-5 py-24 mx-auto">
    <div class="flex flex-col text-center w-full mb-12">
      <h1 class="sm:text-3xl text-2xl font-medium title-font mb-4 text-gray-900">メンズ登録！</h1>
      <p class="lg:w-2/3 mx-auto leading-relaxed text-base">出会ったメンズを登録しましょう。</p>
    </div>
    <form method="POST" action="insert.php" enctype="multipart/form-data">
    <div class="lg:w-1/2 md:w-2/3 mx-auto">
      <div class="flex flex-wrap -m-2">
        <div class="p-2 w-full">
          <div class="relative">
            <label for="name" class="leading-7 text-sm text-gray-600">お名前</label>
            <input type="text" id="name" name="name" value="<?= h($row["name"]) ?>"class="w-full bg-gray-100 bg-opacity-50 rounded border border-gray-300 focus:border-pink-500 focus:bg-white focus:ring-2 focus:ring-pink-200 text-base outline-none text-gray-700 py-1 px-3 leading-8 transition-colors duration-200 ease-in-out">
          </div>
        </div>
    </div>
    <div class="p-2 w-full">
        <div class="relative">
        <label for="name" class="leading-7 text-sm text-gray-600">年齢</label>
        <input type="text" id="name" name="age" value="<?= h($row["age"]) ?>"class="w-full bg-gray-100 bg-opacity-50 rounded border border-gray-300 focus:border-pink-500 focus:bg-white focus:ring-2 focus:ring-pink-200 text-base outline-none text-gray-700 py-1 px-3 leading-8 transition-colors duration-200 ease-in-out">
        </div>
    </div>

    <div class="p-2 w-full">
        <div class="relative">
        <label for="name" class="leading-7 text-sm text-gray-600">年収</label>
        <select name="income" class="w-full bg-gray-100 bg-opacity-50 rounded border border-gray-300 focus:border-pink-500 focus:bg-white focus:ring-2 focus:ring-pink-200 text-base outline-none text-gray-700 py-1 px-3 leading-8 transition-colors duration-200 ease-in-out">
        <option value="200万円未満">200万円未満</option>
        <option value="200万円~400万円">200万円~400万円</option>
        <option value="400万円~600万円">400万円~600万円</option>
        <option value="600万円~800万円">600万円~800万円</option>
        <option value="800万円~1000万円">800万円~1000万円</option>
        <option value="1000万円~1500万円">1000万円~1500万円</option>
        <option value="1500万円~2000万円">1500万円~2000万円</option>
        <option value="2000万円以上">2000万円以上</option>
        </select>
        </div>
    </div>

    <div class="p-2 w-full">
        <div class="relative">
        <label for="name" class="leading-7 text-sm text-gray-600">お仕事</label>
        <input type="text" id="name" name="job" class="w-full bg-gray-100 bg-opacity-50 rounded border border-gray-300 focus:border-pink-500 focus:bg-white focus:ring-2 focus:ring-pink-200 text-base outline-none text-gray-700 py-1 px-3 leading-8 transition-colors duration-200 ease-in-out">
        </div>
    </div>

    <div class="p-2 w-full">
        <div class="relative">
        <label for="name" class="leading-7 text-sm text-gray-600">出会った手段</label>
        <select name="meeting" class="w-full bg-gray-100 bg-opacity-50 rounded border border-gray-300 focus:border-pink-500 focus:bg-white focus:ring-2 focus:ring-pink-200 text-base outline-none text-gray-700 py-1 px-3 leading-8 transition-colors duration-200 ease-in-out">
        <option value="職場や学校">職場や学校</option>
        <option value="紹介">紹介</option>
        <option value="マッチングアプリ">マッチングアプリ</option>
        <option value="合コンや街コン">合コンや街コン</option>
        <option value="BARや居酒屋などの飲食店">BARや居酒屋などの飲食店</option>
        <option value="趣味や習い事">趣味や習い事</option>
        <option value="その他">その他</option>
        </select>
        </div>
    </div>

        <div class="p-2 w-full">
          <button class="flex mx-auto text-white bg-pink-500 border-0 py-2 px-8 focus:outline-none hover:bg-pink-600 rounded text-lg">更新</button>
        </div>
        <div class="p-2 w-full">
          <button class="flex mx-auto text-white bg-pink-500 border-0 py-2 px-8 focus:outline-none hover:bg-pink-600 rounded text-lg">お見切り</button>
        </div>
      </div>
    </div>
    </form>
  </div>
</section>




<form method="POST" action="update.php" enctype="multipart/form-data">
お名前：<input type="text" name="name" value="<?= h($row["name"]) ?>"><br>
年齢：<input type="text" name="age" value="<?= h($row["age"]) ?>"><br>
年収：<select name="income">
    <option value="<?= h($row["income"]) ?>"><?= h($row["income"]) ?></option>
    <option value="200">200万円未満</option>
    <option value="200-400">200万円~400万円</option>
    <option value="400-600">400万円~600万円</option>
    <option value="600-800">600万円~800万円</option>
    <option value="800-1000">800万円~1000万円</option>
    <option value="1000-1500">1000万円~1500万円</option>
    <option value="1500-2000">1500万円~2000万円</option>
    <option value="2000">2000万円以上</option>
</select>
お仕事：<input type="text" name="job" value="<?= h($row["job"]) ?>"><br>
出会った手段：
<br>
<input type="hidden" name="id" value="<?= $row["id"] ?>">
<input type="submit" value="更新">
</form>

<a href="read.php">登録メンズ一覧！</a>

    <!-- form - start -->
    <form action="delete.php" method="post">
      <div class="mt-4">
        <input type="hidden" name="id" value="<?= $row["id"] ?>">
        <button id="delete">削除</button>
      </div>
    </form>
    <!-- form - end -->


</div>
</body>
</html>