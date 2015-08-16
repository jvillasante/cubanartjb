<?php

class Language_Controller extends Base_Controller {
  public $restful = true;

  private $langs;
  private $default;
  function __construct(){
    $this->langs = array('en' => 'en', 'sp' => 'sp');
    $this->default = 'en';
    parent::__construct();
  }

  private function checkLang($lang = null){
    if(isset($lang)){
      foreach($this->langs as $k => $v){
        if(strcmp($lang, $k) == 0) {
          return true;
        }
      }
    }
    return false;
  }

  public function get_set($lang = null) {
    if(isset($lang) && $this->checkLang($lang)){
      Config::set('application.language', $lang);
    } else {
      Config::set('application.language', $this->default);
    }

    $url = Input::query('redirect_to', '/');
    return Redirect::to($url);
  }
}

