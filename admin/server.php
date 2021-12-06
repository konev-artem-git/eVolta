<?php

/********************************
*                               *
*        JSON-RPC-HTTP          *
*            SERVER             *
*                               *
*********************************/


//require __DIR__ . '/../vendor/autoload.php';
require __DIR__ . '/../../../../autoload.php';

use Datto\JsonRpc\Http\Examples\Evaluator;
use Datto\JsonRpc\Http\Examples\AuthenticatedServer;

$evaluator = new Evaluator();
$server = new AuthenticatedServer($evaluator);

$server->reply();
