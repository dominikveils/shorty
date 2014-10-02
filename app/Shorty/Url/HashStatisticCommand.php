<?php namespace Shorty\Url;

class HashStatisticCommand {

  /**
   * @var string
   */
  public $hash;

  public function __construct($hash)
  {
    $this->hash = $hash;
  }
}