<!DOCTYPE html>
<?php
/*user_id
name
userName
pw
salt
hashpw
user_type
is_admin
email
location*/

    error_reporting(E_ALL);
    ini_set('display_errors', 1);
    //echo phpinfo();

    //New connection to the database
    $connection = new MongoClient();

    //Handle to the ocdx database
    $db = $connection->ocdx;

    //Handle to the collection
    $user_collection = $db->user;

    //Retrieve all documents
    /*foreach($cursor as $documents){
        echo "<strong>UserID: </strong>", $document["user_id"], ";" . "\n"
    }*/

    $cursor = $user_collection->find();
    foreach ( $cursor as $id => $value )
    {   
        echo "$id: ";
        var_dump( $value );
    }
?>
<html>
	<head>
		<!--  I USE BOOTSTRAP BECAUSE IT MAKES FORMATTING/LIFE EASIER -->
		<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.5/css/bootstrap.min.css"><!-- Latest compiled and minified CSS -->
		<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.5/css/bootstrap-theme.min.css"><!-- Optional theme -->
		<script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.5/js/bootstrap.min.js"></script><!-- Latest compiled and minified JavaScript -->
		<style>
		#logincontainer{				
			margin-top: 50px;
			padding-left: 50px;
			padding-right: 50px;
			border: 8px solid gold;
			border-radius: 30px;
			background-color: black;
			text-align: center;
			color: white;


		}

		</style>
	</head>
	<body>
		<div class="container">
			<div class="row">				
				<div id = "logincontainer" class="col-md-7 col-sm-7 col-xs-8 col-lg-offset-2">
					<h2>CS4320 Group 9 Login</h2>					
					<form action="/final/login.php" method="POST">
						<div class="row form-group">
							<input class='form-control' type="text" name="username" placeholder="Username">
						</div>
						<div class="row form-group">
							<input class='form-control' type="password" name="password" placeholder="Password">
						</div>
						<div class="row form-group">
								<input class=" btn btn-default btn-lg" type="submit" name="login" value="Login"/>
						</div>						
					</form>
				</div>
			</div>			
		</div>
	</body>
</html>