<?php namespace Shorty\Validation;

interface ValidationInterface {

  /**
   * Validate $input
   *
   * @param command $command
   *
   * @return bool
   */
  public function validate($command);

}