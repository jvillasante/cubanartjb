<?php

class Create_Paintings {
  public function up() {
    Schema::create('paintings', function($table) {
      $table->increments('id');
      $table->string('name');
      $table->string('dimensions');
      $table->string('type');
      $table->string('painter');
      $table->integer('year');
      $table->text('comment')->nullable();
      $table->text('image_path');
      $table->timestamps();

      $table->index('name');
    });
  }

  public function down() {
    Schema::drop('paintings');
  }
}
