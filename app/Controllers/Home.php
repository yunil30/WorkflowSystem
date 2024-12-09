<?php

namespace App\Controllers;
use App\Models\UserModel;

class Home extends BaseController {
    private $postRequest;
    private $session;
    private $UserModel;

    public function __construct() {
        helper('utility_helpers');
        $this->postRequest = \Config\Services::request();
        $this->session = \Config\Services::session();
        $this->UserModel = new UserModel();
    }

    public function index() {
        if($this->session->has('session_username')) {
            return view('index');
        }
        return view('LoginForm');
        // return view('modal');
    }

    public function ShowListOfUsers() {
        if ($this->session->has('session_username')) {
            return view('UserMaintenance/ListOfUsers');
        }
        return view('LoginForm');
    }

    public function CreateUserRecord() {
        if ($this->session->has('session_username')) {
            return view('UserMaintenance/CreateUserRecord');
        }
        return view('LoginForm');
    }

    public function TestingModule() {
        if ($this->session->has('session_username')) {
            return view('TestingModule');
        }
        return view('LoginForm');
    }

    public function GetActiveUsers() {
        return $this->response->setJSON($this->UserModel->GetActiveUsers());
    }

    public function ViewUserRecord($UserNo, $UserName) {
        $UserRecord = $this->UserModel->GetUserRecord($UserNo, $UserName);

        if ($this->session->has('session_username')) {
            return view('UserMaintenance/ViewUserRecord', ['UserRecord' => $UserRecord]);	
        }
        return view('LoginForm');
    }

    public function UpdateUserRecord($UserNo, $UserName) {
        $UserRecord = $this->UserModel->GetUserRecord($UserNo, $UserName);

        if ($this->session->has('session_username')) {
            return view('UserMaintenance/UpdateUserRecord', ['UserRecord' => $UserRecord]);	
        }
        return view('LoginForm');
    }

    public function GetLatestUserCount() {
        $user_count = $this->UserModel->GetLatestUserCount();

        return $this->response->setJSON(['user_counter' => $user_count]);
    }

    public function SaveRecord() {
        $requestJson = $this->postRequest->getJSON();

        if (empty($requestJson->UserName) || empty($requestJson->UserEmail) || empty($requestJson->UserPassword)) {
            return $this->response
                        ->setStatusCode(400)
                        ->setJSON(['error' => 'Missing required fields!']);
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
            'first_name'  => $requestJson->FirstName,
            'middle_name' => $requestJson->MiddleName,
            'last_name'   => $requestJson->LastName,
            'user_name'   => $requestJson->UserName,
            'user_email'  => $requestJson->UserEmail,
            'password'    => sha1(md5($requestJson->UserPassword)),
            'user_role'   => $requestJson->UserRole,
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

    public function UpdateRecord() {
        $requestJson = $this->postRequest->getJSON();

        if (empty($requestJson->UserEmail)) {
            return $this->response
                        ->setStatusCode(400)
                        ->setJSON(['error' => 'Missing required fields.']);
        }

        $fields = [
            'RecID'     => $requestJson->UserNo,
            'user_name' => $requestJson->UserName
        ];

        $data = [
            'first_name'    => $requestJson->FirstName,
            'middle_name'   => $requestJson->MiddleName,
            'last_name'     => $requestJson->LastName,
            'user_email'    => $requestJson->UserEmail,
            'user_role'     => $requestJson->UserRole,
            'date_modified' => date('Y-m-d H:i:s')
        ];

        if ($this->UserModel->UpdateData($fields, 'tbl_user_access', $data)) {
            return $this->response
                        ->setStatusCode(200)
                        ->setJSON(['message' => 'Success']);
        } else {
            return $this->response
                        ->setStatusCode(500)
                        ->setJSON(['error' => 'Failed to update!']);
        }
    }

    public function RemoveUserRecord() {
        $requestJson = $this->postRequest->getJSON();

        $fields = [
            'RecID'     => $requestJson->UserNo,
            'user_name' => $requestJson->UserName
        ];

        $data = [
            'user_status'   => 0,
            'date_modified' => date('Y-m-d H:i:s')
        ];

        if($this->UserModel->UpdateData($fields, 'tbl_user_access', $data)) {
            return $this->response
                        ->setStatusCode(200)
                        ->setJSON(['message' => 'Success!']);
        } else {
            return $this->response
                        ->setStatusCode(500)
                        ->setJSON(['error' => 'Failed!']);
        }
    }

    public function CreateFolder() {
        $folder = create_folder();
        $path = './WfsUploads/'.$folder;

        var_dump($path);
        return false;
        
        $fileFields = [
            'attachedMemorandum'
        ];

        if (!is_dir($path)) {
            if (mkdir($path, 0777, true)) {
                foreach ($fileFields as $field) {
                    $file = $this->postRequest->getFile($field);

                    if ($file && $file->getSize() > 0) {
                        $newFileName = uniqid() . '.' . $file->getExtension();
                        $file->move($path, $newFileName);
                    } 
                }
            }
        }
    }
}
