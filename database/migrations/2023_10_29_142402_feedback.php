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
        Schema::create('feedback', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('user_id'); // This is the foreign key column.
            $table->foreign('user_id')->references('id')->on('users')->onDelete('cascade'); // You can specify the desired behavior on delete
             $table->unsignedBigInteger('category_id'); // This is the foreign key column.
            $table->foreign('category_id')->references('id')->on('categories')->onDelete('cascade'); // You can specify the desired behavior on delete
            $table->string('title')->nullable();
            $table->text('description')->nullable();
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('feedback');
    }
};
