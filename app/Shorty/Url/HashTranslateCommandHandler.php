<?php namespace Shorty\Url;

use Laracasts\Commander\CommandHandler;

class HashTranslateCommandHandler implements CommandHandler {

    /**
     * Handle the command.
     *
     * @param object $command
     * @return void
     */
    public function handle($command)
    {
      return Url::getLongUrlByHash($command->hash);
    }

}