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

    public function GetLatestUserCount() {
        $user_count = $this->UserModel->GetLatestUserCount();

        return $this->response->setJSON(['user_counter' => $user_count]);
    }

    public function SaveTesting() {
        $requestJson = $this->postRequest->getJSON();

        $data = [
            'full_name'  => $requestJson->LastName . ', ' . $requestJson->FirstName . ' ' . $requestJson->MiddleName,
            'user_name'  => $requestJson->UserName,
            'user_email' => $requestJson->UserEmail,
            'password'   => $requestJson->UserPassword,
            'user_role'  => $requestJson->UserRole,
        ];

        if ($this->UserModel->InsertData('tbl_user_access', $data)) {
            echo 'Success';
        } else {
            echo 'Error: Data insertion failed.';
        }
    }
}
