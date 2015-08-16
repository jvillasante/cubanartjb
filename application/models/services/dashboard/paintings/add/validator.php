<?php

namespace Services\Dashboard\Paintings\Add;
use Services\Validation as Validation_Service;

class Validator extends Validation_Service {
  private $type;

  public function __construct($input, $type = 'edit') {
    $this->type = $type;
    if (empty($input['comment'])) { unset($input['comment']); }

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
      'name' => 'required',
      'dimensions' => 'required',
      'type' => 'required',
      'painter' => 'required|in:Juan L. Brouwer,Oscar J. Jacas',
      'year' => 'required|integer',
		);

    if (array_key_exists('comment', $this->input)) {
      $rules = array('comment' => 'required');
      $this->rules = array_merge($this->rules, $rules);
    }

    if (!empty($this->input['painting_image'])) {
      if ($this->input['painting_image']['error'] == UPLOAD_ERR_OK) {
        $rules = array('painting_image' => 'required|mimes:jpg,gif,png|image|max:1000');
        $this->rules = array_merge($this->rules, $rules);
      } elseif ($this->input['painting_image']['error'] == UPLOAD_ERR_INI_SIZE) {
        $rules = array('painting_image' => 'upload_err_ini_size');
        $this->rules = array_merge($this->rules, $rules);
      } elseif ($this->input['painting_image']['error'] == UPLOAD_ERR_PARTIAL) {
        $rules = array('painting_image' => 'upload_err_partial');
        $this->rules = array_merge($this->rules, $rules);
      } elseif (($this->input['painting_image']['error'] == UPLOAD_ERR_NO_FILE) && ($this->type != 'edit')) {
        $rules = array('painting_image' => 'required');
        $this->rules = array_merge($this->rules, $rules);
      }
    } else {
      $rules = array('painting_image' => 'required');
      $this->rules = array_merge($this->rules, $rules);
    }

		$this->validate();
	}
}


