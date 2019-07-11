<?php

namespace App\Controller;

use App\Application\Controller;
use App\Entity\User;

class LoginController extends Controller
{

    public function showLogin()
    {
        return $this->render('login.html.twig');
    }

    public function other()
    {
        return $this->render('other.html.twig');
    }
    public function login()
    {
        if(isset($_POST['inLogin']))
        {
            $login = $_POST['login'];
            $password = $_POST['password'];
            $user = new User($login, $password);
        }
       
        // 
        // $user = new User($login, $password);
        // var_dump($user->userHasAccount()); die();
        if ($user.userHasAccount())
        {
            return $this->render('home.html.twig', []);
        }
        else 
        {
            return $this->render('login.html.twig', ['data' => 'incorrect']);
        }




        // $sql1 = 'SELECT id
        //         FROM user
        //         WHERE login=:login AND password=:password';
        // $this->prepare($sql1);
        // $this->bindParam(':login', $login, \PDO::PARAM_STR);
        // $this->bindParam(':password', $password, \PDO::PARAM_STR);
        // $this->execute();
        // $has_account = $this->fetch();

        // if($has_account === 1) 
        // {
        //     $sql2 = 'SELECT id, firstname, lastname, is_admin
        //         FROM user 
        //         WHERE login=:login AND password=:password';
        //     $this->prepare($sql2);
        //     $this->bindParam(':login', $login, \PDO::PARAM_STR);
        //     $this->bindParam(':password', $password, \PDO::PARAM_STR);
        //     $this->execute();
        //     return $this->fetch();
        // }
    }
}