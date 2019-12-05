<?php


namespace auth;


interface LoginData
{
    /**
     * @return string
     */
    function getLogin();

    /**
     * @param $oldHash
     * @return bool
     */
    function isPasswordVerify($oldHash);

    /**
     * @return string
     */
    function getPasswordHash();

    /**
     * @return string
     */
    function getPassword();

    /**
     * @param $login
     * @return $this
     */
    function setLogin($login);

    /**
     * @param $password
     * @return $this
     */
    function setPassword($password);
}