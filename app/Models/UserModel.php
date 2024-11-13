<?php

namespace App\Models;

use CodeIgniter\Model;

class UserModel extends Model {
    protected $db;
    protected $str;

    public function __construct() {
        $this->db = \Config\Database::connect();
    }
    
    public function InsertData($table,$data=[]) {
        $builder = $this->db->table($table);
        if ($builder->insert($data)) {
            return $this->db->insertID();
        }

        return false;
    }

    public function GetUsers() {
        $str = "SELECT RecID, full_name FullName, user_name UserName, user_status UserStatus FROM tbl_user_access;";
        
        $query = $this->db->query($str);

        return $query->getResultArray();
    }

    public function GetLatestUserCount() {
        $str = "SELECT COUNT(RecID) user_counter FROM tbl_user_access";
        
        $query = $this->db->query($str);

        $result = $query->getRowArray();

        return isset($result['user_counter']) ? $result['user_counter'] : 0;
    }

    public function ValidateUserName($UserName) {
        $str = "SELECT COUNT(1) existing FROM tbl_user_access WHERE user_name = '$UserName'";

        $query = $this->db->query($str);

        $row = $query->getRow();

        return $row->existing;
    }

    public function ValidateUserEmail($UserEmail) {
        $str = "SELECT COUNT(1) existing FROM tbl_user_access WHERE user_email = '$UserEmail'";

        $query = $this->db->query($str);

        $row = $query->getRow();

        return $row->existing;
    }
}
