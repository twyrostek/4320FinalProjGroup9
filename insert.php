<?php
    // connect to mongodb
    $m = new MongoClient();
    //echo "Connection to database successfully";
	
    // select a database
    $db = $m->ocdx;
    //echo "Database mydb selected";
    $collection = $db->manifest;
    //echo "Collection selected succsessfully";
	
    
    
    //$fileName = realpath($_FILES["manifest"]["tmp_name"]);
    //echo "<script type= 'text/javascript'> alert('$fileName'); </script>";
    
    $contents = file_get_contents($_FILES['manifest']['tmp_name']);
    $bson = bson_encode($contents);
    //echo "<script type= 'text/javascript'> alert('$contents'); </script>";
    //echo $contents;
    
    //$bson = MongoDB\BSON\fromJSON($contents);    
    echo $bson;
    
    //echo "<script type= 'text/javascript'> alert('$bson'); </script>";
    //$document = $bson;
	
    $collection->insert($bson);
    //echo "Document inserted successfully";
?>