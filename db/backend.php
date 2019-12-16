<?php

class backend{
    private $db;

        function __construct($conn){
            $this->db=$conn;
        }


    public function insertAdmin($username,$password){
        try {
                $result = $this->getAdminbyUsername($username);
                if ($result['num']>0){
                    return false;

                }else{
                $new_password=md5($password.$username);

                $sql = "INSERT INTO backend (username,password) VALUES(:username, :password)";
                $stmt = $this-> db->prepare($sql);

                $stmt->bindparam(':username',$username);
                $stmt->bindparam(':password',$new_password);
                               

                $stmt->execute();   
                return true;
                }

            } catch (PDOException $e) {
                echo $e->getMessage();
                return false;

            }
            
        }

    

    public function getAdmin($username,$password){
        try{
                $sql = "SELECT * from `backend` where username = :username AND password = :password";
                $stmt = $this->db->prepare($sql);
                $stmt ->bindparam(':username',$username);
                $stmt ->bindparam(':password',$password);
                $stmt->execute();
                $result = $stmt->fetch();
                return $result;
                    }catch (PDOException $e) {
                        echo $e->getMessage();
                        return false;
        }
    }

    public function getAdminbyUsername($username){
        try{
            $sql = "SELECT count(*) as num from backend where username = :username";
            $stmt = $this->db->prepare($sql);
            $stmt ->bindparam(':username',$username);

            $stmt->execute();
            $result = $stmt->fetch();
            return $result;
                }catch (PDOException $e) {
                    echo $e->getMessage();
                    return false;
    }

    }



}
?>
