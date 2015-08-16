<?php

class User extends Eloquent {
  public static $table = 'users';
  public static $timestamps = true;

  public function metadata() {
    return $this->has_one('Metadata');
  }

  public function full_name() {
    $last_name = $this->metadata->last_name;
    $first_name = $this->metadata->first_name;

    return "$last_name, $first_name";
  }
}
