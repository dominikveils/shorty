<?php

use Shorty\Url\UrlSubmitCommand;
use Shorty\Url\HashTranslateCommand;

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


		return Response::json(['success' => true, 'data' => ['url' => $url]]);
	}

	/**
	 * Redirect to target url by hash
	 * 
	 * GET /{hash}
	 */
	public function hash($hash)
	{
		$url = $this->execute(HashTranslateCommand::class, ['hash' => $hash]);
		
		return Redirect::to($url);
	}

}
