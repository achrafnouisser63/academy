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
        Schema::create('videos', function (Blueprint $table) {
            $table->id();
            $table->string('title_ar');
            $table->string('title_fr');
            $table->foreignId('course_id')->constrained('courses')->onDelete('cascade');
            $table->string('description_ar')->nullable();
            $table->string('description_fr')->nullable();
            $table->string('video_url');
            $table->integer('order');


            $table->string('status')->default('active');
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
        Schema::dropIfExists('videos');
    }
};
