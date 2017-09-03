<?php

namespace MX\Exception;

class ParseException extends \Exception
{
    /**
     * Context of exception (ex: line)
     *
     * @var string
     */
    protected $context = null;

    /**
     * Parse Exception
     *
     * @param  string  $message
     * @param  int     $line
     */
    public function __construct($line, $message, $context = null, \Exception $previous = null)
    {
        parent::__construct("Parse error at line $line with message \"$message\".", 0, $previous);

        $this->context = $context;
    }

    /**
     * Get the current context of the exception
     *
     * @return string $context
     */
    public function getContext()
    {
        return $this->context;
    }
}
