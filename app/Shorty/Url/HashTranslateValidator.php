<?php namespace Shorty\Url;

use Shorty\Validation\Validator;

class HashTranslateValidator extends Validator {

  protected static $rules = [
    'hash' => 'required|exists:urls,short',
  ];

}