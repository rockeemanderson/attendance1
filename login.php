<?php
    $title = 'Login';

    require_once 'includes/header.php'; 
    require_once 'db/conn.php';

        

//IF DATA WAS SUBMITTED VIA FORM POST REQUEST THEN..... 

if($_SERVER['REQUEST_METHOD']=='POST'){
    $username = strtolower(trim($_POST['username']));
    $password = $_POST['password'];
    $new_password = md5($password.$username);

    $result= $admin->getAdmin($username,$new_password);
    if (!$result){
        echo '<div class="alert alert-danger">Username or Password is incorrect! Please try again.</div>';
    }else{
       
        $_SESSION['username'] = $username;
        $_SESSION['admin_id'] = $result['admin_id'];
        header("Location: edituser.php");
       
       
    }

}
?>

<section class="features-icons bg-light text-center">
    <div class="container"> <h1 class="text-center"><?php echo $title?></h1>
<!--
.icon-graduation,
    -->

        <form action="<?php echo htmlentities($_SERVER['PHP_SELF']);?>" method="post">
            <table class="table table-sm">
                <tr>
                    <td><label for="username">Username: *</label></td>
                    <td><input type="text" name = "username" class="form-control" id="username" value="<?php if($_SERVER['REQUEST_METHOD']=='POST') echo $_POST['username'];?>">
                    </td>
                </tr>
                <tr>
                    <td><label for ="password"> Password: * </label></td>
                    <td><input type="password" name="password" class="form-control" id="password">
            </table><br/><br/>
            <input type="submit" value="login" class="btn btn-primary btn-block"><br/>
            <a href="#"  on click = "">Forgot Password </a>

        </form><br/><br/>
    </div>
</section>



<?php include_once 'includes/footer.php'?>
