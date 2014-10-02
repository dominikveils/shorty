<?php namespace Shorty\Statistic;

use Shorty\Exceptions\CouldNotGenerateHashException;
use Shorty\Exceptions\HashNotFoundException;
use Request;

class Statistic extends \Eloquent {

  protected $table = 'statistic';
  protected $fillable = ['url_id', 'ip', 'referer', 'country'];

  /**
   * urls table relation
   */
  public function url()
  {
    return $this->belongsTo('Shorty\Url\Url', 'url_id');
  }

}