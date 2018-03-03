{{ $order->user->getName() }} さん、こんにちは！

依頼の回答がとどきました。

@if ($order->status == App\Order::ORDER_STATUS_OK)
おめでとうございます。依頼が承認されました。

作業日時：{{ $order->work_at }}～{{ $order->hours }}時間
@else
残念ながら、今回は不成立となりました。
@endif

タイトル：{{ $order->title }}
金額：{{ $order->price * $order->hours }}

コメント：
{{ $order->staff_comment }}


以下の画面で確認できます。
{{ route('orders.index') }}


※このメールに心当たりがない場合は、このメールを破棄してください。
※ご不明点がある場合は、下記までご連絡をお願いいたします。
━━━━━━━━━━━━━━━━━━━━
株式会社○○
━━━━━━━━━━━━━━━━━━━━
※このメールアドレスは送信専用です。返信への対応はできませんので予めご了承ください。
