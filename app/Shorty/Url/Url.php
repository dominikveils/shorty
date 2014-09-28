<?php namespace Shorty\Url;

use Shorty\Exceptions\CouldNotGenerateHashException;
use Shorty\Exceptions\HashNotFoundException;
use Request;

class Url extends \Eloquent {

  protected $table = 'urls';
  protected $fillable = ['short', 'url', 'ip'];

  public static function short($url)
  {
    $model = new static;

    if ($model->urlAlreadyExists($url))
    {
      return $model->whereUrl($url)->first()->short;
    }

    return $model->makeShortUrl($url);
  }

  /**
   * Check if url already exists in database
   *
   * @param string url
   *
   * @return bool
   */
  public function urlAlreadyExists($url)
  {
    return $this->whereUrl($url)->count() > 0;
  }

  /**
   * Make short url
   *
   * @param string $url Long Url
   *
   * @return string
   */
  public function makeShortUrl($url)
  {
    $short = $this->makeHash();
    
    $ip = Request::getClientIp();

    $this->create(compact(['short', 'url', 'ip']));

    return $short;
  }

  /**
   * Return long url by hash
   */
  public static function getLongUrlByHash($hash)
  {
    $url = static::whereShort($hash)->first();

    if (is_null($url))
      throw new HashNotFoundException([], trans('url.hash_not_found'));

    return $url->url;
      
  }

  /**
   * Make a hash
   *
   * @return string
   */
  protected function makeHash($length = 5, $tries = 0)
  {
    if ($tries > 10)
      throw new CouldNotGenerateHashException(['url' => trans('url.could_not_generate_hash')]);
      
    $pool = '0123456789abcdefghijklmnopqrstuvwxyzABCDEFGHIJKLMNOPQRSTUVWXYZ';

    $hash =  substr(str_shuffle(str_repeat($pool, 5)), 0, $length);

    if ($this->whereShort($hash)->count() > 0)
      return $this->makeHash($length, ++$tries);

    return $hash;
  }

}