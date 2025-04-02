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
		Schema::create('settings', function (Blueprint $table) {
			$table->id();
			$table->string('key')->nullable();
           
            $table->text('value')->nullable();
            $table->date('date1')->nullable();
            $table->date('date2')->nullable();

            $table->string('logo')->nullable();
            $table->string('logoHeader')->nullable();
            $table->string('telephone')->nullable();
            $table->string('addresse')->nullable();
            $table->string('email')->nullable();
            $table->text('description')->nullable()->default(null);
           

            $table->string('icon')->nullable()->default(null);

        

            $table->string("logocontact")->nullable();
            $table->string("facebook")->nullable();
            $table->string("twitter")->nullable();
            $table->string("instagram")->nullable();
            $table->string("youtube")->nullable();
            $table->string("linkedin")->nullable();
            $table->string("tiktok")->nullable();
            $table->string("fax")->nullable();
            $table->string('imagecontact')->nullable()->default(null);

            $table->text('des_apropos')->nullable();
            $table->string('image_apropos')->nullable();
            $table->text('titre_apropos')->nullable();
            $table->string('photos')->nullable();
		
		});
	}

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('settings');
    }
};
