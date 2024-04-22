<?php

namespace App\Controller;


/**
 * Class GlobalController
 * @package App\Controller
 */
class GlobalController
{
    /** @var mixed */
    private $entityManager;


    /**
     * GlobalController constructor.
     * @param mixed $entityManager
     */
    public function __construct($entityManager)
    {
        $this->entityManager = $entityManager;
    }

    public function indexView()
{

    echo"TEST";
    // include 'app/src/View/indexView.php';
}

}
