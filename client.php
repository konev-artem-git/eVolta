<?php

/********************************
*                               *
*        JSON-RPC-HTTP          *
*            CLIENT             *
*                               *
*********************************/


namespace Example;

//require __DIR__ . '/../vendor/autoload.php';
require __DIR__ . '/../../../autoload.php';

use Datto\JsonRpc\Http\Client;
use Datto\JsonRpc\Http\Exceptions\HttpException;
use Datto\JsonRpc\Responses\ErrorResponse;
use ErrorException;

$server_uri = 'http://localhost:8080/server.php';
$client = new Client($server_uri);


// KON
$param1 = $_SERVER['SERVER_NAME'].$_SERVER['PHP_SELF'];
$param2 = date('Y-m-d H:i');
$client->query('log', [$param1, $param2], $result); // return str $result 
    $client->send();
   // TODO: Exception
print_r($result);



/************       EXAMPLES        ************

// Example 1. Send queries over HTTP(S) to a remote server:
$client->query('add', [1, 2], $result); // @var int $result 
$client->query('add', ['a', 'b'], $error); // @var ErrorResponse $error 
try {
    $client->send();
} catch (ErrorException $exception) {
    echo "See \"examples/README.md\" to get started.\n";
    exit(1);
}

echo "Example 1. Send queries over HTTP(S) to a remote server:\n",
    "   \$client = new Client(\$uri);\n",
    "   \$client->query('add', [1, 2], \$result);\n",
    "   \$client->query('add', ['a', 'b'], \$error);\n",
    "   \$client->send();\n",
    "   // \$result = {$result};\n",
    "   // \$error = new ErrorResponse({$error->getId()}, '{$error->getMessage()}', ErrorResponse::INVALID_ARGUMENTS);\n\n";
        // $result = 3;
        // $error = new ErrorResponse(1, 'Invalid params', ErrorResponse::INVALID_ARGUMENTS);
*/

/*
// Example 2. Add basic access authentication:

$username = 'username';
$password = 'password';

$authentication = base64_encode("{$username}:{$password}");
$headers = ['Authorization' => "Basic {$authentication}"];

$client = new Client($uri, $headers);
$client->query('add', [1, 2], $result);
$client->send();

echo "Example 2. Add basic access authentication:\n",
    "   \$authentication = base64_encode(\"{\$username}:{\$password}\");\n",
    "   \$headers = ['Authorization' => \"Basic {\$authentication}\"];\n\n",
    "   \$client = new Client(\$uri, \$headers);\n",
    "   \$client->query('add', [1, 2], \$result);\n",
    "   \$client->send();\n",
    "   // \$result = {$result};\n\n";
        // $result = 3;


// Example 3. Catch HTTP(S) errors:
$authentication = base64_encode("{$username}:wrong_password");
$headers = ['Authorization' => "Basic {$authentication}"];

$client = new Client($uri, $headers);
$client->query('add', [1, 2], $result);

try {
    $client->send();
} catch (HttpException $exception) {
    $response = $exception->getResponse();
    $code = $response->getCode();
    $message = $response->getMessage();
}

echo "Example 3. Catch HTTP(S) errors:\n",
    "   \$authentication = base64_encode(\"{\$username}:wrong_password\");\n",
    "   \$headers = ['Authorization' => \"Basic {\$authentication}\"];\n\n",
    "   \$client = new Client(\$uri, \$headers);\n",
    "   \$client->query('add', [1, 2], \$result);\n\n",
    "   try {\n",
    "       \$client->send();\n",
    "   } catch (HttpException \$exception) {\n",
    "       \$response = \$exception->getResponse();\n",
    "       \$code = \$response->getCode();\n",
    "       \$message = \$response->getMessage();\n",
    "       echo \"HTTP {\$code}: {\$message}\";\n",
    "       // echo \"HTTP {$code}: {$message}\";\n",
    "   }\n";
    //      echo "HTTP 401: Unauthorized";
*/
?>
