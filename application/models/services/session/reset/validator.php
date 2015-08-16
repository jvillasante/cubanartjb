<?php

namespace Services\Session\Reset;
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
      'password' => 'required|confirmed',
      'password_confirmation' => 'required'
		);

		$this->validate();
	}
}

