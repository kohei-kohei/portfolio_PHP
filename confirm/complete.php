<?php
    session_start();

    mb_language("Japanese");
    mb_internal_encoding("UTF-8");
    date_default_timezone_set('Asia/Tokyo');

    // フォームがサブミットされた場合（POST処理）
    // 入力された値を取得する
    $name = $_SESSION['name'];
    $email = $_SESSION['email'];
    $gender = $_SESSION['gender'];
    $inquiry = $_SESSION['inquiry'];
    $token = $_SESSION['token'];

    // CSRF対策
    if (isset($_POST['token'], $token) && $_POST['token'] === $token) {
        // トークンを削除
        unset($_SESSION['token']);

        // 変数とタイムゾーンを初期化
        $auto_reply_subject = 'お問い合わせありがとうございます。';
        $auto_reply_text = " この度は、お問い合わせ頂き誠にありがとうございます。下記の内容でお問い合わせを受け付けました。\n
        返信に数日かかる場合がございますが、あらかじめご了承ください。\n\n";
        $auto_reply_text .= "お問い合わせ日時：" . date("Y-m-d H:i") . "\n";
        $auto_reply_text .= "氏名：" . $name . "\n";
        $auto_reply_text .= "性別：" . $gender . "\n";
        $auto_reply_text .= "メールアドレス：" . $email . "\n\n";
        $auto_reply_text .= "メッセージ：" . $inquiry . "\n\n";
        
        //if ($err_msg == '') {
        if (true) {
            $to = 'sky6sk212@gmail.com'; // 管理者のメールアドレスなど送信先を指定
            $headers = "From: " . $email . "\r\n";
            $auto_headers = "From: " . $to . "\r\n";
            
            $subject = 'お問い合わせ内容';
            $receive_text = "--- ポートフォリオからのお問い合わせ ---" . "\n\n";
            $receive_text .= "お問い合わせ日時：" . date("Y-m-d H:i") . "\n";
            $receive_text .= "氏名：" . $name . "\n";
            $receive_text .= "性別：" . $gender . "\n";
            $receive_text .= "メールアドレス：" . $email . "\n\n";
            $receive_text .= "メッセージ：" . $inquiry . "\n\n";
            
            // メール送信
            mb_send_mail($to, $subject, $receive_text, $headers); //自分に
            mb_send_mail($email, $auto_reply_subject, $auto_reply_text, $auto_headers); //相手に
            
        }
    } else {
        header('Location: ../index.php');
        exit();
    }
?>

<!DOCTYPE html>
<html lang="ja">
    <head>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <title>お問い合わせ完了</title>

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
                <div class="form">
                    <h3 class="form-title">入力内容</h3>

                    <div class="flex">
                        <p class="form-item">氏名</p>
                        <p><?php echo $name; ?></p>
                    </div>

                    <div class="flex">
                        <p class="form-item">メールアドレス</p>
                        <p><?php echo $email; ?></p>
                    </div>
                    
                    <div class="flex">
                        <p class="form-item">性別</p>
                        <p><?php echo $gender; ?></p>
                    </div>                    
    
                    <div class="flex">
                        <p class="form-item">メッセージ</p>
                        <p><?php echo $inquiry; ?></p>
                    </div>
                    
                </div>
                <!-- フォームの中 -->

                <div class="parent">
                    <a href="../index.php">最初のページに戻る</a>
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