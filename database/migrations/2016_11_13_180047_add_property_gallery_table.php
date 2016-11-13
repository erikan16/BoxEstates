<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class AddPropertyGalleryTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('propertyGallery', function (Blueprint $table) {
            $table->increments('id');
            $table->integer('gallery_id');
            $table->string('file_name');
            $table->string('file_size', 10);
            $table->string('file_mime', 50);
            $table->string('file_path');
            $table->integer('property_id');
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
        //
    }
}
