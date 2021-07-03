<?php # 

$page_title = 'Add Apartment Bookings';
include ('connect_to_sql.php');
include ('menu.php');
include ('validate.php');
include ('common_functions.php');
echo '<link rel="stylesheet" href="styles.css" type="text/css">';

echo '<div class="container" style="height:70%;width:50%;margin:auto;">'; ?>

       <form class="makeit" action="<?php echo htmlspecialchars($_SERVER['PHP_SELF']);?>" method="post">
            <center>
                <p style="margin:20px;">Get the required data by selecting appropriate options -</p>
                <div class="form-label-group">
                    <select style="padding:4px 5px;" class="form-control" id="sel1" name="table" width="50px;" required>
                        <option value="" disabled selected>Select Table</option>
                        <option value="apartments">Apartments</option>
                        <option value="apartment_buildings">Buildings</option>
                       
                    </select>

                    <select style="padding:0px 0px;" class="form-control" id="sel2" name="field" required>
                        <option value="" disabled selected>Select Field</option>
                        <option value="*">All</option>
                        <option value="apt_id">apt id</option>
                        <option value="building_name">Name</option>

                    </select>

                    <select style="padding:0px 0px;" class="form-control" id="sel3" name="key" required>
                        <option value="" disabled selected>Select Key</option>
                        <option value="none">None</option>
                        <option value="apt_id">User id</option>
                       
                    </select>


                    <select style="padding:0px 0px;" class="form-control" id="op" name="operation" required>
                        <option value="" disabled selected>Select operation</option>
                        <option value="none">None</option>
                        <option value="=">=</option>
                        <option value="<"><</option>
                        <option value=">">></option>
                        <option value="<="><=</option>
                        <option value=">=">>=</option>
                        <option value="ASC">order by ASC</option>
                        <option value="DESC">order by DESC</option>
                        <option value="limit">LIMIT</option>
                        <option value="max">MAX</option>
                        <option value="min">MIN</option>
                        <option value="count">COUNT</option>
                        <option value="avg">AVG</option>
                        <option value="sum">SUM</option>
                        <option value="like">LIKE</option>
                        <option value="join">JOIN</option>
                    </select>


                    <label class="radio-inline"> <span style="font-size:20px;"> &nbsp;&nbsp;&nbsp; </span>
                        <input type="radio" name="input_type" value="txt" checked><span style="font-size:20px; "> Text
                            &nbsp;&nbsp;&nbsp;</span>
                    </label>
                    <label class="radio-inline" style="margin-bottom:15px;">
                        <input type="radio" name="input_type" value="num"><span style="font-size:20px;"> Number</span>
                    </label>
                </div>



                <input type="text" list="browsers" class="form-control" id="somethingelse" name="input_value"
                    placeholder="Enter Value">
                <datalist id="browsers">
                    <option value="none">
                </datalist>

                </div>


                <button class="btn btn-lg btn-primary btn-block btn-login text-uppercase font-weight-bold mb-2"
                    name="login" type="submit">Confirm</button>
                <div class="text-center">
        </form>
<?php
echo '</div>';?>
