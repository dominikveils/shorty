<?php namespace Shorty\Url;

class UrlSubmitCommand {

  /**
   * @var string
   */
  public $url;

  public function __construct($url)
  {
    $this->url = $url;
  }
}