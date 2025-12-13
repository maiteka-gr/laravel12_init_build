<?php

namespace Laravel\Repositories;

use Laravel\Models\Test;

/**
 * TestRepository handles database operations for Test model.
 * Extends BaseRepository to provide test-specific data access.
 *
 * @author maiteka-gr
 * @date 2024-02-25
 */
class TestRepository extends BaseRepository
{
    /**
     * Get the Test model instance.
     *
     * @return Test
     */
    function getModel()
    {
        return new Test();
    }
}
