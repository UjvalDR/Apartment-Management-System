<?php # 

$page_title = 'Add Apartment Bookings';
include ('connect_to_sql.php');
include ('menu.php');
include ('validate.php');
include ('common_functions.php');
echo '<link rel="stylesheet" href="styles.css" type="text/css">';

// Function to get Apartments and ID
$msg="";
$msgs="";

function getApartments($db,$apt_id){
    $result = @mysqli_query($db, "select apt_id, concat(building_short_name,':',apt_number) apt_number  
                from apartments a, apartment_buildings ab where a.building_id=ab.building_id order by apt_number"); 
     echo '<select name="apt_id">';
	 $msg=$row["apt_number"];
	 $msgs=$row["building_short_name"];
    if($result){
        while ($row = mysqli_fetch_array($result, MYSQLI_ASSOC)){
            if($row["apt_id"]==$apt_id){
                echo '<option value="'.$row["apt_id"].'" selected="selected">'.$row["apt_number"].'</option>';
            }else{
                 echo '<option value="'.$row["apt_id"].'">'.$row["apt_number"].'</option>';
            }
        }
    }
    echo '</select>';   
}

// Function to get Guests and ID
function getGuest($db,$guest_id){
    $result = @mysqli_query($db, "select guest_id, concat(guest_first_name,' ',guest_last_name) guest_name from guests order by guest_name"); 
     echo '<select name="guest_id">';
    if($result){
        while ($row = mysqli_fetch_array($result, MYSQLI_ASSOC)){
            if($row["guest_id"]==$guest_id){
                echo '<option value="'.$row["guest_id"].'" selected="selected">'.$row["guest_name"].'</option>';
            }else{
                 echo '<option value="'.$row["guest_id"].'">'.$row["guest_name"].'</option>';
            }
        }
    }
    echo '</select>';   
}

// Function to get Booking Status and ID
function getBookingStatus($db,$booking_status_code){
    $result = @mysqli_query($db, "select booking_status_code,booking_status_description from booking_status order by booking_status_code"); 
     echo '<select name="booking_status_code">';
    if($result){
        while ($row = mysqli_fetch_array($result, MYSQLI_ASSOC)){
            if($row["booking_status_code"]==$booking_status_code){
                echo '<option value="'.$row["booking_status_code"].'" selected="selected">'.$row["booking_status_description"].'</option>';
            }else{
                 echo '<option value="'.$row["booking_status_code"].'">'.$row["booking_status_description"].'</option>';
            }
        }
    }
    echo '</select>';   
}


// Create the form.
echo '<form action="add_apartment_bookings.php" method="post">';
$apt_id= "";
$guest_id= "";
$booking_status_code= "";
$start_date= "";
$end_date= "";

//Populate Value from Form Submit - Stickeness
if (isset($_POST['submitted'])) {	
    $apt_id= $_POST["apt_id"];
    $guest_id= $_POST["guest_id"];
    $booking_status_code= $_POST["booking_status_code"];
    $start_date= $_POST["start_date"];
    $end_date= $_POST["end_date"];
}

//Form
echo '<div class="container" style="height:55%;width:50%;margin:auto;">';
echo '<h2>Add Apartment Booking</h2>' ;   
echo '
<div class="makeit">
<p>Apartment Number:&emsp; '; 
getApartments($dbc,$apt_id);
echo '</p>
<p>Guest :&emsp;&emsp;';
getGuest($dbc,$guest_id);
 echo '</p>
<p>Booking Status :&emsp;&emsp;&emsp; ';
getBookingStatus($dbc,$booking_status_code);
 echo '</p>
<p>Booking Start Date :&emsp; <input type="date" name="start_date" min="1997-01-01" max="2030-12-31" size="10" maxlength="10" value="'.$start_date.'" /></p>
<p>Booking End Date :&emsp;&nbsp; <input type="date" name="end_date" min="1997-01-01" max="2030-12-31" size="10" maxlength="10" value="'.$end_date.'" /></p>';

if(!isset($_POST['submitted'])){
    printFormSubmit();
}




//Validate and Submit to the Database
if (isset($_POST['submitted'])) {
    
    $errors = array(); 
    checkIfEmpty($_POST['start_date'],"Please enter booking start date.",$errors);
    checkIfEmpty($_POST['end_date'],"Please enter booking end date.",$errors);
    validateDate($_POST['start_date'],"Please enter valid start date.",$errors);
    validateDate($_POST['end_date'],"Please enter valid end date.",$errors);

    if (!empty($errors)) { 
         printFormSubmit();
    }else{
        echo '</div></form></div>';
    }
    echo '<div class="Message_bar" style="margin-top:20px;">';
     //if no errors in the vlaues selected, updation of the entries
    if (empty($errors)) { 
        $query = "INSERT INTO apartment_bookings(apt_id,guest_id,booking_status_code,booking_start_date,booking_end_date)
        VALUES ($apt_id,$guest_id,'$booking_status_code','$start_date 00:00:00','$end_date 00:00:00')";
        addTable($dbc,$query);//add record
		$query1="UPDATE apartments set status='BOOKED' where apt_id=$apt_id";
		$result1 = @mysqli_query ($dbc, $query1); 
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