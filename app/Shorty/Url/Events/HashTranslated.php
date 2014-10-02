<?php namespace Shorty\Url\Events;

use Shorty\Url\Url;

class HashTranslated {

  /**
   * @var Shorty\Url\Url
   */
  public $url;

  public function __construct(Url $url)
  {
    $this->url = $url;
  }

}