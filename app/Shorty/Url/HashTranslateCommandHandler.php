<?php namespace Shorty\Url;

use Laracasts\Commander\CommandHandler;
use Shorty\Url\Events\HashTranslated;
use Laracasts\Commander\Events\DispatchableTrait;

class HashTranslateCommandHandler implements CommandHandler {

    use DispatchableTrait;

    /**
     * Handle the command.
     *
     * @param object $command
     * @return void
     */
    public function handle($command)
    {
        $url = Url::getUrlByHash($command->hash);
        $url->raise(new HashTranslated($url));

        $this->dispatchEventsFor($url);
        return $url;
    }

}