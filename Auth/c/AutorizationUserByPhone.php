<?php

namespace auth\c;

use auth\Auth;
use auth\Autorization;
use auth\ModelChecker;

class AutorizationUserByPhone implements Autorization
{
    protected $checker;

    public function __construct(ModelChecker $checker)
    {
        $this->checker   = $checker;
    }

    /**
     * @return bool
     */
    public function login()
    {
        if ($this->checker->check())
        {
            $phoneData = $this->checker->getModel()
                          ->getDataByItentificator()
            ;
        }
    }

    /**
     * @return bool
     */
    public function autologin()
    {
        // TODO: Implement autologin() method.
    }

    /**
     * @return mixed
     */
    public function getUserData()
    {
        // TODO: Implement getUserData() method.
    }
}