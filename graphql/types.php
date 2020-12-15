<?php

use GraphQL\Type\Definition\ObjectType;
use GraphQL\Type\Definition\Type;

$userType = new ObjectType([
  'name' => 'User',
  'description' => 'Este es el tipo de dato Usuario',
  'fields' => [
    'id' => Type::int(),
    'first_name' => Type::string(),
    'last_name' => Type::string(),
    'email' => Type::string(),
  ]
]);