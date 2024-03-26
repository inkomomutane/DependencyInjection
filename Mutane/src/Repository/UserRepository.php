<?php

namespace Mutane\Repository;

use Mutane\Contracts\Database;
use Mutane\Dto\UserDto;

readonly class UserRepository
{
    public function __construct(private Database $database){}

    /**
     * @return UserDto[]
     */
    public function getUsers() : array
    {
        $users = $this->database->fetchUsers();
        $transformedUsers = [];
        foreach ($users as $user) {
            $transformedUsers[] = new UserDto(
                $user['id'],
                $user['name'],
                $user['email']
            );
        }
        return $transformedUsers;
    }
}