<?php namespace Shorty\Exceptions;

abstract class ShortyException extends \Exception {

  protected $errors = [];

  public function __construct($errors = array(), $message = '', $code = 0, Exception $previous = null)
  {
    foreach ($errors as $k => $e)
    {
      if (is_array($e))
        $this->errors[$k] = $e[0];
      else
        $this->errors[$k] = $e;
    }

    if (empty($message))
    {
      $message = array_shift($errors)[0];
    }

    parent::__construct($message, $code, $previous);
  }

  /**
   * Return errors if any
   *
   * @return array
   */
  public function getErrors()
  {
    return $this->errors;
  }

}