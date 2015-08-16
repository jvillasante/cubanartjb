<?php

namespace Services;
use Validator, Exception, ValidateException;

abstract class Validation {
  protected $validator;
  protected $data;
  public $rules = array();
  public $messages = array();

  public function __construct($input) {
    $this->input = $input;
  }

  protected function validate() {
    $this->validator = Validator::make($this->input, $this->rules, $this->messages);

    if($this->validator->invalid()) {
      throw new ValidateException($this->validator);
    }
  }

  public function __set($key, $value) {
    $this->data[$key] = $value;
  }

  public function __get($key) {
    if(!array_key_exists($key, $this->data)) {
      throw new Exception('Could not get [' . $key . '] from Services\\Validation data array.');
    }

    return $this->data[$key];
  }
}

