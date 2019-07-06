<?php

namespace App\Manager;

use App\Application\Manager;
use App\Application\DbConfig;

class SeasonManager extends Manager
{
    /** @var string $name */
    private $name;

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

    public function __get(string $property): string
    {
        switch($property)
        {
            case 'name': return $this->name; break;
            default: throw new Error('Class '.get_class().'can\'t access to property '.$property);
        }
    }

    public function __set(string $property, mixed $value): void
    {
        switch($property)
        {
            case 'name': $this->name = $value; break;
            default: throw new Error('Class '.get_class().'can\'t access to property '.$property);
        }
    }
}