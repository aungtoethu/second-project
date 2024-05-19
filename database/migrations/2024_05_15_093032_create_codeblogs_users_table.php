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
        Schema::create('codeblogs_users', function (Blueprint $table) {
            $table->primary(['user_id','codeblog_id']);
            $table->foreignId('user_id')->constrained()->cascadeOnDelete();
            $table->foreignId('codeblog_id')->constrained()->cascadeOnDelete();
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('codeblogs_users');
    }
};
