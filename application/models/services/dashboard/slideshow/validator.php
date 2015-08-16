<?php

namespace Services\Dashboard\Slideshow;
use Services\Validation as Validation_Service;

class Validator extends Validation_Service {
  private $image;

  public function __construct($input, $num) {
    $this->image = 'image'.$num;
    parent::__construct($input);
  }

	public function publish() {
		$this->rules = array();

    if (!empty($this->input[$this->image])) {
      if ($this->input[$this->image]['error'] == UPLOAD_ERR_OK) {
        $rules = array($this->image => 'required|mimes:jpg,gif,png|image|max:1000');
        $this->rules = array_merge($this->rules, $rules);
      } elseif ($this->input[$this->image]['error'] == UPLOAD_ERR_INI_SIZE) {
        $rules = array($this->image => 'upload_err_ini_size');
        $this->rules = array_merge($this->rules, $rules);
      } elseif ($this->input[$this->image]['error'] == UPLOAD_ERR_PARTIAL) {
        $rules = array($this->image => 'upload_err_partial');
        $this->rules = array_merge($this->rules, $rules);
      } elseif (($this->input[$this->image]['error'] == UPLOAD_ERR_NO_FILE)) {
        $rules = array($this->image => 'required');
        $this->rules = array_merge($this->rules, $rules);
      }
    } else {
      $rules = array($this->image => 'required');
      $this->rules = array_merge($this->rules, $rules);
    }

		$this->validate();
	}
}


