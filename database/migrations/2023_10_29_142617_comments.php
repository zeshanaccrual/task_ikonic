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
        Schema::create('comments', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('user_id'); // This is the foreign key column.
            $table->foreign('user_id')->references('id')->on('users')->onDelete('cascade'); // You can specify the desired behavior on delete
            $table->unsignedBigInteger('feedback_id'); // This is the foreign key column.
            $table->foreign('feedback_id')->references('id')->on('feedback')->onDelete('cascade');
            $table->string('content')->nullable();
            $table->boolean('status')->default(true);
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('comments');
    }
};
