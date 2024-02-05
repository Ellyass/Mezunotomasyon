<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateSlidersTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('sliders', function (Blueprint $table) {
            $table->id();
            $table->timestamps();
            $table->string('sliders_title');
            $table->string('sliders_slug')->nullable();
            $table->string('sliders_file')->nullable();
            $table->integer('sliders_must');
            $table->text('sliders_content');
            $table->enum('sliders_status',['0','1'])->default('1');
            $table->string('sliders_url')->nullable();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('sliders');
    }
}
