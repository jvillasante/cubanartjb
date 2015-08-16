<?php

class HtmlHelpers {
  public static function getPainters() {
    return array('Juan L. Brouwer', 'Oscar J. Jacas');
  }

  public static function name($subname='') {
    $name = __('application.name');
    if (!empty($subname)) {
      $name .= ' - '.__('application.'.strtolower($subname));
    }
    return $name;
  }

  public static function image_path($image, $size) {
    if (!isset($image) || empty($image)) {
      return Url::base() . '/uploads/placeholder/' . $size . '.png';
    } else {
      return $image . '/' . $size . '.png';
    }
  }

  public static function slideshow_image_path($slideshow, $number, $size) {
    $image = null;
    foreach ($slideshow as $slideshow_image) {
      if ($slideshow_image->number == $number) {
        $image = $slideshow_image;
        break;
      }
    }

    if (isset($image)) {
      if (!empty($image->image_path)) {
        return $image->image_path . '/' . $size . '.png' . '?random=' . Str::random(10) . time();
      } else {
        return Url::base() . '/uploads/placeholder/' . $size . '.png' . '?random=' . Str::random(10) . time();
      }
    } else {
      return Url::base() . '/uploads/placeholder/' . $size . '.png' . '?random=' . Str::random(10) . time();
    }
  }

  public static function painting_title($painting) {
    return $painting->name . ' - ' . $painting->type . ' (' . $painting->dimensions . ').' .
      ' ' . $painting->painter . '. (' . $painting->year . ').';
  }

  public static function slideshow_data($slideshow, $field) {
    if (Input::had($field)) {
      return Input::old($field);
    } else {
      return HtmlHelpers::slideshow_image_path($slideshow, $slideshow->number, 'medium');
    }
  }

  public static function user_data($user, $field) {
    $real_field = $field;
    if (stripos($field, '.')) {
      $real_field = array_get(explode('.', $field), 1);
    }

    if (Input::had($real_field)) {
      return Input::old($real_field);
    } else {
      return $user->get($field);
    }
  }

  public static function painting_data($painting, $field) {
    if (!isset($painting)) { return ''; }

    if ($field == 'tags') {
      $tags = $painting->tags()->get();
      $result = array();

      foreach ($tags as $tag) {
        $result[]= $tag->name;
      }

      return json_encode($result);
    }

    if (Input::had($field)) {
      return Input::old($field);
    } else {
      return $painting->$field;
    }
  }

  public static function event_data($event, $field) {
    if (!isset($event)) { return ''; }

    $real_field = $field;
    if (stripos($field, '_') && $field !== 'event_date') {
      $real_field = array_get(explode('_', $field), 1);
    }

    if (Input::had($field)) {
      return Input::old($field);
    } else {
      if ($real_field == 'event_date') {
        $date = $event->$real_field;
        $lang = Config::get('application.language', 'en');
        return DateFmt::Format('d#my', strtotime($date), $lang);
      } else {
        return $event->$real_field;
      }
    }
  }

  public static function show_tags($tags) {
    $html = array();

    foreach ($tags as $tag) {
      $html[]= '<span class="label label-success"><a href="'.URL::to_route('tags.show', array('tag' => $tag->name)).'">' . $tag->name . '</a></span>';
    }

    return implode( "\r\n", $html );
  }

  public static function render_tag_cloud() {
    $tags = Tag::all();
    $maxCount = NULL;
    $minCount = NULL;
    $html = array();

    uksort($tags, function() {
      return rand() > rand();
    });

    foreach($tags as $tag) {
      $maxCount = ($tag->count > $maxCount) ? $tag->count : $maxCount;
      $minCount = ($tag->count < $minCount || $minCount == NULL) ? $tag->count: $minCount;
    }

    foreach($tags as $tag) {
      if($tag->count == $maxCount) $class = 'largeTag';
      else if($tag->count >= ($maxCount/3)) $class = 'mediumTag';
      else $class = 'smallTag';

      $html[]= '<span class="'.$class.'">';
      $html[]= '<a href="'.URL::to_route('tags.show', array('tag' => $tag->name)).'">'.$tag->name.' ('.$tag->count.')'."</a>";
      $html[]= '</span>';
    }

    return implode( "\r\n", $html );
  }

  public static function old_tags() {
    $tags = Input::old('hidden-tags', NULL);
    if ($tags) {
      return json_encode(explode(',', $tags));
    } else {
      return json_encode(array());
    }
  }

  public static function all_tags() {
    $tags = Tag::all();
    $result = array();

    foreach ($tags as $tag) {
      $result[]= $tag->name;
    }

    return json_encode($result);
  }

  public static function render_social() {
    $html = array();
    $facebook_link = filter_var(Config::get('app.facebook_link'), FILTER_VALIDATE_URL, FILTER_FLAG_SCHEME_REQUIRED);
    $twitter_link = filter_var(Config::get('app.twitter_link'), FILTER_VALIDATE_URL, FILTER_FLAG_SCHEME_REQUIRED);

    if ($facebook_link && $twitter_link) {
      $html[]= '<p>' . __('application.social') . '</p>';
      $html[]= '<ul class="footer_social clearfix">';
      $html[]= '  <li><a href="'.$facebook_link.'" class="footer_facebook">Facebook</a></li>';
      $html[]= '  <li><a href="'.$twitter_link.'" class="footer_twitter">Twitter</a></li>';
      $html[]= '</ul>';
    }

    return implode( "\r\n", $html );
  }

  public static function render_links() {
    $html = array();
    $links = Config::get('app.links');

    $html[]= '<ul class="footer-links">';
    foreach($links as $link) {
      foreach($link as $key => $value) {
        $html[]= '<li><a href="'.$key.'" target="_blank">'.$value.'</a></li>';
      }
    }
    $html[]= '</ul>';

    return implode( "\r\n", $html );
  }

  public static function render_mails() {
    $html = array();
    $links = Config::get('app.mails');

    foreach($links as $link) {
      foreach($link as $key => $value) {
        $html[]= HTML::mailto($key, $value);
        $html[]= '<br />';
      }
    }

    array_splice($html, count($html) - 1);
    return implode( "\r\n", $html );
  }
}

