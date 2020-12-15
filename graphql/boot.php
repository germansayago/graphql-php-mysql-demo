<?php

use GraphQL\GraphQL;
use GraphQL\Type\Schema;

require('types.php');
require('query.php');

$schema = new Schema([
  'query' => $rootQuery,
  'mutations' => null,
]);

try {
  $rawInput = file_get_contents('php://input');
  $input = json_decode($rawInput, true);
  $query = $input['query'];
  $result = GraphQL::executeQuery($schema, $query);

  $output = $result->toArray();
} catch (\Exception $e) {
  $output = [
    'error' => [
      'message' => $e->getMessage()
    ]
  ];
}

header('Content-Type : application/json');
echo json_encode($output);