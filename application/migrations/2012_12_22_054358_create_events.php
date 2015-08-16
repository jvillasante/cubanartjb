<?php

class Create_Events {

  public function up() {
    Schema::create('events', function($table) {
      $table->increments('id');
      $table->string('name');
      $table->string('place');
      $table->date('event_date');
      $table->text('description');
      $table->timestamps();
    });
  }

  public function down() {
    Schema::drop('events');
  }
}
