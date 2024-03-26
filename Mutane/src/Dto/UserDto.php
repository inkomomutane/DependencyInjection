<?php

namespace Mutane\Dto;

readonly class UserDto
{
    public function __construct(
        public int    $id,
        public string $name,
        public string $email,
    ){}
}