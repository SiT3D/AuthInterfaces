<?php

namespace auth\c;

use auth\LoginData;

class fs_users extends \model\fs_users implements \auth\Model
{

    /**
     * @var LoginData
     */
    protected $loginData;
    protected $itentificator;


    /**
     * @return bool
     */
    function find()
    {
        $user  = $this->getByEmail($this->loginData->getLogin());
        if ($user)
        {
            $isCorrectPassword   = $this->loginData->isPasswordVerify($user->password);
            $this->itentificator = $user ? $user->id : null;
        }
        else
        {
            return false;
        }

        return $this->isHasLogin() && $isCorrectPassword;
    }

    function getUserItentificator()
    {
        return $this->itentificator;
    }

    function getDataByItentificator($itentificator)
    {
        return $this->getByID($itentificator);
    }

    function getUserLoginByID($itentificator)
    {
        return $this->getByID($itentificator) ? $this->getByID($itentificator)->email : null;
    }

    /**
     * @return bool
     */
    function isHasLogin()
    {
        return (bool) $this->getByEmail($this->loginData->getLogin());
    }

    function setLoginData(LoginData $loginData)
    {
        $this->loginData = $loginData;

        return $this;
    }
}