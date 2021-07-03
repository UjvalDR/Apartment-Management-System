<?php
   ob_start();
   session_start();
   $page_title = 'Login Page';
   include ('connect_to_sql.php');
?>
<html lang="en">
<link rel="stylesheet" href="styles.css" type="text/css">
<link rel="stylesheet" type="text/css" href="css/demo.css" />
<link rel="stylesheet" type="text/css" href="css/style3.css" />
<script type="text/javascript" src="js/modernizr.custom.86080.js"></script>

<body id="page">
		 <ul class="cb-slideshow">
            <li><span>Image 01</span><div><h3>Hi !!!</h3></div></li>
            <li><span>Image 02</span><div><h3>Hello....</h3></div></li>
            <li><span>Image 03</span><div><h3>welcome</h3></div></li>
            <li><span>Image 04</span><div><h3>to</h3></div></li>
            <li><span>Image 05</span><div><h3>apartment</h3></div></li>
            <li><span>Image 06</span><div><h3>management</h3></div></li>
        </ul>
      
            <?php
            $msg = '';
          
           //logic to check if correct user id and password entered - Start()
            if (isset($_POST['login']) && !empty($_POST['username']) 
               && !empty($_POST['password'])) {
				
                $username=$_POST['username'];
                $password=$_POST['password'];
                $result = @mysqli_query($dbc, "select count(1),admin_name from members where username='$username' and password='$password'");
                $row = mysqli_fetch_array($result, MYSQLI_NUM);
                $noOfrecords=$row[0];
                $user=$row[1];
				
               if ($noOfrecords>0) {
                  $_SESSION['username'] = $username;
                  header('Location: home.php');  
               }else {
                  $msg = 'Wrong username or password';
               }
            }
          //logic to check if correct user id and password entered - End()
         ?>
        
        <!-- /container -->

        <!-- /Login Form -->
	
        <div class="container" style="font-family:cursive;width:50%;height:50%;margin:auto;margin-top:150px;background:black;opacity:0.7;border-radius:30px;">
			<h1 style="color:red;text-align:center;font-size:30px;font-weight:bold;">Apartment Management System</h1>
			<br>
			<br>
			<div id="id">
            <h2 style="color:white;text-align:center;font-size:20px;font-weight:bold;">Enter Username and Password</h2>
            <form class="form-signin" style="color:yellow;" role="form" action="<?php echo htmlspecialchars($_SERVER['PHP_SELF']);?>" method="post">
                <h4 class="form-signin-heading"><?php echo $msg; ?></h4> User Name&nbsp;:
                <input type="text" class="form-control" name="username" placeholder="username" required autofocus style="width:70%;height:40px;">
                </br>
                </br>
                Password &nbsp;&nbsp;&nbsp;:
                <input type="password" class="form-control" name="password" placeholder="password" required style="width:70%;height:40px;">
                </br>
                </br>
                <button style="background:blue;width:100%;height:50px;cursor:hand;border-radius:50px;color:white;" type="submit" name="login"><b>Login</b></button>
            </form>
			</div>
        </div>
	
    </body>

    </html>