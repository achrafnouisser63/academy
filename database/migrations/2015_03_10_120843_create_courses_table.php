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
        Schema::create('courses', function (Blueprint $table) {
            $table->id();
            $table->string('title_ar');
            $table->string('title_fr');
            $table->string('heur');
            $table->string('professor_ar');
            $table->string('professor_fr');
            $table->text('description_ar');
            $table->text('description_fr');
            $table->string('image');
            $table->decimal('price', 8, 2);
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
        Schema::disableForeignKeyConstraints();
        Schema::dropIfExists('courses');
        Schema::enableForeignKeyConstraints();
    }
};
