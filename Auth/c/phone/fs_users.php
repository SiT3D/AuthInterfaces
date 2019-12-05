<?php

namespace auth\c\phone;

use auth\DopModel;
use auth\LoginData;
use auth\Model;
use auth\SecondaryModel;

class fs_users extends \auth\c\fs_users implements DopModel
{

    /**
     * @var Model
     */
    protected $dopModel;

    public function find()
    {
        $user = (new self)->s()->w('phone = ?', $this->loginData->getLogin())->one();

        if ($user)
        {
            $userLogin = $user->email;
            $this->loginData->setLogin($userLogin);

            return $this->dopModel->setLoginData($this->loginData)
                                  ->find()
                ;
        }

        return false;
    }

    /**
     * @param Model $userModel
     * @return $this
     */
    function setDopModel(Model $userModel)
    {
        $this->dopModel = $userModel;

        return $this;
    }

    function getUserItentificator()
    {
        return $this->dopModel->getUserItentificator();
    }

    function getDataByItentificator($itentificator)
    {
        return $this->dopModel->getDataByItentificator($itentificator);
    }

    /**
     * @return bool
     */
    function isHasLogin()
    {
        return (bool)(new self)->s()->w('phone = ?', $this->loginData->getLogin())->one();
    }

    function setLoginData(LoginData $loginData)
    {
        $this->loginData = $loginData;

        return $this;
    }

    function getUserLoginByID($userID)
    {
        return $this->dopModel->getUserLoginByID($userID);
    }


}