<?php

namespace App\Models;

use CodeIgniter\Model;

class UserModel extends Model {
    protected $db;
    protected $str;

    public function __construct() {
        $this->db = \Config\Database::connect();
    }
    
    public function InsertData($table, $data=[]) {
        $builder = $this->db->table($table);

        return $builder->insert($data);
    }

    public function UpdateData($where=[], $table, $data=[]) {
        $builder = $this->db->table($table);

        return $builder->where($where)->update($data);
    }

    public function GetActiveUsers() {
        $str = "SELECT RecID, first_name FirstName, middle_name MiddleName, last_name LastName, user_name UserName, user_status UserStatus 
                    FROM tbl_user_access 
                WHERE user_status = 1";
        
        $query = $this->db->query($str);

        return $query->getResultArray();
    }

    public function GetInactiveUsers() {
        $str = "SELECT RecID, first_name FirstName, middle_name MiddleName, last_name LastName, user_name UserName, user_status UserStatus 
                    FROM tbl_user_access 
                WHERE user_status = 0";
        
        $query = $this->db->query($str);

        return $query->getResultArray();
    }

    public function GetUserRecord($UserID, $UserName) {
        $str = "SELECT * FROM tbl_user_access WHERE RecID = ? AND user_name = ?";
        
        $query = $this->db->query($str, [$UserID, $UserName]);

        return $query->getResultArray();
    }

    public function GetLatestUserCount() {
        $str = "SELECT COUNT(RecID) user_counter FROM tbl_user_access";
        
        $query = $this->db->query($str);

        $result = $query->getRowArray();

        return isset($result['user_counter']) ? $result['user_counter'] : 0;
    }

    public function ValidateUserName($UserName) {
        $str = "SELECT COUNT(1) existing FROM tbl_user_access WHERE user_name = ?";

        $query = $this->db->query($str, [$UserName]);

        $row = $query->getRow();

        return $row->existing;
    }

    public function ValidateUserEmail($UserEmail) {
        $str = "SELECT COUNT(1) existing FROM tbl_user_access WHERE user_email = ?";

        $query = $this->db->query($str, [$UserEmail]);

        $row = $query->getRow();

        return $row->existing;
    }

    public function GetDocument($DocumentID) {
        $str = "SELECT * FROM tbl_file WHERE RecID = ?";
        
        $query = $this->db->query($str, [$DocumentID]);

        return $query->getResultArray();
    }
}
