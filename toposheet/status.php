<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.1//EN" "http://www.w3.org/TR/xhtml11/DTD/xhtml11.dtd">
<html xmlns="http://www.w3.org/1999/xhtml" xml:lang="en">
<head>
  <title>Toposheet</title>
  <meta name="description" content="website description" />
  <meta name="keywords" content="website keywords, website keywords" />
  <meta http-equiv="content-type" content="text/html; charset=iso-8859-1" />
  <link rel="stylesheet" type="text/css" href="style.css" />
  <script>
	function printpage()
	{
		window.print();
	}
  </script>
</head>
<body>
<div align="center">
<?PHP
require_once 'login.php';
	date_default_timezone_set('Asia/Calcutta');
	$date_today = time();
	$date_today = date("d/m/Y", $date_today); //changed format
//******************************************************************************
// Status of all Data products
	$sql="SELECT * FROM dataproduct ORDER BY date DESC;";
	$result = mysql_query($sql) or die (mysql_error ()); 
	if (mysql_num_rows($result)>0){
		echo "<h3>Available CSRE Data Products</h3><h4>($date_today)</h4>";
		echo "<table border='1' cellspacing='2' cellpadding='2' width='950'>
		<tr bgcolor ='#E8E8E8'>
		<th>Sr. No.</th>
		<th>Product Name</th>
		<th>Date</th>
		<th>Product ID</th>
		<th>Product Quality</th>
		<th>Product Quantity</th>
		<th>Product Credentials</th>
		<th>Physical Status</th>
		<th>Product Remark</th>
		<th>Rack</th>
		<th>Drawer</th>
		<th>Status</th>
		</tr>";
		$i=0;
		while($row = @mysql_fetch_assoc($result)){
			//for cell colors
			if ($i%2){
				$bgcolor = "#E8E8E8" ;// add color to each row #FFFFFF
			}
			else{
				$bgcolor = "white"; //add color to each row #EEEEEE
			}
			//
			$sn=$i+1;
			//
			$productName = $row['productName'];
			date_default_timezone_set('Asia/Calcutta');
			$date = date("d/m/Y", ($row['date'])); //changed format
			$productId = $row['productId'];
			$productQuantity = $row['productQuantity'];
			$productStatus = $row['productStatus'];
			if($productStatus=='issued'){
				$color = 'red';	}
			else{
				$color = 'green'; }
			
			echo  "<tr align='center' bgcolor ='$bgcolor'><td >".$sn."</td>
				<td>".$productName."</td>
				<td>".$date."</td>
				<td>".$productId."</td>
				<td>".$row['productQuality']."</td>
				<td>".$productQuantity."</td>
				<td>".$row['productCredentials']."</td>
				<td>".$row['productPStatus']."</td>
				<td>".$row['productRemark']."</td>
				<td>".$row['rack']."</td>
				<td>".$row['drawer']."</td>
				<td><font color=$color>".$productStatus."</td>
				
				</tr>";	
			$i=$i+1;
			
		}
		echo"<table>";
	}
//******************************************************************************
// Complete Status of only issued products
	$sql="SELECT * FROM user WHERE userStatus='issued' ORDER BY issueDate DESC;";
	$result = mysql_query($sql) or die (mysql_error ());
	if (mysql_num_rows($result)>0){
		echo "<br/>=====================================================================================================================";
		echo "<h3>Data Products Issue Status</h3><h4>($date_today)</h4>";
		echo "<table border='1' cellspacing='2' cellpadding='2' width='950'><tr bgcolor ='#E8E8E8'>
		<th>Sr. No.</th>
		<th>Issue Date</th>
		<th>Submit Date</th>
		<th>User Name</th>
		<th>User Reg. No</th>
		<th>User email</th>
		<th>Number of issued Products</th>
		<th>Issued Product ID</th>
		<th>Submit Product Remark</th>
		<th>User Status</th>
		</tr>";
		$i=0;
		while($row = @mysql_fetch_assoc($result)){
			//for cell colors
			if ($i%2){
				$bgcolor = "#E8E8E8" ;// add color to each row #FFFFFF
			}
			else{
				$bgcolor = "white"; //add color to each row #EEEEEE
			}
			//
			$sn=$i+1;
			//
			date_default_timezone_set('Asia/Calcutta');
			$issueDate = date("d/m/Y", ($row['issueDate'])); //changed format
			$submitDate=$row['submitDate'];
			if($submitDate!=""){
				$submitDate = date("d/m/Y", ($row['submitDate'])); //changed format
			}
			
			$userStatus = $row['userStatus'];
			if($userStatus=='issued'){
				$color = 'red';	}
			else{
				$color = 'green'; }
			
			echo  "<tr align='center' bgcolor ='$bgcolor'><td >".$sn."</td>
				<td>".$issueDate."</td>
				<td>".$submitDate."</td>
				<td>".$row['userName']."</td>
				<td>".$row['userRegNo']."</td>
				<td>".$row['userEmail']."</td>
				<td>".$row['userProductQty']."</td>
				<td>".$row['userProductId']."</td>
				<td>".$row['userSubmitProductRemark']."</td>
				<td><font color=$color>".$userStatus."</td>
				</tr>";	
			$i=$i+1;
			
		}
		echo"<table>";
	}	
//******************************************************************************
// Complete Status of product issue
	$sql="SELECT * FROM user WHERE userStatus='submitted' ORDER BY issueDate DESC;";
	$result = mysql_query($sql) or die (mysql_error ());
	if (mysql_num_rows($result)>0){
		echo "<br/>=====================================================================================================================";
		echo "<h3>Data Products Submit Status</h3><h4>($date_today)</h4>";
		echo "<table border='1' cellspacing='2' cellpadding='2' width='950'><tr bgcolor ='#E8E8E8'>
		<th>Sr. No.</th>
		<th>Issue Date</th>
		<th>Submit Date</th>
		<th>User Name</th>
		<th>User Reg. No</th>
		<th>User email</th>
		<th>Number of issued Products</th>
		<th>Issued Product ID</th>
		<th>Submit Product Remark</th>
		<th>User Status</th>
		</tr>";
		$i=0;
		while($row = @mysql_fetch_assoc($result)){
			//for cell colors
			if ($i%2){
				$bgcolor = "#E8E8E8" ;// add color to each row #FFFFFF
			}
			else{
				$bgcolor = "white"; //add color to each row #EEEEEE
			}
			//
			$sn=$i+1;
			//
			date_default_timezone_set('Asia/Calcutta');
			$issueDate = date("d/m/Y", ($row['issueDate'])); //changed format
			$submitDate=$row['submitDate'];
			if($submitDate!=""){
				$submitDate = date("d/m/Y", ($row['submitDate'])); //changed format
			}
			
			$userStatus = $row['userStatus'];
			if($userStatus=='issued'){
				$color = 'red';	}
			else{
				$color = 'green'; }
			
			echo  "<tr align='center' bgcolor ='$bgcolor'><td >".$sn."</td>
				<td>".$issueDate."</td>
				<td>".$submitDate."</td>
				<td>".$row['userName']."</td>
				<td>".$row['userRegNo']."</td>
				<td>".$row['userEmail']."</td>
				<td>".$row['userProductQty']."</td>
				<td>".$row['userProductId']."</td>
				<td>".$row['userSubmitProductRemark']."</td>
				<td><font color=$color>".$userStatus."</td>
				</tr>";	
			$i=$i+1;
			
		}
		echo"<table>";
	}
	// close mysql
	mysql_close();
	echo "<br/>=====================================================================================================================";
?>
<ul>
<li><input type="button" value="Print Status" onclick="printpage()" /></li>
</ul>
</div>
</body>
</html>
<?PHP
//********************************************************************************
// Author/s: Suryakant Sawant, <add your name>
// Email/s: suryakant54321@gmail.com, <add your email>
// Date>>Update: 20 June 2013 >> 05 May 2016 >> <add new>										
// Permissions: Feel Free to change/ edit any part of code. Just keep this section as is :)
//********************************************************************************
?>