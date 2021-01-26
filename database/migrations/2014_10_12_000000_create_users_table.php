<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateUsersTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        // https://docs.google.com/spreadsheets/d/1dp37hbUWo7mB9illaiTJP6y9vfjhM_v6hSw4j4cEBC4/edit#gid=1173045198
        // ここのend_usersテーブル、時間があればUserテーブルから名前を変えます
        Schema::create('users', function (Blueprint $table) {
            $table->id();
            // ユーザーネーム
            $table->string('user_name');
            $table->string('user_id')->unique();
            // 氏名
            $table->string('last_name');
            $table->string('first_name');
            $table->string('last_name_kana');
            $table->string('first_name_kana');
            // メール
            $table->string('email')->unique();
            $table->timestamp('email_verified_at')->nullable();
            // パスワード
            $table->string('password');
            $table->rememberToken();
            $table->foreignId('current_team_id')->nullable();
            // プロフィール画像
            $table->text('profile_photo_path')->nullable();
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('users');
    }
}
