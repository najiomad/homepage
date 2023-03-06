// Firebaseの設定
const firebaseConfig = {
    apiKey: "AIzaSyDbG5eMdG_WmgCDq1NzEezP3PaDKBxx0ng",
    authDomain: "najio-mad.firebaseapp.com",
    projectId: "najio-mad",
    storageBucket: "najio-mad.appspot.com",
    messagingSenderId: "669175756950",
    appId: "1:669175756950:web:77a3b570c4df078c01aab7",
    measurementId: "G-L746DNJZDM",
};

firebase.initializeApp(firebaseConfig);

// フォームの送信イベントを設定
document.querySelector("form").addEventListener("submit", function(e) {
    e.preventDefault(); // フォームのデフォルト動作を停止

    // フォームの値を取得
    const name = document.getElementById("name").value;
    const email = document.getElementById("email").value;
    const message = document.getElementById("message").value;

    // Firebase Realtime Databaseにデータを送信
    firebase
        .database()
        .ref("messages")
        .push({
            name: name,
            email: email,
            message: message,
        })
        .then(function() {
            // 送信完了のメッセージを表示
            alert("お問い合わせを受け付けました。");
            // フォームの値をリセット
            document.querySelector("form").reset();
        })
        .catch(function(error) {
            // エラー処理
            console.error(error);
        });
});