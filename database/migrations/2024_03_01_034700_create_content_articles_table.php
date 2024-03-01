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
        Schema::create('content_articles', function (Blueprint $table) {
            $table->ulid('id')->primary();

            $table->longText('long_text');

            $table->foreignUlid('article_id')
                ->references('id')
                ->on('articles')
                ->cascadeOnDelete();

            $table->timestamps();
        });
    }

    /**
     * @return void
     */
    public function down(): void
    {
        Schema::dropIfExists('content_articles');
    }
};
