<?php

class Tag extends Eloquent {
  public static $table = 'tags';
  public static $timestamps = false;

  public function paintings() {
    return $this->has_many_and_belongs_to('Painting', 'painting_tags');
  }

}
