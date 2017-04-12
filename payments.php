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
$hcodeErr = $vehnoErr = $stdateErr = $endateErr = $payamtErr = $paydateErr = "";
$hcode = $vehno = $stdate = $endate = $payamt = $paydate = "";
$hcode_bool = $vehno_bool = $stdate_bool = $endate_bool = $payamt_bool = $paydate_bool = $data_success_bool = "";

//CREATE  AND SET FORM BOOLEAN VARIABLES TO TRUE FOR TESTING HERE
//name_bool = true  email_bool = true etc...............


//IN FUNCTIONS BELOW SET BOOLEAN VARIABLES TO FALSE IF IT FAILS ANY TESTS

if ($_SERVER["REQUEST_METHOD"] == "POST") {


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

  	if (empty($_POST["stdate"])) {
    $stdateErr = "Start date is required";
    $stdate_bool = "false";
  } 
  else {
    $stdate = test_input($_POST["stdate"]);
    if (!preg_match("/^[0-9]{4}-(0[1-9]|1[0-2])-(0[1-9]|[1-2][0-9]|3[0-1])$/",$stdate)) {
      $stdateErr = "Must be of a proper date format yyyy-mm-dd";
      $stdate_bool = "false"; 
    }
    else {
    $stdate_bool = "true";
    	}
	}

	if (empty($_POST["endate"])) {
    $endateErr = "End date is required";
    $endate_bool = "false";
  } 
  else {
    $endate = test_input($_POST["endate"]);
    if (!preg_match("/^[0-9]{4}-(0[1-9]|1[0-2])-(0[1-9]|[1-2][0-9]|3[0-1])$/",$endate)) {
      $endateErr = "Must be of a proper date format yyyy-mm-dd";
      $endate_bool = "false"; 
    }
    else {
    $endate_bool = "true";
    	}
	}

	if (empty($_POST["payamt"])) {
    $payamtErr = "Vehicle colour is required";
    $payamt_bool = "false";
  } 
  else {
    $payamt = test_input($_POST["payamt"]);
    // check if payment amount is a real number
    if (!preg_match("/^[0-9]+(?:\.[0-9]+)?$/",$payamt)) {
      $payamtErr = "Only real nos. allowed";
      $payamt_bool = "false"; 
    } 
    else {
    $payamt_bool = "true";
    		}
  }
  
	$paydate = test_input($_POST["paydate"]);
	$paydate_bool = "true";	
// ^[0-9]{4}-(0[1-9]|1[0-2])-(0[1-9]|[1-2][0-9]|3[0-1]) this is the regex for date

  
}

function test_input($data) { //prevent hacks such as sql injection
  $data = trim($data);
  $data = stripslashes($data);
  $data = htmlspecialchars($data);
  return $data;
}


//CREATE THE DATABASE CONNECT STATEMENT HERE, ONLY CONNECT TO DATABASE IF FORM BOOLEAN VARIABLES ARE ALL SET TO TRUE THEREFORE USE AN IF...AND TEST
//AFTER SUCESSFUL DATABASE INPUT THEN CLEAR ALL FORM DATA FOR MORE INPUT. 127.0.0.1:3307

 if (($vehno_bool == "true") && ($stdate_bool == "true") && ($endate_bool == "true") && ($payamt_bool == "true") && ($paydate_bool == "true") ) { //if all boolean variables are true then run statements below
 	//echo "everything correct";
	$link = mysqli_connect('localhost', 'root', 'ravelloCloud','db_vehicle_license');
	if (!$link) {
	    echo "Error: Unable to connect to MySQL." . PHP_EOL;
	    echo "Debugging errno: " . mysqli_connect_errno() . PHP_EOL;
	    echo "Debugging error: " . mysqli_connect_error() . PHP_EOL;
	    exit;
	}
	//echo $vehno_bool;
	//echo "Success: A proper connection to MySQL was made! The my_db database is great." . PHP_EOL;
	//echo "Host information: " . mysqli_get_host_info($link) . PHP_EOL;

// attempt insert query execution

//calculate hcode here. Then check to see if it already exists on the table	
$iterations = 5;
$concat_message = "{$vehno}{$paydate}{$payamt}";
$encrypt_mech = "sha256";
$bytes = random_bytes(10);
$salt = bin2hex($bytes);
$hash_bool = "false";
do {
$hcode = hash_pbkdf2($encrypt_mech, $concat_message, $salt, $iterations, 10);
//CHECK FOR IF THE ABOVE IS ALREADY IN DATABASE
//IF IT ISN'T IN DATABASE THEN $HASH_BOOL BECOMES TRUE $HASH_BOOL = "TRUE";
mysqli_query($link, "SELECT * FROM  tbl_payments  WHERE fld_pay_hcode = '$hcode'");
	if (mysqli_affected_rows($link) !=0){ //match found which is what we don't want
 					echo "<script type='text/javascript'>alert('Match has been found for primary key hash code')</script>";
 					echo mysqli_affected_rows($link);
 					$hash_bool = "false";
  					}
					else {
							$hash_bool = "true";
							}

} while ($hash_bool == "false");



  mysqli_query($link, "SELECT * FROM  tbl_veh_reg  WHERE fld_veh_no = '$vehno'");
  					
  					if (mysqli_affected_rows($link) ==0){ //no match found which is what we don't want
  					echo "<script type='text/javascript'>alert('Please enter a valid Vehicle reg. no.')</script>";
  					echo mysqli_affected_rows($link);
   					}
 					
			
							else {		
									$sql = "INSERT INTO tbl_payments (fld_pay_vehno, fld_pay_stdate, fld_pay_endate, fld_pay_amt, fld_pay_date, fld_pay_hcode) VALUES ('$vehno', '$stdate', '$endate', '$payamt', '$paydate','$hcode')";
									if(mysqli_query($link, $sql)){
	    															//echo "Records added successfully.";
	    															echo "<script type='text/javascript'>alert('Sucessful submission')</script>";
	    															$data_success_bool = "true"; // use for receipt pop up window
	    															$sqlqr = "INSERT INTO tbl_qrsecure (fld_qr_vehno, fld_qr_hcode, fld_qr_saltno, fld_qr_message, fld_qr_iterations, fld_qr_encryptmech) VALUES ('$vehno', '$hcode', '$salt', '$concat_message', '$iterations','$encrypt_mech')";
																	mysqli_query($link, $sqlqr);
																	} 
																else{
																    echo "ERROR: Could not able to execute $sql. " . mysqli_error($link);
																	}
		  
  								}
  	
  						
	mysqli_close($link);
	
	
}//end if for bools
date_default_timezone_set("America/New_York"); //Sets date for regdate field


?>



<script> //Creates a window for receipt
var myWindow;
//require __DIR__ . '/fpdf.php';
function createWindow(h_code, data_success) {
if (data_success == "true") {
    myWindow = window.open("search_hcode.php?q="+h_code, "myWindow", "toolbar=yes,scrollbars=yes,resizable=yes,top=500,left=500,width=800,height=600"); //enter php search page in the url part
  	 }
  	 
}//end function

function closeWin() {
    myWindow.close();
}
</script>

<h1>VEHICLE REGISTRATION SYSTEM</h1>
<!-- ============ LEFT COLUMN (MENU) ============== -->
<ul>
  <li><a href="owners.php">Owners</a></li>
  <li><a href="vehicles.php">Vehicles</a></li>
  <li><a class="active" href="#contact">Payments</a></li>
  <li><a href="validate.php">Search</a></li>
</ul>

<!-- ============ RIGHT COLUMN (CONTENT) ============== -->
<div style="margin-left:25%;padding:1px 16px;height:1000px;">
				<!--PHP FORM VALIDATION -->
				<p><span class="error">* required field.</span></p>
				<form method="post" action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]);?>">  
			    	<fieldset>
			    		<legend>Payments</legend>
			    					    		
			    		<p><label class="field" for="VEhno">Vehicle Reg. No.</label><input type="text" name="vehno" value="<?php echo $vehno;?>"><span class="error">* <?php echo $vehnoErr;?></span>
			    		
			    		<p><label class="field" for="STdate">Start Date</label><input type="text" name="stdate" value="<?php echo $stdate;?>"><span class="error">* <?php echo $stdateErr;?></span>
			    		
						<p><label class="field" for="ENdate">End date</label><input type="text" name="endate" value="<?php echo $endate;?>"><span class="error">* <?php echo $endateErr;?></span>
						
						<p><label class="field" for="PAyamt">Payment Amt.</label><input type="text" name="payamt" value="<?php echo $payamt;?>"><span class="error">* <?php echo $payamtErr;?></span>
											
						<p><label class="field" for="PAydate">Pay Date</label><input type="text" name="paydate" readonly value="<?php echo date("Y-m-d");?>"><span class="error">* <?php echo $paydateErr;?></span>
	
  					</fieldset>
  					<input type="submit" class="button" name="submit" value="Submit">
    				<input type="reset" class="button" value="Clear">  
  					<input type="button" class="button" value="Receipt" onclick="createWindow('<?php echo $hcode;?>','<?php echo $data_success_bool;?>')">
  				</form>
  				

</div>


</body>


</html>