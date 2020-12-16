<?php

use App\Models\User;
use GraphQL\Type\Definition\ObjectType;
use GraphQL\Type\Definition\Type;

$userType = new ObjectType([
  'name' => 'User',
  'description' => 'Este es el tipo de dato Usuario',
  'fields' => function() use (&$addressType) {
    return [
      'id' => Type::int(),
      'first_name' => Type::string(),
      'last_name' => Type::string(),
      'email' => Type::string(),
      'addresses' => [
        'type' => Type::listOf($addressType),
        'resolve' =>function ($root, $args) {
          $userId = $root['id'];
          $user = User::where('id', $userId)->with(['addresses'])->first();
          return $user->addresses->toArray();
        }
      ]
    ];
  }
]);

$addressType = new ObjectType([
  'name' => 'Address',
  'description' => 'Este es el tipo de dato Dirección',
  'fields' => [
    'id' => Type::int(),
    'user_id' => Type::int(),
    'name' => Type::string(),
    'description' => Type::string(),
  ]
]);