<?php

class Painting extends Eloquent {
  public static $table = 'paintings';
  public static $timestamps = true;

  public function tags() {
    return $this->has_many_and_belongs_to('Tag', 'painting_tags');
  }

  public function title() {
    return $this->name . ' - ' . $this->type . ' (' . $this->dimensions . ').' .
      ' ' . $this->painter . '. (' . $this->year . ').';
  }

  public function tag($the_tags) {
    $ids = array();

    foreach ($the_tags as &$tag_str) {
      $tag_str = Str::slug(trim($tag_str));
      $tag = Tag::where('name', '=', $tag_str)->first();

      if ($tag) {
        $tag->count = $tag->count + 1;
        $tag->save();
        $ids[] = $tag->id;
      } else {
        $tag = Tag::create(array('name' => $tag_str, 'count' => 1));
        $ids[]= $tag->id;
      }
    }

    $this->tags()->sync($ids);
  }

  public function delete_painting() {
    $name = $this->name;
    $tags = $this->tags;

    if ($tags) {
      foreach ($tags as $tag) {
        $tag->count = $tag->count - 1;
        if ($tag->count <= 0) {
          $tag->delete();
        } else {
          $tag->save();
        }
      }
    }

    if ($this->delete()) {
      $directory = path('public').'uploads/paintings/'.sha1($name);
      File::rmdir($directory);
      return true;
    } else {
      return false;
    }
  }
}
