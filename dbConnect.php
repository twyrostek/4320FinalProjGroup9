<?php
    try{
    $m = new MongoClient();
     //echo "Connection to database Successfull!";echo"<br />";

    $db = $m->ocdx;
    //echo "Databse loginreg selected";
    $collection = $db->user; 
    //echo "Collection userdata Selected Successfully";
    }
    catch (Exception $e){
        die("Unable to connect");
    }
       session_start();
?>