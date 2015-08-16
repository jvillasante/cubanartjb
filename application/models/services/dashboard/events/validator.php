<?php

namespace Services\Dashboard\Events;
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
      'event_name' => 'required',
      'event_place' => 'required',
      'event_date' => 'required',
      'event_description' => 'required',
		);

		$this->validate();
	}
}


