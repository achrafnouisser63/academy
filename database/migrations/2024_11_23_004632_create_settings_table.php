<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('settings', function (Blueprint $table) {
            $table->id();
            $table->string('site_name_ar');
            $table->string('site_name_fr');
            $table->string('site_description_ar');
            $table->string('site_description_fr');
            $table->string('site_email');
            $table->string('site_phone');
            $table->string('site_phone2');
            $table->string('site_whatsapp');
            $table->string('site_address_ar');
            $table->string('site_address_fr');
            $table->string('site_logo');
            $table->string('localisation')->nullable();
            $table->string('facebook')->nullable();
            $table->string('instagram')->nullable();
            $table->string('twitter')->nullable();
            $table->string('linkedin')->nullable();
            $table->string('youtube')->nullable();
            $table->string('tiktok')->nullable();
            $table->string('telegram')->nullable();


            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('settings');
    }
};
