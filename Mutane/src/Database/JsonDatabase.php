<?php

namespace Mutane\Database;
use Exception;
use Mutane\Contracts\Database;

class JsonDatabase implements Database
{
    public function fetchUsers(): array
    {
        $data =  file_get_contents(__DIR__ .'/users.json');
        try {
         return    json_decode($data, true, 512, JSON_THROW_ON_ERROR);
        }catch (Exception $e){
            var_dump($e->getMessage());
            die;
        }
    }
}