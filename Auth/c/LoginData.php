<?php

namespace auth\c;

class LoginData implements \auth\LoginData
{
    protected $login;
    protected $password;
    protected $hashPassword;

    public function __construct($login, $password)
    {
        $this->login        = $login;
        $this->password     = $password;
        $this->hashPassword = $this->hash();
    }

    protected function hash()
    {
        return password_hash($this->password, PASSWORD_DEFAULT);
    }

    /**
     * @return string
     */
    function getLogin()
    {
        return $this->login;
    }

    /**
     * @param $oldHash
     * @return bool
     */
    function isPasswordVerify($oldHash)
    {
        return password_verify($this->password, $oldHash);
    }

    /**
     * @return string
     */
    function getPasswordHash()
    {
        return $this->hashPassword;
    }

    /**
     * @return mixed
     */
    public function getPassword()
    {
        return $this->password;
    }

    /**
     * @param $login
     * @return \auth\LoginData
     */
    function setLogin($login)
    {
        $this->login = $login;

        return $this;
    }

    /**
     * @param $password
     * @return \auth\LoginData
     */
    function setPassword($password)
    {
        $this->password = $password;

        return $this;
    }
}
