<?php

class Metadata extends Eloquent {
  public static $table = 'users_metadata';
  public static $timestamps = true;

  public function user() {
    return $this->belongs_to('User');
  }
}
