<?php

namespace App\Controllers;

class Home extends BaseController {

    public function __construct() {
        helper('utility_helpers');
    }

    public function index() {
        return view('welcome_message');
    }
}
