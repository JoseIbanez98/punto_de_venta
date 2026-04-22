<?php
ini_set('display_errors', 1);
error_reporting(E_ALL);
require_once __DIR__ . '/config/database.php';
require_once __DIR__ . '/controllers/ProductController.php';
require_once __DIR__ . '/controllers/SaleController.php';

$db = (new Database())->connect();
$uri = $_SERVER['REQUEST_URI'] ?? '/';
$method = $_SERVER['REQUEST_METHOD'];

// 🔥 SOLUCIÓN CLAVE
$uri = str_replace('/app', '', $uri);
$uri = parse_url($uri, PHP_URL_PATH);
$uri = rtrim($uri, '/');

if ($uri === '') {
    $uri = '/';
}


if ($uri == "/ventas") {
    require __DIR__ . '/view/ventas.php';
    exit;
}

if ($uri == "/productos") {
    require __DIR__ . '/view/productos.php';
    exit;
}

if ($uri == "/corte") {
    require __DIR__ . '/view/corte.php';
    exit;
}

if ($uri == "/products" && $method == "GET") {
    (new ProductController($db))->index();
}

if ($uri == "/products" && $method == "POST") {
    (new ProductController($db))->store();
}

if ($uri == "/products/restock" && $method == "POST") {
    (new ProductController($db))->restock();
}
if ($uri == "/products/status" && $method == "POST") {
    (new ProductController($db))->changeStatus();
}
if ($uri == "/sales" && $method == "POST") {
    (new SaleController($db))->store();
}
if ($uri === '/sales/today' && $method === 'GET') {
    (new SaleController($db))->reportSale();
}
