<?php
require_once '../src/config/database.php';
require_once '../src/controllers/AuthController.php';

$controller = new AuthController();

$requestMethod = $_SERVER['REQUEST_METHOD'];
$requestUri = explode('/', trim($_SERVER['REQUEST_URI'], '/'));

if ($requestUri[0] === 'register' && $requestMethod === 'POST') {
    $controller->registerUser();
} elseif ($requestUri[0] === 'login' && $requestMethod === 'POST') {
    $controller->loginUser();
} else {
    http_response_code(404);
    echo json_encode(['message' => 'Not Found']);
}
?>