<?php

class Create_Tags {

  public function up() {
    Schema::create('tags', function($table) {
      $table->increments('id');
      $table->string('name');
      $table->integer('count');
    });
  }

  public function down() {
    Schema::drop('tags');
  }
}
