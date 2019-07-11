<?php

namespace App\Entity;

use App\Repository\UserRepository;

class User extends UserRepository
{
    // #################### CLASS VAR ####################
    /** @var int $id */
    private $id;

    /** @var string $firstname */
    private $firstname;

    /** @var string $lastname */
    private $lastname;

    /** @var string $email */
    private $email;

    /** @var string $tel */
    private $tel;

    /** @var string $login */
    private $login;

    /** @var password $password */
    private $password;

    /** @var boolean $isAdmin */
    private $isAdmin;

    /**
     * Constructor maker for 1,2 OR 7 pamameters
     */
    public function __construct()
    {
        PARENT::__construct();
        $nbrArg = func_num_args();
        $args = func_get_args();
        switch($nbrArg)
        {
            case 1: 
                $this->init1($args[0]);
                break;
            case 2:
                $this->init2($args[0], $args[1]);
                break;
            case 7:
                $this->init7($args[0], $args[1], $args[2], $args[3], $args[4], $args[5], $args[6]);
                break;
            default:
                throw new Exception("Class " . get_class($this) . "cannot have " . func_num_args . "arguments");
                break;
        }
    }
    // Constructor with 1 parameter
    private function init1($id)
    {
        $userData = getAllById();
        
    }
    // Constructor with 2 parameter
    private function init2($login, $password)
    {
        $this->login = $login;
        $this->password = $password;
        if($this->hasAccount($this))
        {
            $userData = $this->getAllByTag('login', $this->login);
        }
    }
    // Constructor with 7 parameters
    private function init7($firstname, $lastname, $email, $tel, $isAdmin, $login, $password)
    {
        echo 'coucou7';
    }

    // #################### GETTER/SETTER ####################
    public function __get(string $property)
    {
        switch($property)
        {
            case 'firstname': return $this->firstname; break;
            case 'lastname': return $this->lastname; break;
            case 'email': return $this->email; break;
            case 'tel': return $this->tel; break;
            case 'isAdmin': return $this->isAdmin; break;
            case 'login': return $this->login; break;
            case 'password': return $this->password; break;
            default: throw new Error('Class '.get_class().'can\'t access to property '.$property);
        }
    }
    public function __set(string $property, mixed $value): void
    {
        switch($property)
        {
            case 'firstname': $this->firstname = $value; break;
            case 'lastname': $this->lastname = $value; break;
            case 'email': $this->email = $value; break;
            case 'tel': $this->tel = $value; break;
            case 'isAdmin': $this->isAdmin = $value; break;
            case 'login': $this->login = $value; break;
            case 'password': $this->password = $value; break;
            default: throw new Error('Class '.get_class().'can\'t access to property '.$property);
        }
    }
    // #################### CLASS METHOD ####################
    public function userHasAccount()
    {
        return $this->hasAccount($this);
    }

    public function userDelete()
    {
        delete($this->id);
    }
    
    public function userSave()
    {
        $this->hasAccount($this) ? update($this) : insert($this);
    }

}