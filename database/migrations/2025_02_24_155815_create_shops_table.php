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
        Schema::create('shops', function (Blueprint $table) {
            $table->id();
            $table->string('name')->nullable();
            $table->string('address')->nullable();
            $table->string('holder')->nullable();
            $table->string('email')->nullable();
            $table->string('bic')->nullable();
            $table->string('iban')->nullable();
            $table->string('bank')->nullable();
            $table->string('bank_address')->nullable();
            $table->string('phone', 25)->nullable();
            $table->string('facebook')->nullable();
            $table->text('home')->nullable();
            $table->text('home_infos')->nullable();
            $table->text('home_shipping')->nullable();
            $table->boolean('invoice')->default(true);
            $table->boolean('card')->default(true);
            $table->boolean('transfer')->default(true);
            $table->boolean('check')->default(true);
            $table->boolean('mandat')->default(true);
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('shops');
    }
};
