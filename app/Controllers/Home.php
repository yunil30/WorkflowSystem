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

    public function ShowListOfUsers() {
        return view('ListOfUsers');
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

    public function GetUsers() {
        return $this->response->setJSON($this->UserModel->GetUsers());
    }

    public function GetLatestUserCount() {
        $user_count = $this->UserModel->GetLatestUserCount();

        return $this->response->setJSON(['user_counter' => $user_count]);
    }

    public function SaveTesting() {
        $requestJson = $this->postRequest->getJSON();

        if (empty($requestJson->UserName) || empty($requestJson->UserEmail) || empty($requestJson->UserPassword)) {
            return $this->response
                        ->setStatusCode(400)
                        ->setJSON(['error' => 'Missing required fields.']);
        }
  
        $ValidateUserName = $this->UserModel->ValidateUserName($requestJson->UserName);
        if($ValidateUserName > 0) {
            return $this->response
                        ->setStatusCode(400)
                        ->setJSON(['error' => 'Username Already Exists!']);
        }

        $ValidateUserEmail = $this->UserModel->ValidateUserEmail($requestJson->UserEmail);
        if($ValidateUserEmail > 0) {
            return $this->response
                        ->setStatusCode(400)
                        ->setJSON(['error' => 'Email address Already Exists!']);
        }

        $data = [
            'full_name'  => $requestJson->LastName . ', ' . $requestJson->FirstName . ' ' . $requestJson->MiddleName,
            'user_name'  => $requestJson->UserName,
            'user_email' => $requestJson->UserEmail,
            'password'   => sha1(md5($requestJson->UserPassword)),
            'user_role'  => $requestJson->UserRole,
        ];

        if ($this->UserModel->InsertData('tbl_user_access', $data)) {
            return $this->response
                        ->setStatusCode(200)
                        ->setJSON(['message' => 'Success']);
        } else {
            return $this->response
                        ->setStatusCode(500)
                        ->setJSON(['error' => 'Data insertion failed.']);
        }
    }
}
