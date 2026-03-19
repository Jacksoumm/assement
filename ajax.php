<?php
define('ROOT', __DIR__);

$allowed_clients = ['clienta', 'clientb', 'clientc'];
$allowed_modules = ['cars', 'garage'];
$allowed_scripts = ['ajax', 'edit'];

$client = $_GET['client'] ?? '';
$module = $_GET['module'] ?? '';
$script = $_GET['script'] ?? '';

if (!in_array($client, $allowed_clients, true) ||
    !in_array($module, $allowed_modules, true) ||
    !in_array($script, $allowed_scripts, true)) {
    http_response_code(403);
    echo 'Acces refuse';
    exit;
}

$file = ROOT . "/customs/{$client}/modules/{$module}/{$script}.php";

if (!file_exists($file)) {
    http_response_code(404);
    echo "Module introuvable";
    exit;
}

include $file;