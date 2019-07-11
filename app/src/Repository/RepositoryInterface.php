<?php

namespace App\Repository;

interface RepositoryInterface
{
    public function insert(object $object);
    public function delete();
    public function update(object $object);
    public function getAll();
    public function getById(int $id);
    public function getByTag(string $tag, string $value);
    public function getIdByTag(string $tag, string $value);
}