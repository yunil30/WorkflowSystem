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

    public function GetLatestUserCount() {
        $str = "SELECT COUNT(RecID) user_counter FROM tbl_user_access";
        
        $query = $this->db->query($str);

        $result = $query->getRowArray();

        return isset($result['user_counter']) ? $result['user_counter'] : 0;
    }
}
