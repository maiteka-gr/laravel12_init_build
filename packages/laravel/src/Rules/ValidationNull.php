<?php

namespace Laravel\Rules;

/**
 * ValidationNull validates that a field is not null.
 * Custom validation rule for null value checking.
 *
 * @author maiteka-gr
 * @date 2024-02-25
 */
class ValidationNull extends BaseRule {
    /**
     * Determine if the validation rule passes.
     *
     * @param string $attribute
     * @param mixed $value
     * @return bool
     */
    public function passes( $attribute, $value ) {
        return ! is_null( $value );
    }

    /**
     * Get the default validation error message.
     *
     * @return string
     */
    protected function getDefaultMessage() {
        return 'This field may not be null.';
    }
}
