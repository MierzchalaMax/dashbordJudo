<?php

namespace App\Entity;

use App\Application\Db;
use App\Application\DbStatement;

class User extends Db implements DbStatement
{
        /** @var string $firstname */
        private $firstname;

        /** @var string $lastname */
        private $lastname;
    
        /** @var string $email */
        private $email;
    
        /** @var string $tel */
        private $tel;
    
        /** @var int $nbrSeat */
        private $nbrSeat;
    
        /** @var string $login */
        private $login;
    
        /** @var password $password */
        private $password;
    
        /** @var boolean $isAdmin */
        private $isAdmin = false;

    public function __get(string $property): mixed
    {
        switch($property)
        {
            case 'firstname': return $this->firstname; break;
            case 'lastname': return $this->lastname; break;
            case 'email': return $this->email; break;
            case 'tel': return $this->tel; break;
            case 'nbrSeat': return $this->nbrSeat; break;
            case 'isAdmin': return $this->isAdmin; break;
            case 'login': return $this->login; break;
            case 'password': return $this->password; break;
            default: throw new Error('Class '.get_class().'can\'t access to property '.$property);
        }
    }
    /**
     * 
     */
    public function __set(string $property, mixed $value): void
    {
        switch($property)
        {
            case 'firstname': $this->firstname = $value; break;
            case 'lastname': $this->lastname = $value; break;
            case 'email': $this->email = $value; break;
            case 'tel': $this->tel = $value; break;
            case 'nbrSeat': $this->nbrSeat = $value; break;
            case 'isAdmin': $this->isAdmin = $value; break;
            case 'login': $this->login = $value; break;
            case 'password': $this->password = $value; break;
            default: throw new Error('Class '.get_class().'can\'t access to property '.$property);
        }
    }

    public function update(string $column, mixed $value)
    {
        
    }

    public function delete(string $column)
    {
        
    }

    public function insert(string $column, mixed $value)
    {
        
    }
}