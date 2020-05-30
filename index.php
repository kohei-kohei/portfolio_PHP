<?php
session_start();

$errors = array();

// 送信ボタンが押されたとき
if (isset($_POST['submit']) && $_POST['submit'] === "送信する") {
    $name = htmlspecialchars($_POST['name'], ENT_QUOTES);
    $email = htmlspecialchars($_POST['email'], ENT_QUOTES);
    $gender = htmlspecialchars($_POST['gender'], ENT_QUOTES);
    $inquiry = htmlspecialchars($_POST['inquiry'], ENT_QUOTES);

    if ($name === "") {
        $errors['name'] = "名前を入力してください";
    }
    if ($email === "") {
        $errors['email'] = "メールアドレスを入力してください";
    }
    if ($gender === "") {
        $errors['gender'] = "性別を選択してください";
    }
    if ($inquiry === "") {
        $errors['inquiry'] = "メッセージを入力してください";
    }

    // 全て入力されたとき
    if (count($errors) === 0) {
        $_SESSION['name'] = $name;
        $_SESSION['email'] = $email;
        $_SESSION['gender'] = $gender;
        $_SESSION['inquiry'] = $inquiry;

        header('Location: ./confirm/confirm.php');

        exit();
    }
}

if (isset($_GET['action']) && $_GET['action'] === 'edit') {
    $name = $_SESSION['name'];
    $email = $_SESSION['email'];
    $gender = $_SESSION['gender'];
    $inquiry = $_SESSION['inquiry'];
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
    <meta property="og:url" content="https://portfolio.ko-hei-blog.com/" />
    <meta property="og:title" content="Kohei's Portfolio" />
    <meta property="og:description" content="こーへいのポートフォリオサイトです" />
    <meta property="og:image" content="https://portfolio.ko-hei-blog.com/img/dubai.jpg" />

    <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.6.3/css/all.css">
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script>

    <script src="js/jquery.fadethis.min.js"></script>

    <link href="css/style.css" rel="stylesheet">
</head>

<body>

    <!-- ローディング画面 -->
    <div id="loading">
        <div class="spinner">
            <span class="loading-title">LOADING</span>
            <span class="circle1"></span>
            <span class="circle2"></span>
            <span class="circle3"></span>
        </div>
    </div>

    <!-- コンテンツ -->
    <div id="contents" class="hidden">


        <!-- メインビジュアル -->
        <section id="main">
            <div class="main_visual container">
                <h1 class="jumbotron">Kohei's Portfolio</h1>
            </div>
        </section> <!-- /メインビジュアル -->

        <!-- プロフィール -->
        <section id="profile">
            <div class="inner">
                <h2 class="title">Profile</h2>

                <div class="profile-wrapper flex">
                    <img src="img/taikoiwa.jpg" alt="こうへいの写真">

                    <div class="slide-bottom self-intro">
                        <h3>About me</h3>
                        <p>Pythonで機械学習を用いた自然言語処理の研究をしている大学院生です。授業で、C/C++を用いた画像処理、音声処理、数値計算を学びました。現在は、サーバーサイドの言語(PHPとLaravel)を自分で勉強しています。</p>
                        <p>資格：基本情報技術者</p>

                    </div>
                </div>

            </div>
        </section> <!-- /プロフィール -->

        <!-- スキル -->
        <section id="skills">
            <div class="inner">
                <h2 class="title">Skills</h2>

                <div class="skill-wrapper flex">

                    <div class="skill slide-left">
                        <i class="fab fa-html5"></i>
                        <h3 class="language">HTML5</h3>
                    </div>
                    <div class="skill slide-top">
                        <i class="fab fa-css3-alt"></i>
                        <h3 class="language">CSS3</h3>
                    </div>
                    <div class="skill slide-bottom">
                        <i class="fab fa-js"></i>
                        <h3 class="language">JavaScript</h3>
                    </div>

                    <div class="skill slide-right">
                        <i class="fab fa-cuttlefish"></i>
                        <h3 class="language">C/C++</h3>
                    </div>
                    <div class="skill slide-left">
                        <i class="fab fa-python"></i>
                        <h3 class="language">Python</h3>
                    </div>
                    <div class="skill slide-bottom">
                        <i class="fab fa-php"></i>
                        <h3 class="language">PHP</h3>
                    </div>
                    <div class="skill slide-top">
                        <i class="fas fa-database"></i>
                        <h3 class="language">SQL</h3>
                    </div>
                    <div class="skill slide-right">
                        <i class="fab fa-github"></i>
                        <h3 class="language">GitHub</h3>
                    </div>
                    
                    
                </div>

            </div>
        </section> <!-- /スキル -->


        <!-- ワーク -->
        <section id="works">
            <div class="inner">
                <h2 class="title">Works</h2>

                <div class="work-wrapper flex">

                    <div class="work">
                        <a href="https://todolist.ko-hei-blog.com/index.php" target="_brank">
                            <p class="picture">
                                <img src="img/todolist.png" alt="ポートフォリオの５つ目">
                            </p>

                            <div class="explanation">
                                <p>ログイン機能付きTodoリスト<br>設計&コーディング</p>
                                <p>使用スキル：PHP、Sass、MySQL</p>
                                <p>実装：ログイン認証、Todoリスト</p>
                            </div>

                        </a>
                    </div>

                    <div class="work">
                        <a href="https://laravel-sns-vue.herokuapp.com/" target="_brank">
                            <p class="picture">
                                <img src="img/laravel-sns-vue.png" alt="ポートフォリオの６つ目">
                            </p>

                            <div class="explanation">
                                <p>簡易SNS（改良中）<br>コーディングのみ</p>
                                <p>使用スキル：Laravel、Vue、PostgreSQL、Docker、heroku</p>
                                <p>実装：ログイン認証、Googleログイン、いいね機能、フォロー機能、投稿・削除機能</p>
                            </div>

                        </a>
                    </div>

                    <div class="work">
                        <a href="#" target="_brank" class="this-site">
                            <p class="picture">
                                <img src="img/portfolio.png" alt="ポートフォリオの４つ目">
                            </p>

                            <div class="explanation">
                                <p>HP制作<br>デザイン&コーディング</p>
                                <p>使用スキル：PHP、Sass、jQuery</p>
                                <p>実装：ローディング画面、お問い合わせ機能、自動メール送信</p>
                            </div>

                        </a>
                    </div>

                    <div class="work">
                        <a href="https://kohei-kohei.github.io/practice2/" target="_brank">
                            <p class="picture">
                                <img src="img/practice2.png" alt="ポートフォリオの２つ目">
                            </p>

                            <div class="explanation">
                                <p>LP制作<br>コーディングのみ</p>
                                <p>使用スキル：HTML、Sass、jQuery</p>
                                <p>実装：スライダー、アコーディオン、ドロワー</p>
                            </div>

                        </a>
                    </div>

                    <div class="work">
                        <a href="https://kohei-kohei.github.io/practice1/" target="_brank">
                            <p class="picture">
                                <img src="img/practice1.png" alt="ポートフォリオの１つ目">
                            </p>

                            <div class="explanation">
                                <p>LP制作<br>コーディングのみ</p>
                                <p>使用スキル：HTML、Sass、jQuery</p>
                                <p>実装：スライダー、アコーディオン、ドロワー、モーダル</p>
                            </div>

                        </a>
                    </div>

                    <!-- <div class="work">
                        <a href="https://verde-chiba.com/" target="_brank">
                            <p class="picture">
                                <img src="img/verde.png" alt="ポートフォリオの３つ目">
                            </p>

                            <div class="explanation">
                                <p>デザイン&コーディング</p>
                                <p>使用スキル：HTML、Sass、jQuery、Bootstrap</p>
                                <p>実装：スライダー、ドロワー</p>
                            </div>

                        </a>
                    </div> -->

                    

                    

                </div>

            </div>
        </section> <!-- /ワーク -->

        <!-- お問い合わせ -->
        <section id="contact">
            <div class="inner">
                <h2 class="title">Contact</h2>

                <form action="index.php" method="post">

                    <!-- 入力チェック -->
                    <?php if (isset($errors['name'])) {
                        echo "<p class='alert'>※" . $errors['name'] . "</p>";
                    } ?>
                    <div class="name flex">
                        <p>氏名</p>
                        <input class="input-text" type="text" name="name" placeholder="氏名" value="<?php if (isset($name)) {
                                                                                                        echo $name;
                                                                                                    } ?>">
                    </div>

                    <?php if (isset($errors['email'])) {
                        echo "<p class='alert'>※" . $errors['email'] . "</p>";
                    } ?>
                    <div class="email flex">
                        <p>メールアドレス</p>
                        <input class="input-text" type="email" name="email" placeholder="sample@gmail.com" value="<?php if (isset($email)) {
                                                                                                                        echo $email;
                                                                                                                    } ?>">
                    </div>

                    <?php if (isset($errors['gender'])) {
                        echo "<p class='alert'>※" . $errors['gender'] . "</p>";
                    } ?>
                    <div class="radio-wrapper flex">
                        <p>性別</p>
                        <label><input class="radio-btn" type="radio" name="gender" value="男性"><span>男性</span></label>
                        <label><input class="radio-btn" type="radio" name="gender" value="女性"><span>女性</span></label>
                    </div>

                    <?php if (isset($errors['inquiry'])) {
                        echo "<p class='alert'>※" . $errors['inquiry'] . "</p>";
                    } ?>
                    <div class="inquiry">
                        <p>メッセージ</p>
                        <textarea name="inquiry" placeholder="お問い合わせ内容を次のページで確認します"><?php if (isset($inquiry)) {
                                                                                        echo $inquiry;
                                                                                    } ?></textarea>
                    </div>

                    <input class="submit-btn" type="submit" name="submit" value="送信する">
                </form>

            </div>
        </section> <!-- /お問い合わせ -->

        <!-- フッター -->
        <footer>
            <div class="container">
                <h2>Kohei's portfolio.</h2>
                <p>© 2020 Kohei</p>

            </div>
        </footer>
        <!-- /フッター -->

        <!-- フローティングボタン -->
        <div class="floating">
            <a href="#" id="page-top"></a>
        </div>

    </div> <!-- /コンテンツ -->


    <script src="js/script.js"></script>
    <script>
        $(window).fadeThis();
    </script>
</body>

</html>