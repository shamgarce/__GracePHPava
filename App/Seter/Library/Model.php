<?php

namespace Seter\Library;

class Model{

    public function __get($ModelName) {
        $ModelName = '\\'.ucfirst($ModelName);
        return new $ModelName();
    }
}

