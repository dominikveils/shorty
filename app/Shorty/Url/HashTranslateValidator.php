<?php namespace Shorty\Url;

use Shorty\Validation\Validator;

class UrlSubmitValidator extends Validator {

  protected static $rules = [
    'hash' => 'required|regex:[a-zA-Z0-9]{5}'
  ];

}