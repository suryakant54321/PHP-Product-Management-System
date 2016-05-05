<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.1//EN" "http://www.w3.org/TR/xhtml11/DTD/xhtml11.dtd">
<html xmlns="http://www.w3.org/1999/xhtml" xml:lang="en">
<head>
  <title>Toposheet</title>
  <meta name="description" content="website description" />
  <meta name="keywords" content="website keywords, website keywords" />
  <meta http-equiv="content-type" content="text/html; charset=iso-8859-1" />
  <link rel="stylesheet" type="text/css" href="style.css" />
</head>
<body>
<div align="center">
<?php 
	include("..//toposheet//protection//login.php");
	echo "<ul>
	<li><a href='protection/login.php?logout' target='content'><font color='brown'>Logout</font></a></li>
	</ul>";
	require_once 'login.php';
	//to improve security 
	//htmlspecialchars($_SERVER['PHP_SELF'])
	$phpSelf = filter_input(INPUT_SERVER, 'PHP_SELF', FILTER_SANITIZE_URL);
	//***********************************************************************************	
	// Decision issue / submit
	echo "<table><tr>
			<td><form method='post' action='".$phpSelf."'>
			<input type='submit' name='issue' value='Issue Product'/>
			</form></td>
			<td><form method='post' action='".$phpSelf."'>
			<input type='submit' name='submit' value='Submit Product'/>
			</form></td>
			</tr></table>";
	//***********************************************************************************
	// Issue - 1	
	if (isset($_POST['issue'])){
	$sql="SELECT * FROM dataproduct WHERE productStatus='not_issued';";
	$result = mysql_query($sql) or die (mysql_error ()); 
		if (mysql_num_rows($result)>0){
			echo "<h3>Available CSRE Data Products</h3>";
			echo "<table border='1' cellspacing='2' cellpadding='2' width='950'>
			<tr bgcolor ='#E8E8E8'>
			<th>Sr. No.</th>
			<th>Product Name</th>
			<th>Product ID</th>
			<th>Product Quantity</th>
			<th>Product Credentials</th>
			<th>Physical Status</th>
			<th>Product Remark</th>
			<th>Rack</th>
			<th>Drawer</th>
			<th>Select</th>
			</tr>";
			$i=0;
			echo "<form method='post' action='".$phpSelf."'>";
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
				
				$productId = $row['productId'];
				$productQuantity = $row['productQuantity'];
				echo "<tr align='center' bgcolor ='$bgcolor'><td >".$sn."</td>
					<td>".$productName."</td>
					<td>".$productId."</td>
					<td><font color='red'>".$productQuantity."</font></td>
					<td>".$row['productCredentials']."</td>
					<td>".$row['productPStatus']."</td>
					<td>".$row['productRemark']."</td>
					<td>".$row['rack']."</td>
					<td>".$row['drawer']."</td>
					<td><input type='checkbox' name='productID[]' value='$productId'></td></tr>";	
				$i=$i+1;
				
			}
			
			echo "<tr><td colspan='10' align='center'><input type='submit' name='issue_product' value='Next'/></td></tr>
				  </form></table>";
			mysql_close();
		}
	}
	//***********************************************************************************
	// Issue - 2
	if (isset($_POST['issue_product'])){
		// Get values from form
		$productID = $_POST['productID'];
		$products = sizeof($productID);
		session_start();
		$_SESSION['productIDs'] = $productID;
		if($products>0){
			//print_r($productID);
			$issue_id = implode(",", $productID);
			//echo $issue_id;
			echo"<h2>Enter the user details</h2>
				<div id='entry'>
					<section id='top_area'>
						<article class='box-right'>
								<form action='".$phpSelf."' method='post'>
									<table>
									<tr><td><label>User Name:</label></td>
										<td><input name='userName' required='required' type='text'></td>
									</tr>
									<tr><td><label>User Registration Number:</label></td>
										<td><input name='userRegNo' required='required' type='text'></td>
									</tr> 
									<tr><td><label>User Email:</label></td>
										<td><input name='userEmail' required='required' type='text'></td>
									</tr> 
									<tr><td><label>User Contact:</label></td>
										<td><input name='userContact' required='required' type='text'></td> 
									</tr>
									<tr><td><label>User Department:</label></td>
										<td><input name='userDept' required='required' type='text'></td>
									</tr> 
									<tr><td><label>User Advisor Name:</label></td>
										<td><input name='userGuideName' required='required' type='text'></td>
									</tr> 
									<tr><td><label>Purpose of Use:</label></td>
										<td><input name='userPurpose' required='required' type='text'></td>
									</tr> 
									<tr><td><label>Product Quantity:</label></td>
										<td><input name='userProductQty' required='required' type='hidden' value='$products'> $products</td>
									</tr> 
									<tr><td><label>userProductId:</label></td>
										<td><input name='userProductId' required='required' type='hidden' value='$issue_id'> $issue_id</td>
									</tr> 
									<tr><td></td><td><input value='Submit' name='issue_product_1' type='submit'> </td></tr>
								</table>					
								</form>
						</article>
					</section>
				</div>";
		}
		else{
		 echo "<br/> <h2><font color='red'>No Product Selected</font></h2>";
		}
	}
	//***********************************************************************************
	// Issue - 3
	if (isset($_POST['issue_product_1'])){
		// Get values from form
		date_default_timezone_set('Asia/Calcutta');
		$issueDate = time();
		$userName = $_POST['userName'];
		$userRegNo = $_POST['userRegNo'];
		$userEmail = $_POST['userEmail'];
		$userContact = $_POST['userContact'];
		$userDept = $_POST['userDept'];
		$userGuideName = $_POST['userGuideName'];
		$userPurpose = $_POST['userPurpose'];
		$userProductQty = $_POST['userProductQty'];
		$userProductId = $_POST['userProductId'];
		
		session_start();
		$productID_array = $_SESSION['productIDs'];
		$products = sizeof($productID_array);
		// Insert data into mysql
		$sql="INSERT INTO user (issueDate, userName, userRegNo, userEmail, userContact, userDept, userGuideName, userPurpose, userProductQty, userProductId) VALUES ('$issueDate', '$userName', '$userRegNo', '$userEmail', '$userContact', '$userDept', '$userGuideName', '$userPurpose', '$userProductQty', '$userProductId')";
		$result = mysql_query($sql); 

		// if successfully insert data into database, displays message "Successful".
		if($result){
			for($i=0; $i<$products; $i++){
				$prodID = $productID_array[$i];
				$sql1="UPDATE dataproduct SET productStatus='issued' WHERE productId='$prodID';";
				$result1 = mysql_query($sql1);
			}
			echo "<h3><font color='green'>Data entered successfully.</font></h3>";
		}
		else {
			echo "<h3><font color='red'>Database updation error.</font></h3>";
		}
	}
	//***********************************************************************************
	// Submit - 1
	if (isset($_POST['submit'])){
	$sql="SELECT * FROM user WHERE userStatus='issued' ORDER BY issueDate DESC;";
	$result = mysql_query($sql) or die (mysql_error ());; 
		if (mysql_num_rows($result)>0){
			echo "<h3>Data Products Issue Status</h3>";
			echo "<table border='1' cellspacing='2' cellpadding='2' width='950'><tr bgcolor ='#E8E8E8'>
			<th>Sr. No.</th>
			<th>Issue Date</th>
			<th>Submit Date</th>
			<th>User Name</th>
			<th>User Reg. No</th>
			<th>User email</th>
			<th>Number of issued Products</th>
			<th>Issued Product ID</th>
			<th>User Status</th>
			<th>Edit</th>
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
					<td><font color=$color>".$userStatus."</td>
					<td><form method='post' action='".$phpSelf."'>
						<input type='hidden' name='issueDate' value='".$issueDate."'/>
						<input type='hidden' name='userName' value='".$row['userName']."'/>
						<input type='hidden' name='userRegNo' value='".$row['userRegNo']."'/>
						<input type='hidden' name='userProductId' value='".$row['userProductId']."'/>
						<input type='submit' name='submit_product' value='Edit'/>
						</form></td>
					</tr>";	
				$i=$i+1;
				
			}
			echo"<table>";
			
		}
	}
	//***********************************************************************************
	// Submit - 2	
	if (isset($_POST['submit_product'])){
		$issueDate = $_POST['issueDate'];
		$userName = $_POST['userName'];
		$userRegNo = $_POST['userRegNo'];
		$userProductId = $_POST['userProductId'];
		// Split String into array
		$UprodID = preg_split('/,/', $userProductId);
		//print_r($UprodID);
		$Uproducts = sizeof($UprodID);
		for($i=0; $i<$Uproducts; $i++){
			$UserProdID = $UprodID[$i];
			//echo "$UserProdID";
		}
		echo "<br/><h3>All products issued by $userName ($userRegNo) will be submitted after you click submit button.</h3>";
		echo "<table>
			<tr><th>Product ID: </th> <td>$userProductId</td></tr>
			<tr><th>Number of Products: </th><td>$Uproducts</td></tr>
			<tr><th>Remarks on Product:</th><td>
				<form method='post' action='".$phpSelf."'>
				<input type='text' name='Remarks' value='no damage to product'/></td></tr>
			<tr><td colspan='2' align='center'>
				<input type='hidden' name='issueDate' value='".$issueDate."'/>
				<input type='hidden' name='userName' value='".$userName."'/>
				<input type='hidden' name='userRegNo' value='".$userRegNo."'/>
				<input type='hidden' name='userProductId' value='".$userProductId."'/>
				<input type='submit' name='submit_product1' value='Submit All'/>
				</form>
			</td></tr>
			</table>";
	}
	//***********************************************************************************
	// Submit - 3
	if (isset($_POST['submit_product1'])){
		$userSubmitProductRemark = $_POST['Remarks'];
		$issueDate = $_POST['issueDate'];
		$userName = $_POST['userName'];
		$userRegNo = $_POST['userRegNo'];
		$userProductId = $_POST['userProductId'];
		date_default_timezone_set('Asia/Calcutta');
		$submitDate = time();
		// Split String into array
		$UprodID = preg_split('/,/', $userProductId);
		//
		$Uproducts = sizeof($UprodID);
		//
		$sql="UPDATE user SET userStatus='submitted', submitDate='$submitDate', userSubmitProductRemark='$userSubmitProductRemark' WHERE userRegNo='$userRegNo';";
		$result = mysql_query($sql) or die(mysql_error());
		
		for($i=0; $i<$Uproducts; $i++){
			$UserProdID = $UprodID[$i];
			$sql1="UPDATE dataproduct SET productStatus='not_issued' WHERE productId='$UserProdID';";
			$result1 = mysql_query($sql1) or die(mysql_error());
		}
		$submitDate1 = date("d/m/Y", ($submitDate)); //changed format
		echo "<br/> <h3>Data products submitted by $userName on $submitDate1</h3>";
	}
?>
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