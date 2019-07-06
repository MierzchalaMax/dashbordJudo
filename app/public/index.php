<?php
require_once dirname(__DIR__) . '/vendor/autoload.php';

$router = new AltoRouter();

$router->map('GET', '/', array('c' => 'BlogController', 'a' => 'index'));
$router->map('GET', '/list', array('c' => 'BlogController', 'a' => 'posts'));
$router->map('GET', '/produit', array('c' => 'ProduitController', 'a' => 'list'));

$router->addMatchTypes(array('idProduit' => '[0-9]{1,5}'));
$router->map('GET', '/produit/delete/[i:id]', array('c' => 'ProduitController', 'a' => 'delete'));

$match = $router->match();
$controller = 'App\\Controller\\' . $match['target']['c'];
$action = $match['target']['a'];

// Instancier l'objet d'après l'url
// $object = new $controller();
// if (count($match['params']) === 0)
// {
//     $print = $object->{$action}();
// }
// else
// {
//     $print = $object->{$action}($match['params']);
// }
// echo $print;