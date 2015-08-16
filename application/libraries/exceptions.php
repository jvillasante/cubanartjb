<?php

class ValidateException extends Exception {
  private $errors;

  public function __construct($container) {
    $this->errors = ($container instanceof Validator) ? $container->errors : $container;
    parent::__construct(null);
  }

  public function get() {
    return $this->errors;
  }
}

