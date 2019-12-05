<?php

namespace auth\t;

use auth\c\fs_users;
use auth\c\LoginData;
use auth\c\PhonesModel;
use auth\c\StandartModel;
use auth\c\Checker;
use user\AutorizationUser;

class test implements \ajax
{
    public function test1()
    {
        $logindData = new LoginData(\GetPost::uget('l'), \GetPost::uget('p'));

        (new AutorizationUser((new fs_users())->setLoginData($logindData)))->login();

        $logindData->setLogin(\fs_phones::phone_format($logindData->getLogin()));
        $model             = (new \auth\c\phone\fs_users())->setLoginData($logindData)
                                                           ->setDopModel(new fs_users())
        ;
        $autorization_user = new AutorizationUser($model);


        // todo тут фб из смежной таблицы + фб из этой же таблицы

        $modelFb   = (new \auth\c\fb\fs_users())->setLoginData($logindData)
                                               ->setDopModel(new fs_users())
        ;
        $userAuth = new AutorizationUser($modelFb);

        $userAuth->login();
        $isLogin = $userAuth->getUserData();

        \Module::response();
    }

    public function asdasd()
    {
        \Module::response();
    }

    /**
     * @return bool
     */
    public function accessRules()
    {
        return true;
    }
}