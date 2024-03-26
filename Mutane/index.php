<?php

use Mutane\DIContainer\Container;
use Mutane\Contracts\Database;
use Mutane\Repository\UserRepository;

require 'vendor/autoload.php';
$container = Container::getInstance();
$container->registerInstance(Database::class, fn() => new \Mutane\Database\JsonDatabase);

try {
    $repository  = $container->get(UserRepository::class);
    var_dump($repository->getUsers());
} catch (ReflectionException $e) {
}
