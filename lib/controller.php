<?php

/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

namespace Lib;

/**
 * Description of controller
 *
 * @author Ga_Ca
 */
class Controller {
    //put your code here
    protected $data;
    function getData() {
        return $this->data;
    }

    function setData($data) {
        $this->data = $data;
    }

    function __construct($data=array()) {
        $this->data = $data;
    }

}