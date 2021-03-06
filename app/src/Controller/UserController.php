<?php

namespace App\Controller;

use App\Application\Controller;

Class UserController extends Controller
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