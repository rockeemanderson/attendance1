<?php
    $title = 'View Records';
    require_once 'includes/header.php'; 
    require_once 'db/conn.php';
    $results = $crud->getAttendees();
  
   
?>

    <table class="table">
        <thead class = "thead-dark">
                <tr>
                    <th>#</th>
                    <th>First Name</th>
                    <th>Last Name</th>
                    <th>Specialty</th>
                    <th>Actions</th>                
                </tr>
            </thead>
            
            <?php 
                while ($r = $results->fetch(PDO::FETCH_ASSOC)) {?>
            <tr> 
                    <td> <?php echo $r['attendee_id'] ?></td>
                    <td> <?php echo $r['fname'] ?></td>
                    <td> <?php echo $r['lname'] ?></td>
                    <td> <?php echo $r['name'] ?></td>
                    
                    <td>
                        <a href="view.php?id=<?php echo $r['attendee_id'] ?>" class="btn btn-dark">View</a>
                        <a href="edit.php?id=<?php echo $r['attendee_id'] ?>" class="btn btn-warning">Edit</a>
                        <a onclick="rturn confirm('Are you sure you want to delete this record?');" href="delete.php?id=<?php echo $r['attendee_id'] ?>" class="btn btn-danger">Delete</a>
                        
                    </td>
            </tr>
                <?php } ?>

    </table>


<br>
<br>
<br>

<?php require_once 'includes/footer.php'; ?>