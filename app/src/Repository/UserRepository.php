<?php

namespace App\Repository;

use App\Application\Controller;
// use App\Repository\RepositoryInterface;
use App\Entity\User;

class UserRepository extends Controller
{
    public function __construct()
    {
        PARENT::__construct();
    }

    public function insert(User $user)
    {
        $sql = 'INSERT INTO user(firstname, lastname, email, tel, is_admin, login, password)
                VALUES(:firstname, :lastname, :email, :tel, :is_admin, :login, :password)';
        $this->prepare($sql);
        $this->bindParam(':firstname', $user->firstname,  \PDO::PARAM_STR);
        $this->bindParam(':lastname', $user->lastname,  \PDO::PARAM_STR);
        $this->bindParam(':email', $user->email,  \PDO::PARAM_STR);
        $this->bindParam(':tel', $user->tel,  \PDO::PARAM_STR);
        $this->bindParam(':is_admin', $user->is_admin,  \PDO::PARAM_INT);
        $this->bindParam(':login', $user->login,  \PDO::PARAM_STR);
        $this->bindParam(':password', $user->password,  \PDO::PARAM_STR);
        $this->execute();
    }

    public function delete(int $id)
    {
        $sql = 'DELETE FROM user 
                WHERE id=:id';
        $this->prepare($sql); 
        $this->bindParam(':id', $id, \PDO::PARAM_INT);
        $this->execute();
    }

    public function update(User $user)
    {
        $sql = 'UPDATE user 
                SET firstname=:firstname, lastname=:lastname, email=:email, tel=:tel, is_admin=:is_admin, login=:login, password=:password
                WHERE id=:id';
        $this->prepare($sql);
        $this->bindParam(':firstname', $user->firstname,  \PDO::PARAM_STR);
        $this->bindParam(':lastname', $user->lastname,  \PDO::PARAM_STR);
        $this->bindParam(':email', $user->email,  \PDO::PARAM_STR);
        $this->bindParam(':tel', $user->tel,  \PDO::PARAM_STR);
        $this->bindParam(':is_admin', $user->is_admin,  \PDO::PARAM_INT);
        $this->bindParam(':login', $user->login,  \PDO::PARAM_STR);
        $this->bindParam(':password', $user->password,  \PDO::PARAM_STR);
        $this->execute();
        
    }

    public function getAll()
    {
        $sql = 'SELECT firstname, lastname, email, tel, login, password, is_admin
                FROM user';
        $this->prepare($sql);
        $this->execute();
        return $this->fetchAll();
    }

    public function getIdBytag(string $tag, string $value)
    {
        $sql = 'SELECT id 
        FROM user
        WHERE :tag=:value';
        $this->prepare($sql);
        $this->bindParam(':tag', $tag, \PDO::PARAM_STR);
        $this->bindParam(':value', $value, \PDO::PARAM_STR);
        $this->execute();
        return $this->fetch();
    }

    public function getAllByTag(string $tag, string $value)
    {
        $sql = "SELECT id 
        FROM user
        WHERE $tag=:value";
         
        $this->prepare($sql);
        // $this->bindParam(':tag', $tag, PDO::PARAM_STR);
        $this->bindParam(':value', $value, \PDO::PARAM_STR);
        $this->execute();
        return $this->fetch();
    }
    public function getAllById(int $id)
    {
        $sql = 'SELECT firstname, lastname, email, tel, login, password, is_admin
                FROM user
                WHERE id=:id';
        $this->prepare($sql);
        $this->bindParam(':id', $id, \PDO::PARAM_INT);
        $this->execute();
        return $this->fetch();
    }

    public function hasAccount(User $user)
    {
        $sql = 'SELECT COUNT(*)
                FROM user
                WHERE login=:login AND password=:password';
        $this->prepare($sql);
        $this->bindParam(':login', $user->login, \PDO::PARAM_STR);
        $this->bindParam(':password', $user->password, \PDO::PARAM_STR);
        $this->execute();
        // var_dump($this->fetch()); die();
        return $this->fetch();
    }

}