<?php

namespace auth\c\fb;

use auth\DopModel;
use auth\Model;
use auth\SecondaryModel;

class fs_users extends \auth\c\phone\fs_users implements DopModel
{

    /**
     * @var Model
     */
    protected $dopModel;

    public function find()
    {
        $user = (new self)->s()->w('fb_id = ?', $this->loginData->getLogin())->one();

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
     * @return bool
     */
    function isHasLogin()
    {
        return (bool)(new self)->s()->w('fb_id = ?', $this->loginData->getLogin())->one();
    }
}