<?php

namespace auth;

interface Model
{
    /**
     * Возвращает значение, найдена ли связь между данными в данной таблице
     *
     * @return bool
     */
    function find();

    /**
     * Должен вернуть id который будет записан в сессию
     * @return string
     */
    function getUserItentificator();
    function getDataByItentificator($itentificator);

    /**
     * Проверка на существование логина в данных
     * @return bool
     */
    function isHasLogin();
    function setLoginData(LoginData $loginData);

    /**
     * Возвращает логин пользователя по его ID
     * @param $userID
     * @return mixed
     */
    function getUserLoginByID($userID);
}