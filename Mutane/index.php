<?php

use Mutane\Contracts\Database;
use Mutane\Database\ArrayDatabase;
use Mutane\DIContainer\Container;
use Mutane\Repository\UserRepository;

require 'vendor/autoload.php';

$container = Container::getInstance();

$container->registerInstance(
   className : Database::class,
   value     : fn() => new ArrayDatabase
);


try {
    $repository = $container->get(
        className: UserRepository::class
    );

    var_dump($repository->getUsers());

} catch (ReflectionException $e) {}

