<?php

use Shorty\Statistic\Statistic;

class StatisticTableSeeder extends Seeder {

	public function run()
	{
    DB::table('statistic')->truncate();

    for($i = 0; $i < 100; $i++)
    {
      $ip = "111.111.111." . mt_rand(111, 115) ;
      Statistic::create([
        'url_id' => 1,
        'ip' => ip2long($ip),
        'country' => 'US',
        'referer' => 'http://google.com/#' . $i,
        'created_at' => Carbon\Carbon::now()->subDays(mt_rand(1, 10))
      ]);
    }
	}

}