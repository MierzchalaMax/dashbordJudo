<?php

namespace App\Manager;

use App\Application\Manager;
use App\Application\DbConfig;

Class UserManager extends Manager
{
/** @var PDO $db */
private $db;

public function __construct()
{
    $db = new DbConfig();
    $db->connect();
}

public function render()
{
    return $this->twig->render('index.html.twig');
}
}