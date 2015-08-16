<?php

namespace Services\Home\Contact;
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
      'first_name' => 'required',
      'last_name' => 'required',
      'email' => 'required|email',
      'subject' => 'required',
      'message' => 'required',
		);

		$this->validate();
	}
}

