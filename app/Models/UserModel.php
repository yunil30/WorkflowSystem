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

    public function GetUserProfile($UserID, $UserName) {
        $str = 'SELECT 
                X.RecID,
                X.first_name AS FirstName,
                X.middle_name AS MiddleName,
                X.last_name AS LastName,
                X.user_name AS UserName,
                X.user_email AS UserEmail,
                X.user_role AS UserRole,
                Y.UserID,
                Y.folder_name AS FolderName,
                Y.pic_name AS PicName
            FROM tbl_user_access AS X
                LEFT JOIN tbl_profile_pic AS Y ON X.RecID = Y.UserID
            WHERE X.RecID = ? AND X.user_name = ?';

        $query = $this->db->query($str, [$UserID, $UserName]);

        return $query->getResultArray();
    }

    public function GetProfilePicture($UserID) {
        $str = 'SELECT                 
                X.UserID,
                X.folder_name AS FolderName,
                X.pic_name AS PicName
            FROM tbl_profile_pic X
                WHERE X.RecID = ?';

        $query = $this->db->query($str, [$UserID]);

        return $query->getResultArray(); 
    }
}
