<?php

namespace App\Entity;

use App\Application\Db;
use App\Application\DbStatement;

class Season extends Db implements DbStatement
{
    public function __get(int $id)
    {
        
    }

    public function __set(int $id, $value):void 
    {

    }

    public function insert(string $column, $value)
    {

    }

    public function delete(string $column)
    {

    }

    public function update(string $column, $value)
    {

    }
}