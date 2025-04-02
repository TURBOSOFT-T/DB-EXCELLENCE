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
        Schema::create('pages', function (Blueprint $table) {
            $table->id();
			$table->string('slug');
			$table->string('title');
			$table->mediumText('body')->nullable();
			$table->boolean('active')->default(false);
			$table->string('seo_title')->nullable();
			$table->text('meta_description')->nullable();
			$table->text('meta_keywords')->nullable();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('pages');
    }
};
