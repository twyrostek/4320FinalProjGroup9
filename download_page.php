<!DOCTYPE html>
<html lang="en">
<?php require_once 'dbConnect.php'; ?>
<?php require_once 'miniApi.php'; ?>
<?php
        if(chkLogin()==false){
        header("Location: login.php");
    }
?>

<?php
    session_start(); 
    error_reporting(E_ALL);
    ini_set('display_errors', 1);
    //session_start();
    
    //$_SESSION["response"] = "test";
    
    //New connection to the database
    $connection = new MongoClient();

    //Handle to the ocdx database
    $db = $connection->ocdx;

    //Handle to the collection
    $manifest_collection = $db->manifest;

    $cursor = $manifest_collection->find();
?>

<head>

    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, shrink-to-fit=no, initial-scale=1">
    <meta name="description" content="">
    <meta name="author" content="">

    <title>OCDX Download Manifest</title>

    <link rel="stylesheet" type="text/css" href="style.css">
    
    <!-- Bootstrap Core CSS -->
    <link href="css/bootstrap.min.css" rel="stylesheet">

    <!-- Custom CSS -->
    <link href="css/simple-sidebar.css" rel="stylesheet">

    <!-- HTML5 Shim and Respond.js IE8 support of HTML5 elements and media queries -->
    <!-- WARNING: Respond.js doesn't work if you view the page via file:// -->
    <!--[if lt IE 9]>
        <script src="https://oss.maxcdn.com/libs/html5shiv/3.7.0/html5shiv.js"></script>
        <script src="https://oss.maxcdn.com/libs/respond.js/1.4.2/respond.min.js"></script>
    <![endif]-->

</head>

<body>

    <div id="wrapper">

        <!-- Sidebar -->
        <?php include 'navbar.php';?>
        <!-- /#sidebar-wrapper -->

        <!-- Page Content -->
        <div id="page-content-wrapper">
            <div class="container-fluid">
                <div class="row">
                    <div class="col-lg-12">
                        <h1>Download Manifest</h1>
                        <p>
                        <div>
                                <h1>List of files:</h1>
                                    <?php 
                                        /*
                                        if(isset($_SESSION["files_present"])){
                                        echo $_SESSION["files_present"];
                                        unset($_SESSION["files_present"]);
                                        }
                                        
                                        echo $list; 
                                        */  
                                    ?>
                                
                                <ul><?php 
                                        $dir = '/var/www/files/';
                                        if ($handle = opendir('/var/www/files/')) {
                                            while (false !== ($entry = readdir($handle))) {
                                                if ($entry != "." && $entry != "..") {
                                                    echo "<li><a href=\"download.php?download_file="."$entry\">$entry</a>";
                                                }
                                            }
                                        closedir($handle);
                                        }
                                        
                                    ?></ul> 
                            
                                    
                        </div>    
                        <div>
                            
                        </div>
                        </p>
                    </div>
                </div>
            </div>
            <a href="#menu-toggle" class="btn btn-default" id="menu-toggle">Toggle Menu</a>
        </div>
        <!-- /#page-content-wrapper -->

    </div>
    <!-- /#wrapper -->

    <!-- jQuery -->
    <script src="js/jquery.js"></script>

    <!-- Bootstrap Core JavaScript -->
    <script src="js/bootstrap.min.js"></script>

    <!-- Menu Toggle Script -->
    <script>
    $("#menu-toggle").click(function(e) {
        e.preventDefault();
        $("#wrapper").toggleClass("toggled");
    });
    </script>

</body>

</html>
