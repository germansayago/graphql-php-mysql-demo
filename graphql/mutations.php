<?php

use GraphQL\Type\Definition\ObjectType;

require('mutations/userMutation.php');
require('mutations/addressMutation.php');

$mutation = array();
$mutation += $userMutation;
$mutation += $addressMutation;

$rootMutation = new ObjectType([
  'name' => 'Mutation',
  'fields' => $mutation
]);