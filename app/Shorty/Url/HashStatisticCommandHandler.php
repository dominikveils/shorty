<?php namespace Shorty\Url;

use Laracasts\Commander\CommandHandler;

class HashStatisticCommandHandler implements CommandHandler {

    /**
     * Handle the command.
     *
     * @param object $command
     * @return void
     */
    public function handle($command)
    {
      $url = Url::getUrlByHash($command->hash);

      return $url;
    }

}