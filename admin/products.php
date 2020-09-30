<?PHP
include ('../includes/adminheader.php'); //the upper part of the website. 

?>	 
	 
			
				<div class="row" style='background-color:silver;' >
				  <div class='col-md-3' style='padding-top:0px; '> <!-- Left vertical menu -->
				  
				  
				  </div>
				  
				  <div class='col-md-9' style='padding-top:0px; background-color:white;'> <!-- right side with products -->
				  
				  <?PHP //START of BLOCK 1  ?>
				  <div class='row' >
				  
					<h4 style='text-align:center;'>Products </h4>
					
					<?PHP
					
					$id=1; //setting the initial id value
					$combined=">=$id"; //Combining initial logic.
					
					$check=0; //initial value for check variable.
					
					if(isset($_POST['next1']))   //This checks if the next button has been clicked
					
						{
							$id=$_POST['id'];
							$combined="<=$id";
							$check=1; //this value is checked before back is displayed. If Next buton was not clicked, it's not shown.
						}
						
					if(isset($_POST['back1']))   //This checks if the back button has been clicked
					
						{
							$id=$_POST['id'];
							$combined=">=$id";
							$check=1; //this value is checked before back is displayed.
						}
					
					
					$SQL = "SELECT * FROM products WHERE productid $combined AND status !='removed' ORDER BY productid DESC ";
					$result1 = mysqli_query($conn, $SQL);
						if(!$result1)//checking whether the database connection has been successful
							{
								echo 'Database error';
									die;	
							}
						$num_rows1 = mysqli_num_rows($result1);
												
									if ($num_rows1 < 1)
												{
												echo "<p style='color: red;'>Products not found.</p>";
												//die;	
												}	
						else
						{
				$counter=1; //setting the initial value
					while($row = mysqli_fetch_array($result1, MYSQLI_ASSOC))   
	
						{
				if($counter>6) //Two rows, each of 3 columns will have been filled by this loop count value.
				{
					
					break;
				}
					
					
					echo "<div class='col-md-4' style='padding:10px'>";//column div
					
					$imagelink=$row['imagelink']; //fetching the image link from db.
					$id=$row['productid']; //fetching the last product id.
					$productid=$row['productid'];
					$productname=$row['productname'];
					$offerprice=$row['offerprice'];
					$price=$row['price'];
					
					$form1="form$productid";
					$results1="results$productid";
					$redirect="redirect$productid";
					$trend="trend$productid";
					$loading="loading$productid";
					$addbutton="add$productid";
					
					echo "<h4 style='background-color:silver;'> $productname  </h4>";
					echo "<img src='../$imagelink'   alt='image' width='100%' />";
					
					echo "<strong> $currency $offerprice </strong> <br />";
					
					if($price>0) //meaning #price was set. I.e offerprice is a requirement but #price is not. so it can also have not been set.
					{
					echo "<strong> <del>$currency $price</del> </strong> <br />";
					}
					
					//Form to submit details asyncronously.
				echo"	
					<form id= '$form1' >
        <input type='hidden' name='productid' value='$productid' >
		
		<input type='submit' name='add' id='$addbutton' value='Delete Product'>
		
			<div style='padding: 0px; background-color: black; color: white; position: fixed; top: 30%; left: 20%; z-index:400000; width: 60%; text-align:center' id='$results1'> </div>		
					</form>
					";
				//End of form to submit details asynchronously.
				
				//Various displays.
		echo "<p id='$trend'style='text-align:right'></p> 
			<img src='loading.gif' id='$loading' alt='loading' style='display:none;' />
			";
				
				//End of various ajax displays.
		
		//Beginning of JavaScript
		echo"
				<script type='text/javascript'>
					//beginning of data transfer to backend PHP file
					
				$(document).ready(function(){
						
						var form1 = '$form1';
						var results1='$results1';
						var addbutton='$addbutton';
						
			//End of data transfer to backend PHP file
				
				//Beginning of hide  'Add to Cart' button
				$('#'+addbutton).click(function() 
				{
				$('#'+addbutton).hide();
				});
				
				//End of hide  'Add to Cart' button
				
					 $('#'+form1).submit(function(event){
						// Stop form from submitting normally
						event.preventDefault();
						
						/* Serialize the submitted form control values to be sent to the web server with the request */
						var formValues = $(this).serialize();
						
						// Send the form data using post
						$.post('../includes/delete_product_process.php', formValues, function(data){
							// Display the returned data in browser
							$('#'+results1).html(data);
						});
					});
				});
				
				</script>
					";
		
		//End of JavaScript
					echo "</div>"; //close column div
										
					$counter++; //incrementing the counter.
						}
				
						}
				
								
			
								?>
			</div>  <!--Enclosing row within a column -->
			
			<?PHP
			echo "<form name='form1' method='POST' action='' enctype='multipart/form-data'>
					<br />
					
					<p><input type='hidden'  name='id' value=$id  />
					<input type = 'submit' name = 'next1' value = 'Next Page>>>'>
					</form>" ;
					
					if($check==1)
					{
				echo "<form name='form1' method='POST' action='' enctype='multipart/form-data'>
					<br />
					
					<p><input type='hidden'  name='id' value=$id  />
					<input type = 'submit' name = 'back1' value = '<<<Go Back'>
					</form>" ;	
					}
			
			
			?>
			
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