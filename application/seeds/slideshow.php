<?php

Bundle::start('plant');

class Seed_Slideshow extends \S2\Seed {
  private $images;

  public function __construct() {
    $this->images = array(
      array(
        'image_path' => URL::base().'/uploads/slideshow/1edf82c214f4fcbc5dfd45206976994b87a786d8',
        'number' => 1
      ),
      array(
        'image_path' => URL::base().'/uploads/slideshow/9b65b0f4a408b141df8deaafbc52a54a9b137167',
        'number' => 2
      ),
      array(
        'image_path' => URL::base().'/uploads/slideshow/22ec9517ee8413435c94bbc0c678598705d67b5f',
        'number' => 3
      ),
      array(
        'image_path' => URL::base().'/uploads/slideshow/bb58618fa31f7b74e74a16833873d937f79f0ee7',
        'number' => 4
      ),
      array(
        'image_path' => URL::base().'/uploads/slideshow/ff7e5bb3b65ed9d886318cf26497b921ae81793f',
        'number' => 5
      ),
    );
  }

  public function grow() {
    foreach ($this->images as $image) {
      DB::table('slideshow_images')->insert($image);
    }
  }

  public function order() {
    return 4;
  }
}
