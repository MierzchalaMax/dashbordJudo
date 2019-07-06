<?php

namespace App\Application;

interface DbStatement
{
    public function __get(int $id);
    public function __set(int $id, $value):void;
    public function insert(string $column, $value);
    public function delete(string $column);
    public function update(string $column, $value);
}