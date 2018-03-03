<?php

use Illuminate\Support\Facades\Schema;

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;
class CreateTables extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        //--------------------------------------------------
        // テーブル作成
        //--------------------------------------------------
        // 管理者
        Schema::create('admins', function (Blueprint $t) {
            $t->bigIncrements('id');

            $t->string('email');
            $t->string('password', 255);

            $t->rememberToken();

            $t->timestamps();
            $t->softDeletes();
        });

        // 利用者
        Schema::create('users', function (Blueprint $t) {
            $t->bigIncrements('id');

            $t->string('email');
            $t->string('password', 255);

            $t->string('last_name', 255);
            $t->string('first_name', 255);

            $t->string('zip_code', 10)->comment('郵便番号');
            $t->integer('prefecture')->comment('都道府県');
            $t->string('city', 100)->comment('市区町村');
            $t->string('address', 255)->comment('住所');
            $t->string('building', 255)->comment('建物');
            $t->string('tel', 20)->comment('連絡先');

            $t->rememberToken();

            $t->string('confirmation_token')->nullable()->comment('ユーザー登録時トークン');
            $t->datetime('confimarted_at')->nullable()->comment('ユーザー有効日付');
            $t->datetime('confirmation_sent_at')->nullable()->comment('ユーザー登録メール送信日時');

            $t->string('reset_password_token')->nullable()->comment('パスワード再設定用トークン');
            $t->datetime('reset_password_sent_at')->nullable()->comment('パスワード再設定のメール送信日時');

            $t->string('change_email')->nullable()->comment('変更後メールアドレス');
            $t->string('change_email_token')->nullable()->comment('メールアドレス変更用トークン');
            $t->datetime('change_email_sent_at')->nullable()->comment('メールアドレス変更のメール送信日時');

            $t->string('canceled_reason')->nullable()->comment('退会理由');
            $t->string('canceled_other_reason')->nullable()->comment('退会理由その他');
            $t->datetime('canceled_at')->nullable();

            $t->timestamps();
            $t->softDeletes();
        });

        // リクエスト
        Schema::create('requests', function (Blueprint $t) {
            $t->bigIncrements('id');
            $t->bigInteger('user_id')->unsigned()->comment('ユーザーID');
            $t->bigInteger('category_id')->unsigned()->comment('カテゴリID');

            $t->bigInteger('present_id')->unsigned()->nullable()->comment('承認受注提示ID');

            $t->string('note', 1000)->comment('依頼内容');
            $t->integer('prefecture')->comment('都道府県');
            $t->string('city', 50)->comment('市区町村');
            $t->string('location', 255)->comment('届け先詳細');

            $t->integer('span_time')->comment('公開期間');
            $t->boolean('public')->default(true)->comment('公開・非公開');

            $t->integer('total_option_price')->default(0)->comment('追加オプション合計金額');
            $t->string('ordered_token')->nullable()->comment('決済後確認用トークン');

            $t->timestamps();
            $t->softDeletes();
        });

        // リクエストオプション
        Schema::create('request_display_options', function (Blueprint $t) {
            $t->bigIncrements('id');
            $t->bigInteger('user_id')->comment('ユーザーID');
            $t->bigInteger('request_id')->comment('リクエストID');

            $t->integer('display_option_id')->unsigned()->comment('掲載オプション');
            $t->string('option_name')->comment('掲載オプション名');
            $t->integer('option_price')->comment('掲載オプション価格');

            $t->timestamps();
            $t->softDeletes();
        });

        // 受注提示
        Schema::create('presents', function (Blueprint $t) {
            $t->bigIncrements('id');
            $t->bigInteger('user_id')->unsigned()->comment('ユーザーID');
            $t->bigInteger('request_id')->unsigned()->comment('リクエストID');

            $t->string('note', 1000)->comment('提示内容');

            $t->integer('estimate_fee')->comment('提示手数料');
            $t->integer('fee_type')->comment('手数料タイプ(円, %)');

            $t->datetime('estimate_at')->nullable()->comment('予定時刻');

            $t->string('ordered_token')->nullable()->comment('決済後確認用トークン');

            $t->string('status', 10)->comment('ステータス');

            $t->timestamps();
            $t->softDeletes();
        });

        // リクエスト決済
        Schema::create('request_pays', function (Blueprint $t) {
            $t->bigIncrements('id');
            $t->bigInteger('user_id')->unsigned()->comment('ユーザーID');
            $t->bigInteger('request_id')->unsigned()->comment('リクエストID');

            $t->string('token', 255)->comment('トークン');
            $t->integer('amount')->nullable()->unsigned()->comment('金額');
            $t->string('credit_id', 255)->nullable()->comment('与信ID');

            $t->string('status', 10)->comment('ステータス(new, cancel, ng, paid)');
            $t->string('error_message', 255)->comment('エラーメッセージ');

            $t->timestamps();
        });

        // 受注提示決済
        Schema::create('present_pays', function (Blueprint $t) {
            $t->bigIncrements('id');
            $t->bigInteger('user_id')->unsigned()->comment('ユーザーID');
            $t->bigInteger('present_id')->unsigned()->comment('受注提示ID');

            $t->string('token', 255)->comment('トークン');
            $t->integer('amount')->nullable()->unsigned()->comment('金額');
            $t->string('credit_id', 255)->nullable()->comment('与信ID');

            $t->string('status', 10)->comment('ステータス(new, cancel, ng, paid)');
            $t->string('error_message', 255)->comment('エラーメッセージ');

            $t->timestamps();
        });

        // 評価
        Schema::create('reviews', function (Blueprint $t) {
            $t->bigInteger('id');
            $t->bigInteger('reviewee_id')->comment('対象者');
            $t->bigInteger('reviewer_id')->comment('投稿者');

            $t->integer('rate')->comment('評価');
            $t->string('comment', 1000)->comment('詳細');

            $t->timestamps();
            $t->softDeletes();
        });

        // カテゴリ
        Schema::create('categories', function (Blueprint $t) {
            $t->bigIncrements('id');
            $t->bigInteger('parent_id')->unsigned()->nullable()->comment('親カテゴリID');
            $t->string('name')->comment('カテゴリ名称');

            $t->timestamps();
            $t->softDeletes();
        });

        // お知らせ
        Schema::create('notices', function (Blueprint $t) {
            $t->bigIncrements('id');
            $t->string('title')->comment('タイトル');
            $t->text('content')->comment('内容');
            $t->datetime('start_at')->comment('掲載 開始日時');
            $t->datetime('end_at')->comment('掲載 終了日時');

            $t->timestamps();
            $t->softDeletes();
        });

        // リクエスト掲載オプションマスタ
        Schema::create('display_options', function (Blueprint $t) {
            $t->bigIncrements('id');
            $t->string('name')->comment('オプション名');
            $t->integer('price')->comment('金額');

            $t->timestamps();
            $t->softDeletes();
        });

    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        //--------------------------------------------------
        //テーブル削除
        //--------------------------------------------------

        Schema::dropIfExists('admins');
        Schema::dropIfExists('users');
        Schema::dropIfExists('requests');
        Schema::dropIfExists('request_display_options');
        Schema::dropIfExists('presents');
        Schema::dropIfExists('request_pays');
        Schema::dropIfExists('present_pays');
        Schema::dropIfExists('reviews');
        Schema::dropIfExists('categories');
        Schema::dropIfExists('notices');
        Schema::dropIfExists('display_options');
        Schema::dropIfExists('admins');
        Schema::dropIfExists('staffs');
        Schema::dropIfExists('users');
        Schema::dropIfExists('items');
        Schema::dropIfExists('orders');
        Schema::dropIfExists('pays');
        Schema::dropIfExists('categories');
        Schema::dropIfExists('notices');
    }
}
