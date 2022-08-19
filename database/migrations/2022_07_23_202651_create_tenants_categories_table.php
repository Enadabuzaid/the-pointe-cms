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
        Schema::create('tenants_categories', function (Blueprint $table) {
            $table->bigIncrements('tenant_category_id');
            $table->integer('parent_id');
            $table->string('tenants_category_name_en');
            $table->string('tenants_category_name_ar');
            $table->text('tenants_category_desc_en');
            $table->text('tenants_category_desc_ar');
            $table->integer('tenants_category_status')->default(1);
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
        Schema::dropIfExists('tenants_categories');
    }
};
