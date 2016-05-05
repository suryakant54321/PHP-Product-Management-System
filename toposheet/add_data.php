<!DOCTYPE html PUBLIC "-//W3C//DTD HTML 4.01//EN">
<?php include("..//toposheet//protection//login.php"); ?>
<?php
	echo "<ul>
	<li><a href='protection/login.php?logout' target='content'><font color='brown'>Logout</font></a></li>
	</ul>";
	//to improve security 
	//htmlspecialchars($_SERVER['PHP_SELF'])
	$phpSelf = filter_input(INPUT_SERVER, 'PHP_SELF', FILTER_SANITIZE_URL);
?>	
<html>
<head>
  <title>CSRE Data products</title>
  <link rel="stylesheet" href="style.css">
</head>
<body>
<?php
echo "<div align='center'>";
if (isset($_POST['input_data'])){
	require_once 'login.php'; 
	// Get values from form
	$Date       = $_POST['date'];
	date_default_timezone_set('Asia/Calcutta');
	//$Date = time();
	$Date = strtotime($Date);
	$Pname = $_POST['product_name'];	
	$Pid = $_POST['product_id'];
	$P_quality = $_POST['p_quality'];	
	$P_scale = $_POST['product_scale'];
	$P_quantity = $_POST['product_quantity'];	
	$P_Credentials = $_POST['Credentials'];
	$P_ststus = $_POST['ststus'];
	$P_remark = $_POST['remark'];
	$P_rack = $_POST['rack'];
	$P_drawer = $_POST['drawer'];

	// Insert data into mysql
	$sql="INSERT INTO dataproduct (date, productName, productId, productScale, productQuality, productQuantity, productCredentials, productPStatus,productRemark, rack, drawer) VALUES ('$Date', '$Pname', '$Pid ','$P_scale' , '$P_quality','$P_quantity ','$P_Credentials' ,'$P_ststus', '$P_remark', '$P_rack', '$P_drawer')";
	$result = mysql_query($sql); 

	// if successfully insert data into database, displays message "Successful".
	if($result){
		echo "<h3><font color='green'>Data entered successfully.</font></h3>";
	}
	else {
		echo "<h3><font color='red'>Data product already exists. Please check Status.</font></h3>";
	}
	// close mysql
	mysql_close();
}
// ******************************************************************************* 
echo"<h2>Enter the information about data product</h2>
<div id='entry'>
    <section id='top_area'>
        <article class='box-right'>
                <form action='".$phpSelf."' method='post'>
                    <table><tr> 
                        <td><label>Date of Entry:</label></td>
                        <td><input name='date' required='required' placeholder='dd-mm-YYYY' type='text'></td>
                    </tr>
					<tr><td><label>Product Name:</label></td>
                        <td><input name='product_name' required='required' placeholder='toposheet/ IRS image' type='text'></td>
                    </tr>
					<tr><td><label>Product ID:</label></td>
                        <td><input name='product_id' required='required' placeholder=' 54_E_27 ' type='text'></td>
                    </tr> 
					<tr><td><label>Product Scale:</label></td>
                        <td><input name='product_scale' required='required' placeholder=' 1:50000 ' type='text'></td>
                    </tr> 
                    <tr><td><label>Product Quality:</label></td>
                        <td><input name='p_quality' placeholder='IRS Images RGB, BW, Grayscale,' type='text'></td> 
                    </tr>
					<tr><td><label>Product Quantity:</label></td>
                        <td><input name='product_quantity' required='required' placeholder=' 1,2,etc. ' type='text'></td>
                    </tr> 
					<tr><td><label>Product Credentials:</label></td>
                        <td><input type='radio' name='Credentials' value='Restricted' checked='checked' /><label>Restricted</label>
                        <input type='radio' name='Credentials' value='Non Restricted' /> <label>Non Restricted</label></td>                  
                    </tr>
                    <tr><td><label>Product Status:</label></td>
                        <td><input type='radio' name='ststus' value='Good' checked='checked' /><label>Good</label>
                        <input type='radio' name='ststus' value='Less Damage' /> <label>Less Damage</label>
                        <input type='radio' name='ststus' value='High Damage' /> <label>High Damage</label></td>						
                    </tr>
					<tr><td><label>Product Remark:</label></td>
                        <td><input type='radio' name='remark' value='Laminated' checked='checked' /><label>Laminated</label>
                        <input type='radio' name='remark' value='Non Laminated' /> <label>Non Laminated</label></td>                  
                    </tr>
					<tr><td><label>Rack:</label></td>
                        <td><input name='rack' required='required' placeholder=' . ' type='text'></td>
                    </tr> 
					<tr><td><label>Drawer:</label></td>
                        <td><input name='drawer' required='required' placeholder='  ' type='text'></td>
                    </tr> 
                    <tr><td></td><td><input value='Submit' name='input_data' type='submit'> </td></tr>
				</table>					
    			</form>
        </article>
    </section>
</div>";
// ******************************************************************************* 
echo "</div><br/><br/>";

echo "<div align='center'>";
echo "<a><font color='red'><b>To do :</b> Procedure to remove data product.</font></a>";
echo "</div>";
?>

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