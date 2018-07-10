<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class Links extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('links', function ($table) {
            $table->increments('id');
            $table->string('link_position');
            $table->boolean('link_is_parent')->default(false);
            $table->integer('link_parent_id')->default(0);
            $table->string('link_name');
            $table->string('link_url');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('links');
    }
}
