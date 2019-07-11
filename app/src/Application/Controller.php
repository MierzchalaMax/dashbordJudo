<?php

namespace App\Application;

use \Twig_Environment;
use \Twig_Loader_Filesystem;
use App\Application\Database;

class Controller extends Database
{
    /** @var PATH */
    private const PATH = '../templates';

    /** @var Twig_Loader_Filesystem */
    private $loader;

    /** @var Twig_Environnment */
    protected $twig;

    public function __construct()
    {
        parent::__construct();
        // super();
        // Twig loading
        $this->loader = new Twig_Loader_Filesystem(self::PATH);
        $this->twig = new Twig_Environment($this->loader, array('cache' => false));
    }

    protected function render(string $path, array $params=[]):string
    {
        return $this->twig->render(
            $path,
            $params
        );
    }

   

}

