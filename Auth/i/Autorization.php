<?php

namespace auth;

interface Autorization
{
    /**
     * @return bool
     */
    public function login();

    /**
     * @return bool
     */
    public function autologin();

    /**
     * @return mixed
     */
    public function getUserData();
}