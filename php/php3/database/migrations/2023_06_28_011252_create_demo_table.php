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
        Schema::create('demo', function (Blueprint $table) {
            $table->id();
            $table->string('name');
            $table->string('email')->unique();//không trùng trỏ đến unique
            $table->char('address')->nullable();//cho phép có hoặc không có dũ liệu
            $table->integer('status')->default(1);//mặc định là 1
            $table->date('date_of_birth')->nullable();
            $table->string('image')->nullable();
            $table->timestamps();
            $table->softDeletes();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('demo');
    }
};
