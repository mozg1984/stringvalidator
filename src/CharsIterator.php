<?php

namespace Khisamutdinov;

/**
 * Utility class for iteration by chars of string
 */
class CharsIterator implements \Iterator 
{
    /**
     * Current position
     * @var int
     */
    private $index = 0;
    
    /**
     * Given string for iteration
     * @var string
     */
    private $string;

    /**
     * CharsIterator constructor
     *
     * @param string $string
     */
    public function __construct(string $string) 
    {
        $this->string = $string;
    }

    /**
     * Reset current position
     */
    public function rewind() 
    {
        $this->index = 0;
    }

    /**
     * Returns character of string by current position
     *
     * @return string
     */
    public function current(): string 
    {
        return $this->string[$this->index];
    }

    /**
     * Returns current position
     *
     * @return int
     */
    public function key(): int 
    {
        return $this->index;
    }

    /**
     * Iteration of current position
     */
    public function next() 
    {
        ++$this->index;
    }

    /**
     * Returns validation of the current position 
     *
     * @return bool
     */
    public function valid(): bool 
    {
        return isset($this->string[$this->index]);
    }
}