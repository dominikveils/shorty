<?php namespace Shorty\Url;

use Shorty\Validation\Validator;

class UrlSubmitValidator extends Validator {

  protected static $rules = [
    'url' => 'required|url'
  ];

}