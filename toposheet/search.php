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
<?PHP
	require_once 'login.php';
	//to improve security 
	//htmlspecialchars($_SERVER['PHP_SELF'])
	$phpSelf = filter_input(INPUT_SERVER, 'PHP_SELF', FILTER_SANITIZE_URL);
	//***********************************************************************************	
	// Search Form
	echo "<table>
			<tr><th>Search Product:</th>
			<td><form method='post' action='".$phpSelf."'>
			<input type='text' required='required' name='productId'/></td></tr>
			<tr><td colspan='2' align='center'>
			<input type='submit' name='search_p' value='Search Product'/>
			</form></td>
			</tr></table>";
	echo "<br/>=====================================================================================================================";		
	//******************************************************************************
	// Search Data product by product ID
	if (isset($_POST['search_p'])){
		// Get values from form
		$productID = $_POST['productId'];
		$sql="SELECT  productId, productCredentials, rack, drawer, productStatus FROM dataproduct WHERE productId='$productID' ORDER BY date DESC;";
		$result = mysql_query($sql) or die (mysql_error ()); 
		if (mysql_num_rows($result)>0){
			echo "<h3>Data Product Details</h3>";
			echo "<table border='1' cellspacing='2' cellpadding='2' width='950'>
			<tr bgcolor ='#E8E8E8'>
			<th>Sr. No.</th>
			<th>Product ID</th>
			<th>Product Credentials</th>
			<th>Rack</th>
			<th>Drawer</th>
			<th>Status</th></tr>";
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
				$productStatus = $row['productStatus'];
				if($productStatus=='issued'){
					$color = 'red';	}
				else{
					$color = 'green'; }
				echo  "<tr align='center' bgcolor ='$bgcolor'><td >".$sn."</td>
					<td>".$row['productId']."</td>
					<td>".$row['productCredentials']."</td>
					<td>".$row['rack']."</td>
					<td>".$row['drawer']."</td>
					<td><font color=$color>".$productStatus."</td>
					</tr>";	
				$i=$i+1;
			}
			echo"<table>";
		}
		else{
			echo "<br/><h3><font color='red'>No product with ID: $productID was found...</font></h3>";
		}
	}
	// close mysql
	mysql_close();
	echo "<br/>=====================================================================================================================";			
?>

</div>
</body>
</html>
<?PHP
//********************************************************************************
//*				Designed By													******
//*				Mr. Suryakant Sawant 										******
//*				Agro-Informatics Lab 										******
//*				CSRE IITB													******
//*				Feel Free to change/ edit any part of code					******
//********************************************************************************
?>