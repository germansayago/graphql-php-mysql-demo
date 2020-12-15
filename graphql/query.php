<?php

use App\Models\User;
use GraphQL\Type\Definition\ObjectType;
use GraphQL\Type\Definition\Type;

$rootQuery = new ObjectType([
  'name' => 'Query',
  'fields' => [
    'user' => [
      'type' => $userType,
      'args' => [
        'id' => Type::int()
      ],
      'resolve' => function($root, $args) {
        $user = User::find($args['id'])->toArray();
        return $user;
      }
    ]
  ]
]);