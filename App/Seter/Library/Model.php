<?php

namespace Seter\Library;
/**
 * Class Model
 * @package Seter\Library
 */
class Model{

    public function __get($ModelName) {
        $ModelName = '\\'.ucfirst($ModelName);
        return new $ModelName();
    }
}

