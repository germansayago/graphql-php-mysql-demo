<?php

use App\Models\Address;
use GraphQL\Type\Definition\Type;

$addressMutation = [
  'addAddress' => [
    'type' => $addressType,
    'args' => [
      'user_id' => Type::nonNull(Type::int()),
      'name' => Type::nonNull(Type::string()),
      'description' => Type::nonNull(Type::string()),
    ],
    'resolve' => function($root, $args) {
      $address = new Address([
        'user_id' => $args['user_id'],
        'name' => $args['name'],
        'description' => $args['description']
      ]);
      $address->save();
      return $address->toArray();
    }
  ],
  'modifyAddress' => [
    'type' => $addressType,
    'args' => [
      'id' => Type::nonNull(Type::int()),
      'user_id' => Type::int(),
      'name' => Type::string(),
      'description' => Type::string(),
    ],
    'resolve' => function($root, $args) {
      $address = Address::find($args['id']);
      $address->user_id = isset($args['user_id']) ? $args['user_id'] : $address->user_id;
      $address->name = isset($args['name']) ? $args['name'] : $address->name;
      $address->description = isset($args['description']) ? $args['description'] : $address->description;
      $address->save();
      
      return $address->toArray();
    }
  ],
  'deleteAddress' => [
    'type' => $addressType,
    'args' => [
      'id' => Type::nonNull(Type::int())
    ],
    'resolve' => function($root, $args) {
      $address = Address::find($args['id']);
      $address->delete();
      
      return $address->toArray();
    }
  ]
];