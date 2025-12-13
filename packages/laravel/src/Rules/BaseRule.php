<?php

namespace Laravel\Rules;

use Illuminate\Contracts\Validation\Rule;

/**
 * BaseRule provides common validation rule functionality.
 * Abstract base class for all custom validation rules.
 *
 * @author maiteka-gr
 * @date 2024-02-25
 */
abstract class BaseRule implements Rule
{
    protected $message;

    /**
     * Create a new rule instance.
     *
     * @param string|null $message Custom validation message
     */
    public function __construct($message = null)
    {
        $this->message = $message;
    }

    /**
     * Get the validation error message.
     *
     * @return string
     */
    public function message()
    {
        return $this->message ?? $this->getDefaultMessage();
    }

    /**
     * Get the default validation error message.
     *
     * @return string
     */
    abstract protected function getDefaultMessage();
}
