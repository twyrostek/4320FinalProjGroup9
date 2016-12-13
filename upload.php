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

    <title>OCDX Upload Manifest</title>
    
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
                        <h1>Upload Manifest</h1>
                        <p>
                            <form action='insert.php' method='POST' enctype="multipart/form-data">
                                <input type='file' accept='.json' name='manifest'><br>
                                <input type='text' name='title' placeholder='Title'><br>
                                <input type='text' name='author' placeholder='Author'><br>
                                <input type='submit' name='upload_btn' value='Upload'>
                            </form>
                        <div>
                            <?php
                                
                                if(isset($_SESSION["response"])){
                                    echo $_SESSION["response"];
                                    unset($_SESSION["response"]);
                                }
                                //$_SESSION["response"] = "";
                            ?>
                        </div>
                        </p>
                    </div>
                </div>
            </div>
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
