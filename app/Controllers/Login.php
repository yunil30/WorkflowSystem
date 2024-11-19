<?php

namespace App\Controllers;
use App\Models\UserModel;
use App\Models\LoginModel;

class Login extends BaseController {
    private $postRequest;
    private $UserModel;
    private $LoginModel;

	public function __construct() {
        $this->postRequest = \Config\Services::request();
        $this->UserModel = new UserModel();
		$this->LoginModel = new LoginModel();
	}

    public function Authenticate() {
        $requestJson = $this->postRequest->getJSON();

        $this->Password = password_hash($requestJson->PassWord, PASSWORD_DEFAULT);

        var_dump($this->Password);
        return false;
    }
}
