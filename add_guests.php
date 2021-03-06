<?php # 

$page_title = 'Add Guests';
include ('connect_to_sql.php');
include ('menu.php');
include ('validate.php');
include ('common_functions.php');
echo '<link rel="stylesheet" href="styles.css" type="text/css">';


// Create the form.
echo '<form action="add_guests.php" method="post">';
$guest_id = "";
$guest_first_name= "";
$guest_last_name= "";
$guest_date_of_birth= "";
$guest_gender="";
//Populate Value from Form Submit - Stickeness
if (isset($_POST['submitted'])) {   
    $guest_first_name= $_POST["guest_first_name"];
    $guest_last_name= $_POST["guest_last_name"];
    $guest_date_of_birth= $_POST["guest_date_of_birth"];
    $guest_gender= $_POST["guest_gender"];
}

echo '<div class="container" style="height:50%;width:50%;margin:auto;">';
echo '<h2>Add Guest Detail</h2>' ;   

echo '  
<div class="makeit">
<p>First Name :&emsp; <input type="text" name="guest_first_name" size="10" maxlength="50" value="'.$guest_first_name.'" class="textbox"/></p>
<p>Last Name :&nbsp;&emsp; <input type="text" name="guest_last_name" size="10" maxlength="50" value="'.$guest_last_name.'" class="textbox"/></p>
<p>Date of Birth :&nbsp; <input type="date" name="guest_date_of_birth" min="1997-01-01" max="2030-12-31" size="10" maxlength="10" value="'.$guest_date_of_birth.'" class="textbox"/></p>
<p>Gender :&nbsp;&emsp;&emsp;&ensp; <input type="text" name="guest_gender" size="10" maxlength="1" value="'.$guest_gender.'" class="textbox"/><label>&nbsp;(M/F)</label></p>';

if(!isset($_POST['submitted'])){
    printFormSubmit();
}

//Validate and Submit to the Database
if (isset($_POST['submitted'])) {
    
    $errors = array(); 
    checkIfEmpty($_POST['guest_first_name'],"Please enter first name.",$errors);
    checkIfEmpty($_POST['guest_last_name'],"Please enter last name.",$errors);
    checkIfEmpty($_POST['guest_date_of_birth'],"Please enter date of birth.",$errors);
    checkIfEmpty($_POST['guest_gender'],"Please enter gender.",$errors);
    validateDate($_POST['guest_date_of_birth'],"Please enter valid date of birth.",$errors);

    if (!empty($errors)) { 
         printFormSubmit();
    }else{
        echo '</div></form></div>';
    }
    
    echo '<div class="Message_bar" style="margin-top:50px;">';
    if (empty($errors)) { 
        $query = "INSERT INTO guests(guest_first_name,guest_last_name,guest_date_of_birth,guest_gender)
        VALUES ('$guest_first_name','$guest_last_name','$guest_date_of_birth 00:00:00','$guest_gender')";
        addTable($dbc,$query);
    }else {  
        echo '<div class="error"><p class="error">The following error(s) occurred:<br/><ul>';
		foreach ($errors as $msg) { 
			echo "<li>$msg</li>";
		} 
		echo '</ul></p><p>Please try again.</p>';
    }
    echo '</div>';
}

?>