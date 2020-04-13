<?php
    session_start();

    $_SESSION['token'] = base64_encode(random_bytes(48));
    $token = htmlspecialchars($_SESSION['token'], ENT_QUOTES);

    // 入力された値を取得する
    $name = $_SESSION['name'];
    $email = $_SESSION['email'];
    $gender = $_SESSION['gender'];
    $inquiry = $_SESSION['inquiry'];
    $token = $_SESSION['token'];

?>

<!DOCTYPE html>
<html lang="ja">
    <head>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <title>確認画面</title>

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
                <h3>お問い合わせ内容の確認</h3>

                <p class="confirm">こちらの内容でよろしければ送信ボタンを押してください。送信後に確認メールが届きます。</p>

                <!-- フォームの中 -->
                <form action="complete.php" method="post" class="form">
                    <h3 class="form-title">入力内容の確認</h3>

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
                    
                    <input type="hidden" name="token" value="<?php echo $token; ?>">
                    <input class="submit-btn" type="submit" name="submit" value="送信する">
                </form>
                <!-- フォームの中 -->

                <div class="parent">
                    <a href="../index.php?action=edit">前のページで修正する</a>
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