<?php 

class crud{

        private $db;

        function __construct($conn){
            $this->db=$conn;
        }

        public function insert($fname, $lname, $specialty, $dob, $email, $phone ){
            try {
                $sql = "INSERT INTO attendee (fname,lname,specialty_id,dob,email,phone) VALUES (:fname,:lname,:specialty_id,:dob,:email,:phone)";
                $stmt = $this-> db->prepare($sql);

                $stmt->bindparam(':fname',$fname);
                $stmt->bindparam(':lname',$lname);
                $stmt->bindparam(':dob',$dob);
                $stmt->bindparam(':email',$email);
                $stmt->bindparam(':phone',$phone);
                $stmt->bindparam(':specialty_id',$specialty);

                $stmt->execute();
                return true;

            } catch (PDOException $e) {
                echo $e->getMessage();
                return false;

            }
            
        }
    }
?>