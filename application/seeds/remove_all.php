<?php

Bundle::start('plant');
Bundle::start('resizer');

class Seed_Remove_all extends \S2\Seed {
  public function grow() {
    $paths = array(
      'original' => path('app').'seeds/paintings',
      'slideshow' => path('app').'seeds/slideshow',
      'upload' => path('public') . 'uploads/paintings',
      'slideshow_upload' => path('public') . 'uploads/slideshow'
    );

    if (!is_dir($paths['upload'])) { Laravel\File::rmdir($paths['upload']); }
    Laravel\File::cpdir($paths['original'], $paths['upload']);
    if (!is_dir($paths['slideshow_upload'])) { Laravel\File::rmdir($paths['slideshow_upload']); }
    Laravel\File::cpdir($paths['slideshow'], $paths['slideshow_upload']);

    DB::table('painting_tags')->delete();
    DB::table('tags')->delete();
    DB::table('paintings')->delete();
    DB::table('users_metadata')->delete();
    DB::table('users_suspended')->delete();
    DB::table('users')->delete();
    DB::table('slideshow_images')->delete();
    DB::table('events')->delete();
  }

  public function order() {
    return 1;
  }
}


