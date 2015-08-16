<?php

class Create_Painting_Tags {
  public function up() {
    Schema::create('painting_tags', function($table) {
      $table->increments('id');
      $table->integer('painting_id')->unsigned();
      $table->integer('tag_id')->unsigned();
      $table->timestamps();

      $table->foreign('painting_id')->references('id')->on('paintings')->on_delete('cascade');
      $table->foreign('tag_id')->references('id')->on('tags')->on_delete('cascade');
    });
  }

  public function down() {
    Schema::drop('painting_tags');
  }
}
