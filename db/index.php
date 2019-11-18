<?php
    $title = 'Index';
    require_once 'includes/header.php'; 
    require_once 'db/conn.php';
?>

    <h1 class="text-center">Registration Form for IT Conference </h1>

    <form method="post" action="success.php">
            <!--
            -fname
            lname
            dob (date picker)
            specialty
            email address
            contact
            -->
            

    <div class="form-group">
        <label for="fname">First Name</label>
        <input type="text" class="form-control" id="lname" name="fname">
    </div>

    <div class="form-group">
        <label for="lname">Last Name</label>
        <input type="text" class="form-control" id="fname" name="lname">
    </div>

    <div class="form-group">
        <label for="dob">Date of Birth</label>
        <input type="text" class="form-control" id="dob" name="dob">
    </div>

    <div class= "form-group">
        <label for = "speciality"> Expert in:</label>
            <select class="form-control" id="specialty" name="specialty">
            <option value ="1">Database Admin</option>
            <option >Network Admin</option>
            <option >System Admin</option>
            <option >Web Admin</option>
            <option>Other</option>
            </select>
    </div>

    <div class="form-group">
        <label for="email">Email address</label>
        <input type="email" class="form-control" id="email" name="email" aria-describedby="emailHelp" placeholder="Enter email">
        <small id="emailHelp" class="form-text text-muted">We'll never share your email with anyone else.</small>
    </div>

    <div class="form-group">
        <label for="phone">Phone Number</label>
        <input type="text" class="form-control" id="phone" name="phone" aria-describedby="phoneHelp" placeholder="Enter phone number">
        <small id="phoneHelp" class="form-text text-muted">We'll never share your number with anyone else.</small>
    </div>
  
  
  <button type="submit" name="submit" class="btn btn-primary btn-block">Submit</button>

    </form>
    <br>
    <br>
    <br>

<?php require_once 'includes/footer.php'; ?>