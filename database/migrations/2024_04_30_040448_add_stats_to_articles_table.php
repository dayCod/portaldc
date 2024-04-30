<?php

declare(strict_types=1);

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * @return void
     */
    public function up(): void
    {
        Schema::table('articles', function (Blueprint $table) {
            $table->unsignedBigInteger('views_counter')->default(0);
            $table->unsignedBigInteger('likes_counter')->default(0);
            $table->unsignedBigInteger('comments_counter')->default(0);
        });
    }

    /**
     * @return void
     */
    public function down(): void
    {
        Schema::table('articles', function (Blueprint $table) {
            $table->dropColumn('views_counter');
            $table->dropColumn('likes_counter');
            $table->dropColumn('comments_counter');
        });
    }
};
