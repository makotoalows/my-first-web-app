<?php
if ($_SERVER["REQUEST_METHOD"] == "POST") {
  // 入力値を取得・エスケープ
  $name = htmlspecialchars($_POST["name"], ENT_QUOTES, 'UTF-8');
  $email = htmlspecialchars($_POST["email"], ENT_QUOTES, 'UTF-8');
  $message = htmlspecialchars($_POST["message"], ENT_QUOTES, 'UTF-8');

  // メールの宛先・件名・本文
  $to = "join@makoto-atelier.com";
  $subject = "【お問い合わせ】Webサイトより";
  $body = "お名前: $name\n";
  $body .= "メールアドレス: $email\n";
  $body .= "メッセージ:\n$message\n";

  // 日本語メールの設定
  mb_language("Japanese");
  mb_internal_encoding("UTF-8");

  // 送信元メールアドレス（適切に指定）
  $headers = "From: $email";

  // メール送信
  if (mb_send_mail($to, $subject, $body, $headers)) {
    echo "メール送信に成功しました！";
  } else {
    echo "メール送信に失敗しました…";
  }
}
?>

