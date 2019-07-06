<?php

namespace App\Application;

use App\Application\Template;

class Manager
{
    /**
     * @var Template
     */
    protected $twig;

    public function __contruct()
    {
        $this->twig = new Template();
    }
}