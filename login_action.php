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
            echo "Your Email or password was incorrect.";
			echo "<br>";
			echo "Click <a href='register.php'>Register</a> to create a new account or <a href='login.php'>Login</a> if you already have an account.";
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
                    echo "Your Email or password was incorrect.";
                    echo "<br>";
                    //echo $pass . "<br>";
                    //echo $upass . "<br>";
                    
                    echo "Click <a href='register.php'>Register</a> to create a new account or <a href='login.php'>Login</a> if you already have an account.";
                }
                
            
        
        }
    }

    

?>