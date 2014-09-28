<?php namespace Shorty\Url;

class HashTranslateCommand {

  /**
   * @var string
   */
  public $hash;

  public function __construct($hash)
  {
    $this->hash = $hash;
  }
}