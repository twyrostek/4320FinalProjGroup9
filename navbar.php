<nav class="navbar navbar-inverse">
    <div class="container-fluid">
        <div class="navbar-header">
            <button type="button" class="navbar-toggle" data-toggle="collapse" data-target="#Navbar">
                <span class="icon-bar"></span>
                <span class="icon-bar"></span>
                <span class="icon-bar"></span>
            </button>
            <a class="navbar-brand" href=" ">OCDX eXchange</a>
        </div>
        <div class="collapse navbar-collapse" id = "Navbar">
            <ul class="nav navbar-nav">

                <li><a href=" ">Search</a></li>

                <li class="dropdown">
                  <a class="dropdown-toggle" data-toggle="dropdown" href="">Browse Manifest<span class="caret"></span></a>
                  <ul class="dropdown-menu">
                    <li><a href=" ">Create New Manifest</a></li>
                    <li><a href=" ">View Manifest</a></li>
                  </ul>
                </li>



                <?php
                  if ($_SESSION["permission_id"] == 'admin'){ //Only display these menu options if admin
                ?>

                    <li class="dropdown">
                        <a class="dropdown-toggle" data-toggle="dropdown" href="#">Monitor Manifest<span class="caret"></span></a>
                        <ul class="dropdown-menu">
                            <li><a href=" ">New Dataset Change</a></li>
                            <li><a href=" ">New Upload Instance</a></li>
                            <li><a href=" ">New Download Instance</a></li>
                        </ul>
                    </li>

                    <li class="dropdown">
                        <a class="dropdown-toggle" data-toggle="dropdown" href="#">Monitor User<span class="caret"></span></a>
                        <ul class="dropdown-menu">
                            <li><a href=" ">View Login/Logout</a></li>
                            <li><a href=" ">Grant Admin Privileges</a></li>
                        </ul>
                    </li>

                <?php
                  }
                 ?>
              </ul>

                 <ul class="nav navbar-nav navbar-right">
                   <li><a href=" "><span class="glyphicon glyphicon-log-in"></span> Login</a></li>
                   <li><a href=" "><span class="glyphicon glyphicon-log-out"></span> Logout</a></li>
                 </ul>
        </div>
</nav>
