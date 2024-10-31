<?php
require_once 'config/Database.php';
require_once 'models/DenunciaModel.php';
require_once 'controllers/DenunciaController.php';

$database = new Database();
$db = $database->connect();

$controller = new DenunciaController($db);

$action = isset($_GET['action']) ? $_GET['action'] : 'index';

switch ($action) {
    case 'create':
        $controller->create();
        break;
    case 'edit':
        $controller->edit($_GET['id']);
        break;
    case 'delete':
        $controller->delete($_GET['id']);
        break;
    case 'search':
        $controller->search();
        break;
    default:
        $controller->index();
        break;
}
