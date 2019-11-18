<?php
// get values from post opps

//$title = 'Success';
//require_once 'includes/header.php'; 
require_once 'db/conn.php';

if(isset($_POST['submit'])){
    //extract value
    $id = $_POST['id'];  
    $fname = $_POST['fname'];
    $lname = $_POST['lname'];
    $specialty = $_POST['specialty'];
    $dob = $_POST['dob'];
    $email = $_POST['email'];
    $phone = $_POST['phone'];

//call crud function

$result =$crud->editAttendees($id, $fname, $lname, $specialty, $dob, $email, $phone);


//redirect to index.php
if ($result){
    header("Location: viewrecords.php");
    }else{
            //echo 'error';
            include 'includes/errormessage.php';
            header("Location: viewrecords.php");
        }

    }else{
            //echo 'error';
            include 'includes/errormessage.php';

}

?>