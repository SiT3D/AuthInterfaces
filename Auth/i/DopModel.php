<?php

namespace auth;

interface DopModel extends Model
{
    /**
     * @param Model $userModel
     * @return self
     */
    function setDopModel(Model $userModel);
}
