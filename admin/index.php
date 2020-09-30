<?PHP
include ('../includes/adminheader.php'); //the upper part of the website. 

?>	 
			
				<div class="row" style='background-color:white;' >
				  <div class='col-md-4' style='padding-bottom:500px; '> <!-- Left vertical menu -->						
				  
				  </div>
				  
				  <div class='col-md-4' style='padding:10px; background-color:white;'> <!-- right side with products -->
				  
				  <?PHP //START of BLOCK 1  ?>
				  <div class='row' >
				  
					
					
					<?PHP
					$check=0; //Initial value of check
					
		if(isset($_GET['view']))
			{
			$check=1;
			$orderid=$_GET['orderid'];
			
			}
						
		if(isset($_POST['fulfilled']))
					{
					$check=3;
					$orderid=$_POST['orderid'];
					$status='fulfilled';
					
					$conn4 = new mysqli($server, $user_name, $pass_word, $database);
							if ($conn4->connect_error)
						{
						die("Connection failed: " . $conn4->connect_error);
						}
						
			if ($stmt = $conn4->prepare("UPDATE orders2 SET orderstatus = ? WHERE orderid = ? ")) 
			{
 
			// Bind the variables to the parameter as strings. 
			$stmt->bind_param("ss", $status, $orderid);
 
			// Execute the statement.
			$stmt->execute();
 
			// Close the prepared statement.
			$stmt->close();
			$conn4->close();
 
		echo "<h4 style='background-color: silver; color:green; padding: 10px;' >Order was successfully marked as fulfilled   </h4>";
			}
					
					}
					
					if(isset($_POST['removed']))
					{
					$check=3;
					$orderid=$_POST['orderid'];
					
					$status='removed';
					
					$conn4 = new mysqli($server, $user_name, $pass_word, $database);
							if ($conn4->connect_error)
						{
						die("Connection failed: " . $conn4->connect_error);
						}
						
			if ($stmt = $conn4->prepare("UPDATE orders2 SET orderstatus = ? WHERE orderid = ? ")) 
			{
 
			// Bind the variables to the parameter as strings. 
			$stmt->bind_param("ss", $status, $orderid);
 
			// Execute the statement.
			$stmt->execute();
 
			// Close the prepared statement.
			$stmt->close();
			$conn4->close();
 
		echo "<h4 style='background-color: silver; color:green; padding: 10px; ' >Order was successfully removed from current orders   </h4>";
			}
					
					}
					
					if($check==0)
						{
						echo" <h4 style='text-align:center;'>Current Orders </h4>";
							
						$SQL = "SELECT * FROM orders2 WHERE orderstatus !='fulfilled' AND orderstatus !='removed' ORDER BY orderid ASC ";
						$result1 = mysqli_query($conn, $SQL);
							if(!$result1)//checking whether the database connection has been successful
								{
									echo 'Database error';
										die;	
								}
							$num_rows1 = mysqli_num_rows($result1);
													
										if ($num_rows1 < 1)
													{
													echo "<p style='color: red;'>No current order was found.</p>";
													die;	
													}	
							else
							{
						$no=0; //initializing the order count 
						echo "<table border='1'  cellpadding='5' cellspacing='5'> <tr> <td>No. </td> <td style='padding:5px'>Order ID </td> <td style='padding:5px'>Order Total ($currency)</td> <td style='padding:5px'> Grand Total ($currency) </td>  </tr> ";
					
						while($row = mysqli_fetch_array($result1, MYSQLI_ASSOC))   
		
							{
								
						$no++;
						$orderid=$row['orderid'];
						$ordertotal=$row['ordertotal'];
						$grandtotal=$row['grandtotal'];
						
						echo "<tr> <td> $no. </td> <td style='padding:5px'> $orderid </td> <td style='padding:5px'> $ordertotal </td> <td style='padding:5px'> $grandtotal </td>  <td style='padding:5px'> <a href='?view=1&orderid=$orderid' >View </a> </td></tr>";
					
							}
						echo "</table>";
					
							}
					
						}

					//Beginning of GET order details
					if($check==1)
						{
						
						echo" <h4 style='text-align:center; color:white; background-color:black;'>Order #$orderid Details</h4>";	
						
						$SQL = "SELECT * FROM orders2 WHERE orderstatus !='fulfilled' AND orderstatus !='removed' AND orderid='$orderid' ORDER BY orderid ASC ";
						$result1 = mysqli_query($conn, $SQL);
							if(!$result1)//checking whether the database connection has been successful
								{
									echo 'Database error';
										die;	
								}
							$num_rows1 = mysqli_num_rows($result1);
													
										if ($num_rows1 < 1)
													{
													echo "<p style='color: red;'>No current order was found.</p>";
													die;	
													}	
							else
							{
						$no=0; //initializing the order count 
						echo "<table border='1'  cellpadding='5' cellspacing='5'> <tr> <td>No. </td> <td style='padding:5px'>Order ID </td> <td style='padding:5px'>Order Total ($currency)</td> <td style='padding:5px'> Grand Total ($currency) </td>  </tr> ";
					
						while($row = mysqli_fetch_array($result1, MYSQLI_ASSOC))   
		
							{
								
						$no++;
						$orderid=$row['orderid'];
						$ordertotal=$row['ordertotal'];
						$grandtotal=$row['grandtotal'];
						
						$details=$row['details'];
						$firstname=$row['firstname'];
						$lastname=$row['lastname'];
						$email=$row['email'];
						$phone=$row['phone'];
						$town=$row['town'];
						$address=$row['address'];
						$paymentoption=$row['paymentoption'];
						
						
						echo "<tr> <td> $no. </td> <td style='padding:5px'> $orderid </td> <td style='padding:5px'> $ordertotal </td> <td style='padding:5px'> $grandtotal </td> </tr>";
						
					echo	" <p style='padding:10px; '> <strong style='background-color:silver; '> Customer Profile  </strong></p>
					<p style='padding:10px; ' >Customer First Name: $firstname  <br />
							Customer Last Name:   $lastname<br />
							Customer Email:   $email <br />
							Customer Phone no. : $phone  <br />
							Customer Town:  $town <br />
							Customer Address: $address  <br />
							Payment Option:   $paymentoption <br />
						<p style='padding:10px; '> <strong style='background-color:silver; '> Order Details and the Products Ordered:  </strong></p> <br />
								$details		
							</p>";
							
							}
						echo "</table>";
					
							}
							
						echo "<p style='padding:10px; '> <strong style='background-color:silver; '> 
					<form name='form5' method='POST' action='' >
					<input type='hidden'  name='orderid' value='$orderid' required  />
					<input  style='padding:10px; color: green; ' type = 'Submit' name = 'fulfilled' value = 'Mark order as fullfilled' /> 
					</form>						</strong></p>
						
						<p style='padding:10px; '> <strong style='background-color:silver; '> 
						<form name='form5' method='POST' action='' >
					<input type='hidden'  name='orderid' value='$orderid' required  />
					<input style='padding:10px; color: green; ' type = 'Submit' name = 'removed' value = 'Remove order from current orders' /> 
					</form>
						</strong></p>
						";
					
						}		
					
					//End of GET order details.
			
								?>
			</div>  <!--Enclosing row within a column -->
			
			<?PHP
			//END of BLOCK 1
			?>				
										
								</div>  <!--End of 9 column for products -->
				  </div>
				  
				 
	<?PHP
include ('../includes/footer.php'); //the upper part of the website. 

	?>	 
	 
   </div> <!-- End of container fluid -->
   </body>
   </html>