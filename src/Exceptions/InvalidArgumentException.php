<?php

namespace Khisamutdinov\Exceptions;

class InvalidArgumentException extends \Exception 
{
	/**
     * {@inheritdoc}
     */
    public function __toString() 
    {
        return __CLASS__ . ": {$this->message}\n";
    }
}