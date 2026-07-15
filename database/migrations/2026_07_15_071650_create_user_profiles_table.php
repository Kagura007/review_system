<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     */
    public function up(): void
    {
        Schema::create('user_profiles', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('user_id');  // カラムの型を指定： BigInteger 大きな整数
            $table->string('file_name')->nullable();  // nullable()： このカラムはNULL（値なし）を許可します
            $table->string('nick_name')->nullable();
            $table->text('description')->nullable();
            $table->timestamps();

            // 外部キー制約  onDelete('cascade')：「親のデータが削除されたら、子のデータも一緒に削除する」
            $table->foreign('user_id')->references('id')->on('users')->onDelete('cascade');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('user_profiles');
    }
};
