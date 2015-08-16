<?php

namespace Services\Dashboard\Password;
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
      'current_password' => 'required|current_password',
      'new_password' => 'required|confirmed',
		);

		$this->validate();
	}
}


