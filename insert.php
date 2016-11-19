<?php
    session_start(); 
    $_SESSION["response"] = "changing response from insert.php";
    // connect to mongodb
    $m = new MongoClient();	
    // select a database
    $db = $m->ocdx;
    //echo "Database mydb selected";
    $collection = $db->manifest;
    //echo "Collection selected succsessfully";
    
    $uploadOk = 1;
    $uploaddir = '/var/www/files/';
    $uploadfile = $uploaddir . basename($_FILES['manifest']['name']);
    
    if (file_exists($uploadfile)) {
        $_SESSION["response"] = "Sorry, file already exists.";
        //echo "Sorry, file already exists.";
        $uploadOk = 0;
    }
    else if (filesize($uploadfile) > 15000){
        $_SESSION["response"] = "Sorry, your file is too big to upload.";
    }
    else if ($uploadOk == 0) {
        $_SESSION["response"] = "Sorry, your file was not uploaded.";
        // if everything is ok, try to upload file
    } else {
        if (move_uploaded_file($_FILES["manifest"]["tmp_name"], $uploadfile)) {
            $_SESSION["response"] = "The file ". basename( $_FILES["manifest"]["name"]). " has been uploaded.";
        } else {
            $_SESSION["response"] = "Sorry, there was an error uploading your file.";
        }
    }



    //Upload contents to the MongoDB
    $contents = file_get_contents($_FILES['manifest']['tmp_name']);
    $json = json_decode($contents);   
	
    $collection->insert($json); 
    
    header('Location: http://ec2-52-15-52-224.us-east-2.compute.amazonaws.com/upload.php'); 
?>