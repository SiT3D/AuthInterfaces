<?php


namespace user;

use auth\Auth;
use auth\Autorization;
use auth\Model;
use auth\ModelChecker;
use trud\admin\Session;

class AutorizationUser implements Autorization
{
    protected $model;

    protected function autorizationKey()
    {
        return 'userAutorization';
    }

    public function __construct(Model $model)
    {
        $this->model = $model;
    }

    /**
     * @return bool
     */
    public function login()
    {
        $logined = $this->model->find();

        if ($logined)
        {
            $this->_saveSession();
        }

        return $logined;
    }

    private function _saveSession()
    {
        Session::act($this->autorizationKey(), $this->model->getUserItentificator());
    }

    /**
     * @return mixed
     */
    public function getUserData()
    {
        return $this->model->getDataByItentificator(Session::act($this->autorizationKey()));
    }

    /**
     * @return bool
     */
    public function autologin()
    {
        $this->model->find();

        if ($this->model->getUserItentificator())
        {
            $this->_saveSession();
            return true;
        }

        return false;
    }
}