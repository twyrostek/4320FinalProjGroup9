<?php
    session_start();
    function register($document){
        global $collection;
        $collection->insert($document);
        return true;
    }
    
    function chkemail($email){
        global $collection;
        $temp = $collection->findOne(array('email'=> $email));
        if(empty($temp)){
        return true;
        }
        else{
            return false;
        }
    }
    function setsession($email){
     
       
        
        $_SESSION["loggedIn"] = 1;
        global $collection;
        $temp = $collection->findOne(array('email'=> $email));
        $_SESSION["uname"] = $temp['name'];
        $_SESSION["email"] = $email;
        return true;
        
    }
    function chkLogin(){
        
        //var_dump($_SESSION);
        
        if($_SESSION["loggedIn"]== 1){
            return true;
        }
        else{
            return false;
        }
    }
    function removeall(){
        unset($_SESSION["loggedIn"]);
        unset($_SESSION["uname"]);
        unset($_SESSION["email"]);
        return true;
    }

?>