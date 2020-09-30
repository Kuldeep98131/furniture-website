<?PHP
include('includes/prebody.php');
?>
			
				<div class="row" style='background-color:silver;' >
				  <?PHP
		include('sidemenu.php');
		?>
				  
				  <div class='col-md-9' style='padding-top:0px; background-color:white;'> <!-- right side with products -->
				  
				  <?PHP //START of BLOCK 1  ?>
				  <div class='row' >
					
					<?PHP
					
					$id=1; //setting the initial id value
					$combined=">=$id"; //Combining intial logic.
					
					$check=0; //initial value for check variable.
					$productid=1; //default value in case view.php is clicked without the GET values
					if(isset($_GET['view']))
						{
							$productid=$_GET['productid'];
							$check=1;
						}
					
					
					$SQL = "SELECT * FROM products WHERE productid = $productid ORDER BY productid DESC ";
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
					
					
					echo "<div class='col-md-8' style='padding:10px'>";//column div
					
					$imagelink=$row['imagelink']; //fetching the image link from db.
					$id=$row['productid']; //fetching the last product id.
					$productid=$row['productid'];
					$description=$row['description'];
					$price=$row['offerprice'];
					$productname=$row['productname'];
					
					$form1="form$productid";
					$results1="results$productid";
					$redirect="redirect$productid";
					$trend="trend$productid";
					$loading="loading$productid";
					$addbutton="add$productid";
					
					echo "<img src='$imagelink'   alt='image' width='100%' />";
					
					//Form to submit details asyncronously.
				echo"	
					<form id= '$form1' >
        <input type='hidden' name='visitorid' value=$visitorid >
        <input type='hidden' name='productid' value='$productid' >
		
		<h4><input type='submit' name='add' id='$addbutton' value='Add to cart'> </h4>
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
						$.post('includes/add_process.php', formValues, function(data){
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
			<div class='col-md-4' style='padding:10px'>
			
					
			
			<?PHP
			if($check==1)
			{
			echo " <h3 style='text-align:center;'>Product Details </h3>
			<h4>Product Name</h4>
					<p>$productname </p>
					<h4>Price</h4>
					<p>$currency $price </p>
					<h4>Description</h4>
					<p>$description </p>
				
				";
			}
			
			?>
			
			</div>
			</div>  <!--Enclosing row within a column -->
			
			
			
			<?PHP
			//END of BLOCK 1
			?>
			
			 				
								</div>  <!--End of 9 column for products -->
				  </div>
				  
				 
	<?PHP
		include('includes/footer.php');
	?>
	 
   </div> <!-- End of container fluid -->
   </body>
   </html>