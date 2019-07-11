<?php

namespace App\Repository;

use App\Application\Controller;
use App\Repository\RepositoryInterface;

class SeasonRepository extends Controller implements RepositoryInterface
{
    public function insert(Season $season)
    {
        $sql = 'INSERT INTO season(name)
                VALUES(:name)';
        $this->prepare($sql);
        $this->bindParam(':name', $season->firstname,  \PDO::PARAM_STR);
        $this->execute();
    }

    public function delete(int $id)
    {
        $sql = 'DELETE FROM season 
                WHERE id=:id';
        $this->prepare($sql); 
        $this->bindParam(':id', $id, \PDO::PARAM_INT);
        $this->execute();
    }

    public function update()
    {

    }

    public function getAll()
    {

    }

    public function getById(int $id)
    {

    }

    public function getByTag(string $tag, string $value)
    {

    }

    public function getIdByTag(string $tag, string $value)
    {

    }

}