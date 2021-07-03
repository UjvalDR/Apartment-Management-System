<?php
$page_title = 'Home Page';
include ('menu.php');
include ('common_functions.php');
echo '<link rel="stylesheet" href="styles.css" type="text/css">';
?>
</br>
<style>
body{
background-image: url(images/apt.jpg);
  background-position: center;
  background-repeat: no-repeat;
  background-size: fit;
}
</style>
<script src="https://cdn.jsdelivr.net/npm/typeit@7.0.4/dist/typeit.min.js"></script>

<body>
<div class="container" style="background:#fff;opacity:0.9;height:70%;width:60%;margin:auto;text-align:center;border-radius:20px;">
<div class="row">
  <div class="large-12 columns">
    <p>
      
	  <img src="images/gf1.gif" width="200px" height="200px"/></p>
	  
	<p id="welcome" style="height:20%;width:100%;color:blue;font-size:30px;">  </p>
    <p style="float:right;color:red;">
      A DBMS mini-project
    </p>
	
  </div>
</div>
</div>
<script>new TypeIt("#welcome", {
  strings: "Welcome to Apartment Management System",
  speed: 200,
  loop: false
}).go();
</script>
</body>