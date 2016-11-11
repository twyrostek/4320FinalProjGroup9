    
<!--include external functions-->
<?php require_once 'dbConnect.php'; ?>
<?php require_once 'miniApi.php'; ?>
    
<!--check if session is active-->    
<?php
    
    if(chkLogin()){
        header("Location: login.php");
    }
?>
<?php
    
   if(isset($_POST['reg'])){
       
        $fname = $_POST['fname'];
        $lname = $_POST['lname'];
        $email = $_POST['email'];
        $temp  = $_POST['pass'];
        $options = array('cost' => 10);
        $pass = password_hash($temp, PASSWORD_BCRYPT, $options);
    
        $newUser = array(
            
            "name" => $fname ." ". $lname,
            "email" => $email,
            "pw"      => $pass,
            "is_admin" => "yes"
            
        
        );
        
        $query = chkemail($email);
        if($query){
            register($newUser);
            header("Location: login.php");
            }
       else{
        echo "Email already registered!";
           echo"<br>";
        echo "Please <a href='register.php'>Register</a> with another email ";
       }
}




 /*   
db.user.insert({
    "user_id": "18132351",
    "name": "Jon Doe",
    "user_type": "researcher",
    "email": "jdoe@notarealemail.com",
    "location": "Columbia, MO"
}) 
*/
?>