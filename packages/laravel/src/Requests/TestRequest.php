<?php

namespace Laravel\Requests;

use Laravel\Rules\CustomNameRule;

/**
 * TestRequest handles validation for test-related API requests.
 * Validates test creation and update operations.
 *
 * @author maiteka-gr
 * @date 2024-02-25
 */
class TestRequest extends BaseRequest
{
    /**
     * Get the validation rules that apply to the request.
     *
     * @return array
     */
    public function rules()
    {
        return [
            'name' => ['required', 'string', 'max:255', new CustomNameRule()],
            'description' => 'nullable|string'
        ];
    }
}
