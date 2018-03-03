
▼パスワード再設定▼
{{ route('staff.reset_password.reset_form', ['token' => $token]) }}

<?php
$expiresIn = config('my.reset_password_request.expires_in');
$expires = '';
if ($expiresIn > 60) {
    $expires = floor($expiresIn / 60) . '時間';
    $expiresIn = $expiresIn % 60;
}
if ($expiresIn > 0) {
    $expires .= $expiresIn . '分';
}
echo $expires;
?>以内に上記URLでパスワード再設定を行ってください。


※このメールに心当たりがない場合は、このメールを破棄してください。
※ご不明点がある場合は、下記までご連絡をお願いいたします。
━━━━━━━━━━━━━━━━━━━━
株式会社○○
━━━━━━━━━━━━━━━━━━━━
※このメールアドレスは送信専用です。返信への対応はできませんので予めご了承ください。