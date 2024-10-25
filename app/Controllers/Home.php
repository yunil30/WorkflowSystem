<?php

namespace App\Controllers;

class Home extends BaseController {

    public function __construct() {
        helper('utility_helpers');
    }

    public function index() {
        return view('welcome_message');
    }

    public function ShowModule1() {
        return view('module1');
    }

    public function ShowModule2() {
        return view('module2');
    }

    public function ShowModule3() {
        return view('module3');
    }

    public function ShowModule4() {
        return view('module4');
    }
}
