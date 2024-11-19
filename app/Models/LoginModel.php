<?php

namespace App\Models;

use CodeIgniter\Model;

class LoginModel extends Model {
    protected $db;
    protected $str;

    public function __construct() {
        $this->db = \Config\Database::connect();
    }

    public function GetActiveUsers() {
        $str = "SELECT RecID, first_name FirstName, middle_name MiddleName, last_name LastName, user_name UserName, user_status UserStatus 
                    FROM tbl_user_access 
                WHERE user_status = 1";
        
        $query = $this->db->query($str);

        return $query->getResultArray();
    }
}
