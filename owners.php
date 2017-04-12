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
$fnameErr = $mnameErr = $lnameErr = $nrnErr = $address1Err = $address2Err = $regionErr = $zipErr = $genderErr = "";
$fname = $mname = $lname = $nrn = $address1 = $address2 = $region = $zip = $gender = "";
$fname_bool = $mname_bool = $lname_bool = $nrn_bool = $address1_bool = $address2_bool = $region_bool = $zip_bool = $gender_bool = "";

//CREATE  AND SET FORM BOOLEAN VARIABLES TO TRUE FOR TESTING HERE
//name_bool = true  email_bool = true etc...............


//IN FUNCTIONS BELOW SET BOOLEAN VARIABLES TO FALSE IF IT FAILS ANY TESTS

if ($_SERVER["REQUEST_METHOD"] == "POST") {
  	if (empty($_POST["fname"])) {
    $fnameErr = "First Name is required";
    $fname_bool = "false";
  } 
  else {
    $fname = test_input($_POST["fname"]);
    // check if first name only contains letters and whitespace
    if (!preg_match("/^[a-zA-Z ]*$/",$fname)) {
      $fnameErr = "Only letters allowed";
      $fname_bool = "false"; 
    } 
    else {
    $fname_bool = "true";
    		}
  }

	if (empty($_POST["mname"])) {
    $mnameErr = "Middle Name is required";
    $mname_bool = "false";
  } 
  else {
    $mname = test_input($_POST["mname"]);
    // check if middle name only contains letters and whitespace
    if (!preg_match("/^[a-zA-Z ]*$/",$mname)) {
      $mnameErr = "Only letters allowed";
      $mname_bool = "false"; 
    } 
    else {
    $mname_bool = "true";
    		}
  }

	if (empty($_POST["lname"])) {
    $lnameErr = "Last Name is required";
    $lname_bool = "false";
  } 
  else {
    $lname = test_input($_POST["lname"]);
    // check if last name only contains letters and whitespace
    if (!preg_match("/^[a-zA-Z ]*$/",$lname)) {
      $lnameErr = "Only letters allowed";
      $lname_bool = "false"; 
    } 
    else {
    $lname_bool = "true";
    		}
  }
  
	if (empty($_POST["nrn"])) {
    $nrnErr = "NRN is required";
    $nrn_bool = "false";
  } 
  else {
    $nrn = test_input($_POST["nrn"]);
    // check if national registration number nrn only contains numbers and whitespace
    if (!preg_match("/\b\d{10}\b/",$nrn)) { 
      $nrnErr = "Only 10 numbers allowed";
      $nrn_bool = "false"; 
    } 
    else {
    $nrn_bool = "true";
    		}
  }

	if (empty($_POST["address1"])) {
    $address1Err = "Address1 is required";
    $address1_bool = "false";
  } 
  else {
    $address1 = test_input($_POST["address1"]);
    $address1_bool = "true";
  		}

	if (empty($_POST["address2"])) {
     $address2Err = "Address2 is required";
     $address2_bool = "false";
  } 
  else {
    $address2 = test_input($_POST["address2"]);
    $address2_bool = "true";
      }

	if (empty($_POST["region"])) {
     $regionErr = "Region is required";
     $region_bool = "false";
  } 
  else {
    $region = test_input($_POST["region"]);
    // check if region only contains letters and whitespace
    if (!preg_match("/^[a-zA-Z ]*$/",$region)) {
      $regionErr = "Only letters allowed";
      $region_bool = "false"; 
    } 
    else {
    $region_bool = "true";
    		}
  }

	if (empty($_POST["zip"])) {
     $zipErr = "Zip is required";
     $zip_bool = "false";
  } 
  else {
    $zip = test_input($_POST["zip"]);
    // check if zip only contains letters and whitespace
    if (!preg_match("/\b[B][B]\d{5}\b/",$zip)) {
      $zipErr = "Must be of the form BB11234";
      $zip_bool = "false"; 
    } 
    else {
    $zip_bool = "true";
    		}
  }


  if (empty($_POST["gender"])) {
    $genderErr = "Gender is required";
    $gender_bool = "false";
  } 
  else {
    $gender = test_input($_POST["gender"]);
    $gender_bool = "true";
  }
  
}

function test_input($data) {
  $data = trim($data);
  $data = stripslashes($data);
  $data = htmlspecialchars($data);
  return $data;
}

//CREATE THE DATABASE CONNECT STATEMENT HERE, ONLY CONNECT TO DATABASE IF FORM BOOLEAN VARIABLES ARE ALL SET TO TRUE THEREFORE USE AN IF...AND TEST
//AFTER SUCESSFUL DATABASE INPUT THEN CLEAR ALL FORM DATA FOR MORE INPUT. 127.0.0.1:3307
//echo $region;
//echo $region_bool;
 if (($fname_bool == "true") && ($mname_bool == "true") && ($lname_bool == "true") && ($nrn_bool == "true") && ($address1_bool == "true") && ($address2_bool == "true") && ($zip_bool == "true") && ($gender_bool == "true")) { //if all boolean variables are true then run statements below
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

	
 mysqli_query($link, "SELECT * FROM  tbl_owner_reg  WHERE fld_nrn = '$nrn'");
  					
  					if (mysqli_affected_rows($link) !=0){
  					echo "<script type='text/javascript'>alert('already exists!')</script>";
  					echo mysqli_affected_rows($link);
   					}
 	else {				
	$sql = "INSERT INTO tbl_owner_reg (fld_fname, fld_mname, fld_lname, fld_nrn, fld_address1, fld_address2, fld_region, fld_zip, fld_gender) VALUES ('$fname', '$mname', '$lname', '$nrn', '$address1', '$address2', '$region', '$zip', '$gender')";
	if(mysqli_query($link, $sql)){
	    //echo "Records added successfully.";
	    //echo "<script type='text/javascript'>alert('Sucessful submission')</script>";
		header("Location: http://centos67gui-nssamasterscapston-cyn7zrap.srv.ravcloud.com/owners.php"); 
	} else{
	    echo "ERROR: Could not able to execute $sql. " . mysqli_error($link);
	}
		  
  	}
	mysqli_close($link);
	
	
}//end if for bools
?>

<h1>VEHICLE REGISTRATION SYSTEM</h1>
<!-- ============ LEFT COLUMN (MENU) ============== -->
<ul>
  <li><a class="active" href="#home">Owners</a></li>
  <li><a href="vehicles.php">Vehicles</a></li>
  <li><a href="payments.php">Payments</a></li>
  <li><a href="validate.php">Search</a></li>
</ul>

<!-- ============ RIGHT COLUMN (CONTENT) ============== -->
<div style="margin-left:25%;padding:1px 16px;height:1000px;">
				<!--PHP FORM VALIDATION -->
				<p><span class="error">* required field.</span></p>
				<form id="frm_owners" method="post" action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]);?>">  
			    	<fieldset>
			    		<legend>Owner Registration</legend>
			    		<p><label class="field" for="FName">First Name</label><input type="text" name="fname" value="<?php echo $fname;?>"><span class="error">* <?php echo $fnameErr;?></span>
			    		
			    		<p><label class="field" for="MName">Middle Name</label><input type="text" name="mname" value="<?php echo $mname;?>"><span class="error">* <?php echo $mnameErr;?></span>
			    		
						<p><label class="field" for="LName">Last Name</label><input type="text" name="lname" value="<?php echo $lname;?>"><span class="error">* <?php echo $lnameErr;?></span>
						
						<p><label class="field" for="Nrn">NRN</label><input type="text" name="nrn" value="<?php echo $nrn;?>"><span class="error">* <?php echo $nrnErr;?></span>
						
						<p><label class="field" for="Address1">Address1</label><input type="text" name="address1" value="<?php echo $address1;?>"><span class="error">* <?php echo $address1Err;?></span>
						
						<p><label class="field" for="Address2">Address2</label><input type="text" name="address2" value="<?php echo $address2;?>"><span class="error">* <?php echo $address2Err;?></span>
						
						<!--<p><label class="field" for="Region">Region</label><input type="text" name="region" value="<?php echo $region;?>"><span class="error">* <?php echo $regionErr;?></span> -->
						
						<p><label class="field" for="Region">Region</label><select name="region">
  																			<option value="Christ Church">Christ Church</option>
  																			<option value="St. James">St. James</option>
  																			<option value="St. Lucy">St. Lucy</option>
 																			<option value="St. Michael">St. Michael</option>
 																			<option value="St. Peter">St. Peter</option>
 																			<option value="St. Thomas">St. Thomas</option>
 																			<option value="St. Andrew">St. Andrew</option>
 																			<option value="St. George">St. George</option>
 																			<option value="St. John">St. John</option>
 																			<option value="St. Joseph">St. Joseph</option>
 																			<option value="St. Philip">St. Philip</option>
																		   </select>
						
						
						
						
						<p><label class="field" for="Zip">Zip</label><input type="text" name="zip" value="<?php echo $zip;?>"><span class="error">* <?php echo $zipErr;?></span>
						<p><label class="field" for="Gender">Gender</label><input type="radio" name="gender" <?php if (isset($gender) && $gender=="female") echo "checked";?> value="female">Female<input type="radio" name="gender" <?php if (isset($gender) && $gender=="male") echo "checked";?> value="male">Male<span class="error">* <?php echo $genderErr;?></span>
  					</fieldset>
  				<input type="submit" class="button" value="Submit">
    			<input type="reset" class="button" value="Clear">  
				</form>
	

</div>


</body>


</html>