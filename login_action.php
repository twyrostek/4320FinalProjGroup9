<?php require_once 'dbConnect.php'; ?>
<?php require_once 'miniApi.php'; ?>
<?php
    
    if(chkLogin()){
        header("Location: index.php");
    }
?>
<?php

    if(isset($_POST['login'])){
//        print_r($_POST);
      
        
        $email = $_POST['email'];
        $upass = $_POST['pass'];
        $criteria = array("email"=> $email);
        $query = $collection->findOne($criteria);
        //var_dump($query);
        if(empty($query)){
            echo "Email ID is not registered.";
            echo "Either <a href='register'>Register</a> with the new Email ID or <a href='login.php'>Login</a> with an already registered ID";
        }
        else{
            
                $pass = $query["pw"];
                if(password_verify($upass,$pass)){
                //if($pass == $upass)
                    $var = setsession($email);
//                    echo"<pre>";   
                    print_r($pass);
                  
                    
                    if($var){
                        
                    header("Location: index.php");
                    }
                    else{
                        echo "Some error";
                    }
                }
                else{
                    echo "You have entered a wrong password";
                    echo "<br>";
                    echo $pass . "<br>";
                    echo $upass . "<br>";
                    
                    echo "Either <a href='register'>Register</a> with the new Email ID or <a href='login.php'>Login</a> with an already registered ID";
                }
                
            
        
        }
    }
    

?>