<?php

namespace Mutane\Contracts;

use Mutane\Dto\UserDto;

interface Database
{
    /**
     * @return UserDto[]
     */
    public function fetchUsers() : array;
}