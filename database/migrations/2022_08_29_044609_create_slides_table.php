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
        Schema::create('slides', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('slider_id');
            $table->string('title');
            $table->text('description');
            $table->string('image_dt');
            $table->string('image_mb');
            $table->text('url');
            $table->date('active_date');
            $table->integer('order');
            $table->integer('status')->default(1);  
            $table->timestamps();
            $table->foreign('slider_id')->references('id')->on('sliders')->onDelete('NO ACTION');


 
 

        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('slides');
    }
};
