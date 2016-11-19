<!DOCTYPE html>
<html>
<head>
<title>Search</title>


<!-- Latest compiled and minified CSS -->
<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css" integrity="sha384-BVYiiSIFeK1dGmJRAkycuHAHRg32OmUcww7on3RYdg4Va+PmSTsz/K68vbdEjh4u" crossorigin="anonymous">

<!-- Optional theme -->
<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap-theme.min.css" integrity="sha384-rHyoN1iRsVXV4nD0JutlnGaslCJuC7uwjduW9SVrLvRYooPp2bWYgmgJQIXwl/Sp" crossorigin="anonymous">

    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.1.1/jquery.min.js"></script>
    
<!-- Latest compiled and minified JavaScript -->
<script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js" integrity="sha384-Tc5IQib027qvyjSMfHjOMaLkfuWVxZxUPnCJA7l2mCWNIpG9mGCD8wGNIcPD7Txa" crossorigin="anonymous"></script>
    
    


<!-- Custom CSS -->
    <link href="css/simple-sidebar.css" rel="stylesheet">

</head>
<body>

	<div id="wrapper">
	
		<!-- Sidebar -->
		<div id="sidebar-wrapper">
            <ul class="sidebar-nav">
                <li class="sidebar-brand">
                    <a href="#">
                        OCDX eXchange
                    </a>
                </li>
                <li>
                    <a href="index.php">Dashboard</a>
                </li>
                <li>
                    <a href="#">Search</a>

                </li>
                <li>
                    <a href="#">View</a>
                </li>
                <li>
                    <a href="#">Create</a>
                </li>
                <li>
                    <a href="#">Settings</a>
                </li>
                <li>
                    <a href="#">Logout</a>
                </li>
                <li>
                    <a href="#">About</a>
                </li>
            </ul>
        </div>
		<!-- /#sidebar-wrapper -->
		
		<div class="container">
			<h1>Search Manifests/Users</h1>
			<form class="form-horizontal" method="get" action="#">
				<div class="form-group">
					<label class="sr-only" for="search"> Search </label>
					<input type="text" class="form-control" name="search" placeholder="Search">
				</div>
				<button type="submit" name="searchManifest">Search Manifest</button>
				<button type="submit" name="searchUser">Search User</button>
			</form>
			<a href="#menu-toggle" class="btn btn-default" id="menu-toggle">Toggle Menu</a>
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

    if (isset($_GET['searchManifest'])) {
		$query = $manifestCollection.find("manifest:{researchObject:{'title'}}");
		foreach ($query as $document) {
			echo "<div style='margin-left:500px;'>" . $document . "</div>";
		}
    } elseif (isset($_GET['searchUser'])) {
		$query = $collection->find();
		foreach ($query as $document) {
			echo "<div style='margin-left:500px;'>" . $document["name"] . "</div>";
        }
    } else {
		echo "<div style='margin-left:500px;'>" . "Please enter a search term" . "</div>";
	}
}

    
?>     

    
	
</body>
</html>
