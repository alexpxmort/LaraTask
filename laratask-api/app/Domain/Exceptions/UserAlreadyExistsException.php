<?php
namespace App\Domain\Exceptions;

use ErrorException;
use Exception;
use Throwable;

class UserAlreadyExistsException extends  ErrorException{
    public function __construct($message, $code = 0) {
        // some code
            // make sure everything is assigned properly
        parent::__construct($message, $code);
    }
}