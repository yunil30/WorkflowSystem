<?php

namespace App\Controllers;
use App\Models\UserModel;

class Home extends BaseController {
    private $postRequest;
    private $UserModel;

    public function __construct() {
        helper('utility_helpers');
        $this->postRequest = \Config\Services::request();
        $this->UserModel = new UserModel();
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

    public function SaveTesting() {
        $requestJson = $this->postRequest->getJSON();

        $data = [
            'FullName' => $requestJson->LastName . ', ' . $requestJson->FirstName . ' ' . $requestJson->MiddleName
        ];

        if ($this->UserModel->InsertData('testing', $data)) {
            echo 'Success';
            
            var_dump($data);
            return false;
        } else {
            echo 'Error: Data insertion failed.';
        }
    }
}
