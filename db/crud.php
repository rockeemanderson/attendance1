<?php 

class crud{

        private $db;

        function __construct($conn){
            $this->db=$conn;
        }

        public function insertAttendees($fname, $lname, $specialty, $dob, $email, $phone){
            try {
                $sql = "INSERT INTO attendee (fname, lname, specialty_id, dob,email,phone) VALUES(:fname, :lname, :specialty, :dob, :email, :phone)";
                $stmt = $this-> db->prepare($sql);

                $stmt->bindparam(':fname',$fname);
                $stmt->bindparam(':lname',$lname);
                $stmt->bindparam(':specialty',$specialty);
                $stmt->bindparam(':dob',$dob);
                $stmt->bindparam(':email',$email);
                $stmt->bindparam(':phone',$phone);
                

                $stmt->execute();
                return true;

            } catch (PDOException $e) {
                echo $e->getMessage();
                return false;

            }


            
        }

        public function editAttendees($id, $fname, $lname, $specialty, $dob, $email, $phone){
            
            
            try {
                $sql = "UPDATE `attendee` SET `fname`=:fname,`lname`=:lname,`specialty_id`=:specialty,`dob`=:dob,`email`=:email,`phone`=:phone WHERE attendee_id = :id";
                $stmt = $this-> db->prepare($sql);
                $stmt->bindparam(':id',$id);
                $stmt->bindparam(':fname',$fname);
                $stmt->bindparam(':lname',$lname);
                $stmt->bindparam(':specialty',$specialty);
                $stmt->bindparam(':dob',$dob);
                $stmt->bindparam(':email',$email);
                $stmt->bindparam(':phone',$phone);
        
                $stmt->execute();
                return true;

            } catch (PDOException $e) {
                echo $e->getMessage();
                return false;
            }
        }

        public function getAttendees(){
            try{
                
                $sql = "SELECT * FROM `attendee` a inner join specialties s on a.specialty_id = s.specialty_id";
                $result = $this->db->query($sql);
                return $result;
            }catch (PDOException $e) {
                echo $e->getMessage();
                return false;
            }
                
        
        }
        
        public function deleteAttendee($id)
        {
            try{
               $sql = "DELETE FROM `attendee` WHERE `attendee`.`attendee_id` = :id";
               //$sql = "delete from attendee where attendee_id = :id"; 
               $stmt = $this-> db->prepare($sql);
                $stmt->bindparam(':id',$id);
                $stmt->execute();
                return true;

            }catch (PDOException $e) {
                echo $e->getMessage();
                return false;
            }
                
            }
           
        

        public function getAttendeeDetails($id){
            try{
                $sql = "select * from attendee a inner join specialties s on a.specialty_id = s.specialty_id where attendee_id";
                $stmt = $this->db->prepare($sql);
                $stmt ->bindparam(':id',$id);
                $stmt->execute();
                $result = $stmt->fetch();
                return $result;
                    }catch (PDOException $e) {
                        echo $e->getMessage();
                        return false;
        }
            
        
        }

        public function getSpecialties(){
        try{
            $sql = "SELECT * FROM `specialties`";
            $result = $this->db->query($sql);
            return $result;

        }catch (PDOException $e) {
            echo $e->getMessage();
            return false;
        }

        }



        
    }
?>