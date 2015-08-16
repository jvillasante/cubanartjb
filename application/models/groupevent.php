<?php

class GroupEvent extends Eloquent {
  public static $table = 'events';
  public static $timestamps = true;

  public function title() {
    $lang = Config::get('application.language', 'en');
    if ($lang == 'en') {
      return $this->name . ' - ' . $this->place . ' - ' . DateFmt::Format('D__, AT[d# of M__ of y##]', strtotime($this->event_date), $lang);
    } else {
      return $this->name . ' - ' . $this->place . ' - ' . DateFmt::Format('D__, AT[d# de M__ de y##]', strtotime($this->event_date), $lang);
    }
  }

  public function getDate() {
    $lang = Config::get('application.language', 'en');
    if ($lang == 'en') {
      return DateFmt::Format('D__, AT[d# of M__ of y##]', strtotime($this->event_date), $lang);
    } else {
      return DateFmt::Format('D__, AT[d# de M__ de y##]', strtotime($this->event_date), $lang);
    }
  }
}
