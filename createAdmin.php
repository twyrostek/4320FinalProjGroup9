<?php require_once 'dbConnect.php'; ?>
<?php require_once 'miniApi.php'; ?>

<?php
    
    $query = chkemail("admin@admin.com");
    if($query){
        


        $options = array('cost' => 10);
        $temp = "admin";
        $pass = password_hash($temp, PASSWORD_BCRYPT, $options);
        $admin = array(
            
            "name" => "admin",
            "email" => "admin@admin.com",
            "pw"      => $pass,
            "is_admin" => "yes"
            
        
        );
        register($admin);
       // echo "<script type='text/javascript'>alert('Admin created');</script>";

        header("Location: login.php");
    }else{
       // echo "<script type='text/javascript'>alert('Admin already exists');</script>";
        header("Location: login.php");
    }
}
?>