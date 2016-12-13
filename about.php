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
        
       <!-- <image id="data_exchange" src="images/dataexchange.png" alt="data_exchange"> -->
		
        <div id="page-content-wrapper">
			<div class="container-fluid">
				<div class="row">
					<div class="col-lg-12">
					   <h3>HOW OCDX CAME ABOUT</h3>
					   <hr>
					   <p>For matters pertinent to research, OCDX offers a platform for data sharing amongst students of science, from researchers to undergraduates seeking knowledge. For scientist, we serve as a central hub to publish research papers and accompanying data. This allows for not only researchers to see what other findings are within their field, but grants a viewing platform for investors and stakeholders to see the results of their funds. For students, we serve as a database of knowledge to accompany research papers or for the interested scholar. The purpose of the site is to offer an easy document sharing interchange between users, who either utilize the site for publishing their own works or viewing others. Only accredited and legitimate materials will be allowed on the site to maintain the integrity of the research.</p>
					</div>
				</div>
			</div>
		</div>
         <div id="socialMedia">
      <hr>
        <a href="https://www.instagram.com/sydbates6/"><img class="social-icon" src="images/Instagram.png"></a>
        <a href="https://twitter.com/SydBates6"><img class="social-icon" src="images/twitter.png"></a>
        <a href="https://www.facebook.com/sydney.bates.96?ref=bookmarks"><img class="social-icon" src="images/facebook-512.png"></a>
        <br>
      <hr>
     </div>
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
