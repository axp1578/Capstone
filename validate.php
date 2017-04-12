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
$hcodeErr = "";
$hcode = "";
$hcode_bool = "";

//CREATE  AND SET FORM BOOLEAN VARIABLES TO TRUE FOR TESTING HERE
//name_bool = true  email_bool = true etc...............


//IN FUNCTIONS BELOW SET BOOLEAN VARIABLES TO FALSE IF IT FAILS ANY TESTS

if ($_SERVER["REQUEST_METHOD"] == "POST") {


if (empty($_POST["hcode"])) {
     $hcodeErr = "Hashcode to be checked is required";
     $hcode_bool = "false";
  } 
  else {
    $hcode = test_input($_POST["hcode"]);
    $hcode_bool = "true";    		
  		}

  	
  
}

function test_input($data) { //prevent hacks such as sql injection
  $data = trim($data);
  $data = stripslashes($data);
  $data = htmlspecialchars($data);
  return $data;
}





//CREATE THE DATABASE CONNECT STATEMENT HERE, ONLY CONNECT TO DATABASE IF FORM BOOLEAN VARIABLES ARE ALL SET TO TRUE THEREFORE USE AN IF...AND TEST
//AFTER SUCESSFUL DATABASE INPUT THEN CLEAR ALL FORM DATA FOR MORE INPUT. 127.0.0.1:3307

 if ($hcode_bool == "true")  { //if all boolean variables are true then run statements below
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

//calculate hcode here. Then check to see if it already exists on the table	
//$iterations = 5;
//$concat_message = "{$vehno}{$paydate}{$payamt}";
//$encrypt_mech = "sha256";
//$salt = mcrypt_create_iv(16, MCRYPT_DEV_URANDOM);
//$hash_bool = "false";


//$hcode = hash_pbkdf2($encrypt_mech, $concat_message, $salt, $iterations, 20);
//CHECK FOR IF THE ABOVE IS ALREADY IN DATABASE
//IF IT ISN'T IN DATABASE THEN $HASH_BOOL BECOMES TRUE $HASH_BOOL = "TRUE";
$sql = "SELECT * FROM  tbl_qrsecure  WHERE fld_qr_hcode = '$hcode'";
$result = mysqli_query($link,$sql);
	if (mysqli_affected_rows($link) !=0){ //match found which is what we want
  					echo "<script type='text/javascript'>alert('Match has been found for primary key hash code')</script>";
  					//echo mysqli_affected_rows($link);
  					$row = mysqli_fetch_array($result);
  					$hcode_echo = hash_pbkdf2($row['fld_qr_encryptmech'], $row['fld_qr_message'], $row['fld_qr_saltno'], $row['fld_qr_iterations'], 10);
  					//echo "<script type='text/javascript'>alert('$hcode_echo')</script>";
  					// if $hcode_echo is equal to $hcode in tbl_payments then its validated $validated_bool = true then open window using search_code so user can look at the receipt to see
  					// if the date is within range.
					//createWindow($hcode_echo);
					$link2 = "<script>window.open('search_hcode.php?q=$hcode_echo', 'ValidateWindow', 'toolbar=yes,scrollbars=yes,resizable=yes,top=500,left=500,width=800,height=600')</script>";
					echo $link2;
					
   					}
   					else {
   							echo "<script type='text/javascript'>alert('Hash code does not exist')</script>";

   							}
mysqli_close($link);
}//end if for bools
?>








<h1>VEHICLE REGISTRATION SYSTEM</h1>
<!-- ============ LEFT COLUMN (MENU) ============== -->
<ul>
  <li><a href="owners.php">Owners</a></li>
  <li><a href="vehicles.php">Vehicles</a></li>
  <li><a href="payments.php">Payments</a></li>
  <li><a class="active" href="#about">Search</a></li>
</ul>

<!-- ============ RIGHT COLUMN (CONTENT) ============== -->
<div style="margin-left:25%;padding:1px 16px;height:1000px;">
				<!--PHP FORM VALIDATION -->
				<p><span class="error">* required field.</span></p>
				<form method="post" action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]);?>">  
			    	<fieldset>
			    		<legend>Hash Code Validation</legend>
			    					    		
			    		<p><label class="field" for="HCode">Hash Code no.</label><input type="text" name="hcode" value="<?php echo $hcode;?>"><span class="error">* <?php echo $hcodeErr;?></span>
			    	</fieldset>
  					<input type="submit" class="button" name="submit" value="Submit">
  					<input type="reset" class="button" value="Clear">  
  					
  				</form>
  				
  				

</div>




</body>


</html>