<?php
    $title = 'Success';
    require_once 'includes/header.php'; 
    require_once 'db/conn.php';

    if(isset($_POST['submit'])){
      $fname = $_POST['fname'];
      $lname = $_POST['lname'];
      $specialty = $_POST['specialty'];
      $dob = $_POST['dob'];
      $email = $_POST['email'];
      $phone = $_POST['phone'];
      
      $isSuccess = $crud->insertAttendees($fname, $lname, $specialty, $dob, $email, $phone);

      if($isSuccess){
        echo'<h1 class= "text-center text-success"> Registration Successful </h1>';
        SendEmail::sendMail($email, 'New User Registration','Thanks for registering '.$fname. ' '.$lname.'. We look forward to your experience in '.$specialty.'.');

      }else{

        echo'<h1 class= "text-center text-dange"> Registration Failure </h1>';

      }

    }
?>


<div class="card" style="width: 18rem;">
  <div class="card-body">
    <h5 class="card-title"><?php echo $_POST['fname'] . ' ' .$_POST['fname'];?></h5>
    <h6 class="subtitle mb-2 text-muted"><?php  echo $_POST['specialty']; ?></h6>
    <p class="card-text">Date of Birth:<?php  echo $_POST['dob']; ?></p>
    <p class="card-text">Email Address: <?php  echo $_POST['email'];  ?></p>
    <p class="card-text">Phone Number: <?php  echo $_POST['phone']; ?></p>
  </div>
</div>

<?php
?>


<br>
    <br>
    <br>

<?php require_once 'includes/footer.php'; ?>