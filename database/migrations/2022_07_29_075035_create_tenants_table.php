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
        Schema::create('tenants', function (Blueprint $table) {
            $table->bigIncrements('tenant_id');
            $table->string('tenant_name');
            $table->longText('tenant_description');
            $table->string('tenant_logo');
            $table->string('tenant_banner');
            $table->json('tenant_images');
            $table->integer('tenant_status');
            $table->unsignedBigInteger('seo_id');
            $table->unsignedBigInteger('tenant_category_id');

            $table->foreign('seo_id')->references('seo_id')->on( 'seo_metas')

                ->onDelete('cascade');

            $table->foreign('tenant_category_id')->references('tenant_category_id')->on('tenants_categories')

                ->onDelete('cascade');

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
        Schema::dropIfExists('tenants');
    }
};
