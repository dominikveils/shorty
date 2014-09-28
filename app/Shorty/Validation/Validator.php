<?php namespace Shorty\Validation;

use Validator as V;
use Shorty\Exceptions\ValidationFailsException;
use ReflectionClass;

abstract class Validator implements ValidationInterface {


  /**
   * @var array
   */
  protected static $rules = [];


  /**
   * Validate $input
   *
   * @param array $input
   * @param array $messages
   *
   * @return bool
   */
  public function validate($command)
  {
    $properties = (new ReflectionClass($command))->getProperties();

    $input = [];
    foreach ($properties as $prop)
    {
      $propName = $prop->getName();

      $input[$propName] = $command->$propName;
    }

    $validation = V::make($input, static::$rules);

    if ($validation->fails()) throw new ValidationFailsException($validation->messages()->toArray());
    return true;
  }

}