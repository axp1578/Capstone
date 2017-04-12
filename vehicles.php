<!DOCTYPE HTML>  
<html>
<head>
<link rel="stylesheet" type="text/css" href="forms_format.css">
<style>
</style>
</head>
<body>  

<?php
// define variables and set to empty values
$ownrnErr = $vehnoErr = $vehtypeErr = $vehmodelErr = $vehcolourErr = $vehweightErr = $vehchassisErr = $vehengnoErr = $vehregdateErr = "";
$ownrn = $vehno = $vehtype = $vehmodel = $vehcolour = $vehweight = $vehchassis = $vehengno = $vehregdate = "";
$ownrn_bool = $vehno_bool = $vehtype_bool = $vehmodel_bool = $vehcolour_bool = $vehweight_bool = $vehchassis_bool = $vehengno_bool = $vehregdate_bool = "";

//CREATE  AND SET FORM BOOLEAN VARIABLES TO TRUE FOR TESTING HERE
//name_bool = true  email_bool = true etc...............


//IN FUNCTIONS BELOW SET BOOLEAN VARIABLES TO FALSE IF IT FAILS ANY TESTS

if ($_SERVER["REQUEST_METHOD"] == "POST") {

if (empty($_POST["ownrn"])) {
    $ownrnErr = "Ownder NRN is required";
    $ownrn_bool = "false";
  } 
  else {
    $ownrn = test_input($_POST["ownrn"]);
    // check if national registration number nrn only contains numbers and whitespace
    if (!preg_match("/\b\d{10}\b/",$ownrn)) { 
      $ownrnErr = "Only 10 numbers allowed";
      $ownrn_bool = "false"; 
    } 
    else {
    $ownrn_bool = "true";
    		}
  }


if (empty($_POST["vehno"])) {
     $vehnoErr = "Vehicle registration number is required";
     $vehno_bool = "false";
  } 
  else {
    $vehno = test_input($_POST["vehno"]);
    // check if zip only contains letters and whitespace
    if (!preg_match("/\b[A-Z]{1,2}\d{1,4}\b/",$vehno)) {
      $vehnoErr = "Must be of the form one letter followed by 1-4 numbers";
      $vehno_bool = "false"; 
    } 
    else {
    $vehno_bool = "true";
    		}
  }

  	if (empty($_POST["vehtype"])) {
    $vehtypeErr = "Vehicle manufacture type is required";
    $vehtype_bool = "false";
  } 
  else {
    $vehtype = test_input($_POST["vehtype"]);
    $vehtype_bool = "true";
    	}

	if (empty($_POST["vehmodel"])) {
    $vehmodelErr = "Vehicle model is required";
    $vehmodel_bool = "false";
  } 
  else {
    $vehmodel = test_input($_POST["vehmodel"]);
    $vehmodel_bool = "true";
    	}

	if (empty($_POST["vehcolour"])) {
    $vehcolourErr = "Vehicle colour is required";
    $vehcolour_bool = "false";
  } 
  else {
    $vehcolour = test_input($_POST["vehcolour"]);
    // check if vehicle colour only contains letters and whitespace
    if (!preg_match("/^[a-zA-Z ]*$/",$vehcolour)) {
      $vehcolourErr = "Only letters allowed";
      $vehcolour_bool = "false"; 
    } 
    else {
    $vehcolour_bool = "true";
    		}
  }
  
	
if (empty($_POST["vehweight"])) {
    $vehweightErr = "Vehicle weight is required";
    $vehweight_bool = "false";
  } 
  else {
    $vehweight = test_input($_POST["vehweight"]);
    // check if national registration number nrn only contains numbers and whitespace
    if (!preg_match("/\b\d{1,10}\b/",$vehweight)) { 
      $vehweightErr = "Only 10 numbers allowed";
      $vehweight_bool = "false"; 
    } 
    else {
    $vehweight_bool = "true";
    		}
  }

	if (empty($_POST["vehchassis"])) {
    $vehchassisErr = "Vehicle chassis no. is required";
    $vehchassis_bool = "false";
  } 
  else {
    $vehchassis = test_input($_POST["vehchassis"]);
    $vehchassis_bool = "true";
    	}

	if (empty($_POST["vehengno"])) {
    $vehengnoErr = "Vehicle engine no. is required";
    $vehengno_bool = "false";
  } 
  else {
    $vehengno = test_input($_POST["vehengno"]);
    $vehengno_bool = "true";
    	}

	

	$vehregdate = test_input($_POST["regdate"]);
	$vehregdate_bool = "true";	


  
}

function test_input($data) { //prevent hacks such as sql injection
  $data = trim($data);
  $data = stripslashes($data);
  $data = htmlspecialchars($data);
  return $data;
}


//CREATE THE DATABASE CONNECT STATEMENT HERE, ONLY CONNECT TO DATABASE IF FORM BOOLEAN VARIABLES ARE ALL SET TO TRUE THEREFORE USE AN IF...AND TEST
//AFTER SUCESSFUL DATABASE INPUT THEN CLEAR ALL FORM DATA FOR MORE INPUT. 127.0.0.1:3307

 if (($ownrn_bool == "true") && ($vehno_bool == "true") && ($vehtype_bool == "true") && ($vehmodel_bool == "true") && ($vehcolour_bool == "true") && ($vehweight_bool == "true") && ($vehchassis_bool == "true") && ($vehengno_bool == "true") && ($vehregdate_bool == "true")) { //if all boolean variables are true then run statements below
 	//echo "everything correct";
	$link = mysqli_connect('localhost', 'root', 'ravelloCloud','db_vehicle_license');
	if (!$link) {
	    echo "Error: Unable to connect to MySQL." . PHP_EOL;
	    echo "Debugging errno: " . mysqli_connect_errno() . PHP_EOL;
	    echo "Debugging error: " . mysqli_connect_error() . PHP_EOL;
	    exit;
	}

	//echo "Success: A proper connection to MySQL was made! The my_db database is great." . PHP_EOL;
	//echo "Host information: " . mysqli_get_host_info($link) . PHP_EOL;

// attempt insert query execution

	
 mysqli_query($link, "SELECT * FROM  tbl_veh_reg  WHERE fld_veh_no = '$vehno'");
  					
  					if (mysqli_affected_rows($link) !=0){
  					echo "<script type='text/javascript'>alert('Vehicle reg. no. already exists!')</script>";
  					echo mysqli_affected_rows($link);
   					}
 					else 	{//insert connect code here to tbl_owner_reg to check to ensure that the ownernrn number exists to ensure referential integrity	mysqli_query($link, "SELECT * FROM  tbl_own_reg  WHERE fld_nrn = '$ownrn'"); if (mysqli_affected_rows($link) =0) then please enter a valid owner number
							mysqli_query($link, "SELECT * FROM  tbl_owner_reg  WHERE fld_nrn = '$ownrn'");
  							if (mysqli_affected_rows($link) ==0){
  							echo "<script type='text/javascript'>alert('Please enter a valid owner registration number.')</script>";
  							echo mysqli_affected_rows($link);
   							}
			
							else {		
									$sql = "INSERT INTO tbl_veh_reg (fld_owner_nrn, fld_veh_no, fld_veh_type, fld_veh_model, fld_veh_colour, fld_veh_weight, fld_veh_chassis, fld_veh_engno, fld_veh_regdate) VALUES ('$ownrn', '$vehno', '$vehtype', '$vehmodel', '$vehcolour', '$vehweight', '$vehchassis', '$vehengno', '$vehregdate')";
									if(mysqli_query($link, $sql)){
	    															echo "Records added successfully.";
	    															echo "<script type='text/javascript'>alert('Sucessful submission')</script>";
	    															header("Location: http://centos67gui-nssamasterscapston-cyn7zrap.srv.ravcloud.com/vehicles.php");
} else{
	    echo "ERROR: Could not able to execute $sql. " . mysqli_error($link);
	}
		  
  	}
  	
  	}
	mysqli_close($link);
	
	
}//end if for bools
date_default_timezone_set("America/New_York"); //Sets date for regdate field
?>

<h1>VEHICLE REGISTRATION SYSTEM</h1>
<!-- ============ LEFT COLUMN (MENU) ============== -->
<ul>
  <li><a href="owners.php">Owners</a></li>
  <li><a class="active" href="#news">Vehicles</a></li>
  <li><a href="payments.php">Payments</a></li>
  <li><a href="validate.php">Search</a></li>
</ul>

<!-- ============ RIGHT COLUMN (CONTENT) ============== -->
<div style="margin-left:25%;padding:1px 16px;height:1000px;">
				<!--PHP FORM VALIDATION -->
				<p><span class="error">* required field.</span></p>
				<form method="post" action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]);?>">  
			    	<fieldset>
			    		<legend>Vehicle Registration</legend>
			    		<p><label class="field" for="OWnrn">Owner NRN</label><input type="text" name="ownrn" value="<?php echo $ownrn;?>"><span class="error">* <?php echo $ownrnErr;?></span>
			    		
			    		<p><label class="field" for="VEhno">Vehicle Reg. No.</label><input type="text" name="vehno" value="<?php echo $vehno;?>"><span class="error">* <?php echo $vehnoErr;?></span>
			    		
			    		<p><label class="field" for="VEhtype">Type</label><input type="text" name="vehtype" value="<?php echo $vehtype;?>"><span class="error">* <?php echo $vehtypeErr;?></span>
			    		
						<p><label class="field" for="VEhmodel">Model</label><input type="text" name="vehmodel" value="<?php echo $vehmodel;?>"><span class="error">* <?php echo $vehmodelErr;?></span>
						
						<p><label class="field" for="VEhcolour">Color</label><input type="text" name="vehcolour" value="<?php echo $vehcolour;?>"><span class="error">* <?php echo $vehcolourErr;?></span>
						
						<p><label class="field" for="VEhweight">Weight (kgs.)</label><input type="text" name="vehweight" value="<?php echo $vehweight;?>"><span class="error">* <?php echo $vehweightErr;?></span>
						
						<p><label class="field" for="VEhchassis">Chassis No.</label><input type="text" name="vehchassis" value="<?php echo $vehchassis;?>"><span class="error">* <?php echo $vehchassisErr;?></span>
						
						
						<p><label class="field" for="VEhengno">Engine No.</label><input type="text" name="vehengno" value="<?php echo $vehengno;?>"><span class="error">* <?php echo $vehengnoErr;?></span>
						
									
						<p><label class="field" for="REgdate">Registration Date</label><input type="text" name="regdate" readonly value="<?php echo date("Y-m-d");?>"><span class="error">* <?php echo $vehregdateErr;?></span>

						
						
  					</fieldset>
  				<input type="submit" class="button" name="submit" value="Submit">
  				<input type="reset" class="button" value="Clear">  
				</form>

</div>

/

</body>


</html>