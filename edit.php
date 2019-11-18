<?php
    $title = 'Edit Record';
    require_once 'includes/header.php'; 
    require_once 'db/conn.php';
    $results = $crud->getSpecialties();

    if(!isset($_GET['id']))
    {
        include 'includes/errormessage.php';
        header("Location: viewrecords.php");
        //echo 'error';
    }else{
        $id = $_GET['id'];
        $attendee=$crud->getAttendeeDetails($id);

    

    
?>

    <h1 class="text-center">Edit Record</h1>

    <form method="post" action="editpost.php">
    
    <div class="form-group">
    <input type= "hidden" name = "id" value="<?php echo $attendee['attendee_id']?>" />
        <label for="fname">First Name</label>
        <input type="text" class="form-control"  value="<?php echo $attendee['fname']?>" id="lname" name="fname">
    </div>

    <div class="form-group">
        <label for="lname">Last Name</label>
        <input type="text" class="form-control" value="<?php echo $attendee['lname']?>"id="lname" name="lname">
    </div>

    <div class="form-group">
        <label for="dob">Date of Birth</label>
        <input type="text" class="form-control" value="<?php echo $attendee['dob']?>" id="dob" name="dob">
    </div>

    <div class= "form-group">
        <label for = "speciality"> Expert in:</label>
            <select class="form-control" value="<?php echo $attendee['specialty']?>" id="specialty" name="specialty">
            <?php while($r = $results->fetch(PDO::FETCH_ASSOC)) {?>
            <option value="<?php echo $r['specialty_id'] ?>" <?php if($r['specialty_id'] ==  $attendee ['specialty_id']) echo 'selected' ?>>
            <?php echo $r['name']; ?>
            </option>


            <?php }?>
            </select>
    </div>

    <div class="form-group">
        <label for="email">Email address</label>
        <input type="email" class="form-control" value="<?php echo $attendee['email']?>" id="email" name="email" aria-describedby="emailHelp" placeholder="Enter email">
        <small id="emailHelp" class="form-text text-muted">We'll never share your email with anyone else.</small>
    </div>

    <div class="form-group">
        <label for="phone">Phone Number</label>
        <input type="text" class="form-control" value="<?php echo $attendee['phone']?>" id="phone" name="phone" aria-describedby="phoneHelp" placeholder="Enter phone number">
        <small id="phoneHelp" class="form-text text-muted">We'll never share your number with anyone else.</small>
    </div>
  
  
  <button type="submit" name="submit" class="btn btn-success">Save Changes</button>
  <a href="viewrecords.php" class="btn btn-default btn">Back to list</a>
  

    </form>

            <?php }?>
    <br>
    <br>
    <br>

<?php require_once 'includes/footer.php'; ?>