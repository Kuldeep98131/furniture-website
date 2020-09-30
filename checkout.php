<?PHP
include('includes/prebody.php');
?>
	 
			
				<div class="row" style='padding-bottom:500px; '>
				  <div class='col-md-3' style='padding-top:0px; '> 
				  
						
				  
				  </div>
				  
					<div class='col-md-6' style='padding-bottom:5px; background-color:silver;'> 
				  <h3>Purchase Summary   </h3>
				<?PHP
				
	//Start of update product status to removed
	if(isset($_POST['submit10']))
		{
			
			$status='removed';
			$productaddress=$_POST['productaddress'];
			$tableid=$_POST['tableid'];
			
			$conn4 = new mysqli($server, $user_name, $pass_word, $database);
							if ($conn4->connect_error)
						{
						die("Connection failed: " . $conn4->connect_error);
						}
						
			if ($stmt = $conn4->prepare("UPDATE orders1 SET productstatus = ? WHERE productid = ? AND tableid= ? ")) 
			{
 
			// Bind the variables to the parameter as strings. 
			$stmt->bind_param("sss", $status,  $productaddress, $tableid);
 
			// Execute the statement.
			$stmt->execute();
 
			// Close the prepared statement.
			$stmt->close();
			$conn4->close();
 
			}
	
		}
	
	
	
	//End of update product status to removed.
	
	
				  //Start of fetch product details
	$SQL = "SELECT * FROM orders1 WHERE visitorid ='$visitorid' AND productstatus!='removed' ";
			$result1 = mysqli_query($conn, $SQL);
			if(!$result1)//checking whether the database connection has been successful
				{
					echo 'Database error';
						die;	
				}
		$num_rows1 = mysqli_num_rows($result1);
								
		if ($num_rows1 < 1)
			{
			echo "<p style='color: red;'>No product was found in the cart. Click <a href='index.php'> here to start shopping.</a></p>";
			
			die;	
			}	
		else
		{
			$no=1;
			$total=0; //setting the intial value
			$details=" "; //the details variable to be concatated. 
			
			echo "<table border='1'  cellpadding='5' cellspacing='5'> <tr> <td>No. </td> <td style='padding:5px'>Product Name </td> <td style='padding:5px'>Description </td> <td style='padding:5px'>Price ($currency) </td>  </tr> ";
			
		while($row = mysqli_fetch_array($result1, MYSQLI_ASSOC))
			{
			$imagelink=$row['imagelink'];
			$productid=$row['productid'];
			$tableid=$row['tableid'];
			$productname=$row['productname'];
			$productdescription=$row['productdescription'];
			$productprice=$row['productprice']; 
			
		$details=$details."<p> ".$no.". Product ID ".$productid." Product name: ".$productname." Product Price: ".$productprice. "</p>"; //concatenation
			
			echo "<tr> <td>$no. </td> <td style='padding:5px'>$productname </td> <td style='padding:5px'>$productdescription </td> <td style='padding:5px'>$productprice </td>  
			<td style='padding:5px'> 

					<form name='form5' method='POST' action='' >
					<input type='hidden'  name='productaddress' value='$productid' required  />
					<input type='hidden'  name='tableid' value='$tableid' required  />
					<p style='color: red;'><input type = 'Submit' name = 'submit10' value = 'Remove' /> </p>
					</form>
					
			</td></tr> ";
					
					
					$no++; //This increments the product count.
			
			$total=$total+$productprice; //totalling the price	

			//Start of associative array
			$idproduct[$no]=$productid;
			//End of associative array.
			}
			
			echo " <tr><td style='padding:5px'> </td> <td style='padding:5px'> </td>
			<td style='padding:5px'>Total </td> <td style='padding:5px'> $total</td> </tr> </table>"; //Table closing tag, outside the while loop.
			
			$grand=$total+1000; //adding shipping fee
			echo "<p><strong>Fixed shipping fee: $currency 1000 </strong></p>
			<h4><strong>Grand Total: $currency $grand   </strong>  <h4>";
			
		}
		
		
	//End of fetch product details
	
			?>
			
			<h3>Shipping Details   </h3>
			<form name="form1" method="POST" action="<?php $_PHP_SELF ?>" >
					<br />
					<table>
					<tr>
					<td>   <label>First name  </label>  </td> <td><input type='text'  name='firstname' placeholder='First name' required  /> </td>  </tr>
	
					<tr> 
					<td> <label> Last name </label> </td> <td><input type='text'  name='lastname' placeholder='Last name' required  /> </td>  </tr>
			
					<tr>
					<td>  <label>Email  </label> </td> <td><input type='email'  name='email' placeholder='Email' value=''   required /> </td>  </tr>
					
					<tr>
					<td> <label>Phone Number  </label> </td> <td><input type='text'  name='phone' placeholder='Phone number' value=''   required /> </td>  </tr>
					
					<tr>
					<td> <label>Town  </label> </td> <td><input type='text'  name='town' placeholder='Town' value=''   required /> </td>  </tr>
					
					<tr>
					<td> <label>Postal Address  </label> </td> <td><input type='text'  name='address' placeholder='Postal address' value='' required  
					size='30' /> </td>  </tr>
					
					<tr>
					<td>
				<label> Payment Option </label> </td> <td>
				<select id="delivery" name='delivery' onchange="calculateTotal()">
                <option value="ondelivery">Pay on delivery</option>
                <option value="paynow">Pay now</option>
				</select>
					<br /> </td>  </tr>
				
					<tr>
					<td><input type = "Submit" name = "submit4" value = "Confirm and submit" /> </td>  </tr> </table>
					</form>
					
					
			<?PHP
			
		//Beginning of insert order details
		if(isset($_POST['submit4']))
		{
		$firstname=$_POST['firstname'];
		$lastname=$_POST['lastname'];
		$email=$_POST['email'];
		$phone=$_POST['phone'];
		$town=$_POST['town'];
		$address=$_POST['address'];
		$delivery=$_POST['delivery'];
		
	$conn1 = new mysqli($server, $user_name, $pass_word, $database);
	if ($conn1->connect_error)
		{
		die("Connection failed: " . $conn1->connect_error);
		}
		// prepare and bind
	$statement = $conn1->prepare("INSERT INTO orders2 (details, ordertotal, grandtotal, firstname, lastname, email, phone, town, address, paymentoption)
	VALUES (?,?, ?,?,?,?,?, ?,?,?)");
	$statement->bind_param("ssssssssss", $details, $total, $grand, $firstname, $lastname, $email, $phone, $town, $address, $delivery);

	$statement->execute();

	$statement->close();
	$conn1->close();
		
	echo	"
				<script>
				setTimeout(function() {
				  window.location.href = 'successful_submission.php';
				}, 2000);
				</script>
			";				
		}
		
		//End of insert order details 
			
			?>
			
					</div> 
				  </div>
				  
				 
	<?PHP
		include('includes/footer.php');
	?>
	 
   </div> <!-- End of container fluid -->
   </body>
   </html>