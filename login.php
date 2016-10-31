<!DOCTYPE html>
<?php
        session_start();
        if(isset($_SESSION['username']))//If they're already logged in
        {
          header("Location: index.php");
        }
        if (!isset($_SERVER['HTTPS']) || !$_SERVER['HTTPS'])
        { // if request is not secure, redirect to secure url
             $url = 'https://'.$_SERVER['HTTP_HOST'].$_SERVER['REQUEST_URI'];
             header('Location: ' . $url);
        }
?>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.5/css/bootstrap.min.css">
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.5/css/bootstrap-theme.min.css">
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.12.2/jquery.min.js"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.5/js/bootstrap.min.js"></script>
    </head>

    <body>
        <div class="container-fluid">
            <br>
            <br>
            <div class="row text-center">
              <?php

              switch ($_SESSION["fail"])//Checks for fail flags
              {
                case '-1'://All Database errors
                  ?>
                  <div class="alert alert-danger">Could not log in.</div>
                  <?php
                break;

                case 'nousername':
                  ?>
                  <div class="alert alert-warning">You must enter a username.</div>
                  <?php
                break;

                case 'invalidusername':
                  ?>
                  <div class="alert alert-warning">You have entered an invaid username.</div>
                  <?php
                break;

                case 'nopassword':
                  ?>
                  <div class="alert alert-warning">You must enter a password.</div>
                  <?php
                break;

                case 'invalidpassword':
                  ?>
                  <div class="alert alert-warning">You have entered an invalid password.</div>
                  <?php
                break;

                case 'usernotfound':
                  ?>
                  <div class="alert alert-warning">User not Found.</div>
                  <?php
                break;

                case 'invalid':
                  ?>
                  <div class="alert alert-warning">Invalid Username or Password.</div>
                  <?php
                break;

                default:
                  break;
              }
              unset($_SESSION["fail"]);
               ?>
          <h1>Login</h1>
          <!-- Will send user to a attemptLogin page.
					If login is succsessful, page will redirect to index, otherwise it will redirect here with an error message-->
                <form action="attemptLogin2.php" method="POST" class="col-md-4 col-md-offset-5">
                    <div class="row">
                        <div class="input-group">
                            <div class="form-group">
                                <label class="inputdefault">Username</label>
                                <input class="form-control" type="text" name="username" placeholder="username">
                            </div>
                            <div class="form-group">
                                <label class="inputdefault">Password</label>
                                <input class="form-control" type="password" name="password" placeholder="password">
                            </div>
                            <div class="form-group">
                                <input class="btn btn-info" type="submit" name="submit" value="Log In">
                            </div>
                        </div>
                    </div>

                </form>

            </div>
            <h3 class="text-center">To test system, use username "admin" and password "pass" for admin access</h3>
            <h3 class="text-center">Use "test" and "pass" for non-admin access</h3>
        </div>
    </body>
<?php include("mitlicense.php"); ?>

</html>
