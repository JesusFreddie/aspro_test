<?php

require_once __DIR__."/Controllers/BracketController.php";

use Modules\Bracket\Controllers\BracketController;

/**
 * @var PDO $pdo
 * @var string $type
 * @var string $method
 */

if ($type === '/brackets') {
    $controller = new BracketController($pdo);

    switch ($method) {
        case 'GET':
            $controller->getAll();
            break;
        case 'POST':
            $data = json_decode(file_get_contents("php://input"), true);
            $controller->create($data);
            break;
        default:
            http_response_code(404);
    }
}