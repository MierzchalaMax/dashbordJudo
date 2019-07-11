<?php

namespace App\Repository;

use App\Application\Controller;
use App\Repository\RepositoryInterface;

class EventRepository extends Controller implements RepositoryInterface
{
    public function insert(Event $event)
    {
        $sql = 'INSERT INTO event(date, place)
                VALUES(:date, :place)';
        $this->prepare($sql);
        $this->bindParam(':date', $event->date,  \PDO::PARAM_STR);
        $this->bindParam(':place', $event->place,  \PDO::PARAM_STR);
        $this->execute();
    }

    public function delete(int $id)
    {
        $sql = 'DELETE FROM event 
                WHERE id=:id';
        $this->prepare($sql); 
        $this->bindParam(':id', $id, \PDO::PARAM_INT);
        $this->execute();
    }

    public function update()
    {

    }

    public function getAll(){

    }

    public function getById(int $id){

    }

    public function getByTag(string $tag, string $value){

    }

    public function getIdByTag(string $tag, string $value){

    }

}