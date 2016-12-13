<!DOCTYPE html>
<html>
<head>
<title>Login</title>

 <link rel="stylesheet" type="text/css" href="style.css">
 <link href="css/bootstrap.min.css" rel="stylesheet">
 <link href="css/simple-sidebar.css" rel ="stylesheet">

</head>
<body>

    <video playsinline autoplay muted loop poster="images/PC-Typing.jpg" id="bgvid">
      <source src="images/PC-Typing.webm" type="video/webm">
      <source src="images/PC-Typing.mp4" type="video/mp4">
    </video>

    <img src="images/ocdxlogo.png" alt="logo" class="displayed">
        <div class="container" align="center">
            <form class="form-horizontal" style= "width:500px;" method="post" action="login_action.php">
                <div class="form-group" >
                    <label class="sr-only" for="exampleInputEmail3">Email address</label>
                    <input type="email" class="form-control" id="exampleInputEmail3" name="email" placeholder="Email" required>
                </div>
                <div class="form-group">
                    <label class="sr-only" for="exampleInputPassword3">Password</label>
                    <input type="password" class="form-control" id="exampleInputPassword3" name="pass" placeholder="Password" required>
                </div>
                <button type="submit" name="login" class="button buttonLogin">Sign in</button>

            </form>
            <form action="register.php">
                <input type="submit" class="button buttonLogin" value="Register" />
            </form>



        </div>






</body>
</html>
