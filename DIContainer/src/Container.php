<?php

namespace Mutane\DIContainer;

use Closure;
use ReflectionClass;
use ReflectionException;

class Container
{
    private array $registry = [];

    public static  function getInstance() : Container
    {
        static $instance = null;
        if(is_null($instance)){$instance = new self();}
        return $instance;
    }

    public function registerInstance($className, Closure $value) : array{
        $this->registry[$className] = $value;
        return $this->registry;
    }

    /**
     * @throws ReflectionException
     */
    public function get(string $className){

        if(isset($this->registry[$className])){

            return $this->registry[$className]();

        }

        $reflection = new ReflectionClass($className);

        $constructor = $reflection->getConstructor();

        if(is_null($constructor)){
            return new $className;
        }

        $deps = [];
        foreach ($constructor->getParameters() as $parameter) {
            $parameterType = $parameter->getType();
            $deps[] = $this->get($parameterType);
          }
        return $reflection->newInstanceArgs($deps);
    }
}