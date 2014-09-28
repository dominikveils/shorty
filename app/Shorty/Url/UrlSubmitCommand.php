<?php namespace Shorty\Url;

class UrlSubmitCommand {

  /**
   * @var string
   */
  public $url;

  /**
   * @var string
   */
  public $recaptcha_response_field;

  public function __construct($url, $recaptcha_response_field)
  {
    $this->url = $url;
    $this->recaptcha_response_field = $recaptcha_response_field;
  }
}