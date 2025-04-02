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
        Schema::table('addresses', function (Blueprint $table) {
            //
            $table->enum('civility', ['Mme', 'M.'])->nullable()->change();  // Rendre nullable
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::table('addresses', function (Blueprint $table) {
            //
            $table->enum('civility', ['Mme', 'M.'])->nullable(false)->change();  // Revenir à la version non nullable si besoin

        });
    }
};
