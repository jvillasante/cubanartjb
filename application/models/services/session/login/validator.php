<?php

namespace Services\Session\Login;
use Services\Validation as Validation_Service;

class Validator extends Validation_Service {
  public function __construct($input) {
    parent::__construct($input);
  }

	/**
	 * publish
	 *
	 * @throws ValidateException
	 * @return void
	 */
	public function publish() {
		$this->rules = array(
      'email' => 'required|email',
      'password' => 'required'
		);

		$this->validate();
	}
}

