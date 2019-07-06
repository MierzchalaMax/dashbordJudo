<?php

namespace App\Manager;

use App\Application\Manager;
use App\Application\DbConfig;

class ResponseManager extends Manager
{
    /** @var PDO $db */
    private $db;
    
    /** @var int $nbrSeat */
    private $nbrSeat;

    public function __construct()
    {
        $db = new DbConfig();
        $db->connect();
    }

    public function render()
    {
        return $this->twig->render('index.html.twig');
    }

    public function __get(string $property): int
    {
        switch($property)
        {
            case 'nbrSeat': return $this->nbrSeat; break;
            default: throw new Error('Class '.get_class().'can\'t ac 
    }

    public function __set(string $property, mixed $value): void
    {
        switch($property)
        {
            case 'nbrSeat': $this->nbrSeat = $value; break;
            default: throw new Error('Class '.get_class().'can\'t access to property '.$property);
        }
    }
}