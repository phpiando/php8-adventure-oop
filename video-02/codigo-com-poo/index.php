<?php
use ProdutoController;

$action = $_GET['action'] ?? 'listarProdutos';

$controller = new ProdutoController();

if (method_exists($controller, $action)) {
    $controller->$action();
} else {
    echo "Ação '$action' não encontrada!";
}
