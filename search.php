<!DOCTYPE html>
<html>
<head>
<title>Search</title>


<!-- Latest compiled and minified CSS -->
    <!-- Bootstrap Core CSS -->
    <link href="css/bootstrap.min.css" rel="stylesheet">



    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.1.1/jquery.min.js"></script>
    
<!-- Latest compiled and minified JavaScript -->
<script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js" integrity="sha384-Tc5IQib027qvyjSMfHjOMaLkfuWVxZxUPnCJA7l2mCWNIpG9mGCD8wGNIcPD7Txa" crossorigin="anonymous"></script>
    
    


<!-- Custom CSS -->
    <link href="css/simple-sidebar.css" rel="stylesheet">
    <link rel="stylesheet" type="text/css" href="style.css">

</head>
<body>

	<div id="wrapper">
	
		<!-- Sidebar -->
        <?php include 'navbar.php';?>
		<!-- /#sidebar-wrapper -->
		
		<div class="page-content-wrapper">
			<div class="container-fluid">
				<div class="row">
					<div class="col-lg-12">
						<h1>Search Manifests/Users</h1>
						<form class="form-horizontal" method="get" action="#">
							<div class="form-group">
								<label class="sr-only" for="search"> Search </label>
								<input type="text" class="form-control" name="search" placeholder="Search">
							</div>
							<button type="submit" name="searchManifest">Search Manifest</button>
							<button type="submit" name="searchUser">Search User</button>
						</form>
					</div>
				</div>
			</div>
			
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
    
    

<?php require_once 'dbConnect.php'; ?>
<?php require_once 'miniApi.php'; ?>
   

<?php 

    
    if ($_SERVER['REQUEST_METHOD'] === 'GET') {
        //$query = $manifestCollection->find();
        echo "<div>" . $query . "</div>";
        //search manifests
    if (isset($_GET['searchManifest'])) {
        $search = $_GET['search'];
		$query = $manifestCollection->find();
       // print_r($document);
		foreach ($query as $document) {
           // print_r($document);
            $item = $document["title"];
            //print_r($item");
            //print_r($search);
            if($item == $search){
               echo "<div class='item' style='margin:50px;color:white;background-color:black;padding:20px;font-size:24px;border-radius:10px;'>";
                print_r($item);
                echo "<a href='http://ec2-52-15-52-224.us-east-2.compute.amazonaws.com/download.php?download_file=test2.json
'><button type='button' class='btn btn-default' style='margin-left:400px;'>Download</button></a></div>";
            }
			//echo "<div style='margin-left:500px;'>";
            //print_r($document["manifests"]["manifest"]["researchObject"]["title"]);
            //echo "</div>";
		}
        //search users
    } elseif (isset($_GET['searchUser'])) {
        $search = $_GET['search'];
		$query = $collection->find();
		foreach ($query as $document) {
            $item = $document["name"];
            if($item == $search){
			echo "<div style='margin-left:500px;'>" . $item . "</div>";
            }
        }
    } else {
		echo "<div style='margin-left:500px;'>" . "Please enter a search term" . "</div>";
	}
}

    
?>     

    
	
</body>
</html>
