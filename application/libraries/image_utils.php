<?php

Bundle::start('resizer');

class ImageUtils {
  public static function upload($image, $directory, $filename) {
    if (!is_dir($directory)) {
      mkdir($directory, 0777, true);
    }

    $img = Input::file($image);
    $success1 = Resizer::open($img)
      ->resize(850, 500, 'exact')
      ->save($directory . DS . 'medium.png', 100);
    $success2 = Resizer::open($img)
      ->resize(180, 150, 'exact')
      ->save($directory . DS . 'small.png', 100);

    if ($success1 && $success2) {
      return true;
    } else {
      return false;
    }
  }

  public static function upload_slideshow($image, $directory, $filename) {
    if (!is_dir($directory)) {
      mkdir($directory, 0777, true);
    }

    $img = Input::file($image);
    $success1 = Resizer::open($img)
      ->resize(600, 300, 'exact')
      ->save($directory . DS . 'medium.png', 100);
    $success2 = Resizer::open($img)
      ->resize(230, 150, 'exact')
      ->save($directory . DS . 'small.png', 100);

    if ($success1 && $success2) {
      return true;
    } else {
      return false;
    }

  }
}
