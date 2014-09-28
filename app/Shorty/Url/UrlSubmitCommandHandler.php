<?php namespace Shorty\Url;

use Laracasts\Commander\CommandHandler;

class UrlSubmitCommandHandler implements CommandHandler {

    /**
     * Handle the command.
     *
     * @param object $command
     * @return void
     */
    public function handle($command)
    {
      $short = Url::short($command->url);

      return $short;
    }

}