<?php namespace Shorty\Url;

use Laracasts\Commander\Events\EventGenerator;
use Shorty\Exceptions\CouldNotGenerateHashException;
use Shorty\Exceptions\HashNotFoundException;
use Request;

class Url extends \Eloquent {

  use EventGenerator;

  protected $table = 'urls';
  protected $fillable = ['short', 'url', 'ip'];
  protected $dates = ['created_at'];

  /**
   * statistic table relation
   */
  public function statistic()
  {
    return $this->hasMany('Shorty\Statistic\Statistic', 'url_id');
  }

  /**
   * Return full statistic for url. Separated by days
   */
  public function getFullStatistic()
  {
    $timestamp = \Carbon\Carbon::now()->subMonth();
    $raw_visitors = $this->statistic()
      ->where('created_at', '>', $timestamp)
      ->groupBy(\DB::raw('DATE(created_at)'))
      ->select(\DB::raw('count(*) as count'), 'created_at')
      ->orderBy('created_at')
      ->get();

    $stats = [];

    foreach ($raw_visitors as $row)
    {
      $stats[$row->created_at->format('Y-m-d')]['visitors'] = $row->count;
    }

    $uniq_visitors = $this->statistic()
      ->where('created_at', '>', $timestamp)
      ->groupBy('ip', \DB::raw('DATE(created_at)'))
      ->select(\DB::raw('count(*) as count'), 'created_at')
      ->orderBy('created_at')
      ->get();

    foreach ($uniq_visitors as $row)
    {
      $stats[$row->created_at->format('Y-m-d')]['uniq'] = $row->count;
    }

    // echo "<pre>";
    // dd($uniq_visitors->toArray());
    // echo "</pre>";
    return $stats;
  }

  /**
   * Make Long url short.
   *
   * @param string $url
   */
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
    
    $ip = ip2long(Request::getClientIp());

    $this->create(compact(['short', 'url', 'ip']));

    return $short;
  }

  /**
   * Return url object by its hash
   *
   * @param string hash
   *
   * @throws Shorty\Exceptions\HashNotFoundException
   * @return model
   */
  public static function getUrlByHash($hash)
  {
    $url = static::whereShort($hash)->first();

    if (is_null($url))
      throw new HashNotFoundException([], trans('url.hash_not_found'));

    return $url;
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