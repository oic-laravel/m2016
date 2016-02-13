<?php

return [

    /*
    |--------------------------------------------------------------------------
    | メールドライバー
    |--------------------------------------------------------------------------
    |
    | メール送信のドライバーとしてSMTPとPHPの"mail"機能の二つをLaravelは
    | サポートしています。アプリケーション全体で使用する方法を選び指定して
    | ください。デフォルトではSMTPメールをセットしています。
    |
    | サポートドライバー: "smtp", "mail", "sendmail", "mailgun", "mandrill", "ses", "log"
    |
    */

    'driver' => env('MAIL_DRIVER', 'smtp'),

    /*
    |--------------------------------------------------------------------------
    | SMTPホストアドレス
    |--------------------------------------------------------------------------
    |
    | アプリケーションで使用するSMTPサーバーのホストアドレスを指定します。
    | デフォルトでは確実な配信サービスを提供しているMailgunメールサービス
    | を使用するオプションを設定しています。
    |
    */

    'host' => env('MAIL_HOST', 'smtp.mailgun.org'),

    /*
    |--------------------------------------------------------------------------
    | SMTPホストポート
    |--------------------------------------------------------------------------
    |
    | これはアプリケーションのユーザーにメールを送信するために使用される
    | SMTPポートです。デフォルトでは、ホストと同様に、Mailgunメール
    | アプリケーション向けに設定しています。
    |
    */

    'port' => env('MAIL_PORT', 587),

    /*
    |--------------------------------------------------------------------------
    | グローバルな「送信元」アドレス
    |--------------------------------------------------------------------------
    |
    | メールの送信元は全部同じメールアドレスに設定したいと思うはずです。
    | アプリケーションから送信される全メールの送信元名とアドレスはここで
    | 設定します。
    |
    */

    'from' => ['address' => null, 'name' => null],

    /*
    |--------------------------------------------------------------------------
    |  メール暗号化プロトコル
    |--------------------------------------------------------------------------
    |
    | アプリケーションがメールでメッセージを送信する時に使用されるべき
    | 暗号化プロトコルをここで指定します。とても安全なトランスポート層の
    | 暗号化プロトコルがデフォルトとして設定されています。
    |
    */

    'encryption' => env('MAIL_ENCRYPTION', 'tls'),

    /*
    |--------------------------------------------------------------------------
    | SMTPサーバーユーザー名
    |--------------------------------------------------------------------------
    |
    | もしSMTPサーバーが認証でユーザー名を必要としているのでしたら、
    | ここで設定してください。サーバーに接続する時の認証に使用されます。
    | 更に"password"も、次のオプションで設定できます。
    |
    */

    'username' => env('MAIL_USERNAME'),

    /*
    |--------------------------------------------------------------------------
    | SMTPサーバーパスワード
    |--------------------------------------------------------------------------
    |
    | アプリケーションからSMTPサーバーにメッセージを送信する時に必要な
    | パスワードをここで設定します。これはサーバーとの接続時に使用され、
    | のアプリケーションからメッセージが送信できます。
    |
    */

    'password' => env('MAIL_PASSWORD'),

    /*
    |--------------------------------------------------------------------------
    | Sendmailシステムパス
    |--------------------------------------------------------------------------
    |
    | メールの送信に"sendmail"ドライバーを使用する場合、このサーバーで
    | どこにSendmailがあるのか知る必要があります。ここで指定している
    | デフォルトのパスはほとんどのシステムで上手く動作します。
    |
    */

    'sendmail' => '/usr/sbin/sendmail -bs',

];