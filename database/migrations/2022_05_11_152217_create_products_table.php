<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('products', function (Blueprint $table) {
            $table->id(); // unsignedBigInteger (unsignedはマイナスがない)
            $table->string('name');
            // リレーションに絡む
            // モデル名_idと書けば、
            // 自動的に そのモデルのidと紐づく
            $table->unsignedBigInteger('user_id'); // FK
            $table->boolean('is_visible');
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
        Schema::dropIfExists('products');
    }
};
