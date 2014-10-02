<?php

use Shorty\Url\UrlSubmitCommand;
use Shorty\Url\HashTranslateCommand;
use Shorty\Url\HashStatisticCommand;

class HomeController extends BaseController {

	/**
	 * Home route
	 * GET /
	 */
	public function index()
	{
		return View::make('home.index');
	}

	/**
	 * Save shorten url
	 * POST /
	 */
	public function store()
	{
		$hash = $this->execute(UrlSubmitCommand::class);
		$url = route('home.hash', ['hash' => $hash]);
		$statistic = route('home.statistic', ['hash' => $hash]);

		return Response::json([
			'success' => true,
			'data' => compact(['url', 'statistic'])
		]);
	}

	/**
	 * Redirect to target url by hash
	 * 
	 * GET /s/{hash}
	 */
	public function hash($hash)
	{
		$url = $this->execute(HashTranslateCommand::class, ['hash' => $hash]);
		
		return Redirect::to($url->url);
	}

	/**
	 * Return visitors statistic for $hash
	 *
	 * GET /st/{hash}
	 */
	public function statistic($hash)
	{
		$url = $this->execute(HashStatisticCommand::class, ['hash' => $hash]);

		return View::make('home.statistic', compact(['url']));
	}

}
