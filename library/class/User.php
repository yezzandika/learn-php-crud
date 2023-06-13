<?php
class User {
    protected $db;
    protected $table = 'users';

    ## OBJECT PROPERTIES ##
    public $id, $name, $username, $password;

    public function __construct($db) {
        $this->db = $db;
    }
    
    public function checkById() {
        $query = "SELECT *  FROM " . $this->table . " WHERE id = ?";
        $stmt = $this->db->prepare($query);
        //BIND VALUES
        $stmt->bind_param("i", $this->id);
        $stmt->execute();
        $result = $stmt->get_result();
        if($result->num_rows > 0){
            $user = $result->fetch_assoc();
            return $user;
        }
        return false;
    }

    public function checkByUsername() {
        $query = "SELECT *  FROM " . $this->table . " WHERE username = ?";
        $stmt = $this->db->prepare($query);
        //BIND VALUES
        $stmt->bind_param("s", $this->username);
        $stmt->execute();
        $result = $stmt->get_result();
        if($result->num_rows > 0){
            return true;
        }
        return false;
    }

    public function create()
    {
        $query = "INSERT INTO " . $this->table . "(name, username, password) VALUES (?,?,?)" ;
        $stmt = $this->db->prepare($query);
        //BIND VALUES
        $stmt->bind_param("sss", $this->name, $this->username, $this->password);
        if($stmt->execute()){
            return true;
        }
        return false;
    }

    public function update()
    {
        $query = "UPDATE `users` SET `name`= ?,`username`= ?,`password`= ? WHERE `id` = ?" ;
        $stmt = $this->db->prepare($query);
        //BIND VALUES
        $stmt->bind_param("sssi", $this->name, $this->username, $this->password, $this->id);
        if($stmt->execute()){
            return true;
        }
        return false;
    }

    public function delete()
    {
        $query = "DELETE FROM `users` WHERE `id` = ?" ;
        $stmt = $this->db->prepare($query);
        //BIND VALUES
        $stmt->bind_param("s", $this->id);
        if($stmt->execute()){
            return true;
        }
        return false;
    }

    public function register()
    {
        $query = "INSERT INTO " . $this->table . "(name, username, password) VALUES (?,?,?)" ;
        $stmt = $this->db->prepare($query);
        //BIND VALUES
        $stmt->bind_param("sss", $this->name, $this->username, $this->password);
        if($stmt->execute()){
            return true;
        }
        return false;
    }

    public function login(){
        $query = "SELECT * FROM " . $this->table . " WHERE username = ?";
        $stmt = $this->db->prepare($query);
        //BIND VALUES
        $stmt->bind_param("s", $this->username);
        $stmt->execute();
        $result = $stmt->get_result();
        if($result->num_rows > 0){
            $user = $result->fetch_assoc();
            if ($user['password'] == $this->password) {
                $_SESSION['user'] = $user; // set session $_SESSION['user']['id'] dengan id user
                return true;
            }
            return false;
        }
        return false;
    }

    public function get_all()
    {
        $query = "SELECT * FROM ". $this->table;
        $stmt = $this->db->prepare($query);
        //BIND VALUES
        $stmt->execute();
        $result = $stmt->get_result();
        if($result->num_rows > 0){
            $rows = [];
            while ($row = $result->fetch_assoc()) {
                $rows[] = $row;
            }
            return $rows;
        }
        return false;
    }
}