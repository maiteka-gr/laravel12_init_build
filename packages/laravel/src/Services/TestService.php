<?php

namespace Laravel\Services;

use Laravel\Repositories\TestRepository;

/**
 * TestService handles business logic for test operations.
 * Extends BaseService to provide test-specific functionality.
 *
 * @author maiteka-gr
 * @date 2024-02-25
 */
class TestService extends BaseService
{
    public function __construct(TestRepository $repository)
    {
        parent::__construct($repository);
    }
}
