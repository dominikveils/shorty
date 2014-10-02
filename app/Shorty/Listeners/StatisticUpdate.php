<?php namespace Shorty\Listeners;

use Laracasts\Commander\Events\EventListener;
use Shorty\Url\Events\HashTranslated;
use Torann\GeoIP\GeoIP;
use URL, Log;
use GeoIp2\Exception\AddressNotFoundException;

class StatisticUpdate extends EventListener {

  /**
   * @var Torann\GeoIP\GeoIP
   */
  protected $geoip;

  public function __construct(GeoIP $geoip)
  {
    $this->geoip = $geoip;
  }

  public function whenHashTranslated(HashTranslated $event)
  {
    $location = [];
    
    try
    {
      $location = $this->geoip->getLocation('232.223.11.11');
    }

    catch(AddressNotFoundException $e)
    {
      Log::error($e);
    }

    $referer = URL::previous();
    if (empty($location))
    {
      $input = [
        'ip' => null,
        'country' => 'Unknown',
        'referer' => $referer
      ];
    }
    else
    {
      $input = [
        'ip' => ip2long($location['ip']),
        'country' => $location['isoCode'],
        'referer' => $referer
      ];
    }

    $event->url->statistic()->create($input);
  }

}