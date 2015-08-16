<?php

class Create_Slideshow_Images {

  public function up() {
    Schema::create('slideshow_images', function($table) {
      $table->increments('id');
      $table->integer('number');
      $table->text('image_path');
    });

  }

  public function down() {
    Schema::drop('slideshow_images');
  }
}
