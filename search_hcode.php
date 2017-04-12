<!DOCTYPE html>
<html>
<head>
<style>
table {
    width: 100%;
    border-collapse: collapse;
}

table, td, th {
    border: 0px solid black;
    padding: 3px;
}

th {text-align: left;}
</style>

<script language="JavaScript"> //Hides button on receipt window when printing
function printPage() {
if(document.all) {
		document.all.divButtons.style.visibility = 'hidden';
		window.print();
		document.all.divButtons.style.visibility = 'visible';
} else {
		document.getElementById('divButtons').style.visibility = 'hidden';
		window.print();
		document.getElementById('divButtons').style.visibility = 'visible';
		}
}
</script>
</head>
<body>

<?php
//include(__DIR__ . '\lib\phpqrcode\qrlib.php');
date_default_timezone_set("America/New_York"); //Sets date for regdate field

$hashcodesearch = ($_GET['q']);

$link = mysqli_connect('localhost', 'root', 'ravelloCloud','db_vehicle_license');
if (!$link) {
    die('Could not connect: ' . mysqli_error($link));
}

echo "<b>"."PAYMENT RECEIPT"."</b>"."<br>";
//echo '<img src="qrcode.php?id='.$hashcodesearch.'" />'; 
echo '<img src="http://open.visualead.com/?data=centos67gui-nssamasterscapston-cyn7zrap.srv.ravcloud.com/search_hcode.php?q='.$hashcodesearch.'&size=300&type=png"/>';


$result_join = mysqli_query($link, "SELECT * FROM  `tbl_owner_reg` AS TOR join `tbl_veh_reg` AS TVR ON TOR.fld_nrn = TVR.fld_owner_nrn join `tbl_payments` AS TP ON TVR.fld_veh_no = TP.fld_pay_vehno  WHERE TP.fld_pay_hcode = '$hashcodesearch'");
echo "<table>
<tr>
<th>First name</th>
<th>Middle name</th>
<th>Last name</th>
<th>Model</th>
<th>Type</th>
</tr>";
while($row_join = mysqli_fetch_array($result_join)) {
    echo "<tr>";
    echo "<td>" . $row_join['fld_fname'] . "</td>";
    echo "<td>" . $row_join['fld_mname'] . "</td>";
    echo "<td>" . $row_join['fld_lname'] . "</td>";
    echo "<td>" . $row_join['fld_veh_model'] . "</td>";
    echo "<td>" . $row_join['fld_veh_type'] . "</td>"; 
    echo "</tr>";
}
echo "</table>";



$result = mysqli_query($link, "SELECT * FROM  tbl_payments  WHERE fld_pay_hcode = '$hashcodesearch'");






echo "<table><tr><th>Veh no. </th><th>Start date</th><th>End date</th><th>Payment Amount</th><th>Payment Date</th></tr>";
 
while($row = mysqli_fetch_array($result)) {
    echo "<tr>";
    echo "<td>" . $row['fld_pay_vehno'] . "</td>";
    echo "<td>" . $row['fld_pay_stdate'] . "</td>";
    
    if ($row['fld_pay_endate'] > date("Y-m-d")){
    echo "<td>" . $row['fld_pay_endate'] . "</td>";
    }
    else {
    		echo "<td style= 'background-color:#FF0000;'>" . $row['fld_pay_endate'] . "</td>";
    	}
    
    echo "<td>" ."$" . $row['fld_pay_amt'] . "</td>";
    echo "<td>" . $row['fld_pay_date'] . "</td>";
    echo "</tr>";
}
echo "</table>";


 
mysqli_close($link);
?>
<div id="divButtons" name="divButtons">
<input type="button" value = "Print Receipt" onclick="printPage()" style="font:bold 11px verdana;color:#FF0000;background-color:#FFFFFF;">
</div>


</body>
</html>