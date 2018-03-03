<?php

return [

    'mail' => [
        'to' => env(
            'MY_MAIL_TO',
            'noreply@example.com'
        ),
        'from' => env(
            'MY_MAIL_FROM',
            'noreply@example.com'
        ),
        'name' => env(
            'MY_MAIL_NAME',
            'xxx'
        ),
    ],

    'prefectures' => [
        '1'  => '北海道',  '2' => '青森県',  '3' => '岩手県',  '4' => '宮城県',    '5' => '秋田県',
        '6'  => '山形県',  '7' => '福島県',  '8' => '茨城県',  '9' => '栃木県',   '10' => '群馬県',
        '11' => '埼玉県', '12' => '千葉県', '13' => '東京都', '14' => '神奈川県', '15' => '山梨県',
        '16' => '長野県', '17' => '新潟県', '18' => '富山県', '19' => '石川県',   '20' => '福井県',
        '21' => '岐阜県', '22' => '静岡県', '23' => '愛知県', '24' => '三重県',   '25' => '滋賀県',
        '26' => '京都府', '27' => '大阪府', '28' => '兵庫県', '29' => '奈良県',   '30' => '和歌山県',
        '31' => '鳥取県', '32' => '島根県', '33' => '岡山県', '34' => '広島県',   '35' => '山口県',
        '36' => '徳島県', '37' => '香川県', '38' => '愛媛県', '39' => '高知県',   '40' => '福岡県',
        '41' => '佐賀県', '42' => '長崎県', '43' => '熊本県', '44' => '大分県',   '45' => '宮崎県',
        '46' => '鹿児島県', '47' => '沖縄県',
    ],

    'user' => [
        'created' => [
            'mail_subject' => env(
                'MY_USER_CREATED_MAIL_SUBJECT',
                '【xxx】会員登録が完了しました'
            ),
            'expires_in' => env(
                'MY_USER_CREATED_REQUEST_EXPIRES_IN',
                1440
            ),
        ],
    ],

    'staff' => [
        'image_path' => env(
            'MY_STAFF_IMAGE_PATH',
            'image/staff'
        ),
    ],

    'order' => [
        'created' => [
            'mail_subject' => env(
                'MY_ORDER_CREATED_MAIL_SUBJECT',
                '【xxx】依頼しました'
            ),
        ],
        'created_for_staff' => [
            'mail_subject' => env(
                'MY_ORDER_CREATED_FOR_STAFF_MAIL_SUBJECT',
                '【xxx】依頼が届きました'
            ),
        ],
        'order_replied' => [
            'mail_subject' => env(
                'MY_ORDER_REPLIED_MAIL_SUBJECT',
                '【xxx】依頼の回答が届きました'
            ),
        ],
    ],

    'change_email_request' => [
        'mail_subject' => env(
            'MY_CHANGE_EMAIL_REQUEST_MAIL_SUBJECT',
            '【xxx】メールアドレス変更のご案内'
        ),
        'expires_in' => env(
            'MY_CHANGE_EMAIL_REQUEST_EXPIRES_IN',
            1440
        ),
    ],

    'reset_password_request' => [
        'mail_subject' => env(
            'MY_RESET_PASSWORD_REQUEST_MAIL_SUBJECT',
            '【xxx】パスワード再設定のご案内'
        ),
        'expires_in' => env(
            'MY_RESET_PASSWORD_REQUEST_EXPIRES_IN',
            1440
        ),
    ],

    'item' => [
        'image_path' => env(
            'MY_ITEM_IMAGE_PATH',
            'image/item'
        ),
    ],

    'pay' => [
        'checkout_url' => env(
            'MY_PAY_CHECKOUT_URL',
            'https://checkout.pay.jp/'
        ),
        'charge_url' => env(
            'MY_PAY_CHARGE_URL',
            'https://api.pay.jp/v1/charge'
        ),
        'public_key' => env(
            'MY_PAY_PUBLIC_KEY',
            'pk_test_5e1fd6047fc25f85523c7d6d'
        ),
        'private_key' => env(
            'MY_PAY_PRIVATE_KEY',
            'sk_test_7c4fbe51cdaf13189fef9430'
        ),
    ],

];
