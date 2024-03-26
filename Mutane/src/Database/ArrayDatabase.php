<?php

namespace Mutane\Database;

use Mutane\Contracts\Database;

class ArrayDatabase implements Database
{

    /**
     * @inheritDoc
     */
    public function fetchUsers(): array
    {
       return [
           ['id' => 1, 'name' => 'John Doe', 'email' => 'johndoe@array.mutane.me'],
           ['id' => 2, 'name' => 'Jane Doe', 'email' => 'janedoe@array.mutane.me']
       ];
    }
}