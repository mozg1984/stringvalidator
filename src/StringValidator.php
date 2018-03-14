<?php

namespace Khisamutdinov;

use SplStack;
use Khisamutdinov\Exceptions\InvalidArgumentException;

/**
 * String validator
 *
 * Validating the string for matching opening and closing brackets
 */
class StringValidator 
{
    /**
     * String for validation
     * @var string
     */
    private $string;
    
    /**
     * Array of available characters 
     * @var array
     */
    private $availableChars = [",", " ", "\n", "\t", "\r"];
    
    /**
     * The character of the opening bracket
     * @var string
     */
    private $openingChar = '(';
    
    /**
     * The character of the closing bracket
     * @var string
     */
    private $closingChar = ')';

    /**
     * StringValidator constructor
     *
     * @param string $string
     */
    public function __construct(string $string) 
    {
        $this->setString($string);
    }

    /**
     * Returns the result of string validation
     *
     * @return bool
     *
     * @throws InvalidArgumentException
     */
    public function validate(): bool
    {
        if (strlen(trim($this->string)) == 0) {
            throw new InvalidArgumentException(__CLASS__ . ": an empty string is given");
        }

        $stack = new SplStack();
        $availableChars = $this->fullAvailableChars();
        $charsIterator = new CharsIterator($this->string);

        $charsIterator->rewind();
        while ($charsIterator->valid()) {
            $char = $charsIterator->current();

            // Check on available chars
            if (!in_array($char, $availableChars)) {
                throw new InvalidArgumentException(__CLASS__ . " has found unavailable chars in given string");
            }

            if ($char === $this->openingChar) {
                $stack->push($char);
            }
            else if ($char === $this->closingChar) {
                if ($stack->isEmpty()) {
                    return false;
                }

                $stack->pop();
            }

            $charsIterator->next();
        }

        return $stack->isEmpty();
    }

    /**
     * Sets the character of the opening bracket
     *
     * @param string $openingChar
     */
    public function setOpeningChar(string $openingChar) 
    {
        $this->openingChar = $openingChar;
    }

    /**
     * Returns the character of the opening bracket
     *
     * @return string
     */
    public function getOpeningChar(): string 
    {
        return $this->openingChar;
    }

    /**
     * Sets the character of the closing bracket
     *
     * @param string $closingChar
     */
    public function setClosingChar(string $closingChar) 
    {
        $this->closingChar = $closingChar;
    }

    /**
     * Returns the character of the closing bracket
     *
     * @return string
     */
    public function getClosingChar(): string 
    {
        return $this->closingChar;
    }

    /**
     * Returns array of available characters with added characters of the opening and closing brackets
     *
     * @return array
     */
    private function fullAvailableChars() 
    {
        return array_merge(
            [$this->openingChar, $this->closingChar],
            $this->availableChars
        );
    }

    /**
     * Sets array of available characters
     *
     * @param array $availableChars
     */
    public function setAvailableChars(array $availableChars) 
    {
        $this->availableChars = $availableChars;
    }

    /**
     * Returns array of available characters
     *
     * @return array
     */
    public function getAvailableChars() 
    {
        return $this->availableChars;
    }

    /**
     * Sets string for validation
     * 
     * @param string $string
     */
    public function setString(string $string) 
    {
        $this->string = $string;
    }

    /**
     * Returns string given for validation
     *
     * @return string
     */
    public function getString(): string 
    {
        return $this->string;
    }
}