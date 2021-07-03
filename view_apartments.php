<?php # 

$page_title = 'View Apartments';
include ('connect_to_sql.php');
include ('common_functions.php');
include ('menu.php');
echo '<link rel="stylesheet" href="styles.css" type="text/css">';

//Print the table Header
function printTableHeader($sortby){
    
    $current_link = $_SERVER['PHP_SELF'];
    switch ($sortby) {
        case 'apt_number':
            $link1="$current_link?sort=apt_number&orderby=desc";
            $link2="$current_link?sort=building_full_name&orderby=asc";
            $link3="$current_link?sort=apt_type_code&orderby=asc";
			$link4="$current_link?sort=building_address&orderby=asc";
            break;
        case 'building_full_name':
            $link1="$current_link?sort=apt_number&orderby=asc";
            $link2="$current_link?sort=building_full_name&orderby=desc";
            $link3="$current_link?sort=apt_type_code&orderby=asc";
			$link4="$current_link?sort=building_address&orderby=asc";
            break;
        case 'apt_type_code':
            $link1="$current_link?sort=apt_number&orderby=asc";
            $link2="$current_link?sort=building_full_name&orderby=asc";
            $link3="$current_link?sort=apt_type_code&orderby=desc";
			$link4="$current_link?sort=building_address&orderby=asc";
			break;
		 case 'building_address':
            $link1="$current_link?sort=apt_number&orderby=asc";
            $link2="$current_link?sort=building_full_name&orderby=asc";
            $link3="$current_link?sort=apt_type_code&orderby=asc";
			$link4="$current_link?sort=building_address&orderby=desc";
			break;
		default:
			break;
    }
     
    echo '<tr class="header">
                <th> Edit </th>
                <th> Delete </th>
                <th> <a href="'.$link1.'">Apartment Number</a></th>
                <th> <a href="'.$link2.'">Building  Name&emsp;&emsp; </a></th>
                <th> <a href="'.$link3.'">  Apartment Type  </a></th>
				<th> Apartment Details  </th>
                <th> <a href="'.$link4.'"> Apartment Address  </th>
                <th>Apartment Manager  </th>
				<th>Apartment Phone </th>
				<th>Apartment Status </th>
			
        </tr>'; 
}

//Function to get List of Apartment;
function getListofApartment ($db,$start,$noOfRecords,$sortby,$orderby){     
        $query = "
		             SELECT 
                        ab.building_full_name,
                        ab.building_short_name,
                        a.building_id,
                        a.apt_number,a.apt_id,
                        at.apt_type_code,a.bathroom_count,a.bedroom_count,
						ab.building_address,
						ab.building_manager,
						ab.building_phone,
						a.status
                    FROM
                        apartments a,
                        apartment_buildings ab,
                        apartment_type at

                    WHERE
                        a.building_id = ab.building_id
                            AND a.apt_type_code = at.apt_type_code and a.status='VACANT'
							order by $sortby $orderby LIMIT $start,$noOfRecords";
							
        $result = @mysqli_query($db, $query);  
        if($result){
            $count=0;$css="even";
            while ($row = mysqli_fetch_array($result, MYSQLI_ASSOC)){
                if($count%2==0){$css="even";}else{$css="odd";}
                $count++;
                echo '<tr class="detail '.$css.'">
                        <td><a href="edit_apartments.php?apt_id='.$row['apt_id'].'">Edit</a></td>
                        <td><a href="delete_apartments.php?apt_id='.$row['apt_id'].'">Delete</a></td>
                        <td> APT:'.$row['apt_number'].'</td>
                        <td> <b><i>'.$row['building_full_name'].'</i></b></td>  
                        <td> '.$row['apt_type_code'].'</td>  
                        <td> '.$row['bedroom_count'].'bedrooms & '.$row['bathroom_count'].'bathrooms  </td>
						<td> '.$row['building_address'].'</td>
						<td> '.$row['building_manager'].'</td>	
						<td> '.$row['building_phone'].'</td>
						<td> '.$row['status'].'</td>
						
                       
                        </tr>'; 
            }
        }
}



// Get Number of pages from Parameter, If not found query Database
if (isset($_GET['np'])) {
    $pages = $_GET['np'];
}else{
	
    $pages = getTotalPages($dbc,$display,"select count(*) from apartments");    
}
//Get start record from parameter, if not found use zero
if (isset($_GET['s'])) {
	$start = $_GET['s'];
} else {
	$start = 0;
}

if (isset($_GET['sort'])) {
	$sortby = $_GET['sort'];
} else {
	$sortby="apt_number";
}
if (isset($_GET['orderby'])) {
	$orderby = $_GET['orderby'];
} else {
	$orderby="asc";
}
echo '<div class="container">';
echo '<div style="width:80%">';
//Page Header
echo '<h1>List of Apartments </h1>';
echo '<table>';
printTableHeader($sortby);
getListofApartment($dbc,$start,$display,$sortby,$orderby);
echo '</table>';
//Pagination Bottom
pagination($pages,$start,$display,'view_apartments.php',$sortby,$orderby);
echo '</div>';
echo '</div>';

?>