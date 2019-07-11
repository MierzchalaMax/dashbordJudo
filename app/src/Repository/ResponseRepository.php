<?php

namespace App\Repository;

use App\Application\Controller;
use App\Repository\RepositoryInterface;

class ResponseRepository extends Controller implements RepositoryInterface
{
    public function insert(Response $response){
        $sql = 'INSERT INTO response(nbr_seat)
                VALUES(:nbr_seat)';
        $this->prepare($sql);
        $this->bindParam(':nbr_seat', $response->nbr_seat,  \PDO::PARAM_STR);
        $this->execute();
    }

    public function delete(int $id){
        $sql = 'DELETE FROM response 
                WHERE id=:id';
        $this->prepare($sql); 
        $this->bindParam(':id', $id, \PDO::PARAM_INT);
        $this->execute();
    }

    public function update(){

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