<?php

namespace Laravel\Repositories;

use Laravel\Models\Users;

/**
 * UserRepository handles database operations for Users model.
 * Extends BaseRepository to provide user-specific data access methods.
 *
 * @author maiteka-gr
 * @date 2024-02-25
 */
class UserRepository extends BaseRepository
{
    /**
     * Get the Users model instance.
     *
     * @return Users
     */
    function getModel()
    {
        return new Users();
    }

    /**
     * Get user by email address.
     *
     * @param string $email
     * @return \Laravel\Models\Users|null
     */
    function getUserByEmail($email)
    {
        $user = $this->findByField('email', $email);
    }
}
