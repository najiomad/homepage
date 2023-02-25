<?php
// フォームの送信があった場合
if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    // 入力値の検証
    $name = filter_input(INPUT_POST, 'name', FILTER_SANITIZE_STRING);
    $email = filter_input(INPUT_POST, 'email', FILTER_SANITIZE_EMAIL);
    $message = filter_input(INPUT_POST, 'message', FILTER_SANITIZE_STRING);

    // 入力値が正しい場合
    if ($name && $email && $message) {
        // 送信先のメールアドレスを設定
        $to = 'you@example.com';
        $subject = 'お問い合わせがありました';

        // メール本文を作成
        $body = "お名前: $name\n";
        $body .= "メールアドレス: $email\n";
        $body .= "お問い合わせ内容:\n$message";

        // メールを送信
        $result = mail($to, $subject, $body);

        // 送信結果を表示
        if ($result) {
            echo 'お問い合わせが送信されました。';
        } else {
            echo 'お問い合わせの送信に失敗しました。';
        }
    } else {
        // 入力値が不正な場合
        echo '入力値が不正です。';
    }
}
?>

<!DOCTYPE html>
<html>
    <head>
        <meta charset="utf-8">
        <title>連絡フォーム</title>
    </head>
    <body>
        <header>
            <h1>連絡フォーム</h1>
        </header>

        <!--loading animation-->

        <div id="animation">
            <!-- <p>読み込み中</p>
            <div class="loading"></div> -->
        </div>
        <!-- お問い合わせフォーム -->
        <form method="POST" action="">
            <div>
                <label for="name">お名前</label>
                <input type="text" name="name" id="name" required>
            </div>
            <div>
                <label for="email">メールアドレス</label>
                <input type="email" name="email" id="email" required>
            </div>
            <div>
                <label for="message">お問い合わせ内容</label>
                <textarea name="message" id="message" rows="5" required></textarea>
            </div>
            <button type="submit">送信する</button>
        </form>

        <script src="script/loader.js"></script>
    </body>
</html>
