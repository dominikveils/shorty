<?php namespace Shorty\Url;

use Shorty\Validation\Validator;

class HashStatisticValidator extends Validator {

  protected static $rules = [
    'hash' => 'required|exists:urls,short',
  ];

}