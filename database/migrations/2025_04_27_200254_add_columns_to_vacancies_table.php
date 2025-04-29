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
        Schema::table('vacancies', function (Blueprint $table) {
            $table->string('title');
            $table->string('company');
            $table->date('deadline');
            $table->text('description');
            $table->string('image');
            $table->tinyInteger('posted')->default(1)->comment('vacancy availability');
            $table->foreignId('salary_id')->constrained('salaries', 'id')->cascadeOnDelete();
            $table->foreignId('category_id')->constrained('categories', 'id')->cascadeOnDelete();
            $table->foreignId('user_id')->constrained('users', 'id')->cascadeOnDelete();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::table('vacancies', function (Blueprint $table) {
            $table->dropForeign(['salary_id']);
            $table->dropForeign(['category_id']);
            $table->dropForeign(['user_id']);

            $table->dropColumn(['title', 'salary_id', 'category_id', 'company', 'deadline', 'description', 'image', 'posted', 'user_id']);
        });
    }
};
