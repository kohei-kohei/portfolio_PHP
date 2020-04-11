<?php

mb_language("Japanese");
mb_internal_encoding("UTF-8");

if ($_SERVER['REQUEST_METHOD'] != 'POST') {
    // POSTでのアクセスでない場合
    $name = '';
    $email = '';
    $gender = '';
    $inquiry = '';
    $err_msg = '';
    $complete_msg = '';

} else {
    // フォームがサブミットされた場合（POST処理）
    // 入力された値を取得する
    $name = $_POST['name'];
    $email = $_POST['email'];
    $gender = $_POST['gender'];
    $inquiry = $_POST['inquiry'];

    // エラーメッセージ・完了メッセージの用意
    $err_msg = '';
    $complete_msg = '';

    // 空チェック
    if ($name == '' || $email == '' || $gender == '' || $inquiry == '') {
        $err_msg = '全ての項目を入力してください。';
    }

    // エラーなし（全ての項目が入力されている）
    //if ($err_msg == '') {
    if (true) {
        $to = 'sky6sk212@gmail.com'; // 管理者のメールアドレスなど送信先を指定
        $headers = "From: " . $email . "\r\n";

        // 本文の最後に名前を追加
        $inquiry .= "\r\n\r\n" . $name;

        // メール送信
        if(mb_send_mail($to, $gender, $inquiry, $headers)){
            echo "メールを送信しました";
          } else {
            echo "メールの送信に失敗しました";
          };

        // 完了メッセージ
        //$complete_msg = '送信されました！';

        // 全てクリア
        $name = '';
        $email = '';
        $subject = '';
        $message = '';
    }

}
?>

<!DOCTYPE html>
<html lang="ja">
    <head>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <title>Portfolio</title>

        <!-- Twitterの設定 -->
        <meta name="twitter:card" content="summary" /> 
        <meta name="twitter:site" content="@Kohei_web_nlp" />
        <meta property="og:url" content="https://kohei-kohei.github.io/portfolio/" /> 
        <meta property="og:title" content="Kohei's Portfolio" /> 
        <meta property="og:description" content="こーへいのポートフォリオサイトです" />
        <meta property="og:image" content="https://kohei-kohei.github.io/portfolio/img/dubai.jpg" />

        <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.6.3/css/all.css">
        <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script>

        <link href="css/style.css" rel="stylesheet">
    </head>

    <body>
        <section id="main">
            <div class="inner">
                <h2 class="title">お問い合わせありがとうございます</h2>

                <!-- フォームの中 -->
                <div class="confirm">
                    <h3 class="form-title">入力内容</h3>

                    <div class="flex">
                        <p class="form-item">氏名</p>
                        <p><?php echo $_POST['name']; ?></p>
                    </div>

                    <div class="flex">
                        <p class="form-item">メールアドレス</p>
                        <p><?php echo $_POST['email']; ?></p>
                    </div>
                    
                    <div class="flex">
                        <p class="form-item">性別</p>
                        <p><?php echo $_POST['gender']; ?></p>
                    </div>                    
    
                    <div class="flex">
                        <p class="form-item">メッセージ</p>
                        <p><?php echo $_POST['inquiry']; ?></p>
                    </div>
                    
                </div>
                <!-- フォームの中 -->

                <div class="parent">
                    <a href="../index.php">前のページに戻る</a>
                </div>

            </div>
        </section>

        <!-- フッター -->
        <footer>
            <div class="container">
                <h2>Kohei's portfolio.</h2>
                <p>© 2020 Kohei</p>
                
            </div>
        </footer>
        <!-- /フッター -->

    </body>
</html>