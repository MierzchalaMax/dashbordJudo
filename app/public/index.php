<?php
require_once dirname(__DIR__) . '/vendor/autoload.php';

$router = new AltoRouter();
// $router->setBasePath('/alto-app/');

$router->map('POST|GET', '/', array('c' => 'LoginController', 'a' => 'showLogin'));

$router->map('GET|POST', '/login', array('c' => 'LoginController', 'a' => 'login'));
// $router->map('POST|GET', '/login', array('c' => 'LoginController', 'a' => 'login'));
$router->map('POST|GET', '/other', array('c' => 'LoginController', 'a' => 'other'));

// avec param !!!
// $router->addMatchTypes(array('connect' => '[a-zA-Z]{1,45}')); 
// $router->map('GET|POST', '/login/[:connect]', array('c' => 'LoginController', 'a' => 'login'));



$match = $router->match();
$controller = 'App\\Controller\\' . $match['target']['c'];
$action = $match['target']['a'];

// Instancier l'objet d'après l'url
$object = new $controller();
if (count($match['params']) === 0)
{
    $print = $object->{$action}();
}
else
{
    $print = $object->{$action}($match['params']);
}
echo $print;


// if( is_array($match) && is_callable( $match['target'] ) ) {
// 	call_user_func_array( $match['target'], $match['params'] ); 
// } else {
// 	// no route was matched
// 	header( $_SERVER["SERVER_PROTOCOL"] . ' 404 Not Found');
// }